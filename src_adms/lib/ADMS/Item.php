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
 * An item that is contained inside an Asset, e.g. an individual 
 * term in a vocabulary, an individual code in a code list or 
 * some other ‘atomic’ element of an Asset
 * class Item
 */
class Item extends \Common\Object {

  /**
   * Used in RADion to provide descriptive text for 
   * the Repository, Asset or Distribution.
   * @access protected
   */
  protected $description;

  /**
   * RADion uses this to provide the name or label of any class.
   * For technical compatibility, we need to use $name attribute
   * @access protected
   */
  protected $name;

  /**
   * Default constructor
   */
  public function __construct(){
    parent::__construct();
    $this->weight = 1;
  }

}

// end of Item
?>
