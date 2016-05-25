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
//   $Log: common.php,v $
//   Revision 1.3  2004/02/06 15:03:42  merritdc
//   Daily updates
//
//   Revision 1.2  2004/01/29 14:21:45  merritdc
//   Daily updates
//
//   Revision 1.1  2004/01/27 19:30:36  merritdc
//   Added install support files
//
//   Revision 1.3  2004/01/19 22:44:52  merritdc
//   Daily updates
//
//   Revision 1.2  2004/01/19 22:11:56  merritdc
//   Daily updates
//
//   Revision 1.1.1.1  2004/01/16 15:24:30  merritdc
//   Initial release of Cadmus files
//
//

###########################################################################
#
# Name: common.php
#
# Method: post - index.php
#          get - index.php?Object[tsid]=some_value
#
# Description:
#
###########################################################################

if (! defined('IN_PDMWEB') )
{
    die("Hacking attempt!");
}

//
// configure error reporting
//
error_reporting(E_ALL);

//
// define common or basic variables
//
list($StartSec, $StartMicroSec, $StartTime) = Common_MicroTime();
define('CREATESTAMP', $StartSec);
define('CONFIG_FILE',    'config' . FILE_EXTENSION);

$Lang           = array();
$MarkerValues   = array();
$Module         = array();
$PageOptions    = array();
$Alert          = array();
$Alert['Msg']   = '';
$Alert['Focus'] = '';
$PageContents   = '';

//
//
//
include_once(INSTALL_PATH . CONFIG_FILE);
include_once(INCLUDE_DIRECTORY . 'http' . FILE_EXTENSION);
include_once(INCLUDE_DIRECTORY . 'template' . FILE_EXTENSION);
include_once(LANG_PATH);

//
//
//
$GLOBALS['MarkerValues']['LANG']                  = LANG_DEFAULT;
$GLOBALS['MarkerValues']['ICON']                  = ROOT_PATH . TEMPLATE_PATH . IMAGE_DIRECTORY . 'favicon.ico';;
$GLOBALS['MarkerValues']['STYLESHEET']            = STYLESHEET_FILE;


$GLOBALS['MarkerValues']['PW_ROOT_PATH']          = ROOT_PATH;
$GLOBALS['MarkerValues']['PW_FORM_ACTION']        = ROOT_PATH;



//
// define admin page layout functions
//
function Common_GenerateTsid()
{
    list($MicroSec, $Sec) = explode(" ",microtime());
    $MicroSec = $MicroSec * 1000000;
    $MicroSec = str_pad( $MicroSec, 6, "0", STR_PAD_LEFT);
    $Tsid = $Sec . $MicroSec;
    return($Tsid);
}


//
//
//
function Common_MicroTime()
{
    list($MicroSec, $Sec) = explode(" ",microtime());
    $MicroTime = bcadd($MicroSec, $Sec, 8);
    return array($Sec, $MicroSec, $MicroTime);
}


//
//
//
function Common_Layout_Start()
{
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'html_start.tpl';
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'head_start.tpl';
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'head_content.tpl';
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'head_end.tpl';
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'body_start.tpl';
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'header.tpl';
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'main_start.tpl';
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'status.tpl';

    Template_CreateContent();

    return;
}

//
//
//
function Common_Layout_End()
{
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'main_end.tpl';

    if (! empty($GLOBALS['MarkerValues']['PW_ALERT_FOCUS']) )
    {
        $GLOBALS['TemplateFiles'][] =  JAVASCRIPT_DIRECTORY . 'alert_focus.tpl';
    }
    elseif (! empty($GLOBALS['MarkerValues']['PW_ALERT_MSG']) )
    {
        $GLOBALS['TemplateFiles'][] =  JAVASCRIPT_DIRECTORY . 'alert.tpl';
    }

    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'body_end.tpl';
    $GLOBALS['TemplateFiles'][] =  TEMPLATE_PATH . 'html_end.tpl';

    Template_CreateContent();

    return;
}



?>