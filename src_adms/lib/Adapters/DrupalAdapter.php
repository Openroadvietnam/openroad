<?php

/**
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

define('JOINUP_ADMS_URI', 'http://joinup.ec.europa.eu/asset/all');
define('JOINUP_ADMS_DATETIME_TYPE', 'http://www.w3.org/2001/XMLSchema#dateTime');
//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-736
//Add date format type
define('JOINUP_ADMS_DATE_TYPE', 'http://www.w3.org/2001/XMLSchema#date');

/**
 * This class is aimed to export Data from the library into a well structured 
 * implementation of ADMS into Drupal (see Joinup)
 * class DrupalAdapter
 */
class DrupalAdapter implements IExporter, ILoader {

  private $_classes = array(
    'ADMS\SemanticAssetDistribution' => 'distribution',
    'ADMS\SemanticAssetRepository' => 'repository',
    'ADMS\SemanticAsset' => 'asset_release',
    'ADMS\Item' => 'item',
    'ADMS\Documentation' => 'documentation',
    'ADMS\ContactInformation' => 'contact_point',
    'RADion\Agent' => 'publisher',
    'RADion\Licence' => 'licence'
  );
  private $_taxo_repository = array(
    'spatialCoverage' => 'geographic_coverage_vid',
    'themeTaxonomy' => 'domains_vid',
    'theme' => 'domains_vid'
  );
  private $_taxo_asset = array(
    'spatialCoverage' => 'geographic_coverage_vid',
    'interoperabilityLevel' => 'interoperability_level_vid',
    'status' => 'status_vid',
    'theme' => 'domains_vid',
    'type' => 'asset_type_vid'
  );
  private $_taxo_distribution = array(
    'format' => 'file_format_vid',
    'representationTechnique' => 'representation_technique_vid',
    'status' => 'status_vid'
  );
  private $_taxo_publisher = array(
    'type' => 'publisher_type_vid'
  );
  private $_taxo_licence = array(
    'type' => 'licence_type_vid'
  );
  private $_taxo_class = array(
    'spatialCoverage' => 'RADion\GeographicCoverage',
    'interoperabilityLevel' => 'ADMS\InteroperabilityLevel',
    'assetType' => 'ADMS\AssetType',
    'status' => 'ADMS\Status',
    'representationTechnique' => 'ADMS\RepresentationTechnique',
    'fileFormat' => 'RADion\FileFormat',
    'language' => 'RADion\Language'
  );
  private $_flexi_documentation = array(
    'title' => 'textfield'
  );
  private $_flexi_item = array(
    'description' => 'textarea'
  );
  private $_flexi_publisher = array(
    'name' => 'textfield'
  );
  private $_flexi_distribution = array(
    'name' => 'textfield',
    'description' => 'textarea'
  );
  private $_flexi_licence = array(
    'name' => 'textfield',
    'description' => 'textarea'
  );
  private $_flexi_asset = array(
    'version_note' => 'textarea',
    'version' => 'textfield',
    'alternative_name' => 'textfield',
    'name' => 'textfield',
    'description' => 'textarea'
  );
  private $_flexi_repository = array(
    'schema' => 'textfield',
    'name' => 'textfield',
    'description' => 'textarea'
  );
  private $_field_contenttype_repository = array(
    'publisher' => 'publisher'
  );
  private $_field_contenttype_asset = array(
    'publisher' => 'publisher',
    'contactPoint' => 'contact_point',
    'distribution' => 'distribution',
    'includedItem' => 'item',
    'relatedDocumentation' => 'related_doc',
    'relatedWebPage' => 'webpage_doc',
    'homepage' => 'homepage_doc',
    'documentation' => 'documentation',
  );
  private $_field_contenttype_distribution = array(
    'publisher' => 'publisher',
    'license' => 'licence'
  );
  private $_asset_nodereference = array(
    'previousVersion' => '2',
    'currentVersion' => '1',
    'nextVersion' => '0',
    'sample' => '6',
    'includedAsset' => '4',
    'translation' => '3',
    'relation' => '5'
  );

  // Array to store asset references to other assets for which the nid is still not known.
  // The references will be saved after the file has been treated
  private $field_asset_node_reference__unsaved = array();

  //data to treat
  private $data;
//data for search
  private $data_copy;
//nid of the current repository
  private $repository_nid;
//uri of the current repository
  private $repository_uri;
//id of the user
  private $user_id;
//if check or save file
  private $treatment_type;
//asset in treatment
  private $inTreatment_asset;
//counter for the PeriodeOfTime uri
  private $uri_pot = 1;

  // instance of helper class to convert html into somewhat formatted plaintext (markdown)
  private $_markdowner;

//list of available languages (assoc array key=>name)
  private $languages;

  public function __construct() {
    $this->_logger = \Logger::getLogger(__CLASS__);
    // Set up of the drupal regarding the current configuration
    // Check that the variable is correctly configured
    if (!defined('DRUPAL_DIR')) {
      throw new \Exception('Drupal instance (DRUPAL_DIR) not configured');
    }

    // Check that the path exists
    if (!is_dir(DRUPAL_DIR)) {
      throw new \Exception('Drupal instance directory (DRUPAL_DIR) incorrect');
    }

    //required by Drupal
    chdir(DRUPAL_DIR);

//load of the configuration file

    if (include_once( './includes/bootstrap.inc')) {


      global $_SERVER;
      $_SERVER['REMOTE_ADDR'] = 'localhost';
//to avoid error messages without border effect
      $_SERVER['REQUEST_METHOD'] = 'inline';
      drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL );
    }
  }

  /**
   * This function needs to be implemented in order to export the data
   * in drupal
   * @param adms:AdmsObject[] data the data (AdmsObject table) which should be exported
   * 
   * @throws Exception 
   * @return boolean
   * @access public
   */
  public function export($data, &$output, $type = 1) {

    //define the repository properties
    $this->repository_nid = $output['repository_id'];
    $repository = node_load($this->repository_nid);
    $this->user_id = $output['user_id'];
    $this->repository_uri = $repository->field_id_uri[0]['value'];
    //copy $data for recursive function
    $this->data = $data;
    $this->data_copy = $data;

    $this->treatment_type = $type;
    
    $this->languages = locale_language_list();

    //for each uri from $data
    foreach ($this->data as $key => $item) {

      //for each element in the array
      foreach ($item as $obj) {
        $this->inTreatment_asset = array();
        //check if the object has already be saved
        if ($obj->tStatus[0] != 'saved') {
          //treatment of the object
          $class_obj = get_class($obj);
          if (array_key_exists($class_obj, $this->_classes)) {
            //the object is a drupal node
            $obj_nid = $this->_verif_node($obj);
          }
        }
      }//end of $item loop
    }//end of $data loop

    // treatment of the unsaved asset node references to assets:
    // save now the node references from asset to asset
    // because some of the nid might not be known
    $this->_save_unsaved_asset_node_references();

    return 'End of the drupal import';
  }

//end of export function

  /**
   * Check whether the given lang code is not empty and exists in the list of allowed languages
   * @$lang language code
   * @access private
   * return bool
   */
  private function is_unknown_lang($lang) {
    return $lang && !isset($this->languages[$lang]);
  }

  /**
   * This method create the drupal node from the data received
   * and check if it's correct
   * @$item $object to convert into drupal node
   * @access private
   */
  private function _verif_node(&$item) {
    $item_class = get_class($item);
    $uri = trim($item->id, ISA_URI_TRIM_CHARS);
    
    // Get the user who will save the nodes
    global $user;
    if (!isset($user) || $user->uid != $this->user_id) {
      $user = user_load($this->user_id);
    }

    // Specific treatment for a period of time which is not a content type 
    // but a CCK
    // put it in an array for the asset node configuration
    if ($item_class == 'ADMS\PeriodOfTime') {
      if (!empty($item->id)) {
        $periodeOfTime = new \ADMS\PeriodOfTime();
        $date = new \DateTime($item->start[0]->value);
        $periodeOfTime->start = $date->format('U');
        $date = new \DateTime($item->end[0]->value);
        $periodeOfTime->end = $date->format('U');
        $tab_temporalecoverage[$item->id] = $periodeOfTime;
        return true;
      }
      return true;
    }

//check if uri is conform
    if (!$this->_verifURI($uri)) {
      $message = "The URI '{$uri}' is not correct. This {$item_class} will be ignored.";
      $this->_logger->info($message);
//put the status of the item to error
      $item->tStatus = 'error';
      $item->error_message = $message;
      return false;
    }

//first check
    switch ($item_class) {
      case 'ADMS\SemanticAssetRepository':
        $this->_logger->debug("Current URI '{$uri}', Repository URI '{$this->repository_uri}'");
        //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-736
        //Trim repository url to do the comparison
        if ($uri != trim($this->repository_uri, ISA_URI_TRIM_CHARS)) {
          $this->_logger->warn(
            "The repository with URI '{$uri}' has been ignored. 
              Only the repository with URI '{$this->repository_uri}' is treated.");
          return false;
        }
        break;

      case 'ADMS\SemanticAsset':
        $this->_logger->debug($item->repositoryOrigin[0]->value . " > " . $this->repository_uri);
        //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-736
        //Trim repository url to do the comparison
        if (trim($item->repositoryOrigin[0]->value, ISA_URI_TRIM_CHARS)!= trim($this->repository_uri, ISA_URI_TRIM_CHARS)) {
          $this->_logger->warn(
            "The asset with URI '{$uri}' is not included in the current repository. It is ignored");
          return false;
        }
        //save uri of asset to prevent risk of loop
        $this->inTreatment_asset[$uri] = 1;
        break;
    }

    //I treat the node
    $this->_logger->info("Treatment of the object {$item_class} with URI '{$uri}'.");

    //check if the node exist in drupal
    $node_nid = isa_toolbox_get_node_id_by_uri($uri, $this->_classes[$item_class]);
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-736
    //Check if there is a previously created node with a non trimmed url
    if(false == $node_nid){
      $node_nid = isa_toolbox_get_node_id_by_uri($item->id, $this->_classes[$item_class]);
    }
    if (is_numeric($node_nid)) {
      //check if node is blacklisted
      if ($this->_check_blacklist($node_nid)) {
        $item->tStatus = 'error';
        $message = "This asset release with URI '{$uri}' is blacklisted.";
        $item->error_message = $message;
        $this->_logger->warn($message);
        return false;
      }

      //load existing node
      $node = node_load($node_nid);
      $existing_node = clone $node;

      //inititialisation of the node
      $this->_Initialize_node($node);
    } else {
      //create a new node
      $node = new \stdClass();
      $node->type = $this->_classes[$item_class];
      $node->uid = $this->user_id;
    }


    //to allow revision
    //$node->revision_moderation=true;
    //$node->is_pending=true;
    if (isset($node->nid)) {
      $node->revision = 1;

      //check the state of the revision (draft or published)
      $node->revision_moderation = FALSE;
      // JIRA ISAICP-707, remove moderation on the revision
      //$node->revision_moderation = $this->_check_revision_state($node);
    }

    //for asset_release/asset matching
    //change type and assign og_group
    //allow commenting asset_release
    if ($node->type == 'asset_release') {
      $type_node = 'asset';
      $node->og_groups[$this->repository_nid] = $this->repository_nid;
      $node->comment = COMMENT_NODE_READ_WRITE;
    } else {
      $type_node = $node->type;
    }

    // Set the uri
    $node->field_id_uri = array(array('value' => $uri));

    // Set the language
    if (isset($item->language)) {
      $code_lang = isa_toolbox_get_lang_code_byuri($item->language);
      $node->language = $code_lang ? $code_lang : 'en';
    } else {
      $node->language = "en";
    }

    //treatement of description
    $tabDescription = array();
    $namefield = "field_{$type_node}_description";
    foreach ($item->description as $key => $description) {
      if ($description->additionalParameter['language'] == "en") {
        // only set if not already set (revision of BVR5: keep only the first match)
        if (empty($node->body)) {
          $node->body = $description->value;
        } else {
          $this->_logger->warn("Ignoring (english) description '{$description->value}' of the {$type_node} with URI '{$uri}'" .
            ": it is already set.");
        }
      } else {
        //JIRA 669 , application of BVR4
        //all text must have an language
        if ($description->additionalParameter['language'] != '' && !$this->is_unknown_lang($description->additionalParameter['language'])) {
          $tabDescription[] = array(
            'type' => 'language_textarea',
            'value' => array(
              'field_language_textfield_lang' => array(array('value' => $description->additionalParameter['language'])),
              'field_language_textarea_name' => array(array('value' => $description->value)))
          );
        } else {
          // do not warn here: if needed will be done later when trating the flexifields
          /*$this->_logger->warn(
            "The language is not set for the description of the {$type_node} with URI '{$uri}'.");*/
        }
      }
    }
    $node->namefield = $tabDescription;
    unset($tabDescription);

    // Check if node is correct
    if ($type_node == 'repository' || $type_node == 'asset') {
      if (empty($node->body)) {
        // Put the status of the item to error
        $item->tStatus = 'error';
        $message = "The English description for the {$type_node} with URI '{$uri}' is missing. " .
          "This element is ignored.";
        $item->error_message = $message;
        $this->_logger->warn($message);
        return false;
      }
      //end of description treatment
    }

    // Treatment of title
    if ($type_node != 'contact_point') {
      $namefield = $type_node != 'item' ? "field_{$type_node}_name" : "field_{$type_node}_label";
      $tabName = array();
      $tabName_lang = array();
      $name_field = $type_node == "documentation" ? $item->title : $item->name;
      foreach ($name_field as $key => $nameValue) {
        //test if language in english for title
        //modif to match with BVR4
        if (($nameValue->additionalParameter['language'] == 'en')) {
          // only set if not already set (revision of BVR5: keep only the first match)
          if (empty($node->title)) {
            $node->title = $nameValue->value;
          } else {
            $this->_logger->warn("Ignoring (english) title '{$nameValue->value}' of the {$type_node} with URI '{$uri}'" .
              ": it is already set.");
          }
        } else {
          if (empty($nameValue->additionalParameter['language'])) {
            $nameValue->additionalParameter['language'] = 'en';
            $this->_logger->warn("The name '{$nameValue->value}' of the {$type_node} with URI '{$uri}' " .
              "doesn't have any language attribute. It is set automatically to English.");
          } else if ($this->is_unknown_lang($nameValue->additionalParameter['language'])) {
            // force english lang (revision of BVR4: assume english when missing or unknown lang)
            $__lang = $nameValue->additionalParameter['language'];
            $nameValue->additionalParameter['language'] = 'en';
            $this->_logger->warn("The name '{$nameValue->value}' of the {$type_node} with URI '{$uri}' " .
              "doesn't have an allowed language attribute ('$__lang'). It is set automatically to English.");
          }
          if (!empty($nameValue->additionalParameter['language'])) {
            if (($nameValue->additionalParameter['language'] == 'en')) {
              // only set if not already set (revision of BVR5: keep only the first match)
              if (empty($node->title)) {
                $node->title = $nameValue->value;
              } else {
                $this->_logger->warn("Ignoring (english) title '{$nameValue->value}' of the {$type_node} with URI '{$uri}'" .
                  ": it is already set.");
              }
            }
            // only set in this lang if not already set (revision of BVR5: keep only the first match)
            if (!$tabName_lang[$nameValue->additionalParameter['language']]) {
              $tabName_lang[$nameValue->additionalParameter['language']] = true;
              $tabName[] = array(
                'type' => 'language_textfield',
                'value' => array(
                  'field_language_textfield_lang' => array(array('value' => $nameValue->additionalParameter['language'])),
                  'field_language_textfield_name' => array(array('value' => $nameValue->value)))
              );
            }

            if (isset($existing_node)) {
              if (!isset($item_number)) {
                $item_number=0;
              }
              unset($existing_node->{$namefield}[$item_number]['item_id']);
              $item_number++;
            }
          } else {
            $this->_logger->warn("The name '{$nameValue->value}' for the {$type_node} with URI '{$uri}' " .
              "doesn't have any language attribute. This property is ignored.");
          }
        }
      }
      $node->$namefield = $tabName;
      unset($tabName);
      unset($tabName_lang);
      unset($item_number);
    }

    // Check if node correct
    // the name is mandatory for all the contenttype
    // (excluded item types: contact_point, identifier)
    if ($type_node != 'contact_point' && $type_node != 'identifier') {
      if (empty($node->title)) {
        //put the status of the item to error
        $item->tStatus = 'error';
        $message = "The English name for the {$type_node} with URI '{$uri}' is missing. " .
          "This element is ignored.";
        $item->error_message = $message;
        $this->_logger->warn($message);
        return false;
      }
    }//end of name treatment
    /////////////////////////////////
    //treatement accesURL
    /////////////////////////////////

    $namefield = "field_{$type_node}_url";
    if ($type_node == 'distribution' || $type_node == 'documentation') {
      $namefield = 'field_'.$type_node.'_access_url1';
    }
    if ('documentation'==$type_node) {
      $tab_accessurl[] = array('url' => $item->id, 'title' => NULL, 'attributes' => array());
    } else {
      foreach ($item->accessURL as $url) {
        $tab_accessurl[] = array('url' => $url->value, 'title' => NULL, 'attributes' => array());
      }
    }
    $node->$namefield = $tab_accessurl;

// Check if node correct
    if ($type_node == 'distribution' || $type_node == 'repository') {
      if (!count($tab_accessurl)) {
//put the status of the item to error
        $item->tStatus = 'error';
        $message = "The accessURL for the {$type_node} with URI '{$uri}' is missing. " .
          "This element is ignored.";
        $item->error_message = $message;
        $this->_logger->warn($message);
        return false;
      }
    }

//end of accessURL treatment
    unset($tab_accessurl);

//treatement of taxonomy
    $name_taxo = '_taxo_' . $type_node;
    $term_array = array();
    $term_counter = array();
    foreach ($this->$name_taxo as $name_prop => $drupal_taxo) {
      foreach ($item->$name_prop as $code => $taxovalue) {
//check the id of the taxonomy
        $taxo_vid = variable_get($drupal_taxo);
//check if the term exist in this taxonomy
        $tid = isa_toolbox_get_tid_byuri($taxovalue->value, $taxo_vid);
        if (is_numeric($tid)) {
//the uri exists in drupal for this taxonomy
          if ( ( ('asset'==$type_node && ('status'==$name_prop || 'interoperabilityLevel'==$name_prop)) ||
                 ('distribution'==$type_node && ('status'==$name_prop || 'format'==$name_prop))
               ) && $term_counter[$taxo_vid]) {
            // if more than one asset status, do not set and warn (revision of BVR15: Every Semantic Asset in the federation must have exactly 1 Status)
            // if more than one asset interop.level, do not set and warn (revision of BVR18: In case of duplicates, take the first match)
            // if more than one distribution status, do not set and warn (revision of BVR23: Every Semantic Asset Distribution in the federation must have a single Status)
            // if more than one distribution file-format, do not set and warn (revision of BVR24: Every Semantic Asset Distribution in the federation must have a single File format)
            $this->_logger->warn("Ignoring $name_prop '{$taxovalue->value}' of the {$type_node} with URI '{$uri}'" .
              ": it is already set and only one value is allowed at most.");
          } else {
            $term_array[$tid] = taxonomy_get_term($tid);
            $term_counter[$taxo_vid]++;
          }
        } else {
            // warn on unknown terms
            $this->_logger->warn("Unknown $name_prop '{$taxovalue->value}' of the {$type_node} with URI '{$uri}'");
        }
      }
    }

//treatement of fileformat for distribution
    if ($type_node == "distribution") {
      $taxo_vid = variable_get('file_format_vid');
      // if one or more distribution file-format, do not set any more (revision of BVR24: Every Semantic Asset Distribution in the federation must have a single File format)
      if (!$term_counter[$taxo_vid]) {
        foreach ($item->format as $key => $value) {
  //check if the term exist in this taxonomy
          $tid = isa_toolbox_get_tid_byuri($value->additionalParameter['datatype'], $taxo_vid);
          if (is_numeric($tid)) {
  //the uri exists in drupal for this taxonomy
            $term_array[$tid] = taxonomy_get_term($tid);
          }
        }
      }
    }
//treatment of keywords
    foreach ($item->keyword as $keywordProperty) {
      $keyword[] = $keywordProperty->value;
    }
    if (count($keyword) > 0) {
      asort($keyword);
      $term_array['tags'][variable_get('keywords_vid')] = implode(',', $keyword);
    }

// End of treatment for the taxonomy and the keywords
// check if node correct
    switch ($node->type) {
      case 'asset_release':
//check the asset type
        if (!$this->_verif_taxo($item, $term_array, 'asset_type_vid', 'type', 'asset')) {
          // if type not set, just warn (revision of BVR13: if missing do not set the property, but raise a warning)
          //return false;
        }
//check the asset status
        if (!$this->_verif_taxo($item, $term_array, 'status_vid', 'status', 'asset')) {
          // if status not set, just warn (revision of BVR15: if missing do not set the property, but raise a warning)
          //return false;
        }
        break;

      case 'distribution':
//check the distribution status
        if (!$this->_verif_taxo($item, $term_array, 'status_vid', 'status', 'distribution')) {
          // if status not set, just warn (revision of BVR23: if missing do not set the property, but raise a warning)
          //return false;
        }
//check the distribution file format
        if (!$this->_verif_taxo($item, $term_array, 'file_format_vid', 'file_format', 'distribution')) {
          // if file-format not set, just warn (revision of BVR24: if missing do not set the property, but raise a warning)
          //return false;
        }
        break;

      case 'licence':
// The licence type is not mandatory because we don't have the uri 
// just display a warning when created
        $vid = variable_get('licence_type_vid');
        $have_type = false;
        foreach ($term_array as $key => $term) {
          if ($term->vid == $vid) {
            $have_type = true;
            break;
          }
        }
        if (!$have_type) {
          $message = "The type for the Licence with the URI '{$uri}' is missing.";
          $this->_logger->warn($message);
        }
        break;
    }

    if (count($term_array) > 0) {
      ksort($term_array);
      $node->taxonomy = $term_array;
    }
//end of taxonomy treatment
    unset($term_array);

//treatement of flexifield textfield and textarea
    $name_flexi = '_flexi_' . $type_node;
    $name_flexi_lang = 'field_language_' . $drupal_flexi . '_lang';
    $tabFlexi = array();
    $tabFlexi_lang = array();
    foreach ($this->$name_flexi as $name_prop => $drupal_flexi) {
      $namefield = "field_{$type_node}_{$name_prop}";
      if ($name_prop == "version_note") {
        $name_prop = "versionNotes";
        // the name of the lang field for this type is based on "textfield"
        $name_flexi_lang = 'field_language_textfield_lang';
      } elseif ($name_prop == "alternative_name") {
        $name_prop = "alternativeName";
      } elseif ($name_prop == "schema") {
        $name_prop = "supportedSchema";
        // the name of the lang field for this type is based on "textfield"
        $name_flexi_lang = 'field_language_textfield_lang';
      } elseif ($name_prop == "name" || $name_prop == "description" || $name_prop == "title") {
        // for:
        //      distribution name and description
        //      asset name and description
        //      repository name and description
        //      licence name and description
        //      publisher name
        //      item description
        //      documentation title
        // the name and/or description of the lang field for this type is based on "textfield"
        $name_flexi_lang = 'field_language_textfield_lang';
      }

      foreach ($item->$name_prop as $key => $flexi) {
        $lang = $flexi->additionalParameter['language'];
        // for distribution, asset, repository, licence, publisher, item, documentation: avoid saving duplicated english name, description or title
        if (('distribution'==$type_node || 'asset'==$type_node || 'repository'==$type_node || 'licence'==$type_node || 'publisher'==$type_node || 'item'==$type_node || 'documentation'==$type_node) &&
            ('name'==$name_prop || 'description'==$name_prop || 'title'==$name_prop) &&
            ('en'==$lang || empty($lang) || $this->is_unknown_lang($lang))) {
          if ('en'==$lang) {
            // do not warn here: with the english language the property is not being duplicated
            /*$this->_logger->warn("Ignoring (english) {$name_prop} '{$flexi->value}' of the {$type_node} ({$uri})" .
              ": it is already set.");*/
          } else if (empty($lang)) {
            $this->_logger->warn("Ignoring {$name_prop} '{$flexi->value}' of the {$type_node} ({$uri})" .
              ": it doesn't have the mandatory language attribute, and the (english) {$name_prop} is already set.");
          } else {
            $this->_logger->warn("Ignoring {$name_prop} '{$flexi->value}' of the {$type_node} ({$uri})" .
              ": it doesn't have an allowed language attribute, and the (english) {$name_prop} is already set.");
          }
          continue;
        }
        if (empty($lang)) {
          $this->_logger->warn("The {$name_prop} '{$flexi->value}' of the {$type_node} ({$uri}) " .
            "doesn't have the mandatory language attribute. It is set automatically to English.");
          $lang = 'en';
        } else if ($this->is_unknown_lang($lang)) {
          // force english lang (revision of BVR4: assume english when missing or unknown lang)
          $this->_logger->warn("The {$name_prop} '{$flexi->value}' of the {$type_node} ({$uri}) " .
            "doesn't have an allowed language attribute ('$lang'). It is set automatically to English.");
          $lang = 'en';
        }

        // only set in this lang if not already set (revision of BVR5: keep only the first match)
        if (!$tabFlexi_lang[$lang]) {
          // version and versionNotes in asset_release: only one value (in any language) allowed
          // (revision of BVR12: in case of duplicates, take the first match)
          if ('asset'==$type_node && ('version'==$name_prop || 'versionNotes'==$name_prop) && count($tabFlexi_lang)) {
            $this->_logger->warn("Ignoring $name_prop '{$flexi->value}' of the {$type_node} with URI '{$uri}'" .
              " for language '$lang': it is already set and only one value is allowed at most.");
          } else {
            $tabFlexi_lang[$lang] = true;
            $tabFlexi[] = array(
              'type' => 'language_' . $drupal_flexi,
              'value' => array(
                $name_flexi_lang => array(array('value' => $lang)),
                'field_language_' . $drupal_flexi . '_name' => array(array('value' => $flexi->value)))
            );
          }
        } else {
          $this->_logger->warn("Ignoring $name_prop '{$flexi->value}' of the {$type_node} with URI '{$uri}'" .
            " for language '$lang': it is already set for this language.");
        }

        if (isset($existing_node)) {
          if (!isset($item_number)) {
              $item_number=0;
          }
          unset($existing_node->{$namefield}[$item_number]['item_id']);
          $item_number++;
        }
      }

      $node->$namefield = $tabFlexi;
      unset($tabFlexi);
      unset($tabFlexi_lang);
      unset($item_number);
//end of flexifield treatment
    }

//treatement of field_contenttype
    $tab_content_type = array();
    $content_type_counter = array();
    $namefield = '';
    $name_field_contenttype = "_field_contenttype_" . $type_node;
    foreach ($this->$name_field_contenttype as $name_prop => $content_type) {

      $namefield = 'field_' . $type_node . '_' . $content_type;
      foreach ($item->$name_prop as $code => $content_type_value) {

        switch ($content_type) {
          case 'related_doc':
          case 'webpage_doc':
          case 'homepage_doc':
            $obj_nid = $this->_check_node($content_type_value->value, 'documentation');
            break;
          default:
            $obj_nid = $this->_check_node($content_type_value->value, $content_type);
            break;
        }

        //I fill the property
        if (is_numeric($obj_nid)) {

          //JIRA 679
          //check if the distribution is already use by another asset release
          if ($node->type == 'asset_release' && $content_type == 'distribution') {
            if ($node->nid != '') {
              //the asset release is in created mode
              $query = 'SELECT count(distinct(nid)) as nbr FROM content_field_asset_distribution 
                WHERE field_asset_distribution_nid = %d AND nid <> %d';
              $results = db_query($query, $name['nid'], $node->nid);
            } else {
              $query = 'SELECT count(distinct(nid)) as nbr FROM content_field_asset_distribution 
                WHERE field_asset_distribution_nid=%d';
              $results = db_query($query, $name['nid']);
            }
            $result = db_fetch_array($results);
//verify if distribution already be affected
            if ($result['nbr'] > 0) {
//the distribution is already use by another asset release
              $distribution = node_load($obj_nid);
              $this->_logger->warn(
                "The distribution '{$distribution->title}' already belong to another asset release.");
            } else {
              $tab_content_type[] = array('nid' => $obj_nid);
            }
          } else if ($node->type == 'distribution' && $content_type == 'licence' && $content_type_counter[$content_type]) {
            // if more than one distribution licence, do not set and warn (revision of BVR22: in case of duplicates take the first match)
            $this->_logger->warn("Ignoring $content_type with URI '{$content_type_value->value}' of the {$type_node} with URI '{$uri}'" .
              ": it is already set and only one value is allowed at most.");
          } else {
            $tab_content_type[] = array('nid' => $obj_nid);
            $content_type_counter[$content_type]++;
          }
        }
      }
      $node->$namefield = $tab_content_type;

      unset($tab_content_type);
      unset($content_type_counter);
//end of field_contenttype treatment
    }

//check if node is correct
    if ($node->type == 'distribution') {
      if (!isset($node->field_distribution_licence)) {
//put the status of the item to error
        $item->tStatus = 'error';
        $message = "The licence is missing for the distribution with URI '{$uri}'";
        $item->error_message = $message;
        $this->_logger->warn($message);
        // if type not set, just warn (revision of BVR22: if missing do not set the property, but raise a warning)
        //return false;
      }
    }

//treatment of creationDate and modificationDate
    $node->modif_date = false;
    if (isset($item->dateModified[0]->value)) {
      $format = $this->_getDateFormat($item->dateModified[0]);
      $date_check = \DateTime::createFromFormat($format, $item->dateModified[0]->value);
      if (!$date_check) {
        $this->_logger->warn("The format for the modification date '" .
          "{$item->dateModified[0]->value}' doesn't correspond to its value");
      }
      // even if the format does not match the value, try to parse the value
      $date = null;
      try {
        $date = new \DateTime($item->dateModified[0]->value);
      } catch (\Exception $e) {
        $this->_logger->error($e->getMessage());
      }
      if ($date) {
        $node->modif_date = true;
        $node->field_asset_last_modification[0]['value'] = $date->format('Y-m-d\TH:i:s');
      }
    }

    if (isset($item->dateCreated[0]->value)) {
      $format = $this->_getDateFormat($item->dateCreated[0]);
      $date_check = \DateTime::createFromFormat($format, $item->dateCreated[0]->value);
      if (!$date_check) {
        $this->_logger->warn("The format for the creation date '" .
          "{$item->dateCreated[0]->value}' doesn't correspond to its value");
      }
      // even if the format does not match the value, try to parse the value
      $date = null;
      try {
        $date = new \DateTime($item->dateCreated[0]->value);
      } catch (\Exception $e) {
        $this->_logger->error($e->getMessage());
      }
      if ($date) {
        $node->created = $date->format('U');
      }
    }

    //business rule BVR10,BVR23,BVR31
    //control of the creation date and modification date
    if ($node->type == 'repository' || $node->type == 'asset_release' ||
      $node->type == 'distribution') {
      //creation date
      if (!isset($node->created)) {
        $date = new \DateTime();
        $node->created = $date->format('U');
        $this->_logger->warn("The {$node->type} with the URI '{$node->field_id_uri[0]['value']}' 
          doesn't have a creation date. Is is automatically replaced by the current date");
      }

      //modification date
      if (!isset($node->field_asset_last_modification[0]['value'])) {
        $date = new \DateTime();
        $node->field_asset_last_modification[0]['value'] = $date->format('U');
        $this->_logger->warn("The {$node->type} with the URI '{$node->field_id_uri[0]['value']}' 
          doesn't have a last modification date. Is is automatically replaced by the current date");
      }
    }

    // Specific to asset
    if ($node->type == "asset_release") {
      // treatment for identifier
      $node->field_asset_identifier = array();
      foreach ($item->identifier as $identifier) {
        if (!is_null($identifier->value) && $this->data[$identifier->value] && $this->data[$identifier->value][0]) {
          // copy the identifier object attribute values to the asset release identifier fields
          $_identifier_obj = $this->data[$identifier->value][0];
          $node->field_asset_identifier[] = array(
            'type' => 'identifier',
            'value' => array(
              'field_identifier_content' => array(array('value' => $_identifier_obj->code[0]->value)),
              'field_identifier_scheme' => array(array('value' => $_identifier_obj->type[0]->value)),
              'field_identifier_scheme_version' => array(array('value' => $_identifier_obj->schemeVersion[0]->value)),
              'field_identifier_scheme_agency' => array(array('value' => $_identifier_obj->schemeAgency[0]->value)),
            )
          );
          if (isset($existing_node)) {
              if (!isset($item_number)) {
                  $item_number=0;
              }
              unset($existing_node->field_asset_identifier[$item_number]['item_id']);
              $item_number++;
          }
        }
        //end of identifier treatment
      }
      unset($item_number);

      // Treatment of temporalecoverage
      $node->field_asset_temporal_coverage = array(); // forget previous temporal coverage
      foreach ($item->temporalCoverage as $key => $data) {
        if (array_key_exists($data->value, $this->data) && $this->data[$data->value][0] && 'ADMS\PeriodOfTime'==get_class($this->data[$data->value][0])) {
          // add this temporal coverage
          $_tc = $this->data[$data->value][0];
          $_tc_date_start = new \DateTime($_tc->start[0]->value);
          $_tc_date_end   = new \DateTime($_tc->end[0]->value);
          $node->field_asset_temporal_coverage[] = array(
            'value' => $_tc_date_start->format('Y-m-d\T'.'00:00:00'),
            'value2' => $_tc_date_end->format('Y-m-d\T'.'00:00:00'),
            'timezone'    => date_default_timezone_name(),
            'timezone_db' => date_default_timezone_name(),
            'date_type'   => 'date'
          );
        } else {
          $this->_logger->warn(
            "The temporale coverage for this asset({$item->id}) has not been found.");
        }
      }

      // Treatment of asset node reference for asset_release
      $this->_add_unsaved_asset_node_reference($uri, null, 0);  // this will force the revision of the asset references to other assets at the end of the import
      foreach ($this->_asset_nodereference as $key_reference => $type) {
        //for each type of asset reference
        foreach ($item->$key_reference as $node_reference => $node_value) {
          $__uri = trim($node_value->value, ISA_URI_TRIM_CHARS);
          // For each property of the item
          // I check if the contentype waiting to be created and no already created
          if (!array_key_exists($__uri, $this->inTreatment_asset)) {
            // I check if the contenttype exists
            // if not exists in drupal
            // I check in the data_copy if the node exist and can create it
            $obj_nid = $this->_check_node($__uri, 'asset_release', false);  // do not try to save the node if it does not exist

            //I fill the property
            if (is_numeric($obj_nid)) {

              // the relationship will be saved after all nodes have been saved (updating the affected nodes)
              $this->_add_unsaved_asset_node_reference($uri, $__uri, $type);
              $field_asset_node_reference[] = array(
                'type' => 'asset_node_reference',
                'value' => array(
                  'field_asset_node_reference_node' => array(array('nid' => $obj_nid)),
                  'field_asset_node_relationship' => array(array('value' => $type))
                )
              );
            } else {
              // the asset references itself or other asset still not saved:
              // the relationship will be saved after all nodes have been saved (updating the affected nodes)
              $this->_add_unsaved_asset_node_reference($uri, $__uri, $type);
            }
          } else {
            $obj_nid = $this->_check_node($__uri, 'asset_release', false);  // do not try to save the node if it does not exist
            if (is_numeric($obj_nid)) {
              // the relationship will be saved after all nodes have been saved (updating the affected nodes)
              $this->_add_unsaved_asset_node_reference($uri, $__uri, $type);

              $field_asset_node_reference[] = array(
                'type' => 'asset_node_reference',
                'value' => array(
                  'field_asset_node_reference_node' => array(array('nid' => $obj_nid)),
                  'field_asset_node_relationship' => array(array('value' => $type))
                )
              );
            } else {
              // the asset references itself or other asset still not saved:
              // the relationship will be saved after all nodes have been saved (updating the affected nodes)
              $this->_add_unsaved_asset_node_reference($uri, $__uri, $type);
            }
          }
        }
        $node->field_asset_node_reference = $field_asset_node_reference;
        //end of treatment for asset node reference
      }

      // Clear item_id for next comparing purpose
      $this->_clean_asset_node_reference($existing_node->field_asset_node_reference);
      // Treatment of metadataDate
      foreach ($item->metadataDate as $key => $metadatadate) {
        if (isset($metadatadate->value)) {
          $format = $this->_getDateFormat($metadatadate);
          $date_check = \DateTime::createFromFormat($format, $metadatadate->value);
          if (!$date_check) {
            $this->_logger->warn(
              "The format for the metadata date '{$metadatadate->value}' doesn't correspond to its value");
          }
          // even if the format does not match the value, try to parse the value
          $date = null;
          try {
            $date = new \DateTime($metadatadate->value);
          } catch (\Exception $e) {
            $this->_logger->error($e->getMessage());
          }
          if ($date) {
            // The metadata date is stored in Drupal in the ISO 8601
            $tab_metadataDate[] = array(
                'value' => $date->format('Y-m-d\T'.'00:00:00'),
                'timezone'    => date_default_timezone_name(),
                'timezone_db' => date_default_timezone_name(),
                'date_type'   => 'date'
            );
          }
        }
      }
      $node->field_asset_metadata_date = $tab_metadataDate;


      // Treatment of language and matadata language
      $tab_metadata = array(
        'metadataLanguage' => 'field_metadata_language_multiple',
        'language' => 'field_language_multiple',
      );
      foreach ($tab_metadata as $key_value => $data) {
        // Initialise the $tab_lang
        $tab_lang = array();
        foreach ($item->$key_value as $value) {

          $code_lang = isa_toolbox_get_lang_code_byuri($value->value);

          if ($code_lang) {
            if ($key_value == 'language') {
              // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-744
              // assign even if lang equals 'en' (remove previous restriction)
              $tab_lang[] = array('value' => $code_lang);
            } else {
              $tab_lang[] = array('value' => $code_lang);
            }
          }
        }
        $node->$data = $tab_lang;
      }

//treatment of metadataPublisher
      foreach ($item->metadataPublisher as $code => $content_type_value) {

        $obj_nid = $this->_check_node($content_type_value->value, 'publisher');

//I fill the property
        if (is_numeric($obj_nid)) {
          $tab_content_type[] = array('nid' => $obj_nid);
        }
      }
      $node->field_asset_metadata_publisher = $tab_content_type;
      unset($tab_content_type);

//new control for business rules
//BVR15
      if (count($node->field_asset_publisher) < 1) {
//put the status of the item to error
        $item->tStatus = 'error';
        $message = "The {$node->type} with the URI '{$node->field_id_uri[0]['value']}' " .
          "doesn't have a publisher which is mandatory. This element is ignored.";
        $item->error_message = $message;
        $this->_logger->warn($message);
        return false;
      }
    }

// Specific to contact point
    if ($node->type == 'contact_point') {
      // Put the first name in titled
      foreach ($item->name as $key => $data) {
        if (empty($node->title)) {
          $node->title = $data->value;
          $tab_data[] = array('value' => $data->value);
        } else {
          $tab_data[] = array('value' => $data->value);
        }
      }
      // Check if contact_point has at least one name
      if (count($tab_data) < 1) {
        // Put the status of the item to error
        $item->tStatus = 'error';
        $message = "The {$node->type} with the URI '{$uri}' " .
          "doesn't have any name which is mandatory. This element is ignored.";
        $item->error_message = $message;
        $this->_logger->warn($message);
        return false;
      }
      $node->field_contact_point_name = $tab_data;
      unset($tab_data);

      // Telephone, mail
      $tab_contact = array(
        'email' => 'field_contact_point_mail',
        'telephone' => 'field_contact_point_telephone');
      foreach ($tab_contact as $type => $drupal_data) {
        foreach ($item->$type as $key => $data) {
          $tab_data[] = array('value' => $data->value);
        }
        $node->$drupal_data = $tab_data;
        unset($tab_data);
      }

//address
      foreach ($item->fullAddress as $key => $data) {
        $tab_data[] = array(
          'type' => 2,
          'value' => $data->value
        );
      }
      $node->field_contact_point_address = $tab_data;
      unset($tab_data);

//web page
      foreach ($item->homepage as $key => $data) {
        $tab_data[] = array('url' => $data->value,
          'title' => NULL,
          'attributes' => array()
        );
      }
      $node->field_contact_point_web_page = $tab_data;
      unset($tab_data);
    }



//end of fill the node
    try {
      if ($this->treatment_type == 1) {
// Regenerate the teaser
        $node->teaser = node_teaser($node->body);
        $isnew = empty($node->nid);

// Check if the object has been modified since the load to avoid saving and then 
// creating a revision unnecessarily
        if (isset($node->nid) && _isa_toolbox_equal_node($existing_node, $node)) {
          $this->_logger->info(
            "The object {$node->type} with the URI '{$uri}' has not changed, we skip saving it");
        } else {
          node_save($node);
          $this->_logger->info(
            "The object {$node->type} with the URI '{$uri}' has been saved");
        }

        $is_moderator = FALSE;
        $asset_catched = FALSE;
        $moderator_rid = variable_get('moderator_rid', NULL);
        if (!empty($this->repository_nid)) {
          $node_og_group = node_load($this->repository_nid);

          if ($node_og_group->type == ISA_REPOSITORY_TYPE) {
              if ($node_og_group->field_repository_harvestmethod[0]['value'] == REPOSITORY_HARVEST_MODE_AUTOMATIC) {
                $user_uid =  $node_og_group->uid ;
              } else {
                $user_uid = $node->revision_uid != '' ? $node->revision_uid :  $node->uid;
              }

              $node_user = user_load($user_uid);

              $moderator_rid = variable_get('moderator_rid', NULL);
              if ($moderator_rid && isset($node_user->roles[$moderator_rid])) {
                $is_moderator = TRUE;
              }
          }
        }

//set the workflow
        //if ($isnew) {
          switch ($type_node) {
            case 'asset':
              $workflow_state = $is_moderator == TRUE  ?  ISA_SID_ASSET_VALIDATED : ISA_SID_ASSET_PROPOSED;
              break;
            case 'publisher':
            case 'licence':
// The licence and publisher uses the community workflow
              $workflow_state = $is_moderator == TRUE  ?  ISA_SID_COMMUNITY_VALIDATED : ISA_SID_COMMUNITY_PROPOSED;
              break;
            case 'repository':
              $workflow_state = $is_moderator == TRUE  ?  ISA_SID_REPOSITORY_VALIDATED : ISA_SID_REPOSITORY_PROPOSED;
              break;
            default:
// No workflow
              break;
          }
        //}

        if($workflow_state) {
          if($isnew || ($is_moderator && ($workflow_state != $node->_workflow) )) {
            workflow_execute_transition($node, $workflow_state, 'Created by ADMS import', true);
          }
        }
        
//for asset recursive loop
        if (array_key_exists($uri, $this->inTreatment_asset)) {
          unset($this->inTreatment_asset[$uri]);
        }

        return $node->nid;
      } elseif ($this->treatment_type == 2) {
        $this->_logger->info("The object {$item_class} ({$item->id}) is correct");
        return true;
      }
    } catch (\Exception $e) {
      $this->_logger->error($e->getMessage());
      return false;
    }
  }


  /**
   * Add a reference from asset to asset, to be saved after the file has been treated
   * (the node ids of the source and target assets might not be available at the moment if they still have not been saved)
   * @param $uri_from the URI of the asset that holds the reference to other asset (source)
   * @param $uri_to the URI of the asset that is referenced (target)
   * @param $type the type of asset reference (type of relation)
   * @return void
   * @access private
   */
  private function _add_unsaved_asset_node_reference($uri_from, $uri_to, $type) {
    $this->field_asset_node_reference__unsaved[$uri_from][] = array(
      'type' => 'asset_node_reference',
      'value' => array(
        'field_asset_node_reference_node' => $uri_to,
        'field_asset_node_relationship' => array(array('value' => $type))
      )
    );
  }

  /**
   * Removes unwanted attributes in the asset_node_reference structure (namely "item_id"),
   * and optionally dummy/empty references
   * for comparison purposes.
   * @param $ref array of asset_node_reference components
   * @param $clean_empty_refs boolean keep only true references to nodes (remove dummy/empty references)
   * @return void
   * @access private
   */
  private function _clean_asset_node_reference(&$ref, $clean_empty_refs=false) {
    foreach($ref as $k => $v) {
      unset($ref[$k]['item_id']);
      if ($clean_empty_refs) {
        if (!($v && $v['value'] &&
              $v['value']['field_asset_node_reference_node'] &&
              $v['value']['field_asset_node_reference_node'][0] &&
              $v['value']['field_asset_node_reference_node'][0]['nid'])) {
            unset($ref[$k]);
        }
      }
    }
  }

  /**
   * Update assets to store asset to asset references, using known node ids
   * (the node ids of the asset might not be available at parse time if they still had not been saved)
   * @return void
   * @access private
   */
  private function _save_unsaved_asset_node_references() {
    $_asset_nodereference_types = array_flip($this->_asset_nodereference);
    $item_class = 'asset_release';
    if (count($this->field_asset_node_reference__unsaved)) {
      $this->_logger->info("");
      $this->_logger->info("Begin treatment of unsaved 'asset-to-asset' references");
      foreach($this->field_asset_node_reference__unsaved as $uri_from => $refs) {
        array_shift($refs); // discard first (dummy) reference
        $nid_from = $this->_check_node($uri_from, 'asset_release', false);
        if (is_numeric($nid_from)) {
          $node_from = node_load($nid_from);
          $node_from->modif_date = true; // prevents overriding of field_asset_last_modification with current date when saving
          if ($node_from) {
            $existing_node = clone $node_from;  // will compare the updated and existing nodes to decide whether it has to be saved
            // initialize the references
            $node_from->field_asset_node_reference = array();
            $__current_version_count = 0;
            // add the references
            foreach($refs as $ref) {
              $uri_to = $ref['value']['field_asset_node_reference_node'];
              if (!$uri_to) {
                continue;
              }
              $nid_to = $this->_check_node($uri_to, 'asset_release', false);
              if (is_numeric($nid_to)) {
                $_ref_type = $_asset_nodereference_types[$ref['value']['field_asset_node_relationship'][0]['value']];
                if ('currentVersion'==$_ref_type && $__current_version_count>0) {
                  // currentVersion only set if not already set (revision of BVR16: one current version at most; in case of duplicates take the first match)
                  $this->_logger->warn("Ignoring reference '$_ref_type' for the {$item_class} with URI '{$uri_from}' (nid {$nid_from}) to the {$item_class} with URI '{$uri_to}' (nid {$nid_to}): it is already set and only one value is allowed at most");
                } else {
                  $ref['value']['field_asset_node_reference_node'] = array(array('nid' => $nid_to));
                  $node_from->field_asset_node_reference[] = $ref;
                  $this->_logger->info("Adding reference '$_ref_type' for the {$item_class} with URI '{$uri_from}' (nid {$nid_from}) to the {$item_class} with URI '{$uri_to}' (nid {$nid_to})");
                }
                if ('currentVersion'==$_ref_type) {
                  $__current_version_count++;
                }
              } else {
                $this->_logger->warn("Cannot save reference '$_ref_type' for the {$item_class} with URI '{$uri_from}' ({$nid_from}) to the {$item_class} with URI '{$uri_to}': target node not found");
              }
            }
            // Clear item_id and empty references for next comparing purpose
            $this->_clean_asset_node_reference($existing_node->field_asset_node_reference, true);
            // If there is an actual change in the node references, save the node
            if ($existing_node->field_asset_node_reference != $node_from->field_asset_node_reference) {
              node_save($node_from);
              $this->_logger->info("Saved references for the {$item_class} with URI '{$uri_from}' (nid {$nid_from})");
            } else {
              $this->_logger->info("The references for the {$item_class} with URI '{$uri_from}' (nid {$nid_from}) have not changed, we skip saving them");
            }
          } else {
            $this->_logger->warn("Cannot save references for the {$item_class} with URI '{$uri_from}' (nid {$nid_from}): could not load the source node");
          }
        } else {
          $this->_logger->warn("Cannot save references for the {$item_class} with URI '{$uri_from}': source node not found");
        }
      }
      $this->_logger->info("End treatment of unsaved 'asset-to-asset' references");
      $this->_logger->info("");
    }
  }

  /**
   * This method check if a content type is already exisiting in joinup
   * or in the file to treat and create it if possible
   * @param $object the path to the file which should be loaded
   * @return the nid of the new node or false if can't create it
   * @access private
   */
  private function _check_node($uri, $contenttype, $do_verif_node=true) {
//I check if the uri exists in drupal
    if ($contenttype == 'asset') {
      $contenttype = 'asset_release';
    }
//check in drupal if the node exists
    $id_content_type = isa_toolbox_get_node_id_by_uri($uri, $contenttype);
    if (is_numeric($id_content_type)) {
// Check if it's an asset release and if not in blacklist
      if (!$this->_check_blacklist($id_content_type)) {
        return $id_content_type;
      } else {
        $this->_logger->warn("The {$contenttype} with the URI '{$uri}' is blacklisted in Joinup. " .
          "This element is ignored.");
        return false;
      }
    } else {
//if not in drupal , check if exists in the file to import
      if (array_key_exists($uri, $this->data_copy)) {
//I treat the node
//class of the object
        $type = array_search($contenttype, $this->_classes);
        if ($type) {
          foreach ($this->data[$uri] as $obj) {
            if (get_class($obj) == $type) {
//I found the correct object
//test if always try to create it
              $error_prop = $obj->tStatus[0];
              if ($error_prop->value != "error") {
                  if ($do_verif_node) {
                    $obj_nid = $this->_verif_node($obj);
                    return $obj_nid;
                  } else {
                    return false;
                  }
              } else {
                $error_mess = $obj->error_message[0];
                $this->_logger->warn($error_mess->value);
                return false;
              }
            }
          }
        }
      } else {
//no object in drupal or in file
        $this->_logger->warn("The {$contenttype} with the URI '{$uri}' is not referenced in Joinup.");
        return false;
      }
      // ADMS Identifiers will never exist as drupal nodes, but as fields in an asset-release. Exclude ADMS identifiers from the warning below?
      $this->_logger->warn("The {$contenttype} with the URI '{$uri}' is not referenced in Joinup.");
      return false;
    }
  }

//end of member function _check_node

  /**
   * This method check if an URI is in the correct format
   * @param $object the path to the file which should be loaded
   * @return true or false
   * @access private
   */
  private function _verifURI($uri) {
    return _isa_toolbox_valid_uri($uri);
  }

//end of member function _verifURI

  /**
   * This method check if an URL is in the correct format and check that the URL is reachable
   * @param $object the path to the file which should be loaded
   * @return true or false
   * @access private
   */
  private function _verifURL($url) {
    if (!empty($url) && !link_validate_url($url)) {
      return false;
    }
//don't return a 4xx or 5xx error
    $url_check = drupal_http_request($url);
    return ($url_check->code >= 400 && $url_check->code <= 600);
  }

//end of member function _verifURL

  /**
   * This method loads a table of AdmsObject from drupal to a table of ADMS objects
   * @param $output The object to be loaded
   * @return adms:AdmsObject[] a table of AdmsObject
   * @access public
   */
  public function load($output) {
// TODO: load a table of nid or a simple one depending on what we are exporting

    require_once dirname(__FILE__).'/../util/MarkdownerFactory.php';
    $this->_markdowner = new \MarkdownerFactory();

    $nid = $output;
// TODO SDD : check the right repository if export just an asset_release
// load the node 
    $node_reference = node_load($nid);
    // When the repository_nid == -1 then it means that it is Joinup (for the loading)
    $this->repository_nid = -1;

    switch ($node_reference->type) {
      case 'asset_release':
        $repository_id = array_values($node_reference->og_groups);
        if (isset($repository_id) && is_array($repository_id)) {
          // We can only have one group for an asset_release
          $this->repository_nid = current($repository_id);
          // Check the type of the group
          // and if it is a "repository" we have to load it 
          // only if it is not loaded first
          if (!array_key_exists($this->repository_nid, $this->node_array)) {
            $node = node_load($this->repository_nid);
            if ($node->type == ISA_REPOSITORY_TYPE
              && !$this->_load_node_from_drupal($this->repository_nid)) {
              $this->_logger->warn(
                "An error occured during the loading of the repository '{$this->repository_nid}'.");
            }
          }
        }
// Load the node from is nid
// Treat the nodes in reference
        if (!$this->_load_node_from_drupal($nid)) {
          $this->_logger->warn("An Error occured during the loading of the asset node '{$nid}'.");
        }
        break;

// Check if the nid is a repository/asset or an asset release
// if its an asset release don't treat another item
// TODO check the repository origin if it's an asset release
      case 'repository':
        $this->repository_nid = $nid;
        // Load the node from is nid
        // A repository is also added in the ADMS description on the contrary to a project_project
        // which are attached to Joinup
        $this->_load_node_from_drupal($nid);
      case 'project_project':
        // Treat the asset releases of this repository/asset project
        // with worflow validated,in assessment or assessed
        $query = "SELECT og.nid FROM node INNER JOIN og_ancestry AS og USING(nid)
                INNER JOIN workflow_node AS wn USING(nid) 
                WHERE og.group_nid= %d AND wn.sid IN (%s);";
        $result = db_query($query, $nid, $this->getWorkflowExportableStates(TRUE));

        while ($results = db_fetch_array($result)) {
          try {
            if (!$this->_load_node_from_drupal($results['nid'])) {
              $this->_logger->warn(
                "An Error occured during the loading of the node '{$results['nid']}'.");
            }
          } catch (Exception $e) {
            $this->_logger->warn(
              "An Error occured during the loading of the node '{$results['nid']}'.");
          }
        }
        break;
      default:
        $this->_logger->fatal("The node type '{$node_reference->type}' cannot be exported.");
        break;
    }
    if ($this->repository_nid === -1) {
      $this->data[JOINUP_ADMS_URI] = array($this->_generate_Joinup_adms_information());
    }
//change node to adms object
    foreach ($this->node_array as $node) {
      $admsObj = $this->_convert_to_adms($node);
      if ($admsObj) {
        $this->_save_adms_object($admsObj);
      }
    }
    return $this->data;
//return $admsObject;
  }

  /**
   * This function is used by the usort function to order the object in the $data array
   * @param $object compare by the usort function
   * @return -1,0,1 instead of the compare value
   * @access static
   */
  static function compare_weight($a, $b) {
    $compare = strnatcasecmp($a->weight, $b->weight);

    return $compare;
  }

  /**
   * This function check if at least one term of a vocabulary is fill for the node
   * @param $object compare by the usort function
   * @return -1,0,1 instead of the compare value
   * @access private
   */
  private function _verif_taxo(& $item, $term_array, $var_taxo, $property, $contenttype) {
    $vid = variable_get($var_taxo);
    foreach ($term_array as $key => $term) {
      if ($term->vid == $vid) {
        return true;
      }
    }
    $message = "The {$property} is mandatory for a {$contenttype}.";
    $this->_logger->warn($message);
//put the status of the item to error
    $item->tStatus = 'error';
    $item->error_message = $message;
    return false;
  }

  /**
   * This function putt all the fields to import in blank for the update
   * @param $node the node to initialize
   * @return nothing
   * @access private
   */
  private function _Initialize_node(&$node) {

//list of fields to reset
    $fields = array(
      'publisher',
      'access_url',
      'access_url1',
      'licence',
      'schema',
      'alternative_name',
      'identifier',
      'version',
      'version_note',
      'metadata_date',
      'temporal_coverage',
      'distribution',
      'contact_point',
      'item',
      'metadata_publisher',
      'homepage_doc',
      'documentation',
      'related_doc',
      'webpage_doc',
      'node_reference',
      'description',
      'name',
    );

    $common_fields = array(
      'title',
      'body',
      'taxonomy',
      'created',
      'changed',
      'field_language_multiple'
    );

    foreach ($fields as $item) {
      $name_prop = "field_{$node->type}_{$item}";
      if (isset($node->$name_prop)) {
        unset($node->$name_prop);
        $node->$name_prop = array();
      }
    }
    foreach ($common_fields as $item) {
      if (isset($node->$item)) {
        unset($node->$item);
        $node->$item = array();
      }
    }
  }

  /**
   * This function check if a node is blacklisted
   * @param $nid the node to load
   * @return true if blacklisted or false
   * @access private
   */
  private function _check_blacklist($nid) {
// No need to load the full node, just create a stdClass and set the "nid"
    $node = new \stdClass();
    $node->nid = $nid;
//check if blacklisted
    $sid_workflow = workflow_node_current_state($node);
    return ($sid_workflow == ISA_SID_ASSET_BLACKLISTED);
  }

  /**
   * This function load a node from a repository
   * and check if other contentype is included
   * @param $nid the node to load
   * @return true if add right else false if problem
   * @access private
   */
  private function _load_node_from_drupal($nid) {
    try {
      $node = node_load($nid);

      //save the node to treat
      $this->node_array[$nid] = $node;
      $type = $node->type != 'asset_release' ? $node->type : 'asset';

      //check the list of the correct type
      $contenttype_array_name = '_field_contenttype_' . $type;

      //definition of the mapping values
      //check the type
      $contenttype_array = array_flip($this->$contenttype_array_name);
      $contenttype_array['metadata_publisher'] = 'metadataPublisher';

      //check the list of the node properties
      $node_prop = get_object_vars($node);
      //loop on the node properties
      foreach ($node_prop as $key => $prop) {

        if (array_key_exists(str_replace('field_' . $type . '_', '', $key), $contenttype_array)) {
          //I treat the content type
          //$this->_logger->info($key);
          try {
            if (is_array($prop)) {
              foreach ($prop as $value) {
//$this->_logger->warn($value['nid']);
                if (!is_null($value['nid'])) {
                  if (!array_key_exists($value['nid'], $this->node_array)) {
                    if (!$this->_load_node_from_drupal($value['nid'])) {
                      $this->_logger->warn("impossible to load the node from joinup");
                    }
                  }
                }
              }
            }
          } catch (Exception $e) {
            $this->_logger->warn("impossible to load the node from joinup");
          }
        }//end of treatment for contentype
//specific to asset_release
        if ($type == 'asset') {
//treatment of the contentype asset_release (included asset,previous,current....)
          if ($key == "field_asset_node_reference") {

            foreach ($prop as $key_asset => $asset_content) {
              $ref_nid = $asset_content['value']['field_asset_node_reference_node'][0]['nid'];
              if (!empty($ref_nid)) {
                if (!array_key_exists($ref_nid, $this->node_array)) {
                  if (!$this->_load_node_from_drupal($ref_nid)) {
                    $this->_logger->warn("Impossible to load the node '{$ref_nid}' from Joinup.");
                  }
                }
              }
            }
          }
        }//end of the specific asset_release treatment
      }//end of the property loop
      return true;
    } catch (Exception $e) {
      unset($this->node_array[$nid]);
      $this->_logger->warn(
        "An error occured during the loading of the node '{$nid}': {$e->getMessage()}");
      return false;
    }
  }

  /**
   * This function convert a drupal node to the matching ADMS Object 
   * @param $node the node to convert
   * @return nothing
   * @access private
   */
  private function _convert_to_adms($node) {
    //mapping on the content type and the ADMS object
    $admsClass_array = array_flip($this->_classes);

    //mapping for properties name
    $prop_name_array = array(
      'address' => 'fullAddress',
      'alternative_name' => 'alternativeName',
      'description' => 'description',
      'language_multiple' => 'language',
      'mail' => 'email',
      'metadata_date' => 'metadataDate',
      'metadata_language_multiple' => 'metadataLanguage',
      'label' => 'name',
      'name' => 'name',
      'schema' => 'supportedSchema',
      'telephone' => 'telephone',
      'version' => 'version',
      'version_note' => 'versionNotes',
    );
    if ('documentation'==$node->type) {
      $prop_name_array['title'] = 'title';
    }

    if (array_key_exists($node->type, $admsClass_array)) {
      $this->_logger->info(
        "Conversion of the node {$node->nid} ({$node->type}) " .
        "with URI '{$node->field_id_uri[0]['value']}'");
      $Obj = new $admsClass_array[$node->type];

      // treatment of URI
      // JIRA ISAICP-706, Use the path alias if the URI is not defined
      $uri = $node->field_id_uri[0]['value'];
      if (empty($uri)) {
        $uri = isa_toolbox_get_URI_from_path($node->nid);
      }


      if( $node->type == 'documentation') {
          $uri = $this->_getDocumentationURI($node);
      }

      if (!empty($uri)) {//uri not null
        $Obj->id = $uri;

        //list of the ADMSObject properties
        $c = new \ReflectionClass(get_class($Obj));
        foreach ($c->getProperties() as $property) {
          $properties_array[$property->name] = 0;
        }
        //for asset_release treatment
        if ($node->type == "asset_release") {
          $node->type = "asset";
        }

        unset($Obj->_logger);

        //treatment of node->title
        // for "contact_point" types we do not want the drupal title to be exported as another name property
        if (!empty($node->title) && $node->type != 'contact_point') {
          $prop = new \Common\LiteralProperty($node->title, 'en');
          if ($node->type != 'documentation') {
            $Obj->name = $prop;
          } else {
            $Obj->title = $prop;
          }
          unset($prop);
        }

        $field_array = array(
          'address' => 'string',
          'alternative_name' => 'textfield',
          'description' => 'textarea',
          'language_multiple' => 'string',
          'mail' => 'string',
          'metadata_date' => 'string',
          'metadata_language_multiple' => 'string',
          'label' => 'textfield',
          'name' => 'textfield',
          'schema' => 'textfield',
          'telephone' => 'string',
          'version' => 'textfield',
          'version_note' => 'textarea',
        );
        if ('documentation'==$node->type) {
          $field_array['title'] = 'textfield';
        }
        //treatment of textfield/textarea
        foreach ($field_array as $prop_name => $type_prop) {
          switch ($prop_name) {
            case 'language_multiple':
            case 'metadata_language_multiple':
              $node_name_prop = "field_{$prop_name}";
              break;
            default:
              $node_name_prop = "field_{$node->type}_{$prop_name}";
              break;
          }

          //mapping of property name
          if (array_key_exists($prop_name, $prop_name_array)) {
            $obj_prop_name = $prop_name_array[$prop_name];

            if (array_key_exists($obj_prop_name, $properties_array)) {
              foreach ($node->$node_name_prop as $name) {

                if (is_array($name['value'])) {
                  $lang = $name['value']['field_language_textfield_lang'][0]['value'];
                  $value = $name['value']["field_language_{$type_prop}_name"][0]['value'];
                  switch($prop_name) {
                    case 'description':
                    case 'version_note':
                      $value = $this->_markdowner->html2markdown($value);
                      break;
                    default:
                      $value = htmlentities(html_entity_decode($value, ENT_QUOTES, 'UTF-8'),ENT_QUOTES, 'UTF-8');
                  }
                  $prop = new \Common\LiteralProperty($value, $lang);
                } else {
                  if (!empty($name['value'])) {
                    if ($obj_prop_name == 'metadataDate') {
                      $grenwich_date = new \DateTime($name['value']);
                      $grenwich = date("O", $grenwich_date->format('U'));
                      $prop = new \Common\LiteralProperty(
                          "{$name['value']}" . $grenwich, NULL, JOINUP_ADMS_DATE_TYPE);
                    } elseif ($obj_prop_name == 'metadataLanguage' || $obj_prop_name == 'language') {
                      //if language check the uri
                      $query = "SELECT domain FROM languages WHERE language='{$name['value']}';";
                      $results = db_query($query);
                      $result = db_fetch_array($results);
                      $prop = new \Common\Property($result['domain']);
                    } else {
                      $value = $name['value'];
                      switch($prop_name) {
                        case 'address':
                          $value = $this->_markdowner->html2markdown($value);
                          break;
                      }
                      $prop = new \Common\LiteralProperty($value);
                    }
                  }
                }
                if (isset($prop)) {
                  $Obj->$obj_prop_name = $prop;
                  unset($prop);
                }
              }
            }
          }
        }

        //treatment of node->body
        if (isset($node->body)) {
          if (array_key_exists('description', $properties_array)) {
            $Obj->description = new \Common\LiteralProperty($this->_markdowner->html2markdown($node->body), 'en');
          }
        }

        //treatment of node->creation
        if (isset($node->created)) {
          if (array_key_exists('dateCreated', $properties_array)) {
              //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-736
              //Remove unnecesary ":" from date
            $Obj->dateCreated = new \Common\LiteralProperty(
                 date('Y-m-d' , $node->created) . "T" . date('H:i:s', $node->created) . date('O', $node->created), NULL, JOINUP_ADMS_DATETIME_TYPE);
          }
        }

        //treatment of node->changed
        if (!empty($node->field_asset_last_modification[0]['value'])) {
          if (array_key_exists('dateModified', $properties_array)) {
              //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-736
              //Remove unnecesary ":" from date
            $grenwich_date = new \DateTime($node->field_asset_last_modification[0]['value']);
            $grenwich = date("O", $grenwich_date->format('U'));
            $Obj->dateModified = new \Common\LiteralProperty(
                "{$node->field_asset_last_modification[0]['value']}$grenwich",
                NULL, JOINUP_ADMS_DATETIME_TYPE);
          }
        }
        //treatment of the asset reference
        if ($node->type == 'asset') {
          $nodereference_array = array_flip($this->_asset_nodereference);
          foreach ($node->field_asset_node_reference as $nodereference) {
            //test the type
            if (isset($nodereference['value']['field_asset_node_relationship'][0]['value'])) {
              $Obj_prop = $nodereference_array[$nodereference['value']['field_asset_node_relationship'][0]['value']];
              //check the URI  with the nid
              $node_ref = $this->node_array[$nodereference['value']['field_asset_node_reference_node'][0]['nid']];
              if (isset($node_ref->field_id_uri[0]['value'])) {
                $Obj->$Obj_prop = new \Common\Property($node_ref->field_id_uri[0]['value']);
              }
            }
          }
          // Treatment of the repository Origin
          // If the value of the repository_nid == -1 then the origin is JOINUP
          if (!empty($node->og_groups)) {
            // We get only the first repository
            $repository = node_load(current($node->og_groups));
            switch ($repository->type) {
              case ISA_PROJECT_TYPE:
                // The repository of origin is Joinup
                $Obj->repositoryOrigin = new \Common\Property(JOINUP_ADMS_URI);
                break;
              case ISA_REPOSITORY_TYPE:
                $Obj->repositoryOrigin = new \Common\Property($repository->field_id_uri[0]['value']);
                break;
              default:
                // Error
                $this->_logger->warn("The node '$node->nid' is a group node " .
                  "of an invalid content type {$repository->type}.");
                break;
            }
          } else {
            // Not linked to a repository and then
            $Obj->repositoryOrigin = new \Common\Property(JOINUP_ADMS_URI);
          }
          //end of the repositoryOrigin property treatment
          //treatment of the identifier
          foreach ($node->field_asset_identifier as $identifier) {
            // It missing the fields : 
            // - field_identifier_scheme
            // - field_identifier_scheme_agency
            // - field_identifier_scheme_version
            if (!empty($identifier['value']['field_identifier_content'][0]['value'])) {
              $content = $identifier['value']['field_identifier_content'][0]['value'];
              $scheme = $identifier[ 'value']['field_identifier_scheme'][0]['value'];
              $agency = $identifier['value']['field_identifier_scheme_agency'][0]['value'];
              $version = $identifier['value']['field_identifier_scheme_version'][0]['value'];
              $value = "urn:{$content}:{$scheme}:{$agency}:{$version}";
              $Obj->identifier = new \Common\Property($value);

              // Directly add this object to the result
              $adms = new \ADMS\Identifier();
              $adms->code = new \Common\LiteralProperty($content);
              if (!empty($scheme)) {
                $adms->type = new \Common\LiteralProperty($scheme);
              }
              if (!empty($agency)) {
                $adms->schemeAgency = new \Common\LiteralProperty($agency);
              }
              if (!empty($version)) {
                $adms->schemeVersion = new \Common\LiteralProperty($version);
              }
              $this->data[$value] = array($adms);
            }
          } //end of identifier treatment
        }


        //treatment of the contenttype
        $search_name = "_field_contenttype_{$node->type}";
        $search_contenttype_array = array_flip($this->$search_name);
        $search_contenttype_array['metadata_publisher'] = 'metadataPublisher';

        //loop on the contenttype included in this contenttype
        foreach ($search_contenttype_array as $node_contenttype => $obj_contenttype) {
          //loop on each included contenttype
          $node_name_prop = "field_{$node->type}_{$node_contenttype}";
          foreach ($node->$node_name_prop as $contenttype) {
            // If the value is null, we are just continuing
            if (!_isa_toolbox_has_value($contenttype)) {
              continue;
            }
            //check the URI  with the nid
            $uri = $this->_check_URI_from_nid($contenttype['nid']);
            if ($uri) {
              $Obj->$obj_contenttype = new \Common\Property($uri);
            } else {
              $this->_logger->warn("Impossible to get the URI of the node '{$contenttype['nid']}'.");
            }
          }
        }

        //treatment of taxonomy
        //foreach taxonomy in taxo array
        $taxo_array_name = '_taxo_' . $node->type;
        $taxo_array = $this->$taxo_array_name;
        $taxo_array['keyword'] = 'keywords_vid';

        if (!is_null($taxo_array)) {
          foreach ($taxo_array as $key => $taxo_variable) {
            //check if it's a property of the ADMS Object
            if (array_key_exists($key, $properties_array)) {
              //check the vid of this taxonomy
              $taxo_vid = variable_get($taxo_variable);
              //loop on all the taxonomy of the node
              foreach ($node->taxonomy as $node_tid_taxo => $term) {
                //if match, check the uri associated to the tid
                if ($taxo_vid == $term->vid) {
                    if ($key != 'keyword') {
                      $uri = isa_toolbox_get_uri_bytid($node_tid_taxo);
                      $property = isset($uri) ?
                        new \Common\Property($uri) :
                        new \Common\LiteralProperty($term->name);
                      // avoid export of empty properties
                      if ($uri) {
                        $Obj->$key = $property;
                      }
                      // ISAICP-736
                      // Add to the repository its own metadata only: do not call to _addPropertyToRepository()
                      ////$this->_addPropertyToRepository($property);
                    } else {
                      $property = new \Common\LiteralProperty($term->name,'en');
                      $Obj->$key = $property;
                      // ISAICP-736
                      // Add to the repository its own metadata only: do not call to _addPropertyToRepository()
                      ////$this->_addPropertyToRepository($property);
                    }
                  //creation of the lib Object 
                  // ISAICP-736
                  // this is no longer needed
                  // (it will export ex. <rdf:Description rdf:about="http://sws.geonames.org/6255146">...</rdf:Description>), so keep commented
                  //if (array_key_exists($key, $this->_taxo_class)) {
                  //  $this->_create_adms_object($key, $term, $uri);
                  //}
                }
              }
            }
          }
        }

        //treatment of URL
        if (array_key_exists('accessURL', $properties_array) ||
          array_key_exists('homepage', $properties_array)) {
          switch ($node->type) {
            case 'repository':
              foreach ($node->field_repository_url as $url_item) {
                $Obj->accessURL = new \Common\Property($url_item['url']);
              }
              break;

            case 'distribution':
              // This property stores URL
              foreach ($node->field_distribution_access_url1 as $url) {
                if (!empty($url['url'])) {
                  $Obj->accessURL = new \Common\Property($url['url']);
                }
              }
              // This property stores files
              foreach ($node->field_distribution_access_url as $file) {
                if (!empty($file['filepath'])) {
                  $Obj->accessURL = new \Common\Property(file_create_url($file['filepath']));
                }
              }
              break;

            case 'contact_point':
              foreach ($node->field_contact_point_web_page as $webpage) {
                if (!is_null($webpage['url'])) {
                  $Obj->homepage = new \Common\Property($webpage['url']);
                }
              }
          }
          // End of accessURL treatment
        }
        //treatment of temporal coverage
        foreach ($node->field_asset_temporal_coverage as $temporal_coverage) {
          if (isset($temporal_coverage['value']) || isset($temporal_coverage['value2'])) {
            //creation of an ADMS\PeriodOfTime object
            $temporalCoverage = new \ADMS\PeriodOfTime();
            //generation of an uri
            $pot_uri = $node->field_id_uri[0]['value'] . '/PeriodOfTime/' . $this->uri_pot;
            $prop = new \Common\Property($pot_uri);
            $temporalCoverage->id = $prop;
            $temporalCoverage->start = new \Common\LiteralProperty($temporal_coverage['value']);
            $temporalCoverage->end = new \Common\LiteralProperty($temporal_coverage['value2']);
            $this->_save_adms_object($temporalCoverage);
            $Obj->temporalCoverage = new \Common\Property($pot_uri);
            $this->uri_pot +=1;
          }
        }

        //end of the temporal coverage treatment
        //treatment of the distributionOf property for the distribution
        if ($node->type == 'distribution') {
//check for the nid of the asset release associated
          $query = 'SELECT nid FROM  content_field_asset_distribution as og 
            WHERE field_asset_distribution_nid= %d GROUP BY nid';
          $result = db_query($query, $node->nid);
          $results = db_fetch_array($result);
          if (is_numeric($results['nid'])) {
            try {
              $nid = $results['nid'];
//check the URI  with the nid
              $node_ref = $this->node_array[$nid];
              $Obj->distributionOf = new \Common\Property($node_ref->field_id_uri[0]['value']);
            } catch (Exception $e) {
              $this->_logger->warn("problem with distribution treatment");
            }
          }
        }

        //end of treatment of the distributionOf property
        return $Obj;
      } //end of control of uri
      // The node doens't have any URI
      throw new \Exception(
        "The node '{$node->title}' ({$node->nid}) is not conform to ADMS (the URI is missing)." .
        'it cannot be exported.');
    }//end of treatment of node
  }

  /**
   * This function create ADMS Object not node un drupal
   * @param $node the node to convert
   * @return nothing
   * @access private
   */
  private function _create_adms_object($key, $term, $uri) {
    $classObj = $this->_taxo_class[$key];
    $NewObj = new $classObj;

    switch ($classObj) {
      case 'RADion\ThemeTaxonomy':
      case 'RADion\Theme':
      case 'ADMS\InteroperabilityLevel':
      case 'ADMS\AssetType':
      case 'ADMS\Status':
      case 'ADMS\RepresentationTechnique':
      case 'RADion\FileFormat':
      case 'RADion\Language':
        $NewObj->id = new \Common\Property($uri);
//save the adms object
        $this->_save_adms_object($NewObj);
        break;
      case 'RADion\GeographicCoverage':
        $NewObj->id = new \Common\Property($uri);
        $NewObj->name = new \Common\LiteralProperty($term->name,'en');
        $this->_save_adms_object($NewObj);
        break;
    }
  }

  /**
   * This function save ADMS Object in an array to export
   * @param $node the node to convert
   * @return nothing
   * @access private
   */
  private function _save_adms_object($Obj) {
    $obj_exists = false;
    if (array_key_exists($Obj->id, $this->data)) {
      foreach ($this->data[$Obj->id] as $objet) {
        if (get_class($Obj) == get_class($objet)) {
          $obj_exists = true;
        }
      }
    }
    if (!$obj_exists) {
      $this->data[$Obj->id][] = $Obj;
    } else {
//$this->_logger->warn("there are several ".get_class($Obj)." with the uri ".$Obj->id);
      return false;
    }
  }

  private function _check_URI_from_nid($nid) {
    if (!is_null($nid)) {
      $node_ref = $this->node_array[$nid];

      // Return AccessURL instead of field_uri for documentation reference
      if ($node_ref->type == 'documentation') {
          return $this->_getDocumentationURI($node_ref)->value;
      } else if (!is_null($node_ref->field_id_uri[0]['value'])) {
        return $node_ref->field_id_uri[0]['value'];
      }
      return isa_toolbox_get_URI_from_path($nid);
    }
    return false;
  }

    /**
     * @param $node
     * @return \Common\Property
     */
    private function _getDocumentationURI($node) {
      // This property stores URL

      foreach ($node->field_id_uri as $url) {
          if (!empty($url['value'])) {
                $uri = new \Common\Property($url['value']);
          }
      }

      foreach ($node->field_documentation_access_url1 as $url) {
          if (!empty($url['url'])) {
              $uri = new \Common\Property($url['url']);
          }
      }
      // This property stores files
      foreach ($node->field_documentation_access_url as $file) {
          if (!empty($file['filepath'])) {
              $uri = new \Common\Property(file_create_url($file['filepath']));
          }
      }

      return $uri;
  }


  /**
   * This method is getting information from the 
   * @return \ADMS\SemanticAssetRepository 
   */
  private function _generate_Joinup_adms_information() {
    $repository = new \ADMS\SemanticAssetRepository();
    $repository->name = new \Common\LiteralProperty(variable_get('site_name', 'Joinup'), 'en');
    $repository->id = new \Common\Property(JOINUP_ADMS_URI);
    $repository->accessURL = new \Common\Property(JOINUP_ADMS_URI);
    $repository->description = new \Common\LiteralProperty(
        variable_get('site_mission', 'Joinup'), 'en');

    $repository->dateModified = new \Common\LiteralProperty(
        date('c', variable_get('last_update_date', mktime())), NULL, JOINUP_ADMS_DATETIME_TYPE);

    return $repository;
  }

  /**
   * This method is retrieving the workflow states for which we can export the description
   * Note: It is not a private attribute of the class because the definitions of the states are
   * loading after the constructor
   * @param type $returnHasString
   * @return string 
   */
  private function getWorkflowExportableStates($returnHasString = FALSE) {

    $_workflowExportableStates = array(
      ISA_SID_COMMUNITY_VALIDATED,
      ISA_SID_ASSET_VALIDATED,
      ISA_SID_ASSET_ASSESSMENT,
      ISA_SID_ASSET_ASSESSED,
      ISA_SID_REPOSITORY_VALIDATED,
      ISA_SID_REPOSITORY_REQUESTED_DELETION,
      ISA_SID_REPOSITORY_POSTPONED_DELETION,
      ISA_SID_REPOSITORY_REJECTED_DELETION,
      ISA_SID_ASSET_REQUEST_DELETED,
    );
    if ($returnHasString) {
      return implode(',', $_workflowExportableStates);
    }
    return $_workflowExportableStates;
  }

  /**
   * This method is adding the property to the correct repository
   * whether Joinup or the current one
   * @param \Common\Property $property  the property to be added
   */
  private function _addPropertyToRepository(\Common\Property $property) {
    $this->_logger->info(
      "Add the property {$property->value} to the repository with nid"); // '{$this->repository_nid}'");
    if ($this->repository_nid === -1) {
      $this->data[JOINUP_ADMS_URI][0]->theme = $property;
    } else {
      // Search the URL to search after on another element
      $rep_uri = $this->node_array[$this->repository_nid]->field_id_uri[0]['value'];
      if (!empty($rep_uri)) {
        // Add the parameter to the repository with this URI
        foreach ($this->data[$rep_uri] as $object) {
          if ($object instanceof \ADMS\SemanticAssetRepository) {
            $object->theme = $property;
            break;
          }
        }
      }
    }
  }

  /**
   * This method gives the format of a date for a property, by default the format is 
   * http://www.w3.org/2001/XMLSchema#datetime
   * @param \Common\LiteralProperty $property
   * @return string 
   */
  function _getDateFormat(\Common\LiteralProperty $property) {
    // source: http://www.w3schools.com/schema/schema_dtypes_date.asp
    $dateFormat = array(
      'http://www.w3.org/2001/xmlschema#date' => 'Y-m-d',
      'http://www.w3.org/2001/xmlschema#time' => 'H:i:s',
      'http://www.w3.org/2001/xmlschema#datetime' => 'Y-m-d\TH:i:se',
    );
    if (!empty($property->datatype)) {
      if (array_key_exists(strtolower($property->datatype), $dateFormat)) {
        return $dateFormat[strtolower($property->datatype)];
      } else {
        $this->_logger->warn(
          "The format given for the date '{$property->value}' doesn't exist.");
      }
    }
    return $dateFormat[strtolower(JOINUP_ADMS_DATETIME_TYPE)];
  }

}

// end of DrupalAdapter
?>
