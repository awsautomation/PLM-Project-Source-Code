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
//   $Log: global.php,v $
//   Revision 1.3  2004/02/13 15:43:43  merritdc
//   Added default email to install
//
//   Revision 1.2  2004/01/27 19:25:09  merritdc
//   Daily updates
//
//   Revision 1.1  2004/01/20 22:17:10  merritdc
//   Daily updates
//
//   Revision 1.2  2004/01/19 22:46:17  merritdc
//   Daily updates
//
//   Revision 1.1.1.1  2004/01/16 15:24:34  merritdc
//   Initial release of Cadmus files
//
//

###########################################################################
#
# Name: global.php
#
# Method: called from the config files
#
# Description: sets the marker variables used in the template files
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
// set the language variables
//
$GLOBALS['Lang']['PWINSTALL_SELECT_LANG'] = 'Install Language:';
$GLOBALS['Lang']['PWINSTALL_CONTINUE']    = 'Next';
$GLOBALS['Lang']['PWINSTALL_AGREE']       = 'Accept';
$GLOBALS['Lang']['PWINSTALL_HOSTNAME']    = 'Database Hostname:';
$GLOBALS['Lang']['PWINSTALL_USERNAME']    = 'Database Username:';
$GLOBALS['Lang']['PWINSTALL_PASSWORD']    = 'Database Password:';
$GLOBALS['Lang']['PWINSTALL_ENCRYPT']     = 'Encrypt Password:';
$GLOBALS['Lang']['PWINSTALL_DATABASE']    = 'Database Name:';
$GLOBALS['Lang']['PWINSTALL_PREFIX']      = 'Table Prefix:';
$GLOBALS['Lang']['PWINSTALL_DBTYPE']      = 'Database Type:';
$GLOBALS['Lang']['PWINSTALL_EMAIL']       = 'Admin E-mail Address:';


?>