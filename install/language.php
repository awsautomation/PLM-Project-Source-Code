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
//   $Log: language.php,v $
//   Revision 1.1  2004/01/27 19:30:36  merritdc
//   Added install support files
//
//   Revision 1.1.1.1  2004/01/16 15:24:35  merritdc
//   Initial release of Cadmus files
//
//

###########################################################################
#
# Name: language.php
#
# Method: called from the block generation routine in the core include file
#
# Description: generates a block to display a select element with a list of
# languages that have been turned on in the root level config file and
# allow the user to select their language to view the site in
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
include_once(LANG_DIRECTORY . LANG_DEFAULT . '/languages' . FILE_EXTENSION);

//
// Create a list of languages enabled in the root level config file for the select element
//
$LanguageOptions = '';

foreach ( $GLOBALS['Languages'] as $Key => $Value)
{

    if ( $Value == LANG_DEFAULT )
    {
        $LanguageOptions = $LanguageOptions . '<option value="' . $Value . '" selected="selected">' . $GLOBALS['LanguageName'][$Value ]  . '</option>' . "\n";
    }
    else
    {
        $LanguageOptions = $LanguageOptions . '<option value="' . $Value . '">' . $GLOBALS['LanguageName'][$Value ]  . '</option>' . "\n";
    }
}

//
// Set the values for the markers in the template files
//
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LANG_OPTIONS'] = $LanguageOptions;
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LANG_LANG']    = $GLOBALS['Lang']['PWCORE_BLOCK_LANG_LANG'];

//
// Set the template files
//
$GLOBALS['TemplateFiles'][] = PWCORE_DIRECTORY . TEMPLATE_PATH . 'language.tpl';

?>