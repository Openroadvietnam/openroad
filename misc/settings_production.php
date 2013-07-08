<?php
/**
 * Drupal configuration file for the ISA/JoinUp project.
 * This file differs a lot from a standard Drupal configuration file because it
 * handles certain special cases, such as:
 *   - behaving differently when the HTTP request comes from the BlueCoat
 *       reverse-proxy,
 *   - forcing authenticated people to use HTTPS
 *   - and making the website accessible either from the reverse-proxy, the
 *       load-balancer or from any individual Apache server
 */

/// Analyze the context in which this file is included
// Can we handle the HTTP response? The NO_ACTION constant allows other scripts
// to includes this configuration without generating redirections or 401 responses
$can_answer = !defined('NO_ACTION');

/// Analyze some HTTP headers
// Are we coming from the proxy?
$using_proxy = isset($_SERVER['HTTP_CLIENT_IP']);

// Are we using HTTPS? Analyze the proxy-specific X-Forwarded-Proto HTTP header
$using_https = isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https';

// Is it me?
$admin_ip = '158.167.25.109';
$is_admin = (($_SERVER['REMOTE_ADDR'] == $admin_ip) || ($using_proxy && $_SERVER['HTTP_CLIENT_IP'] == $admin_ip));

/// Use this to systematically redirect visitors to a given URL
$immediate_redirection = FALSE && $can_answer && $using_proxy; // we redirect only visitors coming through the reverse-proxy
$immediate_redirection_url = 'http://joinup.eu/';

/// Use this to require a HTTP authentication
$http_authentication = TRUE && $can_answer && $using_proxy;
$http_authentication_credentials = array('joinup' => 'FILLME');

if ($immediate_redirection) {
  header('Location: ' . $immediate_redirection_url);
  exit(0);
}

if ($http_authentication) {
  $identified = FALSE;
  
  // we may need to fetch the authentication by ourselves in provided EV
  $base_auth_env_var = 'REMOTE_USER';
  foreach (array($base_auth_env_var, 'REDIRECT_' . $base_auth_env_var) as $auth_env_var) {
    if (!isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER[$auth_env_var]) && strlen($_SERVER[$auth_env_var])) {
      list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($_SERVER[$auth_env_var], 6)));
    }
  }
  
  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="JoinUp"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'You must provide a user and password to access <a href="http://joinup.eu/">JoinUp</a>.';
    exit();
  }
  $provided_http_user = $_SERVER['PHP_AUTH_USER'];
  $provided_http_password = $_SERVER['PHP_AUTH_PW'];
  if (isset($http_authentication_credentials[$provided_http_user])) {
    if ($http_authentication_credentials[$provided_http_user] == $provided_http_password) {
      $identified = TRUE;
    }
  }
  if (!$identified) {
    echo 'You must provide a user and password to access <a href="http://joinup.eu/">JoinUp</a>.<br>'."\n";
    echo 'Bad username/password provided.';
    exit();
  }
}

/// Compose the base URL
// We include the FPFIS library only when we are behind the reverse-proxy. It
// will change various headers reported in $_SERVER.
if ($using_proxy) {
  define('FPFIS_SERVER_HOSTNAME',       'joinup.ec.europa.eu');
  define('FPFIS_COMMON_LIBRARIES_PATH', '/ec/prod/app/webroot/icp_home/libraries');

  if (is_file(FPFIS_COMMON_LIBRARIES_PATH . '/FPFIS_Common/fpfis_common.php')) {
    include_once(FPFIS_COMMON_LIBRARIES_PATH . '/FPFIS_Common/fpfis_common.php');
  }
}

// Protocol: the FPFIS library should set $_SERVER['HTTPS'] to 'on' if the
// reverse-proxy announced it is accessed through HTTPs via a
// X-Forwarded-Proto header -- however, it currently works for webgate mappings
// only.
$our_proto = $using_https ? 'https' : 'http';

// HTTP/1.1 "Host" header: thanks to the FPFIS library, it always matches the
// URL used by the User Agent.
$our_host = $_SERVER['HTTP_HOST']; // to be replaced by joinup.ec.europa.eu once the application is stable

// The base request-URI is set arbitrarily and should remain the same for any
// network path, because the reverse-proxy can not rewrite everything (e.g. CSS
// @import and JavaScript).
$our_base_uri = ''; // No trailing slash, please.

/// Base URL (not optional for us) -- remember, NO trailing slash!
$base_url = $our_proto . '://' . $our_host . $our_base_uri;

/// Database(s) access
// Default database for the website itself
$db_url['default']       = 'mysqli://isaweb:FILLME@158.167.39.13/isa_drupal_production';
// Migration-dedicated databases
$db_url['target']        = 'mysqli://isaweb:FILLME@158.167.39.13/isamig_target';
$db_url['isa_migration'] = 'mysqli://isaweb:FILLME@158.167.39.13/isamig_drupal';
// notes: 158.167.39.13 is banksia.cc.cec.eu.int

/// Tables prefix
$db_prefix = '';

/// Access control for update.php script
$update_free_access = FALSE;

/**
 * Force authenticated users to use the HTTPS protocol
 * This feature is implemented here because:
 *  1 - It is production-specific.
 *  2 - For performance reasons, we do not want to go further in the Drupal
 *      bootstrap process.
 */
$force_https_authentication = (TRUE && $can_answer && $using_proxy);
// --- 8< ----------------------------------------------------------------------
if ($force_https_authentication) {
  function joinup_conf_is_identified($session_cookie_name) {
    if (isset($_COOKIE[$session_cookie_name])) {
      // Initialize the default database.
      require_once './includes/database.inc';
      db_set_active();
      $user = db_fetch_object(db_query("SELECT u.*, s.* FROM {users} u INNER JOIN {sessions} s ON u.uid = s.uid WHERE s.sid = '%s'", $_COOKIE[$session_cookie_name]));
      return ($user && $user->uid > 0 && $user->status == 1);
    }
    return FALSE;
  }

  function joinup_conf_is_on_login_page() {
    return preg_match('#^/*user(?:/login)?/*#', $_GET['q']);
  }

  function joinup_conf_generate_drupal_session_name($base_url) {
    // Otherwise use $base_url as session name, without the protocol
    // to use the same session identifiers across http and https.
    list( , $session_name) = explode('://', $base_url, 2);
    if (ini_get('session.cookie_secure')) {
      $session_name .= 'SSL';
    }
    return 'SESS' . md5($session_name);
  }

  function joinup_conf_simple_redirect($https) {
    global $base_url;
    $protocol = $https ? 'https' : 'http';
    $dest_url = preg_replace('#^https?://#', $protocol.'://', $base_url);
    $dest_url .= '/' . trim(check_plain($_GET['q']), '/');
    header('Location: '. $dest_url);
    exit(0);
  }

  // any cookie set using HTTPS should remain HTTPS-only
  ini_set('session.cookie_secure', $using_https);

  $session_cookie_name = joinup_conf_generate_drupal_session_name($base_url);
  if ($using_https) {
    /*
    // either we are identified
    if (!joinup_conf_is_identified($session_cookie_name)) {
      // or we are on the user/login page
      if (!joinup_conf_is_on_login_page()) {
        // otherwise we should be using HTTP
        // Unfortunately, a BlueCoat-specific bug prevents us from issuing
        // "Location" headers applying a HTTPS-to-HTTP redirection -- they are
        // rewritten to HTTPS, therefore causing a redirection loop.
        joinup_conf_simple_redirect(FALSE);
      }
    }
    */
  }
  else {
    // user/login should redirect the user to HTTPS
    if (joinup_conf_is_on_login_page()/* || joinup_conf_is_identified($session_cookie_name)*/) { 
      joinup_conf_simple_redirect(TRUE);
    }
  }
}
// --- 8< ----------------------------------------------------------------------

/// PHP settings
ini_set('arg_separator.output',     '&amp;');
ini_set('magic_quotes_runtime',     0);
ini_set('magic_quotes_sybase',      0);
ini_set('session.cache_expire',     200000);
ini_set('session.cache_limiter',    'none');
ini_set('session.cookie_lifetime',  0); // required in delivery of v1.0.0alpha
ini_set('session.gc_maxlifetime',   200000);
ini_set('session.save_handler',     'user');
ini_set('session.use_cookies',      1);
ini_set('session.use_only_cookies', 1);
ini_set('session.use_trans_sid',    0);
ini_set('url_rewriter.tags',        '');
// ini_set('pcre.backtrack_limit', 200000);
// ini_set('pcre.recursion_limit', 200000);

/**
 * Drupal automatically generates a unique session cookie name for each site
 * based on on its full domain name. If you have multiple domains pointing at
 * the same Drupal site, you can either redirect them all to a single domain
 * (see comment in .htaccess), or uncomment the line below and specify their
 * shared base domain. Doing so assures that users remain logged in as they
 * cross between your various domains.
 */
#$cookie_domain = '.isa.eu';
// we do not specify $cookie_domain since Drupal will build it from
// $_SERVER['HTTP_HOST'] (see conf_init() in includes/bootstrap.inc)

/// PressFlow Smart start
// $conf['pressflow_smart_start'] = TRUE;

/// Solr-dedicated, environment-specific configuration
// we use the http://ocinum.cc.cec.eu.int:8080/solr Solr instance
$conf['apachesolr_host'] = '158.167.39.224'; // ocinum.cc.cec.eu.int
$conf['apachesolr_port'] = '8080';
$conf['apachesolr_path'] = '/solr';
$conf['apachesolr_cron_limit'] = 1000;
$conf['apachesolr_attachments_cron_limit'] = 300;
$conf['apachesolr_attachements_cron_time_limit'] = 50;
// It appears the Solr client may require a JRE...
$conf['apachesolr_attachments_java'] = '/ec/local/tomcat/jdk1.6.0_21/jre/bin/java';

/// Proxy configuration.
$conf['proxy_server']   = '158.169.9.13';
$conf['proxy_port']     = 8012;
//$conf['proxy_port']     = 9012; // disable external links via proxy for stress-tests
$conf['proxy_username'] = 'j50l029';
$conf['proxy_password'] = 'FILLME';
$conf['proxy_skip_selftest'] = TRUE;
// proxy exceptions include:
// the current machine
$conf['proxy_exceptions']  = 'localhost,127.0.0.1,';
// each node of the Apache cluster
$conf['proxy_exceptions'] .= 'rosarum,158.167.39.199,';
$conf['proxy_exceptions'] .= 'corylus,158.167.39.222,';
$conf['proxy_exceptions'] .= 'veronica,158.167.39.112,';
// the virtual IP offered by the SNET load-balancer
$conf['proxy_exceptions'] .= '158.167.242.123,';
// the ocinum.cc.cec.eu.int machine, currently used as Solr host
$conf['proxy_exceptions'] .= 'ocinum,158.167.39.224';

// In case the above configuration is not complete enough, do not spend too
// much time establishing connections
ini_set('default_socket_timeout', 10);

/// Enforce clean URLs (e.g. /joinup/foo/bar) or regular URLs
/// (e.g. /joinup/?q=foo/bar).
// $conf['clean_url'] = '0';

/// CacheRouter configuration.
$use_cacherouter = TRUE;
if ($use_cacherouter && function_exists('apc_store')) {
  $conf['cache_inc'] = './sites/all/modules/contributed/cacherouter/cacherouter.inc';
  $conf['cacherouter'] = array(
    'default' => array(
      'engine' => 'apc',
      'servers' => array(),
      'shared' => TRUE,
      'prefix' => 'joinup_',
      'path' => 'sites/default/files/filecache',
      'static' => FALSE,
      'fast_cache' => TRUE,
    ),
    'cache_form' => array(
      'engine' => 'db',
    ),
    'cache_page' => array(
      'engine' => 'db',
    ),
    'cache_content' => array(
      'engine' => 'db',
    ),
  );
}

/// Drupal/PressFlow cache configuration
$conf['cache'] = CACHE_NORMAL;

/// JoinUp-specific configuration
$conf['isa_ml_domain'] = 'joinup.ec.europa.eu';
$conf['project_issue_reply_to'] = 
$conf['simplenews_from_address'] =
$conf['simplenews_from_address_'] =
$conf['simplenews_from_name'] =
$conf['simplenews_from_name_'] =
$conf['simplenews_test_address'] =
$conf['site_mail'] =
$conf['subscriptions_site_mail'] = 'joinup@ec.europa.eu';

$conf['user_mail_status_blocked_body'] = sprintf("Dear [recipient-firstname],

Your account has been blocked. In case of error, you can contact us thanks to the address %s.

!site Team", $conf['site_mail']);

// These variables must be set to zero for the main Drupal website.
// They will be modified for the sub-site when a new virtual forge is created.
$conf['isa_vf_access_tid_virtual_forge'] = 0;
$conf['isa_vf_access_enable_grant'] = 0;
