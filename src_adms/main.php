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

/**
 * This file is the script which is used for the test of the development
 */
require_once 'bootstrap.php';

Logger::configure(retrieveLogConfiguration());
$logger = Logger::getLogger('cronjob');
$logger->info('Launch of the main.php script (this script is used to test the library)');

// Get the information from Drupal
if (!include_once( DRUPAL_CONFIG_DIR . 'settings.php' )) {
  $logger->fatal('Drupal settings not loaded, check your configuration');
  exit(-1);
}

/** Get the file to be treated * */
$listFiles = array(
  //$base_path . DIRECTORY_SEPARATOR . 'ExampleAdms_1.0.rdf',
  //$base_path . DIRECTORY_SEPARATOR . 'ExtractAdms_2.0.xml',
  //$base_path . DIRECTORY_SEPARATOR . 'ExtractAdms_3.0.xml',
  $base_path . DIRECTORY_SEPARATOR . 'ADMS_v1-00.rdf',
);

/** Treat the files * */
foreach ($listFiles as $file) {
  //$logger->debug('Treatment of the file ' . $file);
//Load the model
  try {
    // First check that the XML File is well formed
    @$doc = simplexml_load_file($file);
    if ($doc === FALSE) {
      throw new \UnexpectedValueException(
          "The input file '{$file}' is not a valid XML file.");
    }
    $doc = NULL;


    $adapter = \Adapters\AdapterFactory::getAdapter();
    $adms = $adapter->load($file);
// Export them to ?
    $output = "";
    $adapter->export($adms, $output);
//var_dump( $output );
    //for test put the nid of the repository to treat
    //$output ="20448";
    $adapter = \Adapters\AdapterFactory::getAdapter();
    $result = $adapter->export($adms, $output);
    //$logger->info($output);
  } catch (Exception $e) {
    $logger->error($e->getMessage(), $e);
  }
}
$logger->info('End of the main.php script');

/**
 * Function in order to retrieve the configuration regarding the filename
 * @param string $filename
 * @return array 
 */
function retrieveLogConfiguration($filename = '') {
  $config = array(
    'rootLogger' => array(
      'appenders' => array('console'),
      'level' => 'INFO',
    ),
    'cronjobLogger' => array(
      'appenders' => array('console'),
      'level' => 'TRACE',
    ),
  );

  $config['appenders'] = array();

  // defintion of the console appender
  $config['appenders']['console'] = array(
    'class' => 'LoggerAppenderEcho',
    'layout' => array(
      'class' => 'LoggerLayoutPattern',
      'params' => array(
        'conversionPattern' => '%c - %d{Y-m-d H:i:s} %p - %m%n',
      ),
    ),
  );
  if (!empty($filename)) {
    $config['rootLogger']['appenders'][] = 'file';

    // defintion of the file appender
    $config['appenders']['file'] = array(
      'class' => 'LoggerAppenderFile',
      'layout' => array(
        'class' => 'LoggerLayoutPattern',
        'params' => array(
          'conversionPattern' => '%p - %m%n',
        ),
      ),
      'params' => array(
        'file' => $filename,
        'append' => false,
      ),
    );
  }
  return $config;
}

?>
