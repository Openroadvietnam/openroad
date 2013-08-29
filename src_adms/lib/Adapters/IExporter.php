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

namespace Adapters;

/**
 * This interface is the abstract aimed to structure the exporters for the ADMS 
 * library
 */
interface IExporter {

  /**
   * This function needs to be implemented in order to export the data
   * @param adms:AdmsObject[] data the data (AdmsObject table) which should be exported
   * @param string output another output than the simple boolean value
   * @throws \DomainException 
   * @throws \InvalidArgumentException 
   * @return boolean
   * @access public
   */
  public function export($data, & $output);

}

// end of IExportable
?>