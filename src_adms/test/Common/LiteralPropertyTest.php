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

/**
 * This method is 
 * Description of LiteralPropertyTest
 * @author lct
 */
class LiteralPropertyTest extends PHPUnit_Framework_TestCase {

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

  public function testCompatibility() {
    $lp = new \Common\LiteralProperty('value 1', 'en', 'string');

    $this->assertArrayHasKey('language', $lp->additionalParameter,
      'Check theat the language is set as an additional parameter');

    $this->assertEquals('en', $lp->language,
      'Check theat the language is set as expected');

    $this->assertEquals('en', $lp->additionalParameter['language'],
      'Check theat the language is set as expected');

    $this->assertArrayHasKey('datatype', $lp->additionalParameter,
      'Check theat the datatype is set as an additional parameter');

    $this->assertEquals('string', $lp->datatype,
      'Check theat the datatype is set as expected');

    $this->assertEquals('string', $lp->additionalParameter['datatype'],
      'Check theat the datatype is set as expected');

    $lp->additionalParameter['language'] = 'fr';

    $this->assertEquals('fr', $lp->language,
      'Check theat the language is modified as expected in the property');

    $this->assertEquals('fr', $lp->additionalParameter['language'],
      'Check theat the language is modified as expected in the array');

    $lp->additionalParameter['datatype'] = 'int';

    $this->assertEquals('int', $lp->datatype,
      'Check theat the datatype is modified as expected in the property');

    $this->assertEquals('int', $lp->additionalParameter['datatype'],
      'Check theat the datatype is modified as expected in the array');

    $lp->language = 'en';

    $this->assertEquals(
      'en', $lp->language,
      'Check theat the language is modified through the attribute as expected in the property');

    $this->assertEquals('en', $lp->additionalParameter['language'],
      'Check theat the language is modified as expected in the array');

    $lp->datatype = 'string';

    $this->assertEquals(
      'string', $lp->datatype,
      'Check theat the datatype is modified through the attribute as expected in the property');

    $this->assertEquals('string', $lp->additionalParameter['datatype'],
      'Check theat the datatype is modified as expected in the array');
  }

}

?>
