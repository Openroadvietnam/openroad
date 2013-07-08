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

namespace ADMS;

/**
 * A Semantic Asset in the model is an abstract entity that reflects 
 * the intellectual content of the asset and represents those characteristics 
 * of the asset that are independent of its physical embodiment. 
 * This abstract entity combines the FRBR entities work 
 * (a distinct intellectual or artistic creation) and expression 
 * (the intellectual or artistic realization of a work). 
 * Assets can be versioned. 
 * Every time the intellectual content of an asset changes, 
 * the result is considered to be a new asset that can be linked to previous 
 * and next versions of the Asset. The physical embodiment of an Asset 
 * is called a Distribution. A particular Asset may have zero or more Distributions.
 * class SemanticAsset
 */
class SemanticAsset extends \RADion\Asset {

  /**
   * Links a Semantic Asset to relevant Contact Information which is provided using VCard.
   * @access protected
   */
  protected $contactPoint;

  /**
   * Used in ADMS to link to the main documentation or specification of the Asset.
   * @access protected
   */
  protected $documentation;

  /**
   * Used in ADMS to link to a Web page that is fully dedicated to the Asset.
   * @access protected
   */
  protected $homepage;

  /**
   * ADMS uses this to provide any identifier for the Asset.
   * @access protected
   */
  protected $identifier;

  /**
   * Links to a Semantic Asset that is contained in the Asset being described, 
   * e.g. when there are several vocabularies defined in a single document.
   * @access protected
   */
  protected $includedAsset;

  /**
   * Links a Semantic Asset to an item that is contained within it 
   * (e.g. a concept in a controlled vocabulary).
   * @access protected
   */
  protected $includedItem;

  /**
   * Links a resource to its adms:InteroperabilityLevel . 
   * Since this is encoded using skos:Concept, 
   * that is the defined range for this property.	
   * @access protected
   */
  protected $interoperabilityLevel;

  /**
   * The date of the most recent update of the metadata for the Asset
   * @access protected
   */
  protected $metadataDate;

  /**
   * Links to the language of the metadata for the Asset. 
   * The range of adms:metadataLanguage is dcterms:LinguisticSystem 
   * which is used by RADion (and therefore ADMS) to represent the Language class.
   * @access protected
   */
  protected $metadataLanguage;

  /**
   * Links to the organisation making the metadata for the Asset available. 
   * The range of adms:metadataPublisher as dcterms:Agent which is used by RADion, 
   * and therefore ADMS, for the Publisher class.
   * @access protected
   */
  protected $metadataPublisher;

  /**
   * Links to documentation that contains information related to the asset. 
   * The range of adms:relatedDocumentation is foaf:Document
   * @access protected
   */
  protected $relatedDocumentation;

  /**
   * Links to a Web page that contains information related to the asset. 
   * @access protected
   */
  protected $relatedWebPage;

  /**
   * Links to a sample of the Semantic Asset 
   * (which is itself a Semantic Asset, i.e the range is adms:Asset).
   * @access protected
   */
  protected $sample;

  /**
   * Links to the status of the Asset or Distribution in the context of a 
   * particular workflow process. 
   * Since Status is defined using a skos:Concept, that is the defined range for this property.	
   * @access protected
   */
  protected $status;

  /**
   * Used in ADMS to link to the Period of Time class. 
   * @access protected
   */
  protected $temporalCoverage;

  /**
   * Links to a translation of the Semantic Asset 
   * (which is itself a Semantic Asset, i.e the range is adms:Asset).
   * @access protected
   */
  protected $translation;

  /**
   * Used in ADMS to link an Asset to its Asset Type. 
   * @access protected
   */
  protected $type;

  function __construct() {
    parent::__construct();
    $this->weight = 70;
  }

}

// end of SemanticAsset
?>
