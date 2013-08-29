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
 * class SemanticAssetDistribution
 * 
 */
class SemanticAssetDistribution extends \RADion\Distibution {

  /**
   * The URL of the Distribution. 
   * The range of adms:accessURL is xsd:anyURI
   * @access protected
   */
  protected $accessURL;

  /**
   * Links an adms:Distribution to a skos:Concept that is its Representation Technique.
   * @access protected
   */
  protected $representationTechnique;

  /**
   * Links to the status of the Asset or Distribution in the context of a 
   * particular workflow process. Since Status is defined using a skos:Concept, 
   * that is the defined range for this property.
   * @access protected
   */
  protected $status;

  function __construct() {
    parent::__construct();
    $this->weight = 60;
  }

}

// end of SemanticAssetDistribution
?>
