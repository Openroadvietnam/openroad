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
 * A Distribution is a particular representation or concretisation of an Asset 
 * in the form of a downloadable computer file that implements the intellectual 
 * content of an Asset. A particular Distribution is typically 
 * associated with one Asset.
 * class Distibution
 */
class Distibution extends \Common\Object {

  /**
   * RADion uses this to provide the creation date of this Distribution. 
   * RADion expects a datatyped value and for it to be conformant with ISO 8601
   * @access protected
   */
  protected $dateCreated;

  /**
   * RADion uses this to provide the date of latest update of the Distribution.
   * RADion expects a datatyped value and for it to be conformant with ISO 8601
   * @access protected
   */
  protected $dateModified;

  /**
   * Used in RADion to provide descriptive text for the Distribution.
   * @access protected
   */
  protected $description;

  /**
   * The distributionOf relationship associates a Distribution (its domain) 
   * with the Asset (its range) of which it is a Distribution.
   * It is the inverse of distribution
   * @access protected
   */
  protected $distributionOf;

  /**
   * Used in RADion to link to the format that the Distribution is available in
   * (e.g. PDF, XML, RDF/XML, HTML) which is provided as a property of dcterms:FileFormat
   * @access protected
   */
  protected $format;

  /**
   * Used in RADion to link to the conditions or restrictions for (re-use) 
   * of the Distribution. Note that the range is dcterms:LicenseDocument
   * @access protected
   */
  protected $license;
  
  /**
   * RADion uses this to provide the name of the class
   * @access protected
   */
  protected $name;
  
  /**
   * Used in RADion to link to the organisation responsible for the publication
   * of the Asset, Repository or Distribution. 
   * Note that the range is dcterms:Agent.
   * @access protected
   */
  protected $publisher;

}

// end of Distibution
?>
