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
 * The dcterms:Agent class (or a sub class of it) is used in 
 * RADion to represent the publisher of a Repository or its components.	
 * class Agent
 */
class Agent extends \Common\Object {

  /**
   * RADion uses this to provide the name or label of any class.
   * @access protected
   */
  protected $name;

  /**
   * Used in RADion to link a Licence or Publisher to its type.
   * @access protected
   */
  protected $type;

  /**
   * Default constructor
   */
  public function __construct(){
    parent::__construct();
  }

}

// end of Publisher
?>
