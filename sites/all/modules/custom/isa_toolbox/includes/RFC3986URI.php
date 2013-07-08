<?php

/**
 * Compiled regular expressions.
 */
define('RE_SCHEME', '[a-z][a-z0-9\+\-\.]*');
define('RE_AUTHORITY', '(([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:)*@)?(\[(((([0-9a-f]{1,4}):){6}(([0-9a-f]{1,4}):([0-9a-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))|::(([0-9a-f]{1,4}):){5}(([0-9a-f]{1,4}):([0-9a-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))|([0-9a-f]{1,4})?::(([0-9a-f]{1,4}):){4}(([0-9a-f]{1,4}):([0-9a-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))|((([0-9a-f]{1,4}):)?([0-9a-f]{1,4}))?::(([0-9a-f]{1,4}):){3}(([0-9a-f]{1,4}):([0-9a-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))|((([0-9a-f]{1,4}):){0,2}([0-9a-f]{1,4}))?::(([0-9a-f]{1,4}):){2}(([0-9a-f]{1,4}):([0-9a-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))|((([0-9a-f]{1,4}):){0,3}([0-9a-f]{1,4}))?::([0-9a-f]{1,4}):(([0-9a-f]{1,4}):([0-9a-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))|((([0-9a-f]{1,4}):){0,4}([0-9a-f]{1,4}))?::(([0-9a-f]{1,4}):([0-9a-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))|((([0-9a-f]{1,4}):){0,5}([0-9a-f]{1,4}))?::([0-9a-f]{1,4})|((([0-9a-f]{1,4}):){0,6}([0-9a-f]{1,4}))?::)|v[0-9a-f]+\.([a-z0-9\-\._~]|[!\$&\'\(\)\*\+,;=]|:)+)\]|([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])|([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=])*)(:[0-9]*)?');
define('RE_PATH', '((\/(([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:|@)*))*|\/((([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:|@)+)(\/(([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:|@)*))*)?|([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|@)+(\/(([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:|@)*))*|(([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:|@)+)(\/(([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:|@)*))*|([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:|@){0})');
define('RE_QUERY', '(([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:|@)|\/|\?)*');
define('RE_FRAGMENT', '(([a-z0-9\-\._~]|%[0-9a-f]{2}|[!\$&\'\(\)\*\+,;=]|:|@)|\/|\?)*');

/**
 * Class for validating RFC 3986 URIs.
 */
class RFC3986URI
{
  /**
   * @var string URI scheme
   */
  private $scheme;
  /**
   * @var string URI authority
   */
  private $authority;
  /**
   * @var string URI path
   */
  private $path;
  /**
   * @var string URI query
   */
  private $query;
  /**
   * @var string URI fragment
   */
  private $fragment;

  /**
   * Creates new instance of RFC3986URI.
   *
   * @param string RFC 3986 URI
   */
  public function __construct($uri)
  {
    $uri = (string) $uri;
    if (!preg_match('/^(([^:\/?#]+):)?(\/\/([^\/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?/', $uri, $result))
    {
      throw new InvalidSyntaxException();
    }

    @list(, , $scheme, , $authority, $path, , $query, , $fragment) = $result;
    $this->checkScheme($scheme);
    $this->checkAuthority($authority);
    $this->checkPath($path);
    $this->checkQuery($query);
    $this->checkFragment($fragment);

    $this->scheme = $scheme;
    $this->authority = $authority;
    $this->path = $path;
    $this->query = $query;
    $this->fragment = $fragment;
  }

  /**
   * Checks if this URI is absolute.
   *
   * @return boolean if this URI is absolute
   */
  public function isAbsolute()
  {
    return ($this->scheme !== null);
  }

  /**
   * Checks URI scheme.
   *
   * @param URI scheme
   */
  private function checkScheme($scheme)
  {
    if (!preg_match('/^'.RE_SCHEME.'$/i', $scheme))
    {
      throw new InvalidSchemeException();
    }
  }

  /**
   * Checks URI authority.
   *
   * @param URI authority
   */
  private function checkAuthority($authority)
  {
    if (!preg_match('/^'.RE_AUTHORITY.'$/i', $authority))
    {
      throw new InvalidAuthorityException();
    }
  }

  /**
   * Checks URI path.
   *
   * @param URI path
   */
  private function checkPath($path)
  {
    if (!preg_match('/^'.RE_PATH.'$/i', $path))
    {
      throw new InvalidPathException();
    }
  }

  /**
   * Checks URI query.
   *
   * @param URI query
   */
  private function checkQuery($query)
  {
    if (!preg_match('/^'.RE_QUERY.'$/i', $query))
    {
      throw new InvalidQueryException();
    }
  }

  /**
   * Checks URI fragment.
   *
   * @param URI fragment
   */
  private function checkFragment($fragment)
  {
    if (!preg_match('/^'.RE_FRAGMENT.'$/i', $fragment))
    {
      throw new InvalidFragmentException();
    }
  }
}

class InvalidSyntaxException extends Exception {}
class InvalidSchemeException extends Exception {}
class InvalidAuthorityException extends Exception {}
class InvalidPathException extends Exception {}
class InvalidQueryException extends Exception {}
class InvalidFragmentException extends Exception {}
