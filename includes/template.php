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
//   $Log: template.php,v $
//   Revision 1.1.1.1  2004/01/16 15:24:33  merritdc
//   Initial release of Cadmus files
//
//

###########################################################################
#
# Name: template.php
#
# Method: called from the top level index file
#
# Description: contains any functions needed by all the modules to read in
# template files and replace the language markers
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
// sets the full path name for the template files and checks if the
// template file exists
//
function Template_SetTemplateLocation($TemplateFile)
{
    if (! file_exists($TemplateFile) )
    {
        die('Template_SetTemplateLocation(): Error - cannot find file * ' . $TemplateFile . '*!');
    }

    return($TemplateFile);
}


//
// reads in the contents of the template file
//
function Template_ReadTemplateFile($TemplateFile)
{
    $TemplateFile = Template_SetTemplateLocation($TemplateFile);

    if ( $TemplatePointer = @fopen($TemplateFile, 'r') )
    {
        $Template = fread($TemplatePointer, filesize($TemplateFile));
        fclose($TemplatePointer);
    }
    else
    {
        die('Template_OpenTemplateFile(): Error - cannot open file * ' . $TemplateFile . '*!');
    }

    return($Template);
}


//
// combines the contents of multiple template files into a single
// variable
//
function Template_CombineTemplateFiles()
{
    $Template = '';

    foreach ($GLOBALS['TemplateFiles'] as $TemplateFile)
    {
        //echo $TemplateFile . '<br />';
        $Template = $Template . Template_ReadTemplateFile($TemplateFile);
    }

    return($Template);
}


//
// parses the template variable contents for markers and replaces the
// markers with their variable values
//
function Template_ReplaceMarkers($Template, $MarkerValues = array(), $MarkUnfound = 'comment')
{
    foreach ($MarkerValues as $Marker => $Value)
    {
        $Template = str_replace("\{$Marker}", $MarkerValues[$Marker], $Template);
    }

    if ( $MarkUnfound == 'delete' )
    {
        $Template = eregi_replace('{[^ }]*}', '', $Template);
    }
    elseif ( $MarkUnfound == 'comment' )
    {
        $Template = eregi_replace('{[^ }]*}', '<!-- TEMPLATE MARKER UNDEFINED -->', $Template);
    }

    return($Template);
}


//
//
//
function Template_CreateContent()
{
    $Template = Template_CombineTemplateFiles();
    $GLOBALS['PageContents'] = $GLOBALS['PageContents'] . Template_ReplaceMarkers($Template, $GLOBALS['MarkerValues']);

    unset($GLOBALS['TemplateFiles']);

    return;
}


//
//
//
function Template_DisplayContent()
{
    echo Http_SendHeaders();
    echo $GLOBALS['PageContents'];
    return;
}

?>