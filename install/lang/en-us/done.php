<?php
//
// +----------------------------------------------------------------------+
// | PDMWeb version Cadmus                                                |
// +----------------------------------------------------------------------+
// | Copyright (c) 2002-2004 PDMWeb                                       |
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
//   $Log: done.php,v $
//   Revision 1.2  2004/01/29 14:22:10  merritdc
//   Daily updates
//
//   Revision 1.1  2004/01/27 19:24:47  merritdc
//   Added install language files
//
//

###########################################################################
#
# Name: done.php
#
# Method: called from the language blcoj
#
# Description: used to set the values for the languages displayed in the
# language select options
#
###########################################################################

//
// Check the hacking bit and if not set die the program
//
if (! defined('IN_PDMWEB') )
{
    die('Hacking attempt!');
}


$GLOBALS['Lang']['PWINSTALL_DONE_GOOD']   = 'Installation of PDMWeb was successful. When you select
    <i>Done</i> the install files will be renamed and you will be redirected to the main page.  If
    you ever need to run the installation program again you will need to rename the install files
    back to their original file names.';
$GLOBALS['Lang']['PWINSTALL_DONE_BAD']    = 'Installation of PDMWeb FAILED!';
$GLOBALS['Lang']['PWINSTALL_DONE']        = 'Done';
$GLOBALS['Lang']['PWINSTALL_ERROR_READ']  = 'Unable to open configuration template file.';
$GLOBALS['Lang']['PWINSTALL_ERROR_WRITE'] = 'Unable to write configuration to the config file.';
$GLOBALS['Lang']['PWINSTALL_ERROR_OPEN']  = 'Unable to create and open the config file.';
$GLOBALS['Lang']['PWINSTALL_ERROR_SQL']   = 'Unable to install all or some of the database structure.';



?>