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
//   $Log: user.php,v $
//   Revision 1.5  2004/02/18 14:49:19  merritdc
//   Daily updates
//
//   Revision 1.4  2004/02/10 14:14:15  merritdc
//   Added the disabled admin link for non admin users
//

###########################################################################
#
# Name: user.php
#
# Method: called from the block generation routine in the core include file
#
# Description: generates a block to display the user name, role selection,
# administration link if applicable, and the logout link
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
// Include the module config file and any other required includes
//
$ModuleName = 'PW-Core';
$ModuleFile = 'user';
Core_ModuleIncludes($ModuleName, $ModuleFile);

//
// Set the values for the markers in the template files
//
$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_LOGOUT']         = $GLOBALS['Lang']['PWCORE_BLOCK_USER_LOGOUT'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_LOGOUT_CONFIRM'] = $GLOBALS['Lang']['PWCORE_BLOCK_USER_LOGOUT_CONFIRM'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_LOGOUT_LINK']    = PWCORE_LOGOFF_LINK;
$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_PROFILE_LINK']   = PWCORE_PROFILE_LINK;
$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_LOGOUT_POPUP']   = $GLOBALS['Lang']['PWCORE_BLOCK_USER_LOGOUT_POPUP'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_PROFILE']        = $GLOBALS['Lang']['PWCORE_BLOCK_USER_PROFILE'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_PROFILE_POPUP']  = $GLOBALS['Lang']['PWCORE_BLOCK_USER_PROFILE_POPUP'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_FIRSTNAME']      = $_SESSION['FirstName'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_LASTNAME']       = $_SESSION['LastName'];

if ( $_SESSION['Admin'] )
{
    $GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_ADMIN'] = $GLOBALS['Lang']['PWCORE_BLOCK_USER_ADMIN'];
}
else
{
    $GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_ADMIN'] = '';
}

$GLOBALS['MarkerValues']['PWCORE_BLOCK_USER_ADMIN_POPUP']    = $GLOBALS['Lang']['PWCORE_BLOCK_USER_ADMIN_POPUP'];

//
// Set the template files
//
$GLOBALS['TemplateFiles'][] = $ModulePath . TEMPLATE_PATH . 'block_user.tpl';

?>