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

namespace Adapters;

define('CREATION_URI', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#type');

/**
 * This class is an implementation of the interfaces ILoader and IExporter
 * @see util\Adapters\ILoader
 * @see util\Adapters\IExporter
 */
class XmlRdfAdapter implements ILoader, IExporter {

  /**
   * The logger
   * @var Logger
   */
  private $_logger;

  /**
   * This array is a translation between 
   * the URI which is the key and 
   * the Object which is the Name of the class
   * @var array
   */
  private $_classes = array(
    // RADion
    'http://www.w3.org/ns/radion#Repository' => '\RADion\Repository',
    'http://www.w3.org/ns/radion#Asset' => '\RADion\Asset',
    'http://www.w3.org/ns/radion#Distribution' => '\RADion\Distribution',
    'http://purl.org/dc/terms/Agent' => '\RADion\Agent',
    'http://purl.org/dc/terms/Location' => '\RADion\GeographicCoverage',
    'http://purl.org/dc/terms/LinguisticSystem' => '\RADion\Language',
    'http://purl.org/dc/terms/FileFormat' => '\RADion\File Format',
    'http://purl.org/dc/terms/LicenseDocument' => '\RADion\Licence',
    'http://www.w3.org/2004/02/skos/core#Concept' => '\RADion\Code',
    // This one are not classes but standard types
    //'http://www.w3.org/2000/01/rdf-schema#Literal'        => '\RADion\string, URI, dateTime, text',
    // ADMS
    'http://www.w3.org/2004/02/skos/core#Concept' => '\ADMS\AssetType',
    'http://www.w3.org/2006/vcard/ns#VCard' => '\ADMS\ContactInformation',
    //'http://www.w3.org/ns/adms#ContactInformation' => '\ADMS\ContactInformation',
    'http://xmlns.com/foaf/0.1/Document' => '\ADMS\Documentation',
    'http://www.w3.org/ns/adms#Identifier' => '\ADMS\Identifier',
    'http://www.w3.org/2004/02/skos/core#Concept' => '\ADMS\InteroperabilityLevel',
    'http://www.w3.org/ns/adms#Item' => '\ADMS\Item',
    'http://purl.org/dc/terms/PeriodOfTime' => '\ADMS\PeriodOfTime',
    'http://www.w3.org/2004/02/skos/core#Concept' => '\ADMS\RepresentationTechnique',
    'http://www.w3.org/ns/adms#SemanticAsset' => '\ADMS\SemanticAsset',
    'http://www.w3.org/ns/adms#SemanticAssetDistribution' => '\ADMS\SemanticAssetDistribution',
    'http://www.w3.org/ns/adms#SemanticAssetRepository' => '\ADMS\SemanticAssetRepository',
    'http://www.w3.org/2004/02/skos/core#Concept' => '\ADMS\Status',
  );

  /**
   * This array is a translation between 
   * the URI which is the key and 
   * the Object which is the Name of the property
   * @var array
   */
  private $_properties = array(
    // RADion
    'http://purl.org/dc/terms/alternative' => 'alternativeName',
    'http://www.w3.org/1999/xhtml/vocab#last' => 'currentVersion',
    'http://purl.org/dc/terms/created' => 'dateCreated',
    'http://purl.org/dc/terms/modified' => 'dateModified',
    'http://www.w3.org/2000/01/rdf-schema#comment' => 'description',
    'http://purl.org/dc/terms/description' => 'description',
    'http://www.w3.org/ns/radion#distribution' => 'distribution',
    'http://www.w3.org/ns/radion#distributionOf' => 'distributionOf',
    'http://purl.org/dc/terms/format' => 'format',
    'http://purl.org/dc/terms/hasPart' => 'includes',
    'http://www.w3.org/ns/radion#keyword' => 'keyword',
    'http://www.w3.org/2000/01/rdf-schema#label' => 'label',
    'http://www.w3.org/2000/01/rdf-schema#label' => 'name',
    'http://purl.org/dc/terms/language' => 'language',
    'http://purl.org/dc/terms/license' => 'license',
    'http://www.w3.org/1999/xhtml/vocab#next' => 'nextVersion',
    'http://www.w3.org/1999/xhtml/vocab#prev' => 'previousVersion',
    'http://purl.org/dc/terms/publisher' => 'publisher',
    'http://purl.org/dc/terms/relation' => 'relation',
    'http://purl.org/dc/terms/isPartOf' => 'repositoryOrigin',
    'http://purl.org/dc/terms/spatial' => 'spatialCoverage',
    'http://purl.org/dc/terms/subject' => 'theme',
    'http://purl.org/dc/terms/type' => 'type',
    'http://www.w3.org/ns/radion#version' => 'version',
    'http://www.w3.org/ns/radion#versionNotes' => 'versionNotes',
    // ADMS
    'http://www.w3.org/ns/adms#accessURL' => 'accessURL',
    'http://www.w3.org/ns/adms#contactPoint' => 'contactPoint',
    'http://www.w3.org/2007/05/powder-s#describedBy' => 'documentation',
    'http://schema.org/endDate' => 'end',
    'http://xmlns.com/foaf/0.1/homepage' => 'homepage',
    'http://www.w3.org/ns/adms#identifies' => 'identifies',
    'http://www.w3.org/ns/adms#includedAsset' => 'includedAsset',
    'http://www.w3.org/ns/adms#includedItem' => 'includedItem',
    'http://www.w3.org/ns/adms#interoperabilityLevel' => 'interoperabilityLevel',
    'http://www.w3.org/ns/adms#metadataDate' => 'metadataDate',
    'http://www.w3.org/ns/adms#metadataLanguage' => 'metadataLanguage',
    'http://www.w3.org/ns/adms#metadataPublisher' => 'metadataPublisher',
    'http://www.w3.org/ns/adms#relatedDocumentation' => 'relatedDocumentation',
    'http://www.w3.org/ns/adms#relatedWebPage' => 'relatedWebPage',
    'http://www.w3.org/ns/adms#representationTechnique' => 'representationTechnique',
    'http://www.w3.org/ns/adms#sample' => 'sample',
    'http://www.w3.org/ns/adms#schemeAgency' => 'schemeAgency',
    'http://www.w3.org/ns/adms#schemeVersion' => 'schemeVersion',
    'http://schema.org/startDate' => 'start',
    'http://www.w3.org/ns/adms#status' => 'status',
    'http://www.w3.org/ns/adms#supportedSchema' => 'supportedSchema',
    'http://purl.org/dc/terms/temporal' => 'temporalCoverage',
    'http://www.w3.org/ns/adms#translation' => 'translation',
    // ADDED by hand
    'http://purl.org/dc/terms/title' => 'title',
    'http://www.w3.org/2004/02/skos/core#notation' => 'code',
    'http://www.w3.org/2006/vcard/ns#email' => 'email',
    'http://www.w3.org/2006/vcard/ns#label' => 'fullAddress',
    'http://www.w3.org/2006/vcard/ns#tel' => 'telephone', //should be phone in vcard
    'http://www.w3.org/ns/adms#identifier' => 'identifier',
  );


  /**
   * @var array of property and uri
   * @see __construct()
   */
  private $_properties_flipped;

  /**
   * @var array of uris and properties
   * @see __construct()
   */
  private $_properties_lowercase;

  /**
   * @var array of class with uri and property
   */
  private $_properties_extra_class = array(
    'ADMS\ContactInformation' => array(
      'http://www.w3.org/2006/vcard/ns#n' => 'name',
      'http://www.w3.org/2006/vcard/ns#fn' => 'name',
    ),
    'ADMS\Documentation' => array(
      'http://www.w3.org/2000/01/rdf-schema#label' => 'title',
      'http://purl.org/dc/terms/title' => 'title',
    ),
  );

  /**
   * @var array of class with property and uri
   * @see __construct()
   */
  private $_properties_extra_class_flipped;

  /**
   * @var array of class with property and uri
   * @see __construct()
   */
  private $_properties_extra_class_lowercase;

  /**
   * This table is an ignore list for properties which are not neccessary to be 
   * implemented
   * @var array 
   */
  private $_ignore = array(
    // Comments removed from the ignore list for ISAICP-638
    //'http://www.w3.org/2000/01/rdf-schema#comment', // Comments 
    'http://www.w3.org/2004/02/skos/core#conceptscheme', // Definition of the theme
    'http://purl.org/dc/terms/mediatypeorextent', // Media types
  );

  /**
   * This method is the constructor of the class
   * it uses the library for the implementation
   */
  public function __construct() {
    // Creating the log instance
    $this->_logger = \Logger::getLogger(__CLASS__);

    // Check that the variable is correctly configured
    if (!defined('RDFAPI_INCLUDE_DIR')) {
      throw new \InvalidArgumentException('Library RAP RDFAPI_INCLUDE_DIR not configured');
    }

    // Check that the path exists
    if (!is_dir(RDFAPI_INCLUDE_DIR)) {
      throw new \InvalidArgumentException('Library RAP path incorrect');
    }

    // Loading of the RDFAPI library
    $this->_logger->debug('Loading of the RAP Library');
    require_once RDFAPI_INCLUDE_DIR . 'RdfAPI.php';
    require_once RDFAPI_INCLUDE_DIR . 'util/RdfUtil.php';


    $this->_properties_lowercase = array_change_key_case($this->_properties);
    // Flip property names with URIs
    $this->_properties_flipped = array_flip($this->_properties);
    foreach($this->_properties_extra_class as $key_extra_class => $extra_class){
      $this->_properties_extra_class_lowercase[$key_extra_class] = array_change_key_case($extra_class);
      $this->_properties_extra_class_flipped[$key_extra_class] = array_flip($extra_class);
    }
  }

  /**
   * This method loads a table of AdmsObject from an RDF XML file
   * @param mixed $object the path to the file which should be loaded
   * @return obj a table of AdmsObject
   */
  public function load($object) {
    // Check the input of the function
    // If it is a string, then it should be a valid file
    if (!is_string($object)) {
      throw new \InvalidArgumentException('Invalid parameter $object');
    }

    //variables declaration
    $intObjects = array();

    // Create a new MemModel
    $modelFactory = new \ModelFactory();
    $model = $modelFactory->getDefaultModel();

    // Load and parse document
    try {
      if (is_file($object))
        $model->load($object);
      else
        $model->loadFromString($object, 'rdf');
    } catch (\Exception $e) {
      $this->_logger->fatal($e->getMessage());
      return;
    }


    // Map the model to a table of AdmsObject
    $it = $model->getStatementIterator();
    //var_dump( $model );
    $pending_tab = array();
    while ($it->hasNext()) {
      $statement = $it->next();

      $this->_logger->trace("Subject: {$statement->getSubject()->toString()}");
      $this->_logger->trace("Predicate: " . $statement->getPredicate()->getURI());
      $this->_logger->trace("Object: {$statement->getObject()->toString()}");

      // if this is a type we are creating it
      // Get the subject
      $subject = $statement->getSubject();

      // In order to synchronize the various parameter and the different types
      // I am using the "intermediate" parameters of the Common\Object class
      // 1. Register all the parameters
      // 2. Register all the types to be instanciated
      // 3. Translate into an array of ADMS objects
      // 
      if (!array_key_exists($subject->getURI(), $intObjects)) {

        // The object doesn't exist, we have to instantiate it!
        if ($statement->getPredicate()->getURI() == CREATION_URI) {
          $resource = $statement->getObject()->getURI();
          try {
            $type = $this->_isShortResource($resource) ?
              $this->_getClassNameFromResource($resource) :
              $this->_getClassFromURI($resource);
          } catch (\DomainException $de) {
            $this->_logger->debug($de->getMessage());
          } catch (\Exception $e) {
            $this->_logger->warn($e->getMessage());
            continue;
          }

          $object = new \Common\Object();
          $object->addType($type);
          $object->id = $subject->getURI();
          $intObjects[$subject->getURI()] = $object;
          //check if pending properties for this uri
          if (array_key_exists($subject->getURI(), $pending_tab)) {
            $counter = count($pending_tab[$subject->getURI()]);
            for ($i = 0; $i < $counter; $i++) {
              if (array_key_exists($i, $pending_tab[$subject->getURI()])) {
                if ($this->add_pending_property($intObjects, $pending_tab[$subject->getURI()][$i])) {
                  unset($pending_tab[$subject->getURI()][$i]);
                  $counter++;
                }
              }
            }
          }
        } else {
          // put the statement in pending
          $pending_tab[$subject->getURI()][] = $statement;
        }
      } else if ($statement->getPredicate()->getURI() == CREATION_URI) {

        // If it is the creation URI then, I just have to register a new
        // intermediate type and 
        $resource = $statement->getObject()->getURI();

        try {
          $type = $this->_isShortResource($resource) ?
            $this->_getClassNameFromResource($resource) :
            $this->_getClassFromURI($resource);
          // I add the type
          $intObjects[$subject->getURI()]->addType($type);
        } catch (\DomainException $de) {
          $this->_logger->debug($de->getMessage());
        } catch (\Exception $e) {
          $this->_logger->warn($e->getMessage());
        }
      } else {
        // The Class already exists
        // We have to add the predicate with the object value
        $this->_logger->trace("Add a new predicate");
        $object = $intObjects[$subject->getURI()];
        $classname = substr($object->_types[0], 1);
        try {
          // Check also, that the property exists for this object
          // Create a InvalidParameterException if doesn't exist
          $property = $this->_getPropertyFromURI(
            $statement->getPredicate()->getURI(),
            $classname);


          // $sob is the statement object which needs to be manipulated
          $sob = $statement->getObject();

          switch (get_class($sob)) {
            case 'Literal':
              $this->_logger->trace('The object is a literal');

              //I trim to avoid to much usage of <![CDATA[ xxx ]]>
              $objProperty = new \Common\LiteralProperty(
                  trim($statement->getObject()->getLabel()),
                  $sob->getLanguage(), $sob->getDatatype());
              break;
            case 'Resource':
              $objProperty = new \Common\Property(
                  $statement->getObject()->getURI(),
                  COMMON_PROPERTY_TYPE_RESOURCE
              );
              break;
            default:
              throw new \RuntimeException(
                'The type of statement object "' .
                get_class($sob) .
                '" is not implemented');
          }
          $object->addParameter($property, $objProperty);
        } catch (\DomainException $de) {
          $this->_logger->debug(
            $de->getMessage() .
            " [Subject: {$statement->getSubject()->toString()}]");
        } catch (\Exception $e) {
          $this->_logger->error(
            $e->getMessage() .
            " [Subject: {$statement->getSubject()->toString()}]");
        }
      }
    }
    $admsObjects = array();
    foreach ($intObjects as $URI => $intObject) {
      $this->_logger->trace("Translation URI '{$URI}'");
      $admsObjects[$URI] = $intObject->translate();
    }

    $this->_logger->trace("");
    return $admsObjects;
  }

  /**
   * This function needs to be implemented in order to export the data
   * @param adms:AdmsObject[] data the data (AdmsObject table) which should be exported
   * @param string output another output than the simple boolean value
   * @throws \DomainException 
   * @throws \InvalidArgumentException 
   * @return boolean
   * @access public
   */
  public function export($data, & $output) {
    if (!is_array($data)) {
      throw new \InvalidArgumentException('The data sent to the export method are invalid');
    }

    // Initialisation of the RDF document
    $modelFactory = new \ModelFactory();
    $model = $modelFactory->getDefaultModel();

    $model->addNamespace('xsd', 'http://www.w3.org/2001/XMLSchema#');
    $model->addNamespace('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
    $model->addNamespace('owl', 'http://www.w3.org/2002/07/owl#');
    $model->addNamespace('dcterms', 'http://purl.org/dc/terms/');
    $model->addNamespace('foaf', 'http://xmlns.com/foaf/0.1/');
    $model->addNamespace('schema', 'http://schema.org/');
    $model->addNamespace('cc', 'http://creativecommons.org/ns#');
    $model->addNamespace('skos', 'http://www.w3.org/2004/02/skos/core');
    $model->addNamespace('dcat', 'http://www.w3.org/ns/dcat#');
    $model->addNamespace('xhv', 'http://www.w3.org/1999/xhtml/vocab#');
    $model->addNamespace('wdrs', 'http://www.w3.org/2007/05/powder-s#');
    $model->addNamespace('vann', 'http://purl.org/vocab/vann/');
    $model->addNamespace('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
    $model->addNamespace('adms', 'http://www.w3.org/ns/adms#');
    $model->addNamespace('rad', 'http://www.w3.org/ns/radion#');
    foreach ($data as $uri => $objects) {
      //For each objects, I create a new rdf subject
      foreach ($objects as $object) {
        try {
          // Create the creation statement regarding the URI
          $model->add(new \Statement(
              new \Resource($uri),
              new \Resource(CREATION_URI),
              new \Resource($this->_getURIFromClass(get_class($object)))
          ));

          // We are searching for the all the properties
          $c = new \ReflectionClass(get_class($object));
          foreach ($c->getProperties() as $property) {
            $name = $property->name;
            $values = $object->$name;

            if (!in_array($name, $this->_properties))
              continue;

            // We are not treating the 'id' cause it is created above
            // If the value is not set, we don't treat it
            if ($name == 'id' || !isset($values))
              continue;

            $this->_logger->trace("Checking the values for the parameter {$name}");
            // If this property is registered as a resource we create a resource
            // otherwise a Literal object
            foreach ($values as $value) {
              if (!($value instanceof \Common\Property)) {
                throw new \DomainException(
                  "The property '{$name}' contains an invalid type of value");
              }
              $classname = get_class($object);
              if ($value->type == COMMON_PROPERTY_TYPE_RESOURCE) {
                $model->add(new \Statement(
                    new \Resource($uri),
                    new \Resource($this->_getURIFromProperty($name, $classname)),
                    new \Resource($value->value)
                ));
              } else {
                if (empty($value->value)) {
                  continue;
                }

                $literal = new \Literal($value->value);
                if (array_key_exists('language', $value->additionalParameter))
                  $literal->setLanguage($value->additionalParameter['language']);
                if (array_key_exists('datatype', $value->additionalParameter))
                  $literal->setDatatype($value->additionalParameter['datatype']);

                $model->add(new \Statement(
                    new \Resource($uri),
                    new \Resource($this->_getURIFromProperty($name, $classname)),
                    $literal
                ));
              }
            }
          }
        } catch (\Exception $e) {
          
        }
      }
    }

    $serializer = new \RdfSerializer();
    $serializer->configUseAttributes(false);
    $serializer->configUseAdvertisement(false);
    $output = $serializer->serialize($model);
    return true;
  }

  /**
   * This function is retrieving the property related to an URI
   * @param string $URI The URI which needs to be translated
   * @param classname
   * @return string
   * @throws InvalidArgumentException if the URI doesn't exist
   * @throws DomainException if the URI is ignored
   */
  private function _getPropertyFromURI($URI, $classname) {
    if (in_array(strtolower($URI), $this->_ignore)) {
      throw new \DomainException("The property '{$URI}' is ignored");
    }
    $uri = strtolower($URI);

    if (isset($this->_properties_lowercase[$uri])) {
      $property = $this->_properties_lowercase[$uri];
    }

    if(isset($this->_properties_extra_class_lowercase[$classname][$uri])) {
      $property = $this->_properties_extra_class_lowercase[$classname][$uri];
    }

    if($property) {
      return $property;
    }

    throw new \InvalidArgumentException(
      "The URI '{$URI}' is not a property of the ADMS norm."
    );
  }

  /**
   * This function is retrieving the class related to an URI
   * @param string $URI The URI which needs to be translated
   * @return string
   * @throws InvalidArgumentException if the URI doesn't exist
   * @throws DomainException if the URI is ignored
   */
  private function _getClassFromURI($URI) {
    if (in_array(strtolower($URI), $this->_ignore)) {
      throw new \DomainException("The class '{$URI}' is ignored");
    }
    if (array_key_exists(strtolower($URI), array_change_key_case($this->_classes))) {
      $temp = array_change_key_case($this->_classes);
      return $temp[strtolower($URI)];
    }
    throw new \InvalidArgumentException(
      "The URI '{$URI}' is not a class of the ADMS norm."
    );
  }

  /**
   * This function is retrieving the URI related to a property
   * @param string $property The property which needs to be translated
   * @param string $classname The name of the class when we want to extract a specific property
   * @return string
   * @throws InvalidArgumentException if the property is not referenced
   */
  private function _getURIFromProperty($property, $classname) {
    if (array_key_exists($property, $this->_properties_flipped)) {
      $uri = $this->_properties_flipped[$property];
    }

    if(isset($this->_properties_extra_class_flipped[$classname][$property])) {
      $uri = $this->_properties_extra_class_flipped[$classname][$property];
    }

    if ($uri) {
      return $uri;
    }

    throw new \InvalidArgumentException(
      "The property '{$property}' doesn't exist in the property mapper"
    );
  }

  /**
   * This function is retrieving the URI related to a class
   * @param string $class The class which needs to be translated
   * @return string
   * @throws InvalidArgumentException if the property is not referenced
   */
  private function _getURIFromClass($class) {
    $temp = array_flip($this->_classes);
    $this->_logger->trace($class);
    if (!preg_match('/^\\.*$/', $class))
      $class = '\\' . $class;
    if (array_key_exists($class, $temp)) {
      return $temp[$class];
    }
    throw new \InvalidArgumentException(
      "The class '{$class}' doesn't exist in the class mapper"
    );
  }

  /**
   * Get the classname of an object from its ressource definition 
   * (e.g. adms:SemanticAssetRepository => \ADMS\SemanticAssetRepository )
   * @param string $ressource
   * @return string
   */
  private function _getClassNameFromResource($ressource) {
    $tclass = explode(':', $ressource);
    switch ($tclass[0]) {
      case 'adms':
        $tclass[0] = '\ADMS\\';
        break;
      case 'rad':
        $tclass[0] = '\RADion\\';
      default:
        break;
    }
    return implode('', $tclass);
  }

  /**
   * Get the ressource name of an object from its class name 
   * (e.g. \ADMS\SemanticAssetRepository => adms:SemanticAssetRepository )
   * @param string $classname
   * @return string
   */
  private function _getResourceFromClassName($classname) {
    $tclass = explode('\\', $classname);
    switch ($tclass[0]) {
      case 'ADMS':
        $tclass[0] = 'adms:';
        break;
      case 'RADion':
        $tclass[0] = 'rad:';
      default:
        break;
    }
    return implode('', $tclass);
  }

  /**
   * This method is used to check if the string passed is a resource 
   * @param string $resource 
   */
  private function _isShortResource($resource) {
    return preg_match('/^[A-Za-z]*:[A-Za-z]*$/', $resource);
  }

//end of load() function

  /**
   * This method is used to add to adms Object, property in pending
   * when declared before the type of object 
   * @param string $resource 
   */
  private function add_pending_property(&$intObjects, $statement) {
    // The Class already exists
    // We have to add the predicate with the object value
    $subject = $statement->getSubject();
    $this->_logger->trace("Add a new predicate");
    $object = $intObjects[$subject->getURI()];
    $classname = get_class($object);
    try {
      // Check also, that the property exists for this object
      // Create a InvalidParameterException if doesn't exist
      $property = $this->_getPropertyFromURI(
        $statement->getPredicate()->getURI(),
        $classname
      );

      // $sob is the statement object which needs to be manipulated
      $sob = $statement->getObject();

      switch (get_class($sob)) {
        case 'Literal':
          $this->_logger->trace('The object is a literal');

          //I trim to avoid to much usage of <![CDATA[ xxx ]]>
          $objProperty = new \Common\LiteralProperty(
              trim($statement->getObject()->getLabel()),
              $sob->getLanguage(), $sob->getDatatype());
          break;
        case 'Resource':
          $objProperty = new \Common\Property(
              $statement->getObject()->getURI(),
              COMMON_PROPERTY_TYPE_RESOURCE
          );
          break;
        default:
          throw new \RuntimeException(
            'The type of statement object "' .
            get_class($sob) .
            '" is not implemented');
      }
      $object->addParameter($property, $objProperty);
    } catch (\DomainException $de) {
      $this->_logger->debug(
        $de->getMessage() .
        " [Subject: {$statement->getSubject()->toString()}]");
    } catch (\Exception $e) {
      $this->_logger->error(
        $e->getMessage() .
        " [Subject: {$statement->getSubject()->toString()}]");
    }

    return true;
  }

}

// end of XmlRdfLoader
?>
