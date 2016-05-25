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
//   $Log: database.php,v $
//   Revision 1.5  2004/02/09 18:00:32  merritdc
//   Daily updates
//
//   Revision 1.4  2004/01/29 14:14:27  merritdc
//   Daily updates
//
//   Revision 1.3  2004/01/21 20:19:02  merritdc
//   Daily updates
//
//   Revision 1.2  2004/01/19 22:45:10  merritdc
//   Daily updates
//
//   Revision 1.1.1.1  2004/01/16 15:24:33  merritdc
//   Initial release of Cadmus files
//
//

###########################################################################
#
# Name: database.php
#
# Method: called from the top level index file
#
# Description: depending on the database type defined in the top level
# config file will call a supporting database file that contains the
# functions required for the defined database type
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
// decode the databse password if enabled
//
if ( DATABASE_ENCRYPT )
{
    $DatabasePassword = base64_decode(DATABASE_PASSWORD);
}
else
{
    $DatabasePassword = DATABASE_PASSWORD;
}

//
// include the correct database file depending on type set, currently only
// mysql is supported
//
switch (DATABASE_TYPE)
{
    case 'db2':
        include_once('db2' . FILE_EXTENSION);
        break;
    case 'msaccess':
        include_once('msaccess' . FILE_EXTENSION);
        break;
    case 'mssql':
        include_once('mssql' . FILE_EXTENSION);
        break;
    case 'mysql':
        include_once('mysql' . FILE_EXTENSION);
        break;
    case 'oracle':
        include_once('oracle' . FILE_EXTENSION);
        break;
    case 'postgress':
        include_once('postgress' . FILE_EXTENSION);
        break;
}


/**************************************************************************
 * Generates an id to use as an object's unique key in the database.
 * Currently the id is an unix micro timestamp but by using this common
 * function to generate the ids we can change our id methodology at a later
 * date. To get datestamp from the tsid: date(YmdHis, substr($Tsid, 0, -6))
 *
 * @return  integer  id
 */
function Database_GenerateTsid()
{
    list($MicroSec, $Sec) = explode(" ",microtime());
    $MicroSec = $MicroSec * 1000000;
    $MicroSec = str_pad( $MicroSec, 6, "0", STR_PAD_LEFT);
    $Tsid = $Sec . $MicroSec;
    return($Tsid);
}



?>