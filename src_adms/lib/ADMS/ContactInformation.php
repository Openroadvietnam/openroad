<?php

/*
 * Copyright (C) Atos
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General protected License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General protected License for more details.
 *
 * You should have received a copy of the GNU General protected License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace ADMS;

/**
 * Part of the vocabulary that corresponds to the vCard electronic 
 * business card profile defined by RFC 2426 used in ADMS v1.00
 * @see http://www.w3.org/TR/vcard-rdf/
 * class ContactInformation
 */
class ContactInformation extends \Common\Object {

  /**
   * Resources that are Email Addresses
   * @access protected
   */
  protected $email;

  /**
   * A postal or street address of a person
   * @access protected
   */
  protected $fullAddress;

  /**
   * The components of the name of a person
   * @access protected
   */
  protected $name;

  /**
   * Resources that are Telephone numb
   * @access protected
   */
  protected $telephone;

  /**
   * Not exists in the VCard norm
   * @access protected
   */
  protected $homepage;

  /**
   * Default constructor
   */
  public function __construct(){
    parent::__construct();

    $this->weight = 30;
  }

}

// end of ContactInformation
?>
