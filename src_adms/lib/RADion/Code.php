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
 * The Conceptual Model includes a 'Code' datatype that is used by several classes. 
 * This is expressed using the SKOS vocabulary with a particular 'code' 
 * usually being a skos:Concept that is part of a scheme. 
 * The intention is that the skos:Concept class be used as follows;
 * class code
 */
class Code {

  /**
   * 
   * @access public
   */
  var $content;

  /**
   * 
   * @access public
   */
  var $list;

  /**
   * 
   * @access public
   */
  var $listAgency;

  /**
   * 
   * @access public
   */
  var $listVersion;

}

// end of code
?>
