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
 * class Identifier
 * This class is based on the UN/CEFACT Identifier complex type defined in 
 * @see Section 5.8 of Core Components Data Type Catalogue Version 3.1
 */
class Identifier extends \Common\Object {
  /**
   * Provide the actual identifier 
   * (the Identifier class is effectively meaningless without this property 
   * and conceptually it is mandatory)
   * use skos:notation
   * The "code" is used instead of "content" in order to fit to the technical skos:notation
   * @access protected 
   */
  protected $code;
  
  /**
   * Provide an identifier for the type of identifier issued (the identifier scheme);
   * use dcterms:type
   * @access protected 
   * The "type" is used instead of "scheme" in order to fit to the technical dcterms:type
   */
  protected $type;
  
  /**
   * Identifiy the version of the identifier scheme
   * use adms:schemeVersion 
   */
  protected $schemeVersion;
  
  /**
   * Provide the name of the agency that created the identifier (as an rdfs:Literal)
   * use adms:schemeAgency 
   */
  protected $schemeAgency;
  
  /**
   * Default constructor
   */
  public function __construct(){
    parent::__construct();
  }
}

?>
