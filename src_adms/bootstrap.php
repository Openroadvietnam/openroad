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
 * This file is the bootstrap of the library. It must be called in order to use
 * the library.
 * A simple 'require_once' is sufficient.
 */
/** Import * */
// Import of log4PHP
require_once('log4php/Logger.php');
/** Setup of the environment * */
$base_path = dirname(__FILE__);
$class_dir = $base_path . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;

/* Configuration section */
// Don't forget the trailing slash
$GLOBALS['adms_lib_path'] = $base_path;
define('RDFAPI_INCLUDE_DIR', $base_path . '/ext/rdfapi-php/api/');


// Path the Drupal
define('DRUPAL_DIR', dirname($base_path) . DIRECTORY_SEPARATOR);
define('DRUPAL_INCLUDES', DRUPAL_DIR . 'includes/');
define('DRUPAL_CONFIG_DIR', DRUPAL_DIR . 'sites/default/');
define('DRUPAL_FILES_DIR', DRUPAL_DIR . 'sites/default/files/');
define('DRUPAL_IMPORT_RESULT_DIR', DRUPAL_FILES_DIR . 'import_metadata/');


// Specific to the development
// SET IT TRUE on the production!!
define('DEV_WRITE_TO_DB', TRUE);

/**
 * Set up of the spl* methods
 */
// Add the class dir to include path
//set_include_path(get_include_path() . PATH_SEPARATOR . $class_dir);
// Use default autoload implementation (seems not compatible with Drupal)
//spl_autoload_register('adms_autoloader');
/**
 * Set up of the error handler 
 */
//set_error_handler('adms_errorhandler');

require_once( dirname(__FILE__) . '/lib/Common/Object.php' );
require_once( dirname(__FILE__) . '/lib/Common/Property.php' );
require_once( dirname(__FILE__) . '/lib/Common/LiteralProperty.php' );
require_once( dirname(__FILE__) . '/lib/RADion/Language.php' );
require_once( dirname(__FILE__) . '/lib/RADion/Agent.php' );
require_once( dirname(__FILE__) . '/lib/RADion/FileFormat.php' );
require_once( dirname(__FILE__) . '/lib/RADion/Asset.php' );
require_once( dirname(__FILE__) . '/lib/RADion/ThemeTaxonomy.php' );
require_once( dirname(__FILE__) . '/lib/RADion/Distibution.php' );
require_once( dirname(__FILE__) . '/lib/RADion/Theme.php' );
require_once( dirname(__FILE__) . '/lib/RADion/Repository.php' );
require_once( dirname(__FILE__) . '/lib/RADion/Code.php' );
require_once( dirname(__FILE__) . '/lib/RADion/GeographicCoverage.php' );
require_once( dirname(__FILE__) . '/lib/RADion/Licence.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/Documentation.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/PeriodOfTime.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/RepresentationTechnique.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/SemanticAsset.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/Item.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/Identifier.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/SemanticAssetDistribution.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/SemanticAssetRepository.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/ContactInformation.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/AssetType.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/Status.php' );
require_once( dirname(__FILE__) . '/lib/ADMS/InteroperabilityLevel.php' );
require_once( dirname(__FILE__) . '/lib/Adapters/IExporter.php' );
require_once( dirname(__FILE__) . '/lib/Adapters/ILoader.php' );
require_once( dirname(__FILE__) . '/lib/Adapters/XmlAdapter.php' );
require_once( dirname(__FILE__) . '/lib/Adapters/XmlRdfAdapter.php' );
require_once( dirname(__FILE__) . '/lib/Adapters/DrupalAdapter.php' );
require_once( dirname(__FILE__) . '/lib/Adapters/AdapterFactory.php' );
require_once( dirname(__FILE__) . '/lib/util/HttpRequest.php');
require_once( dirname(__FILE__) . '/lib/util/HttpResponse.php');
require_once (RDFAPI_INCLUDE_DIR . '/syntax/RdfSerializer.php' );

/**
 * This function is used to autoload the classes used by the library
 * @global string $class_dir The path to the classes within the library
 * @param type $className The name of the class to be loaded
 */
function adms_autoloader($className) {
  global $class_dir;
  $file = $class_dir . $className . '.php';
  if (is_file($file))
    require_once $file;
  else
    throw new \Exception("File associated to the class ($className) not found");
}

/**
 *
 * @param int $errno The error level
 * @param string $errstr The error message
 * @param string $errfile The filename which causes the error
 * @param array $errl a table of active pointes
 */
function adms_errorhandler($errno, $errstr, $errfile, $errl) {
  $logger = Logger::getLogger('bootstrap');
  //debug_print_backtrace();
  $logger->error("$errno, $errstr");
  //throw new \Exception("{$errfile}: {$errstr}");
}

/**
 * Function in order to retrieve the configuration regarding the filename
 * @param string $filename
 * @return array 
 */
function retrieveLogConfiguration($filename = '', $withConsole = TRUE) {
  $config = array(
    'rootLogger' => array(
      'appenders' => array('console'),
      'level' => 'INFO',
    ),
//    'cronjobLogger' => array(
//      'appenders' => array('console'),
//      'level' => 'TRACE',
//    ),
  );

  $config['appenders'] = array();

  // defintion of the console appender
  if ($withConsole) {
    $config['appenders']['console'] = array(
      'class' => 'LoggerAppenderEcho',
      'layout' => array(
        'class' => 'LoggerLayoutPattern',
        'params' => array(
          //'conversionPattern' => '%c - %d{Y-m-d H:i:s} %p - %m%n',
          'conversionPattern' => '%d{Y-m-d H:i:s} %p - %m%n',
        ),
      ),
    );
  }
  if (!empty($filename)) {
    $config['rootLogger']['appenders'][] = 'file';

    // defintion of the file appender
    $config['appenders']['file'] = array(
      'class' => 'LoggerAppenderFile',
      'layout' => array(
        'class' => 'LoggerLayoutPattern',
        'params' => array(
          'conversionPattern' => '%d{Y-m-d H:i:s} %p - %m%n',
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
