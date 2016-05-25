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
//   $Log: login.php,v $
//   Revision 1.8  2004/03/02 23:22:45  merritdc
//   Daily updates
//
//   Revision 1.7  2004/03/02 22:58:55  merritdc
//   Added language and timezone to user database and cookies
//
//   Revision 1.6  2004/02/12 16:04:58  merritdc
//   Daily updates
//

###########################################################################
#
# Name: login.php
#
# Method: called from the block generation routine in the core include file
#
# Description: generates a block to display the user login form
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
$ModuleName = 'PW-Core';
$ModuleFile = 'login';
Core_ModuleIncludes($ModuleName, $ModuleFile);

//
// Set the values for the markers in the template files
//
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_TITLE']         = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_TITLE'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_USERID']        = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_USERID'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_PASSWORD']      = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_PASSWORD'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_FORGOT']        = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_FORGOT'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_FORGOT_LINK']   = PWCORE_REMINDER_LINK;
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_FORGOT_POPUP']  = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_FORGOT_POPUP'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_NEED_ID']       = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_NEED_ID'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_NEED_ID_LINK']  = PWCORE_NEWUSER_LINK;
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_NEED_ID_POPUP'] = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_NEED_ID_POPUP'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_TERMS']         = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_TERMS'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_TERMS_LINK']    = PWCORE_TERMS_LINK;
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_TERMS_POPUP']   = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_TERMS_POPUP'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_PRIVACY']       = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_PRIVACY'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_PRIVACY_LINK']  = PWCORE_PRIVACY_LINK;
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_PRIVACY_POPUP'] = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_PRIVACY_POPUP'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_TERMS_1']       = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_TERMS_1'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_TERMS_2']       = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_TERMS_2'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_TERMS_3']       = $GLOBALS['Lang']['PWCORE_BLOCK_LOGIN_TERMS_3'];
$GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_DOC']           = PWCORE_DOC_LINK . $ModuleFile;

$GLOBALS['MarkerValues']['PWCORE_MODULE_NAME']       = $ModuleName;
$GLOBALS['MarkerValues']['PWCORE_MODULE_LOAD']       = $ModuleFile;

if (! empty($GLOBALS['PageOptions']['Login']['Login']) )  // form submitted
{
    foreach ($GLOBALS['PageOptions']['Login'] as $Key => $Value)
    {
        $GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_' . strtoupper($Key) . '_VALUE'] = $Value;
    }

    // validate user input
    if ( empty($GLOBALS['PageOptions']['Login']['UserId']) )
    {
        $GLOBALS['MarkerValues']['PW_ALERT_MSG']   = $GLOBALS['Lang']['PWCORE_LOGIN_ERROR_01'];
        $GLOBALS['MarkerValues']['PW_ALERT_FOCUS'] = "document.forms[1].elements['Login[UserId]']";
    }
    elseif ( empty($GLOBALS['PageOptions']['Login']['Password']) )
    {
        $GLOBALS['MarkerValues']['PW_ALERT_MSG']   = $GLOBALS['Lang']['PWCORE_LOGIN_ERROR_02'];
        $GLOBALS['MarkerValues']['PW_ALERT_FOCUS'] = "document.forms[1].elements['Login[Password]']";
    }
    else
    {
        $Sql['Query'] = 'SELECT ' .
                            DATABASE_PREFIX . 'objects.tsid, ' .
                            DATABASE_PREFIX . 'users.first_name, ' .
                            DATABASE_PREFIX . 'users.last_name, ' .
                            DATABASE_PREFIX . 'users.password, ' .
                            DATABASE_PREFIX . 'users.email, ' .
                            DATABASE_PREFIX . 'users.style, ' .
                            DATABASE_PREFIX . 'users.language, ' .
                            DATABASE_PREFIX . 'users.timezone, ' .
                            DATABASE_PREFIX . 'users.admin, ' .
                            DATABASE_PREFIX . 'users.active
                        FROM
                            `' . DATABASE_PREFIX . 'objects`,
                            `' . DATABASE_PREFIX . 'users`
                        WHERE
                            ' . DATABASE_PREFIX . 'objects.tsid = ' . DATABASE_PREFIX . 'users.tsid
                        AND
                            ' . DATABASE_PREFIX . "objects.name = '" . $GLOBALS['PageOptions']['Login']['UserId'] . "'";

        $QueryResults = Database_SqlSelect($Sql);

        if (! is_null($QueryResults) )
        {
            if ( md5($GLOBALS['PageOptions']['Login']['Password']) == $QueryResults[0][3] )
            {
                if ( $QueryResults[0][7] )
                {
                    $_SESSION['Tsid']      = $QueryResults[0][0];
                    $_SESSION['FirstName'] = $QueryResults[0][1];
                    $_SESSION['LastName']  = $QueryResults[0][2];
                    $_SESSION['Email']     = $QueryResults[0][4];
                    $_SESSION['Style']     = $QueryResults[0][5];
                    $_SESSION['Language']  = $QueryResults[0][6];
                    $_SESSION['TimeZone']  = $QueryResults[0][7];
                    $_SESSION['Admin']     = $QueryResults[0][8];
                    header('Location: .');
                }
                else
                {
                    $GLOBALS['MarkerValues']['PW_ALERT_MSG'] = $GLOBALS['Lang']['PWCORE_LOGIN_ERROR_05'];
                }
            }
            else
            {
                $GLOBALS['MarkerValues']['PW_ALERT_MSG'] = $GLOBALS['Lang']['PWCORE_LOGIN_ERROR_04'];
                $GLOBALS['MarkerValues']['PW_ALERT_FOCUS'] = "document.forms[1].elements['Login[Password]']";
            }
        }
        else
        {
            $GLOBALS['MarkerValues']['PW_ALERT_MSG'] = $GLOBALS['Lang']['PWCORE_LOGIN_ERROR_03'];
            $GLOBALS['MarkerValues']['PW_ALERT_FOCUS'] = "document.forms[1].elements['Login[UserId]']";
        }
    }
}
else
{
    $GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_USERID_VALUE']   = '';
    $GLOBALS['MarkerValues']['PWCORE_BLOCK_LOGIN_PASSWORD_VALUE'] = '';
}


//
// Set the template files
//
$GLOBALS['TemplateFiles'][] = $ModulePath . TEMPLATE_PATH . 'block_login.tpl';

?>