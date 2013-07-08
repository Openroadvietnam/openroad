<?php

/*
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

/**
 * This class is implementing the design pattern "Factory" in order to manage
 * the creation of Loaders.
 */
class MarkdownerFactory {

  private $_type;
  private $_markdowner;

  /**
   * The constructor: it retrieves the correct markdown class and creates an instance
   * @access public
   */
  public function __construct() {
    // Creating the log instance
    $logger = \Logger::getLogger(__CLASS__);
    $logger->trace('Retrieving a Markdowner: creating a new Markdownify object');

    $this->_type = 'Markdownify';
    require_once dirname(__FILE__).'/../util/markdownify/markdownify.php';
    $this->_markdowner = new \Markdownify(false,false,false);
  }
  
  /**
   * The constructor: it retrieves the correct markdown class and creates an instance
   * @param $str The string containing HTML to be converted to markdown
   * @access public
   * @return string
   */
  public function html2markdown($str) {
    switch($this->_type) {
        case 'Markdownify':
            return $this->_markdowner->parseString($str);
            break;
    }
  }

}

?>
