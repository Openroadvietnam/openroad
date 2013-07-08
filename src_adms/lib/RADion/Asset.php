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

namespace RADion;

/**
 * An Asset represents the conceptual content of a resource. 
 * A particular Asset may have zero or more Distributions in different formats.
 * class Asset
 */
class Asset extends \Common\Object {

  /**
   * Used in RADion to provide an alternative name for the Asset: 
   * this information may be used to provide additional access points, 
   * e.g. allowing indexing of any acronyms, nicknames, shorthand notations 
   * or other identifying information that a user might expect to find the Asset under. 
   * @access protected
   */
  protected $alternativeName;

  /**
   * RADion uses the XHTML 'last' property to link an Asset to the most recent 
   * (i.e. current) version.
   * @access protected
   */
  protected $currentVersion;

  /**
   * RADion uses this to provide the creation date of this version of 
   * the Repository, Asset or Distribution. 
   * RADion expects a datatyped value and for it to be conformant with ISO 8601, 
   * preferably using an xsd data type.
   * @access protected
   */
  protected $dateCreated;

  /**
   * RADion uses this to provide the date of latest update of the Repository, 
   * Asset or Distribution. 
   * RADion expects a datatyped value and for it to be conformant with ISO 8601, 
   * preferably using an xsd data type
   * @access protected
   */
  protected $dateModified;

  /**
   * Used in RADion to provide descriptive text for 
   * the Repository, Asset or Distribution.
   * @access protected
   */
  protected $description;

  /**
   * The distribution relationship associates an Asset (its domain) 
   * with a Distribution (its range). It is the inverse of distributionOf
   * @access protected
   */
  protected $distribution;

  /**
   * A word or phrase used to succinctly descibe the Asset
   * @access protected
   */
  protected $keyword;

  /**
   * RADion uses this to provide the language of the Asset.
   * @access protected
   */
  protected $language;

  /**
   * RADion uses this to provide the name 
   * @access protected
   */
  protected $name;

  /**
   * RADion uses the XHTML 'next' property to link an Asset to the next
   * most recent version.
   * @access protected
   */
  protected $nextVersion;

  /**
   * RADion uses the XHTML 'previous' property to link an Asset to the 
   * previous version.
   * @access protected
   */
  protected $previousVersion;

  /**
   * Used in RADion to link to the organisation responsible for 
   * the publication of the Asset, Repository or Distribution.
   * @access protected
   */
  protected $publisher;

  /**
   * Used in RADion to link any Asset to any other related Asset. 
   * RADion expects the object to be of type rad:Asset.
   * @access protected
   */
  protected $relation;

  /**
   * RADion uses dcterms:isPartOf to link an Asset to a Repository.
   * @access protected
   */
  protected $repositoryOrigin;

  /**
   * RADion uses this to link to the geographic region or jurisdiction that 
   * the Asset or Repository applies to
   * @access protected
   */
  protected $spatialCoverage;

  /**
   * The theme relationship associates an Asset with a specific Theme. 
   * Themes are typically, but not necessarily, encoded as a skos:Concept, 
   * arranged in a skos:ConceptScheme.
   * @access protected
   */
  protected $theme;

  /**
   * The version number or other designation of the Asset; 
   * the value should be a free text string
   * @access protected
   */
  protected $version;

  /**
   * Notes on the particular version of the Asset.
   * @access protected
   */
  protected $versionNotes;

}

// end of Asset
?>
