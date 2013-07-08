<?php

define('CONTEXT_SVN', 'subversion');
define('CONTEXT_WEBDAV', 'webdav');

define('USER_AUTHORISED', 0);
define('USER_NOT_AUTHORISED', 1);

/**
 * This class is getting information from different database to be able to grant 
 * the user if he has the correct permission regarding the URI requested 
 */
class Authentication {

  /**
   * Cache host
   * @var string 
   */
  private $local_server;

  /**
   * Cache username
   * @var string 
   */
  private $local_db_username;

  /**
   * Cache password
   * @var string 
   */
  private $local_db_password;

  /**
   * Cache database name
   * @var string 
   */
  private $local_db_name;

  /**
   * Joinup host
   * @var string 
   */
  private $isa_server;

  /**
   * Joinup username
   * @var string 
   */
  private $isa_db_username;

  /**
   * Joinup password
   * @var string 
   */
  private $isa_db_password;

  /**
   * Joinup database name
   * @var string 
   */
  private $isa_db_name;

  /**
   * The authentication context (webdav or subversion)
   * @var string 
   */
  private $auth_context;

  /**
   * The uri prefix (/svn, /webdav, /joinup-webdav...)
   * @var string 
   */
  private $uri_prefix;

  /**
   * Default constructor which initialises the information from the database and some specific 
   * behaviour
   * @param string $local_server
   * @param string $local_db_username
   * @param string $local_db_password
   * @param string $local_db_name
   * @param string $isa_server
   * @param string $isa_db_username
   * @param string $isa_db_password
   * @param string $isa_db_name
   * @param string $auth_context
   * @param string $uri_prefix 
   */
  public function __construct($local_server, $local_db_username, $local_db_password, $local_db_name,
    $isa_server, $isa_db_username, $isa_db_password, $isa_db_name, $auth_context, $uri_prefix) {
    $this->local_server = $local_server;
    $this->local_db_username = $local_db_username;
    $this->local_db_password = $local_db_password;
    $this->local_db_name = $local_db_name;
    $this->isa_server = $isa_server;
    $this->isa_db_username = $isa_db_username;
    $this->isa_db_password = $isa_db_password;
    $this->isa_db_name = $isa_db_name;
    $this->auth_context = $auth_context == CONTEXT_SVN ? CONTEXT_SVN : CONTEXT_WEBDAV;
    $this->uri_prefix = $uri_prefix;
  }

  /**
   * This function is extracting the project from the URI
   * e.g. /svn/joinup/trunk/isasvn/... gets 'joinup'
   * @param string $uri
   * @return string or FALSE if an error occured
   */
  protected function extractProjectFromURI($uri) {
    $uri_parts = $this->_getURIParts($uri);
    if (is_array($uri_parts) && count($uri_parts) > 0)
      return $uri_parts[0];
    return FALSE;
  }

  /**
   * This function is extracting the first repository of the project from the URI
   * e.g. /svn/joinup/trunk/isasvn/... gets 'trunk'
   * @param string $uri
   * @return string or FALSE if an error occured
   */
  protected function extractProjectRepositoryFromURI($uri) {
    $uri_parts = $this->_getURIParts($uri);
    if (is_array($uri_parts) && count($uri_parts) > 1)
      return $uri_parts[1];
    return FALSE;
  }

  /**
   * This function is getting the URI parts from an URI
   * e.g.  /svn/joinup/trunk/isasvn/ returns [joinup, trunk, isasvn]
   * @param string $uri
   * @return array
   */
  private function _getURIParts($uri) {
    $uri = trim($uri, '/');

    $uri = preg_replace('/^' . $this->uri_prefix . '/', '', $uri, 1);
    $uri = ltrim($uri, '/');

    $uri_parts = explode('/', $uri);
    return $uri_parts;
  }

  /**
   * Method which retrieves the hash for checking that the user is auhentified on a repository
   * @param string $login
   * @param string $password
   * @param string $uri
   * @return string the hash for the authentication cache 
   */
  private function _calculateAuthenticationHash($login, $password, $uri) {
    $project = $this->extractProjectFromURI($uri);
    return md5($login . $password . $project);
    /*
      if ($this->auth_context == CONTEXT_WEBDAV)
      return md5($login . $password . $project);

      $repository = $this->extractProjectRepositoryFromURI($uri);
      return md5($login . $password . $project . $repository);
     */
  }

  /**
   * Define that the user is authenticated and create the associated credentials
   * @param string $login
   * @param string $password 
   */
  public function set_authenticated($login, $password, $uri) {
    $usr_pwd_proj = $this->_calculateAuthenticationHash($login, $password, $uri);

    $connection = mysql_connect($this->local_server, $this->local_db_username,
      $this->local_db_password);
    if ($connection) {
      if (mysql_select_db($this->local_db_name, $connection)) {
        // Already authenticated at least once ?
        $sql = sprintf(
          'SELECT usr_pwd_proj
					FROM auth_cache
					WHERE usr_pwd_proj = \'%s\'',
          mysql_real_escape_string($usr_pwd_proj)
        );
        $req = mysql_query($sql)
          or die('Erreur SQL !<br />' . mysql_error());
        $record = mysql_fetch_assoc($req);
        if (!$record) {
          // Never authenticated
          $sql = sprintf(
            'INSERT INTO auth_cache (last_auth, usr_pwd_proj)
						VALUES (UNIX_TIMESTAMP(), \'%s\')',
            mysql_real_escape_string($usr_pwd_proj)
          );
          $req = mysql_query($sql)
            or die('Erreur SQL !<br />' . mysql_error());
        } else {
          // Already authenticated at least once
          $sql = sprintf(
            'UPDATE auth_cache
						SET last_auth = UNIX_TIMESTAMP()
						WHERE usr_pwd_proj = \'%s\'',
            mysql_real_escape_string($usr_pwd_proj)
          );
          $req = mysql_query($sql)
            or die('Erreur SQL !<br />' . mysql_error());
        }
      }
    }
  }

  protected function getSVNAuthCacheLifetime() {
    return defined('AUTH_CACHE_LIFETIME') ? constant('AUTH_CACHE_LIFETIME') : 600;
  }

  /**
   * This method is checking if a user is authenticated on a dedicated URI
   * @param string $login
   * @param string $password
   * @param string $uri
   * @return boolean true if the user is authenticated otherwise false
   */
  public function check_authenticated($login, $password, $uri) {
    $usr_pwd_proj = $this->_calculateAuthenticationHash($login, $password, $uri);

    $connection = mysql_connect($this->local_server, $this->local_db_username,
      $this->local_db_password);
    if ($connection) {
      if (mysql_select_db($this->local_db_name, $connection)) {
        // Check if authenticated in the last 10 minutes (600 seconds)
        $auth_cache_lifetime = $this->getSVNAuthCacheLifetime();
        $sql = sprintf(
          'SELECT usr_pwd_proj
					FROM auth_cache
					WHERE usr_pwd_proj = \'%s\'
					AND (UNIX_TIMESTAMP() - last_auth) < %d',
          mysql_real_escape_string($usr_pwd_proj), $auth_cache_lifetime
        );
        $req = mysql_query($sql)
          or die('Erreur SQL !<br />' . mysql_error());
        $record = mysql_fetch_assoc($req);
        if (!$record)
          return false;
        return true;
      }
    }
    return false;
  }

  /**
   * This method is checking if the user is authenticated on this part of the project
   * @param string $login
   * @param string $password
   * @param string $uri
   * @return int 0 if the user is granted access, otherwise 1
   */
  public function authenticate($login, $password, $uri) {
    $project = $this->extractProjectFromURI($uri);

    $connection = mysql_connect($this->isa_server, $this->isa_db_username, $this->isa_db_password);
    if ($connection) {
      if (mysql_select_db($this->isa_db_name, $connection)) {
        // Modify the permission depending on the context of the call
        if ($this->auth_context == CONTEXT_SVN) {
          //SVN
          $perm = 'SCM write into';
        } else {
          // Webdav
          $perm = 'access webdav repository';
        }

        // authenticates owner of project and
        // users with correct role
        $sql = sprintf(
          'SELECT u.uid
						FROM og_uid ou
						INNER JOIN users u ON u.uid = ou.uid
						INNER JOIN node n ON n.nid = ou.nid
						INNER JOIN project_projects pp ON pp.nid = ou.nid
						LEFT JOIN og_users_roles our ON our.uid = ou.uid AND ou.nid = our.gid
						LEFT JOIN permission p ON p.rid = our.rid
					WHERE
						u.name = \'%s\'
						AND u.pass = MD5(\'%s\')
						AND pp.uri = \'%s\'
						AND (
							p.perm LIKE \'%%%s%%\'
							OR n.uid = u.uid
						)',
          mysql_real_escape_string($login), mysql_real_escape_string($password),
          mysql_real_escape_string($project), $perm
        );
        $req = mysql_query($sql)
          or die('Erreur SQL !<br />' . mysql_error());
        $uid = mysql_fetch_assoc($req);
        if (!$uid)
          return USER_NOT_AUTHORISED;
        $this->set_authenticated($login, $password, $uri);
        return USER_AUTHORISED;
      }
    }
    return USER_NOT_AUTHORISED;
  }

  /**
   * This method is checking if the user has access on this part of the project
   * @param string $uri
   * @param string $login
   * @param string $dirs_changed
   * @return int 0 if the user is granted access, otherwise an error code
   */
  public function access($uri, $login, $dirs_changed) {
    $project = array_pop(explode('/', $uri));

    $connection = mysql_connect($this->isa_server, $this->isa_db_username, $this->isa_db_password);
    if ($connection) {
      if (mysql_select_db($this->isa_db_name, $connection)) {
        $perm = array();
        $matches = array();
        // Modify the permission depending on the context of the call
        preg_match_all("/^([^\/]*)\/.*$/m", $dirs_changed, $matches);
        //If the user commit into 'trunk' or at the root
        if (count($matches) < 1 || in_array('', $matches[1]) || in_array('trunk', $matches[1])) {
          $perm[] = 'SCM write into trunk';
        }
        if (in_array('branches', $matches[1])) {
          $perm[] = 'SCM write into branches';
        }
        if (in_array('tags', $matches[1])) {
          $perm[] = 'SCM write into tags';
        }
        //If the user commit in another folder than branches-tags-trunk
        if (count($perm) == 0) {
          $perm[] = 'SCM write into trunk';
        }

        $perm = implode("%' AND p.perm LIKE '%", $perm);
        // authenticates owner of project and users with correct role
        $sql = sprintf(
          'SELECT u.uid
						FROM og_uid ou
						INNER JOIN users u ON u.uid = ou.uid
						INNER JOIN node n ON n.nid = ou.nid
						INNER JOIN project_projects pp ON pp.nid = ou.nid
						LEFT JOIN og_users_roles our ON our.uid = ou.uid AND ou.nid = our.gid
						LEFT JOIN permission p ON p.rid = our.rid
					WHERE
						u.name = \'%s\'

						AND pp.uri = \'%s\'
						AND (
							p.perm LIKE \'%%%s%%\'
							OR n.uid = u.uid
						)',
          mysql_real_escape_string($login), mysql_real_escape_string($project), $perm
        );
        $req = mysql_query($sql)
          or die('Erreur SQL !<br />' . mysql_error());
        $uid = mysql_fetch_assoc($req);
        if (!$uid) {
          file_put_contents("php://stderr", 'You are not authorized to commit in this folder.');
          return USER_NOT_AUTHORISED;
        }
        // The user is able to connect
        return USER_AUTHORISED;
      }
    }
    file_put_contents("php://stderr", 'Unable to access database');
    return USER_NOT_AUTHORISED;
  }

  /**
   * This method is applying the security check regarding the user and the RUI
   * @param string $login
   * @param string $password
   * @param string $uri
   * @return int 0 if the user is granted otherwise 1
   */
  function exit_auth_status($login, $password, $uri) {
    if ($this->check_authenticated($login, $password, $uri))
      return USER_AUTHORISED;
    return $this->authenticate($login, $password, $uri);
  }

}
