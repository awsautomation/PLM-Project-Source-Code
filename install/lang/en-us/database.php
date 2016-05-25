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
//   $Log: database.php,v $
//   Revision 1.2  2004/02/13 15:43:43  merritdc
//   Added default email to install
//
//   Revision 1.1  2004/01/27 19:24:47  merritdc
//   Added install language files
//
//

###########################################################################
#
# Name: database.php
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

$GLOBALS['Lang']['PWINSTALL_DATABASE_ERROR'] = 'Please complete all fields!';
$GLOBALS['Lang']['PWINSTALL_DATABASE_BLURB'] = 'Enter your Data Source Name (DSN) information and any other required information.
    The DSN information must already be be created within the database software.
    This install will NOT create the DSN information and will fail if the DSN does not already exist.';


//
//
//
$GLOBALS['DatabaseTypes']['access']     = 'Access';
$GLOBALS['DatabaseTypes']['db2']        = 'DB2';
$GLOBALS['DatabaseTypes']['mysql']      = 'MySQL';
$GLOBALS['DatabaseTypes']['oracle']     = 'Oracle';
$GLOBALS['DatabaseTypes']['sqlserver']  = 'SQL Server';
$GLOBALS['DatabaseTypes']['postgresql'] = 'PostgreSQL';

?>