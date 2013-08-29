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

/**
 * This class is depicting an Adms Object in order to set up generic methods 
 * to all this kind of object
 * class AdmsObject
 */
class Object {

  /**
   * This array contains the parameters which should be translated
   * @access private
   * @var array 
   */
  private $_params = array();

  /**
   * This array contains the type of object which should be instantiated
   * @access private
   * @var array 
   */
  private $_types = array();

  /**
   * The identifier of the object
   * @var mixed
   * @access protected
   */
  protected $id;

  /**
   * The weigt of the object in order to be sorted
   * @access protected
   */
  protected $weight;

  /**
   * The object represented
   * @access protected
   */
  protected $object;

  /**
   * The technical status is depicting the state of the object regarding the 
   * synchronisation
   * @access protected
   */
  protected $tStatus;

  /**
   * The error message if the object can't be saved during synchronisation
   * @access protected
   */
  protected $error_message;
  
  /**
   * Set the logger
   * @access public
   */
  public $_logger;

  /**
   * Default constructor 
   */
  public function __construct() {
    $this->_logger = \Logger::getLogger(__CLASS__);
  }

  /**
   * Getter, "magic" function
   * @param type $attribute the value of the attribute
   * @return mixed 
   */
  public function __get($attribute) {
    return $this->$attribute;
  }

  /**
   * Setter, "magic" function
   * @param mixed $attribute
   * @param mixed $value 
   */
  public function __set($attribute, $value) {
    if (!array_key_exists($attribute, get_object_vars($this))) {
      throw new \Exception(
        "The attribute {$attribute} doesn't exist for the class " .
        get_class($this));
    }

    if (gettype($value) == 'string') {
      $value = new Property($value, COMMON_PROPERTY_TYPE_LITERAL);
    }

    if (!( $value instanceof \Common\Property )) {
      throw new \InvalidArgumentException(
        "The value for the attribute '{$attribute}' should be a string or a \Common\Property object");
    }

    // If the attribute is the id, then it is this only case when it is not an array
    if ($attribute == 'id') {
      $this->id = $value->value;
    } else {
      // If the property is not set, then we initialize the array
      if (!isset($this->$attribute))
        $this->$attribute = array();
      $this->{$attribute}[] = $value;
    }
  }

  /**
   * This method is used for the intermediary parameter 
   * (to be used with @translate())
   * @param mixed $attribute
   * @param mixed $value 
   */
  public function addParameter($attribute, $value) {
    if (gettype($value) == 'string') {
      $value = new LiteralProperty($value);
    }

    if (!( $value instanceof \Common\Property )) {
      throw new \InvalidArgumentException(
        "The value for the attribute '{$attribute}' should be a string or a \Common\Property object");
    }

    // If the attribute is the id, then it is this only case when it is not an array
    if ($attribute == 'id') {
      $this->id = $value->value;
    } else {
      // Just in case
      if (!isset($this->_params))
        $this->_params = array();

      // If the property is not set, then we initialize the array
      if (!isset($this->_params[$attribute]))
        $this->_params[$attribute] = array();

      // If the exactly same property exist, then we don't create it and raise an error
      if( in_array( $value, $this->_params[$attribute] ) ) {
        throw new \ErrorException( 
          "This value '{$value->value}' has already been registered for this subject" );
      }
      $this->_params[$attribute][] = $value;
    }
  }

  /**
   * This method is used for the intermediary types 
   * (to be used with @translate())
   * @param string $type the type of the object to be instantiated
   * @throws \ErrorException if the type is already registered
   */
  public function addType($type) {
    if (in_array($type, $this->_types)) {
      throw new \ErrorException(
        "The type '{$type}' has already been registered for the id '{$this->id}'"
      );
    }
    if (!isset($this->_types))
      $this->_types = array();

    $this->_types[] = $type;
  }

  /**
   * This method is translating the current object into an array of other object 
   * @return array an array of instantiated object
   */
  public function translate() {
    $result = array();

    // We are creating all the objects
    foreach ($this->_types as $type) {
      try {
        if( !class_exists( $type ) ){
          throw new \InvalidArgumentException(
              "The type '{$type}' doesn't exist. Please check your data"
              );
        }
          
        $object = new $type();
        $object->id = $this->id;

        // Foreach params
        // 1. We check if it exists for this class
        // 2. We affect directly the table
        foreach ($this->_params as $pName => $pArrayOfValues) {

          if (array_key_exists($pName, get_object_vars($object))
            && count($pArrayOfValues) > 0)
            $object->$pName = $pArrayOfValues;
          else
            $this->_logger->debug(
              "The attribute '{$pName}' doesn't exist for the class '{$type}'");
        }
        $result[] = $object;
      } catch (\Exception $exc) {
        $this->_logger->error($exc->getMessage());
      }
    }

    return $result;
  }

}

// end of Object
?>
