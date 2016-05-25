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
//   $Log: index.php,v $
//   Revision 1.2  2004/01/20 22:16:11  merritdc
//   Daily updates
//
//   Revision 1.1.1.1  2004/01/16 15:24:30  merritdc
//   Initial release of Cadmus files
//
//

###########################################################################
#
# Name: index.php
#
# Method: called when the web server processes a request to display the
# default index file
#
# Description: to prevent the web server providing a list of files in a
# directory when the directoy index file hasn't been configured on the web
# server this will redirect the browser up one directory
#
###########################################################################

define('IN_PDMWEB', true);

define('DOC_PATH',  './');
define('ROOT_PATH', './../');
define('FILE_EXTENSION', '.php');

include(ROOT_PATH . 'common' . FILE_EXTENSION);


$PageOptions = Help_GetOptions();

$DocFile = MODULE_DIRECTORY . $PageOptions['Book'] . '/' . DOC_DIRECTORY . LANG_DEFAULT . '/' . $PageOptions['Chapter'] . DOC_EXTENSION;

include($DocFile);

//
// Gets any options that have been passed to the page thru either the get string
// or the form post and sets a global array of options
//
function Help_GetOptions()
{

    //
    // set any variables passed by get
    //
    foreach ($_GET as $Key => $Value )
    {
        $PageOptions[$Key] = $Value;
    }

    //
    // set any variables passed by post, post will override any get options
    //
    foreach ($_POST as $Key => $Value )
    {
        $PageOptions[$Key] = $Value;
    }

    //
    // if a module has been specified but no file within the module to
    // load is specified set the file to load to the default file name
    //
    if ( (! empty($PageOptions['Book']) ) and ( empty($PageOptions['Chapter']) ) )
    {
        $PageOptions['Book'] = INDEX_FILE;
    }

    if ( empty($PageOptions['Book']) )
    {
        $PageOptions['Book'] = '';
    }

    // if a file to load from a module has been specified add the file
    // extension to the file name.
    //
    if (! empty($PageOptions['Chapter']) )
    {
        $PageOptions['Chapter'] = $PageOptions['Chapter'];
    }
    else
    {
        $PageOptions['Chapter'] = '';
    }

    return($PageOptions);
}

?>