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
//   $Log: logo.php,v $
//   Revision 1.3  2004/02/09 21:23:29  merritdc
//   Daily updates
//
//   Revision 1.1.1.1  2004/01/16 15:24:36  merritdc
//   Initial release of Cadmus files
//

###########################################################################
#
# Name: logo.php
#
# Method: called from the block generation routine in the core include file
#
# Description: generates a block to display the site logo, copyright mark
# and hyperlinks to the site home and copyright text
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
include_once($ModulePath . CONFIG_FILE);

//
// Set the values for the markers in the template files
//
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_LINK']  = PWCORE_COPYRIGHT_LINK;
$GLOBALS['MarkerValues']['PWCORE_LOGO_LINK']       = PWCORE_LOGO_LINK;
$GLOBALS['MarkerValues']['PWCORE_LOGO_GIF']        = PWCORE_LOGO_GIF;
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT']       = $GLOBALS['Lang']['PWCORE_COPYRIGHT'];
$GLOBALS['MarkerValues']['PWCORE_COPYRIGHT_POPUP'] = $GLOBALS['Lang']['PWCORE_COPYRIGHT_POPUP'];
$GLOBALS['MarkerValues']['PWCORE_LOGO_POPUP']      = $GLOBALS['Lang']['PWCORE_LOGO_POPUP'];

//
// Set the template files
//
$GLOBALS['TemplateFiles'][] = $ModulePath . TEMPLATE_PATH . 'block_logo.tpl';

?>