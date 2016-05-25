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
//   $Log: config.php,v $
//   Revision 1.6  2004/03/02 17:40:45  merritdc
//   Added timezone to the install
//
//   Revision 1.5  2004/02/09 17:59:32  merritdc
//   Daily updates
//
//   Revision 1.4  2004/02/07 23:12:28  merritdc
//   Restored accidently deleted file
//
//   Revision 1.3  2004/02/06 14:48:57  merritdc
//   Removed config file from std install
//
//   Revision 1.2  2004/01/29 14:21:45  merritdc
//   Daily updates
//
//   Revision 1.1  2004/01/27 19:30:36  merritdc
//   Added install support files
//
//

###########################################################################
#
# Name: config.php
#
# Method:
#
# Description:
#
###########################################################################

if (! defined('IN_PDMWEB') )
{
    die("Hacking attempt");
}


define('PDMWEB_VERSION', 'Cadmus A.0');


//
// Default character set for content header.
// Default = iso-8859-1
//
define('CHARSET_DEFAULT', 'iso-8859-1');


//
// Encrypt the database password in the config file
//
define('DATABASE_ENCRYPT', TRUE);

//
// Move the install file.
//
define('MOVE_INSTALL', TRUE);

define('CONFIG_TEMPLATE', INSTALL_PATH . 'config.tpl');

define('INDEX_FILE',     'index');

define('INCLUDE_DIRECTORY', INSTALL_PATH . '');

define('LANG_DIRECTORY', INSTALL_PATH . 'lang/');
define('TEMPLATE_DIRECTORY', INSTALL_PATH);
define('IMAGE_DIRECTORY', 'images/');
define('STYLESHEET_DIRECTORY', INSTALL_PATH);


if (! empty($_POST['LanguageOption']) )
{
    define('LANG_DEFAULT', $_POST['LanguageOption']);
}
else
{
    define('LANG_DEFAULT', 'en-us');
}

//
// default timezone
//
define('TIMEZONE_DEFAULT', 12);


define('LANG_FILE', 'global' . FILE_EXTENSION);
define('LANG_PATH', LANG_DIRECTORY . LANG_DEFAULT . '/' . LANG_FILE);

define('STYLESHEET_FILE', STYLESHEET_DIRECTORY . 'stylesheet.css');

define('STYLE_DEFAULT', '');

define('TEMPLATE_PATH', TEMPLATE_DIRECTORY . STYLE_DEFAULT);

define('ICON', 'favicon.ico');


//
// Languages to allow.  The language directory must exist for the
// selected language under the LANG_DIRECTORY.  This hopefully is a
// complete of all the possible languages and was compiled from the
// list of languages available to Mozilla.  Uncomment all of the
// languages you want to use on your site.  NOTE: whatever you have
// selected for LANG_DEFAULT does not have to be uncommented to be
// used as the default but if it is not uncommented here it will not
// be displayed in any select elements displaying languages.
//
$GLOBALS['Languages'] = array();

// Afrikaans
//$GLOBALS['Languages'][0]  = 'af';
// Albanian
//$GLOBALS['Languages'][1] = 'sq';
// Arabic
//$GLOBALS['Languages'][2] = 'ar';
// Arabic (Algeria)
//$GLOBALS['Languages'][3] = 'ar-dz';
// Arabic (Bahrain)
//$GLOBALS['Languages'][4] = 'ar-bh';
// Arabic (Egypt)
//$GLOBALS['Languages'][5] = 'ar-eg';
// Arabic (Iraq)
//$GLOBALS['Languages'][6] = 'ar-iq';
// Arabic (Kuwait)
//$GLOBALS['Languages'][7] = 'ar-kw';
// Arabic (Lebanon)
//$GLOBALS['Languages'][8] = 'ar-lb';
// Arabic (Libya)
//$GLOBALS['Languages'][9] = 'ar-ly';
// Arabic (Morocco)
//$GLOBALS['Languages'][10] = 'ar-ma';
// Arabic (Oman)
//$GLOBALS['Languages'][11] = 'ar-om';
// Arabic (Qatar)
//$GLOBALS['Languages'][12] = 'ar-qa';
// Arabic (Saudi Arabia)
//$GLOBALS['Languages'][13] = 'ar-sa';
// Arabic (Syria)
//$GLOBALS['Languages'][14] = 'ar-sy';
// Arabic (Tunisia)
//$GLOBALS['Languages'][15] = 'ar-tn';
// Arabic (U.A.E.)
//$GLOBALS['Languages'][16] = 'ar-ae';
// Arabic (Yemen)
//$GLOBALS['Languages'][17] = 'ar-ye';
// Armenian
//$GLOBALS['Languages'][18] = 'hy';
// Asturian
//$GLOBALS['Languages'][19] = 'ast';
// Basque
//$GLOBALS['Languages'][20] = 'eu';
// Belarusian
//$GLOBALS['Languages'][21] = 'be';
// Bosnian
//$GLOBALS['Languages'][22] = 'bs';
// Bulgarian
//$GLOBALS['Languages'][23] = 'bg';
// Catalan
//$GLOBALS['Languages'][24] = 'ca';
// Chinese
//$GLOBALS['Languages'][25] = 'zh';
// Chinese (China)
//$GLOBALS['Languages'][26] = 'zh-cn';
// Chinese (Hong Kong)
//$GLOBALS['Languages'][27] = 'zh-hk';
// Chinese (Singapore)
//$GLOBALS['Languages'][28] = 'zh-sg';
// Chinese (Taiwan)
//$GLOBALS['Languages'][29] = 'zh-tw';
// Croatian
//$GLOBALS['Languages'][30] = 'hr';
// Czech
//$GLOBALS['Languages'][31] = 'cs';
// Danish
//$GLOBALS['Languages'][32] = 'da';
// Dutch
//$GLOBALS['Languages'][33] = 'nl';
// Dutch (Belgium)
//$GLOBALS['Languages'][34] = 'nl-be';
// English
//$GLOBALS['Languages'][35] = 'en';
// English (Australia)
//$GLOBALS['Languages'][36] = 'en-au';
// English (Belize)
//$GLOBALS['Languages'][37] = 'en-bz';
// English (Canada)
//$GLOBALS['Languages'][38] = 'en-ca';
// English (Ireland)
//$GLOBALS['Languages'][39] = 'en-ie';
// English (Jamaica)
//$GLOBALS['Languages'][40] = 'en-jm';
// English (New Zeland)
//$GLOBALS['Languages'][41] = 'en-nz';
// English (Philippines)
//$GLOBALS['Languages'][42] = 'en-ph';
// English (South Africa)
//$GLOBALS['Languages'][43] = 'en-za';
// English (Trinidad)
//$GLOBALS['Languages'][44] = 'en-tt';
// English (United Kingdom)
$GLOBALS['Languages'][45] = 'en-gb';
// English (United States)
$GLOBALS['Languages'][46] = 'en-us';
// English (Zimbabwe)
//$GLOBALS['Languages'][47] = 'en-zw';
// Esperanto
//$GLOBALS['Languages'][48] = 'eo';
// Estonian
//$GLOBALS['Languages'][49] = 'et';
// Faeroese
//$GLOBALS['Languages'][50] = 'fo';
// Finnish
//$GLOBALS['Languages'][51] = 'fi';
// French
//$GLOBALS['Languages'][52] = 'fr';
// French (Belgium)
//$GLOBALS['Languages'][53] = 'fr-be';
// French (Canada)
//$GLOBALS['Languages'][54] = 'fr-ca';
// French (France)
//$GLOBALS['Languages'][55] = 'fr-fr';
// French (Luxembourg)
//$GLOBALS['Languages'][56] = 'fr-lu';
// French (Monaco)
//$GLOBALS['Languages'][57] = 'fr-mc';
// French (Switzerland)
//$GLOBALS['Languages'][58] = 'fr-ch';
// Galician
//$GLOBALS['Languages'][59] = 'gl';
// Georgian
//$GLOBALS['Languages'][60] = 'ka';
// German
//$GLOBALS['Languages'][61] = 'de';
// German (Austria)
//$GLOBALS['Languages'][62] = 'de-at';
// German (Germany)
//$GLOBALS['Languages'][63] = 'de-de';
// German (Liechtenstein)
//$GLOBALS['Languages'][64] = 'de-li';
// German (Luxembourg)
//$GLOBALS['Languages'][65] = 'de-lu';
// German (Switzerland)
//$GLOBALS['Languages'][66] = 'de-ch';
// Greek
//$GLOBALS['Languages'][67] = 'el';
// Hebrew
//$GLOBALS['Languages'][68] = 'he';
// Hungarian
//$GLOBALS['Languages'][69] = 'hu';
// Icelandic
//$GLOBALS['Languages'][70] = 'is';
// Indonesian
//$GLOBALS['Languages'][71] = 'id';
// Indonesian
//$GLOBALS['Languages'][72] = 'in';
// Irish
//$GLOBALS['Languages'][73] = 'ga';
// Italian
//$GLOBALS['Languages'][74] = 'it';
// Italian (Switzerland)
//$GLOBALS['Languages'][75] = 'it-ch';
// Japanese
//$GLOBALS['Languages'][76] = 'ja';
// Korean
//$GLOBALS['Languages'][77] = 'ko';
// Korean (North Korea)
//$GLOBALS['Languages'][78] = 'ko-kp';
// Korean (South Korea)
//$GLOBALS['Languages'][79] = 'ko-kr';
// Latvian
//$GLOBALS['Languages'][80] = 'lv';
// Lithuanian
//$GLOBALS['Languages'][81] = 'lt';
// Macedonian (Macedonia, F.Y.R. of)
//$GLOBALS['Languages'][82] = 'mk-mk';
// Malay
//$GLOBALS['Languages'][83] = 'ms';
// Norwegian
//$GLOBALS['Languages'][84] = 'no';
// Norwegian Bokmål
//$GLOBALS['Languages'][85] = 'nb';
// Norwegian Nynorsk
//$GLOBALS['Languages'][86] = 'nn';
// Polish
//$GLOBALS['Languages'][87] = 'pl';
// Portuguese
//$GLOBALS['Languages'][88] = 'pt';
// Portuguese
//$GLOBALS['Languages'][89] = 'pt-bz';
// Romanian
//$GLOBALS['Languages'][90] = 'ro';
// Russian
//$GLOBALS['Languages'][91] = 'ru';
// Scots Gaelic
//$GLOBALS['Languages'][92] = 'gd';
// Serbian
//$GLOBALS['Languages'][93] = 'sr';
// Slovak
//$GLOBALS['Languages'][94] = 'sk';
// Slovenian
//$GLOBALS['Languages'][95] = 'sl';
// Sorbian
//$GLOBALS['Languages'][96] = 'sb';
// Spanish
//$GLOBALS['Languages'][97] = 'es';
// Spanish (Argentina)
//$GLOBALS['Languages'][98] = 'es-ar';
// Spanish (Bolivia)
//$GLOBALS['Languages'][99] = 'es-bo';
// Spanish (Chile)
//$GLOBALS['Languages'][100] = 'es-cl';
// Spanish (Colombia)
//$GLOBALS['Languages'][101] = 'es-co';
// Spanish (Costa Rica)
//$GLOBALS['Languages'][102] = 'es-cr';
// Spanish (Dominican Republic)
//$GLOBALS['Languages'][103] = 'es-do';
// Spanish (Ecuador)
//$GLOBALS['Languages'][104] = 'es-ec';
// Spanish (El Salvador)
//$GLOBALS['Languages'][105] = 'es-sv';
// Spanish (Guatemala)
//$GLOBALS['Languages'][106] = 'es-gt';
// Spanish (Honduras)
//$GLOBALS['Languages'][107] = 'es-hn';
// Spanish (Mexico)
//$GLOBALS['Languages'][108] = 'es-mx';
// Spanish (Nicaragua)
//$GLOBALS['Languages'][109] = 'es-ni';
// Spanish (Panama)
//$GLOBALS['Languages'][110] = 'es-pa';
// Spanish (Paraguay)
//$GLOBALS['Languages'][111] = 'es-py';
// Spanish (Peru)
//$GLOBALS['Languages'][112] = 'es-pe';
// Spanish (Puerto Rico)
//$GLOBALS['Languages'][113] = 'es-pr';
// Spanish (Spain)
//$GLOBALS['Languages'][114] = 'es-es';
// Spanish (Uruguay)
//$GLOBALS['Languages'][115] = 'es-uy';
// Spanish (Venezula)
//$GLOBALS['Languages'][116] = 'es-va';
// Swedish
//$GLOBALS['Languages'][117] = 'sv';
// Swedish (Finland)
//$GLOBALS['Languages'][118] = 'sv-fi';
// Thai
//$GLOBALS['Languages'][119] = 'th';
// Turkish
//$GLOBALS['Languages'][120] = 'tr';
// Ukrainian
//$GLOBALS['Languages'][121] = 'uk';
// Vietnamese
//$GLOBALS['Languages'][122] = 'vi';
// Welsh
//$GLOBALS['Languages'][123] = 'cy';
// Xhosa
//$GLOBALS['Languages'][124] = 'xh';
// Yiddish
//$GLOBALS['Languages'][125] = 'yi';
// Zulu
//$GLOBALS['Languages'][126] = 'zu';

?>