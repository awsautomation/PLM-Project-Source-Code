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
//   $Log: core.php,v $
//   Revision 1.7  2004/02/18 13:26:52  merritdc
//   Daily updates
//
//   Revision 1.6  2004/02/11 22:18:17  merritdc
//   Daily updates
//

###########################################################################
#
# Name: core.php
#
# Method: called from the top level index file
#
# Description: contains any core functions needed by all the modules
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
// Check if the session id has been set which means the user has logged in
// successfully and set the bit to true or false
//
function Core_SetLogin()
{
    if (! empty($_SESSION['Tsid']) )
    {
        define('LOGGED_IN', 1);
    }
    else
    {
        // this should be set to false but override login checking by setting to true
        define('LOGGED_IN', 0);
    }
}


//
// Gets the blocks to display in the page from the database for a provided page location
// and include any blocks that are active for the location in the page
//
function Core_GetBlock($BlockLocation)
{
    //
    // check our login bit and set a value to query the blocks table in the database,
    // anything in the blocks table with a 0 is to be displayed only if the user has not
    // logged into the system yet, anything with a 1 is to be displayed regardless of if
    // logged in or not, anything with a 2 is to be displayed only if the user has logged
    // in, so anything equal to or less than 1 will be displayed if the user has not
    // logged in and anything equal to or greater than 1 will be displayed if the user has
    // logged in
    if ( LOGGED_IN )
    {
        $LoginState = '>= 1';
    }
    else
    {
        $LoginState = '<= 1';
    }

    $Sql['Query'] = 'SELECT
                        module,
                        block
                    FROM
                        ' . DATABASE_PREFIX . "blocks
                    WHERE
                        page_location = '" . $BlockLocation . "'
                    AND
                        active = 1
                    AND
                        login_state " . $LoginState . "
                    ORDER BY
                        position";

    $QueryResults = Database_SqlSelect($Sql);

    if (! is_null($QueryResults) )
    {
        foreach($QueryResults as $Results)
        {
            $ModulePath = MODULE_DIRECTORY . $Results[0] . '/';
            include($ModulePath . BLOCK_DIRECTORY . $Results[1]);
        }
    }
    return;
}


//
// Gets the module and file within the module to include and display as the
// main body/content of the page, checks if the speceified module and file
// exists and if not will redirect to the error module otherwise if the module
// file does exist than the file will be included
//
function Core_GetMain()
{
    if (! empty($GLOBALS['PageOptions']['Module']) )
    {
        $GLOBALS['Module'][$GLOBALS['PageOptions']['Module']]['Path'] = MODULE_DIRECTORY . $GLOBALS['PageOptions']['Module'] . '/';
        $ModuleFile = $GLOBALS['Module'][$GLOBALS['PageOptions']['Module']]['Path'] . $GLOBALS['PageOptions']['Load'];

        if ( file_exists($ModuleFile) )
        {
            include($ModuleFile);
        }
        else
        {
            header ('Location: ./index.php?Module=PW-Core&Load=error&Code=001');
            exit;
        }
    }
}


//
// Gets any options that have been passed to the page thru either the get string
// or the form post and sets a global array of options
//
function Core_GetOptions()
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
    if ( (! empty($PageOptions['Module']) ) and ( empty($PageOptions['Load']) ) )
    {
        $PageOptions['Load'] = INDEX_FILE;
    }

    if ( empty($PageOptions['Module']) )
    {
        $PageOptions['Module'] = '';
    }

    // if a file to load from a module has been specified add the file
    // extension to the file name.
    //
    if (! empty($PageOptions['Load']) )
    {
        $PageOptions['Load'] = $PageOptions['Load'] . FILE_EXTENSION;
    }
    else
    {
        $PageOptions['Load'] = '';
    }

    return($PageOptions);
}


//
// includes any files used by module files
//
function Core_ModuleIncludes($ModuleName, $ModuleFile)
{
    $ConfigFile = MODULE_DIRECTORY . $ModuleName . '/' . CONFIG_FILE;
    $LangFile   = MODULE_DIRECTORY . $ModuleName . '/' . LANG_DIRECTORY . LANG_DEFAULT . '/' . $ModuleFile . FILE_EXTENSION;

    if ( file_exists($ConfigFile) )
    {
        include_once($ConfigFile);
    }

    if ( file_exists($LangFile) )
    {
        include_once($LangFile);
    }
}


//
// creates the option tag string for roles
//
function Core_GetRoles($Selected = '1063681506833367')
{

    include_once(ROOT_PATH . LANG_DIRECTORY . LANG_DEFAULT . '/roles.php' );

    $Roles = array();
    $Roles['1063681506833167'] = 'PW_ROLE_ADMIN';
    $Roles['1063681506833367'] = 'PW_ROLE_GUEST';
    $Roles['1063681506833267'] = 'PW_ROLE_PRODUCT_DEVELOP';
    $Roles['1063681506833268'] = 'PW_ROLE_CAX';
    $Roles['1063681506833269'] = 'PW_ROLE_MFG_ENG';
    $Roles['1063681506833260'] = 'PW_ROLE_PROCESS_ENG';
    $Roles['1063681506833261'] = 'PW_ROLE_QUALITY';
    $Roles['1063681506833262'] = 'PW_ROLE_PURCHASING';
    $Roles['1063681506833263'] = 'PW_ROLE_LAB';
    $Roles['1063681506833264'] = 'PW_ROLE_APP_ENG';
    $Roles['1063681506833265'] = 'PW_ROLE_CUSTOMER_SER';
    $Roles['1063681506833266'] = 'PW_ROLE_IT';
    $Roles['1063681506833277'] = 'PW_ROLE_FINANCE';
    $Roles['1063681506833287'] = 'PW_ROLE_CONT_IMPROVE';
    $Roles['1063681506833297'] = 'PW_ROLE_MODEL_SHOP';
    $Roles['1063681506833207'] = 'PW_ROLE_MFG_OPERATION';
    $Roles['1063681506833217'] = 'PW_ROLE_HR';
    $Roles['1063681506833227'] = 'PW_ROLE_PRODUCTION';
    $Roles['1063681506833237'] = 'PW_ROLE_SALES';
    $Roles['1063681506833247'] = 'PW_ROLE_SUPPLIER';



//    $Sql['Query'] = 'SELECT ' .
//                        DATABASE_PREFIX . 'objects.tsid, ' .
//                        DATABASE_PREFIX . 'users.first_name, ' .
//                        DATABASE_PREFIX . 'users.last_name, ' .
//                        DATABASE_PREFIX . 'users.password, ' .
//                        DATABASE_PREFIX . 'users.email, ' .
//                        DATABASE_PREFIX . 'users.style, ' .
//                        DATABASE_PREFIX . 'users.default_role, ' .
//                        DATABASE_PREFIX . 'users.admin, ' .
//                        DATABASE_PREFIX . 'users.active
//                    FROM
//                        `' . DATABASE_PREFIX . 'objects`,
//                        `' . DATABASE_PREFIX . 'users`
//                    WHERE
//                        ' . DATABASE_PREFIX . 'objects.tsid = ' . DATABASE_PREFIX . 'users.tsid
//                    AND
//                        ' . DATABASE_PREFIX . "objects.name = '" . $GLOBALS['PageOptions']['Login']['UserId'] . "'";
//
//    $QueryResults = Database_SqlSelect($Sql);
//
//    if (! is_null($QueryResults) )
//    {
//        if ( md5($GLOBALS['PageOptions']['Login']['Password']) == $QueryResults[0][3] )
//        {
//            if ( $QueryResults[0][8] )
//            {
//                $_SESSION['Tsid']      = $QueryResults[0][0];
//                $_SESSION['FirstName'] = $QueryResults[0][1];
//                $_SESSION['LastName']  = $QueryResults[0][2];
//                $_SESSION['Email']     = $QueryResults[0][4];
//                $_SESSION['Style']     = $QueryResults[0][5];
//                $_SESSION['Role']      = $QueryResults[0][6];
//                $_SESSION['Admin']     = $QueryResults[0][7];
//                header('Location: .');
//            }
//            else
//            {
//                $GLOBALS['MarkerValues']['PW_ALERT_MSG'] = $GLOBALS['Lang']['PWCORE_LOGIN_ERROR_05'];
//            }
//        }
//        else
//        {
//            $GLOBALS['MarkerValues']['PW_ALERT_MSG'] = $GLOBALS['Lang']['PWCORE_LOGIN_ERROR_04'];
//            $GLOBALS['MarkerValues']['PW_ALERT_FOCUS'] = "document.forms[1].elements['Login[Password]']";
//        }
//    }






    $RoleOptions = '';
    foreach ($Roles as $Key => $Value)
    {
        if ( $Selected == $Key )
        {
            $RoleOptions = $RoleOptions . '<option value="' . $Key . '" selected="selected">' . $GLOBALS['Lang'][$Value] . '</option>' . "\n";
        }
        else
        {
            $RoleOptions = $RoleOptions . '<option value="' . $Key . '">' . $GLOBALS['Lang'][$Value] . '</option>' . "\n";
        }
    }

    return($RoleOptions);

}


//
//
//
function Core_ValidateEmail($EmailAddress)
{
    include_once('email.php');
    $Valid = Email_ValidateAddress($EmailAddress);
    return($Valid);
}


//
//
//
function Core_SendEmail($Email)
{
    include_once('email.php');
    Email_SendEmail($Email);
}


?>