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
 * class SemanticAssetReposirtory
 * 
 */
class SemanticAssetRepository extends \RADion\Repository {

  /**
   * The URL of the Repository or Distribution. 
   * The range of adms:accessURL is xsd:anyURI
   * @access protected
   */
  protected $accessURL;

  /**
   * A schema according to which the Repository can provide data about its content
   * e.g. ADMS
   * @access protected
   */
  protected $supportedSchema;

  /**
   * The theme relationship associates an Asset with 
   * a specific Theme and theme taxonomy does the same job 
   * for the repository as a whole.
   * @access protected
   */
  protected $theme;

  /**
   * Constructor
   */
  function __construct() {
    parent::__construct();
    $this->weight = 1;
  }

   public function getProperties(){
      foreach($this as $key => $value) {
          if($key!='_logger'){
         $properties[$key] = $value;
         var_dump($properties);
     }
      }
     return $properties;
  }
  
  
}

// end of SemanticAssetReposirtory
?>
