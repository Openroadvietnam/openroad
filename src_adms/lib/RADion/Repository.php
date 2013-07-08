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
 * A Repository is a system or service that provides facilities for storage and 
 * maintenance of descriptions of Assets and Distributions. 
 * A Repository will typically contain descriptions of several Assets and 
 * functionality that allows users to search and access these descriptions. 
 * The Distributions - the actual files themselves - will typically 
 * be available from the Repository or elsewhere on the World Wide Web.
 */
class Repository extends \Common\Object {

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
   * The assets which are included into this repository
   * @access protected
   */
  protected $includes;

  /**
   * RADion uses this to provide the name 
   * @access protected
   */
  protected $name;

  /**
   * Used in RADion to link to the organisation responsible for 
   * the publication of the Asset, Repository or Distribution.
   * @access protected
   */
  protected $publisher;

  /**
   * The theme relationship associates an Asset with 
   * a specific Theme and theme taxonomy does the same job 
   * for the repository as a whole.
   * @access protected
   */
  protected $themeTaxonomy;

  /**
   * RADion uses this to link to the geographic region or jurisdiction that 
   * the Asset or Repository applies to
   * @access protected
   */
  protected $spatialCoverage;

  /**
   * Default constructor
   */
  public function __construct(){
    parent::__construct();
  }
  
 
}

// end of Repository
?>
