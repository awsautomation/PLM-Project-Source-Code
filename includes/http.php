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
//   $Log: http.php,v $
//   Revision 1.1.1.1  2004/01/16 15:24:33  merritdc
//   Initial release of Cadmus files
//
//

###########################################################################
#
# Name: http.php
#
# Method: called from the top level index file
#
# Description: contains any functions needed by all the modules to generate
# http and html
#
###########################################################################

//
// Check the hacking bit and if not set die the program
//
if (! defined('IN_PDMWEB') )
{
    die('Hacking attempt!');
}


/**************************************************************************
 * generates the http and cookie headers to send to the browser before
 * generating and displaying any xhtml.
 *
 **************************************************************************/
function Http_SendHeaders()
{
    if (! headers_sent() )
    {
        header('Expires: ' . gmstrftime('%a, %d %b %Y %H:%M:%S GMT', CREATESTAMP));
        header('Last-Modified: ' . gmstrftime('%a, %d %b %Y %H:%M:%S GMT', CREATESTAMP));
        header('Cache-Control: no-store, no-cache, must-revalidate');    # HTTP/1.1 cache
        header('Cache-Control: max_age=0 ,post-check=0, pre-check=0', false);
        header('Pragma: no-cache');    # HTTP/1.0 cache
        header('Content-Description: PDMWeb');
        header('Content-Type: text/html;charset="' . CHARSET_DEFAULT . '"');
    }
}


/**************************************************************************
 * generates the http and cookie headers to send to the browser before
 * generating and displaying any xhtml.
 *
 **************************************************************************/
//function Http_SendCookies()
//{
//    if (! headers_sent() )
//    {
//        if (! empty($GLOBALS['Cookies']['Name']) )
//        {
//            foreach ($GLOBALS['Cookies']['Name'] as $Key => $Value)
//            {
//                setcookie($Value, $GLOBALS['Cookies']['Value'][$Key]);
//            }
//        }
//    }
//}


//
// destroys the server session and times out the browser cookie
//
function Http_SessionEnd()
{
    if ( isset($_COOKIE['PHPSESSID']) )
    {
        session_destroy();
        setcookie ('PHPSESSID', "", time() - 3600);
    }
}

?>