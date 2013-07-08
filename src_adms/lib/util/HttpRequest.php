<?php

/*
 * Copyright (C) Atos
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace util;

/**
 * This class is taking the drupal_http_request and remove all the elements which are specific 
 * to drupal
 */
class HttpRequest {

  /**
   * Host of the proxy
   * @var string
   */
  private $proxy_server;

  /**
   * Port of the proxy
   * @var int
   */
  private $proxy_port;

  /**
   * Username for the proxy authentication
   * @var string
   */
  private $proxy_username;

  /**
   * Password for the proxy authentication
   * @var string
   */
  private $proxy_password;

  /**
   * List of exception for the proxy
   * This list might contain full IP address, domain name or part of it
   * (e.g. 172.24.135. will contains all the 172.24.135/24 addresses)
   * @var array
   */
  private $proxy_exceptions;

  public function __construct($proxy_server = NULL, $proxy_port = 8080, $proxy_username = NULL,
    $proxy_password = NULL, $proxy_exceptions = '') {
    $this->proxy_server = $proxy_server;
    $this->proxy_port = $proxy_port;
    $this->proxy_username = $proxy_username;
    $this->proxy_password = $proxy_password;

    if (is_array($proxy_exceptions))
      $this->proxy_exceptions = $proxy_exceptions;
    else if (is_string($proxy_exceptions))
      $this->proxy_exceptions = explode(',', $proxy_exceptions);
    else
      $this->proxy_exceptions = array();
  }

  /**
   * This method is getting the response from an URL 
   * Note: it uses the cURL library
   * @param string $url 
   */
  public function getResponse($url) {
    $response = new HttpResponse();
    $uri = parse_url($url);
    // Initialisation
    $ch = curl_init();

    // Configuration
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");

    // Configuration of the proxy
    $proxy = !empty($this->proxy_server) && !$this->isProxyException($uri['host']);
    if ($proxy) {
      curl_setopt($ch, CURLOPT_PROXY, $this->proxy_server);
      curl_setopt($ch, CURLOPT_PROXYPORT, $this->proxy_port);
      if (!empty($this->proxy_username))
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, "{$this->proxy_username}:{$this->proxy_password}");
    }

    // Get the result
    $response->data = curl_exec($ch);
    $response->code = curl_errno($ch);
    $response->error = curl_error($ch);
    $response->redirect = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    $response->request = $url;

    // Close the resources
    curl_close($ch);
    return $response;
  }

  /**
   * This method is checking if the host is in the exception list
   * @param string $host
   * @return boolean 
   */
  public function isProxyException($host) {
    if (count($this->proxy_exceptions) == 0) {
      return FALSE;
    }

    foreach ($this->proxy_exceptions as $exception) {
      $exception = trim($exception);
      if (strstr($exception, $host)) {
        return TRUE;
      }
    }
    return FALSE;
  }

}

?>
