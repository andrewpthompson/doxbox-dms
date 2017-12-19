<?php

/*
 * File: php7shim.lib.php
 *
 * Author: Andrew Thompson
 * 
 * Code snippet by feedr taken from http://php.net/manual/en/function.mysql-real-escape-string.php
 * PHP 7 ereg shim functions by bbrala taken from https://github.com/bbrala/php7-ereg-shim
 *
 *
 * Licensed under the GNU GPL. For full terms see the file LICENSE.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
*/

namespace {
  if (!function_exists('ereg')) {
    function ereg($pattern, $subject, &$matches = array())
    {
      return preg_match('/'.$pattern.'/', $subject, $matches);
    }
    
    function eregi($pattern, $subject, &$matches = array())
    {
      return preg_match('/'.$pattern.'/i', $subject, $matches);
    }
    
    function ereg_replace($pattern, $replacement, $string)
    {
    return preg_replace('/'.$pattern.'/', $replacement, $string);
    }
    
    function eregi_replace($pattern, $replacement, $string)
    {
      return preg_replace('/'.$pattern.'/i', $replacement, $string);
    }
    
    function split($pattern, $subject, $limit = -1)
    {
      return preg_split('/'.$pattern.'/', $subject, $limit);
    }
    
    function spliti($pattern, $subject, $limit = -1)
    {
      return preg_split('/'.$pattern.'/i', $subject, $limit);
    }
  }

  if (!function_exists('mysql_real_escape_string')) 
  {
    function mysql_real_escape_string($inp) 
    {
      if (is_array($inp)) 
      {
        return array_map(__METHOD__, $inp);
      }

      if (!empty($inp) && is_string($inp)) 
      {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
      }

      return $inp;
    }
  }
  
}

?>
