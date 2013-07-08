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
 * This class is implementing the design pattern "Factory" in order to manage
 * the creation of Loaders.
 */
class AdapterFactory {

  /**
   * This function is retrieving the correct loader based on the parameter
   * @param string type the type of loader needed
   * @return ILoader an object of Loader type
   * @access public
   * @throws UnexpectedValueException if the type is not registered
   */
  public static function getAdapter($mimetype = 'application/rdf+xml') {
    // Creating the log instance
    $logger = \Logger::getLogger(__CLASS__);

    switch ($mimetype) {
      case 'application/rdf+xml':
      case 'application/n3':
        $logger->trace('Creating a new XmlRdfAdapter');
        return new XmlRdfAdapter();
      case 'application/drupal':
      case 'drupal':
        $logger->trace('Creating a new DrupalAdapter');
        return new DrupalAdapter();
      default:
        throw new \UnexpectedValueException(
          "The input file mime type ({$mimetype}) is not managed.");
    }
  }

// end of member function getLoader
}

// end of LoaderFactory
?>
