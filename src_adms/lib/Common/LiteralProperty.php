<?php

/*
 * Copyright (C) 2012 Atos
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

/**
 * This property is a specialisation of the Property class
 * @see \Common\Property
 * @access public
 */
class LiteralProperty extends Property {

  /**
   * The language of the literal property
   * @var string 
   */
  protected $language = '';

  /**
   * The datatype of the literal property
   * @var string 
   */
  protected $datatype = '';

  /**
   * Default Constructor based on the parent's one
   * @param string $value
   * @param string $language
   * @param string $dataype 
   */
  public function __construct($value, $language = NULL, $dataype = NULL) {
    parent::__construct($value, COMMON_PROPERTY_TYPE_LITERAL);

    if (!empty($language)) {
      $this->language = $language;
      $this->additionalParameter['language'] = $language;
    }

    if (!empty($dataype)) {
      $this->datatype = $dataype;
      $this->additionalParameter['datatype'] = $dataype;
    }
  }

  /**
   * Magic function
   * @param string $attribute
   * @return string
   * @throws \ErrorException 
   */
  public function __get($attribute) {
    if (array_key_exists($attribute, get_object_vars($this))) {
      // We also check that the aditionalParameter is as expected
      // We are fixing this value just in case somebody affect directly in the 
      // additionnal parameter array
      if ($attribute == 'language' || $attribute == 'datatype') {
        if ($this->additionalParameter[$attribute] != $this->$attribute)
          $this->$attribute = $this->additionalParameter[$attribute];
      }
      return $this->$attribute;
    }
    throw new \ErrorException("The attribute '{$attribute}' doesn't exist.");
  }

  /**
   * Magic function
   * @param string $attribute
   * @param mixed $value
   * @throws \ErrorException 
   */
  public function __set($attribute, $value) {
    if (!array_key_exists($attribute, get_object_vars($this))) {
      throw new \ErrorException("The attribute '{$attribute}' doesn't exist.");
    }

    switch ($attribute) {
      case 'additionalParameter':
        if (!is_array($value)) {
          throw new \ErrorException(
            "The attribute '{$attribute}' only accepts an array with key / value pairs.");
        }
        $this->$attribute = $value;
        if (isset($value['language']))
          $this->language = $value['language'];
        if (isset($value['datatype']))
          $this->datatype = $value['datatype'];
        break;
      case 'language':
        if (!isset($value))
          break;
        $this->language = $value;
        $this->additionalParameter['language'] = $value;
        break;
      case 'datatype':
        if (!isset($value))
          break;
        $this->datatype = $value;
        $this->additionalParameter['datatype'] = $value;
        break;
      default:
        break;
    }
  }

}

?>
