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
//   $Log: error.php,v $
//   Revision 1.4  2004/02/09 23:01:56  merritdc
//   Daily updates
//
//   Revision 1.1.1.1  2004/01/16 15:24:35  merritdc
//   Initial release of Cadmus files
//

###########################################################################
#
# Name: error.php
#
# Method: called from the various programs when there is an error to be
# displayed
#
# Description: displays error messages
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
// Set the module name, include the module support files and any other includes
//
$ModuleName = 'PW-Core';
$ModuleFile = 'error';
Core_ModuleIncludes($ModuleName, $ModuleFile);

//
// sets the error code if not sent from the calling program
//
if ( empty($GLOBALS['PageOptions']['Code']) )
{
    $GLOBALS['PageOptions']['Code'] = '000';
}

//
// Set the values for the markers in the template files
//
$GLOBALS['MarkerValues']['PWCORE_ERROR'] = $GLOBALS['Lang']['PWCORE_ERROR'];
$GLOBALS['MarkerValues']['PWCORE_ERROR_CODE']  = $GLOBALS['Lang']['PWCORE_ERROR_CODE'] . $GLOBALS['PageOptions']['Code'];
$GLOBALS['MarkerValues']['PWCORE_ERROR_SHORT'] = $GLOBALS['Lang']['PWCORE_ERROR_CODE_' . $GLOBALS['PageOptions']['Code']];
$GLOBALS['MarkerValues']['PWCORE_ERROR_LONG']  = $GLOBALS['Lang']['PWCORE_ERROR_LONG'];

//
// Set the template files
//
$GLOBALS['TemplateFiles'][] = $GLOBALS['Module'][$ModuleName]['Path'] . TEMPLATE_PATH . 'error.tpl';

?>