<?php
//
// +----------------------------------------------------------------------+
// | PDMWeb version Cadmus                                                |
// +----------------------------------------------------------------------+
// | Copyright (c) 2002-2004 PDMWeb                                       |
// | http://pdmweb.sourceforge.net                                        |
// +----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify |
// | it under the terms of the GNU General Public License as published by |
// | the Free Software Foundation; either version 2 of the License, or    |
// | (at your option) any later version.                                  |
// |                                                                      |
// | This program is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        |
// | GNU General Public License for more details.                         |
// |                                                                      |
// | You should have received a copy of the GNU General Public License    |
// | along with this program; if not, write to the Free Software          |
// | Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.            |
// +----------------------------------------------------------------------+
// | Authors: David Merritt <merritdc@users.sourceforge.net>              |
// +----------------------------------------------------------------------+
//
// CVS Log Info:
//   $Log: copyright.php,v $
//   Revision 1.5  2004/02/09 23:01:56  merritdc
//   Daily updates
//
//   Revision 1.2  2004/01/19 22:47:18  merritdc
//   Daily updates
//
//   Revision 1.1.1.1  2004/01/16 15:24:35  merritdc
//   Initial release of Cadmus files
//
//

###########################################################################
#
# Name: copyright.php
#
# Method: called from the top level index file
#
# Description: displays the copyright information
#
###########################################################################

//
// Check the hacking bit and if not set die the program
//
if (! defined('IN_PDMWEB') )
{
    die('Hacking attempt!');
}

//
// Set the module name, include the module config file and any other includes
//
$ModuleName = 'PW-Core';
$ModuleFile = 'copyright';
Core_ModuleIncludes($ModuleName, $ModuleFile);

//
// Set the values for the markers in the template files
//
$GLOBALS['MarkerValues']['PAGE_TITLE']                  = $GLOBALS['Lang']['PWCORE_COPYRIGHT_PAGETITLE'];
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_NAME']       = $GLOBALS['Lang']['PWCORE_COPYRIGHT_NAME'];
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_TITLE']      = $GLOBALS['Lang']['PWCORE_COPYRIGHT_TITLE'];
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_VERSION']    = $GLOBALS['Lang']['PWCORE_COPYRIGHT_VERSION'];
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_DATE']       = $GLOBALS['Lang']['PWCORE_COPYRIGHT_DATE'];
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_AUTHORS']    = $GLOBALS['Lang']['PWCORE_COPYRIGHT_AUTHORS'];
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_AUTHORNAME'] = $GLOBALS['Lang']['PWCORE_COPYRIGHT_AUTHORNAME'];
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_TEXT']       = $GLOBALS['Lang']['PWCORE_COPYRIGHT_TEXT'];
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_DOC']        = PWCORE_DOC_LINK . $ModuleFile;

//
// Set the template files
//
$GLOBALS['TemplateFiles'][] = PWCORE_DIRECTORY . TEMPLATE_PATH . $ModuleFile . '.tpl';

?>