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
//   $Log: config.tpl,v $
//   Revision 1.6  2004/03/02 17:40:45  merritdc
//   Added timezone to the install
//
//   Revision 1.5  2004/02/17 23:34:42  merritdc
//   Daily updates
//
//   Revision 1.4  2004/02/12 19:34:43  merritdc
//   Added pasword lengths
//

###########################################################################
#
# Name: config.php
#
# Method: called from the common.php
#
# Description: used to set any site wide defaults or variables.  The file
# does not exist until it is first created by the install program but then
# it may be edited by hand after being created.  Eventually there will be
# an admin page to update/modify these values from a browser.
#
###########################################################################

if (! defined('IN_PDMWEB') )
{
    die("Hacking attempt");
}


/*
 * From below here until the next comment, the values for the
 * constants are set by the install program.
 *
 */

//
// database type
//
define('DATABASE_TYPE', '{PWINSTALL_TYPE_VALUE}');

//
// database server hostname
//
define('DATABASE_HOSTNAME', '{PWINSTALL_HOSTNAME_VALUE}');

//
// database table name
//
define('DATABASE_DATABASE', '{PWINSTALL_DATABASE_VALUE}');

//
// database username
//
define('DATABASE_USERNAME', '{PWINSTALL_USERNAME_VALUE}');

//
// database password
//
define('DATABASE_PASSWORD', '{PWINSTALL_ENCRYPT_VALUE}');

//
// database table prefix
//
define('DATABASE_PREFIX', '{PWINSTALL_PREFIX_VALUE}');

//
// default language to use if not selected by user
//
if (! empty($_POST['LanguageOption']) )
{
    define('LANG_DEFAULT', $_POST['LanguageOption']);
}
else
{
    define('LANG_DEFAULT', '{PWINSTALL_LANGUAGE}');
}

//
// default site administrator email address
//
define('EMAIL_ADMIN', '{PWINSTALL_EMAIL_VALUE}');

//
// default timezone
//
define('TIMEZONE_DEFAULT', 12);

/*
 * From above here until the next comment, the values for the
 * constants are set by the install program.
 *
 */

//
// database password encrypted
//
define('DATABASE_ENCRYPT', TRUE);

//
// software version
//
define('PDMWEB_VERSION', 'Cadmus A.0');


//
// Default character set for content header.
// Default = iso-8859-1
//
define('CHARSET_DEFAULT', 'iso-8859-1');

//
//
//
define('INDEX_FILE',     'index');

define('MODULE_DIRECTORY', ROOT_PATH . 'modules/');
define('INCLUDE_DIRECTORY', ROOT_PATH . 'includes/');

define('BLOCK_DIRECTORY', 'blocks/');
define('LANG_DIRECTORY', 'lang/');
define('JAVASCRIPT_DIRECTORY', 'javascript/');
define('TEMPLATE_DIRECTORY', 'templates/');
define('IMAGE_DIRECTORY', 'images/');
define('STYLESHEET_DIRECTORY', 'style/');
define('TMP_DIRECTORY', 'tmp/');
define('DOC_DIRECTORY', 'docs/');

define('DOC_EXTENSION', '.html');

define('LANG_FILE', 'global' . FILE_EXTENSION);
define('LANG_PATH', LANG_DIRECTORY . LANG_DEFAULT . '/' . LANG_FILE);

define('STYLESHEET_FILE', 'stylesheet.css');

define('ICON', 'favicon.ico');

define('PASSWORD_LENGTH_MAX', '12');
define('PASSWORD_LENGTH_MIN', '6');

define('ADMIN_FULLNAME', 'PDMWeb Administrator');

define('EMAIL_XHTML', TRUE);
define('EMAIL_DIRECTORY', 'email/');
define('EMAIL_XHTML_DIRECTORY', 'xhtml/');
define('EMAIL_TEXT_DIRECTORY', 'text/');

define('DEFAULT_STYLE', 'default');

?>