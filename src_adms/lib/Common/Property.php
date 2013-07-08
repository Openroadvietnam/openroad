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
namespace Common;

define( 'COMMON_PROPERTY_TYPE_RESOURCE',  0 );
define( 'COMMON_PROPERTY_TYPE_LITERAL',   1 );

/**
 * The property is the type of value used by the Objects of the ADMS & RADion
 * libraries. It simplifies the management of the export and import
 * @access public
 */
class Property {
  /**
   * The type of property based on an enumeration (might be Literal or Resource)
   * @var string
   * @access public
   */
  public $type;
  
  /**
   * The value of the property
   * @var string
   * @access public
   */
  public $value;
  
  /**
   * The additional parameter which may be required by the property
   * (e.g. the language, the type of data)
   * It is a key/value pairs
   * @var array
   * @access public
   */
  public $additionalParameter;
  
  /**
   * Constructor
   * @param string $value the value of the property
   * @param string $type (optional) the type of the property 
   * @param array $additionalParameter (optional) additional parameter
   */
  public function __construct( $value, $type = COMMON_PROPERTY_TYPE_RESOURCE, 
    $additionalParameter = array() ){
    $this->type = $type;
    $this->value = $value;
    $this->additionalParameter = $additionalParameter;
  }
}

?>
