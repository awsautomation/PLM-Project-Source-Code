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
//   $Log: roles.php,v $
//   Revision 1.2  2004/02/11 22:19:38  merritdc
//   Daily updates
//
//   Revision 1.1  2004/01/19 22:46:17  merritdc
//   Daily updates
//
//

###########################################################################
#
# Name: roles.php
#
# Method: called from the role options sub-routine
#
# Description: sets the role options used in the template files
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
// set the custom language variables
//
$GLOBALS['Lang']['PW_ROLE_ADMIN']           = 'Administrator';
$GLOBALS['Lang']['PW_ROLE_GUEST']           = 'Guest';
$GLOBALS['Lang']['PW_ROLE_PRODUCT_DEVELOP'] = 'Product Development';
$GLOBALS['Lang']['PW_ROLE_CAX']             = 'Eng. Services - CAx';
$GLOBALS['Lang']['PW_ROLE_MFG_ENG']         = 'Manufacturing Eng.';
$GLOBALS['Lang']['PW_ROLE_PROCESS_ENG']     = 'Process Eng.';
$GLOBALS['Lang']['PW_ROLE_QUALITY']         = 'Quality';
$GLOBALS['Lang']['PW_ROLE_PURCHASING']      = 'Purchasing';
$GLOBALS['Lang']['PW_ROLE_LAB']             = 'Eng. Services - Lab';
$GLOBALS['Lang']['PW_ROLE_APP_ENG']         = 'Application/Design Eng.';
$GLOBALS['Lang']['PW_ROLE_CUSTOMER_SER']    = 'Customer Service"';
$GLOBALS['Lang']['PW_ROLE_IT']              = 'Information Technology';
$GLOBALS['Lang']['PW_ROLE_FINANCE']         = 'Finance';
$GLOBALS['Lang']['PW_ROLE_CONT_IMPROVE']    = 'Continuous Improvement';
$GLOBALS['Lang']['PW_ROLE_MODEL_SHOP']      = 'Eng. Services - Model Shop';
$GLOBALS['Lang']['PW_ROLE_MFG_OPERATION']   = 'Manufacturing/Operations';
$GLOBALS['Lang']['PW_ROLE_HR']              = 'Human Resources';
$GLOBALS['Lang']['PW_ROLE_PRODUCTION']      = 'Production Associates';
$GLOBALS['Lang']['PW_ROLE_SALES']           = 'Sales/Marketing';
$GLOBALS['Lang']['PW_ROLE_SUPPLIER']        = 'Supplier';
?>