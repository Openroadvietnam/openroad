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

require_once '../../bootstrap.php';

use \Common\Object;

/**
 * This method is 
 * Description of LiteralPropertyTest
 * @author lct
 */
class ObjectTest extends PHPUnit_Framework_TestCase {

  /**
   * Function called to setup the test
   */
  protected function setUp() {
    
  }

  /**
   * Function called to clean the environment once the test is finished
   */
  protected function tearDown() {
    
  }

  /**
   * Function which test the add of a property 
   */
  public function testAddProperty() {
    $object = new \Common\Object();

    $object->addParameter('att1',
      new \Common\Property('value1', COMMON_PROPERTY_TYPE_LITERAL));

    $this->assertcount(1, $object->_params['att1']);

    try {
      $object->addParameter('att1',
        new \Common\Property('value1', COMMON_PROPERTY_TYPE_LITERAL));
      $this->fail("It should not be possibel to add twice the same property");
    } catch (\ErrorException $e) {
      
    }

    $object->addParameter('att1',
      new \Common\Property('value1', COMMON_PROPERTY_TYPE_LITERAL, array('language' => 'en')));

    $this->assertcount(2, $object->_params['att1']);
  }

}

?>
