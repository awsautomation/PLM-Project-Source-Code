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
//   Revision 1.9  2004/03/02 22:27:06  merritdc
//   Added timezones to  config
//
//   Revision 1.8  2004/03/02 22:21:27  merritdc
//   Added timezones to  config
//

###########################################################################
#
# Name: config.php
#
# Method: called from the various module programs
#
# Description: used to set the values for any variables used in the module
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
// set the module name and location
//
define('PWCORE_NAME',      'PW-Core');
define('PWCORE_DIRECTORY', MODULE_DIRECTORY . PWCORE_NAME . '/');

//
// include the module language file
//
include_once(PWCORE_DIRECTORY . LANG_PATH);

//
// set any variables
//
define('PWCORE_COPYRIGHT_LINK', ROOT_PATH . INDEX_FILE . FILE_EXTENSION . '?Module=' . PWCORE_NAME . '&Load=copyright');
define('PWCORE_NEWUSER_LINK',   ROOT_PATH . INDEX_FILE . FILE_EXTENSION . '?Module=' . 'PW-User' . '&Load=new_user');
define('PWCORE_REMINDER_LINK',  ROOT_PATH . INDEX_FILE . FILE_EXTENSION . '?Module=' . 'PW-User' . '&Load=reminder');
define('PWCORE_PROFILE_LINK',   ROOT_PATH . INDEX_FILE . FILE_EXTENSION . '?Module=' . 'PW-User' . '&Load=profile');
define('PWCORE_LOGOFF_LINK',    ROOT_PATH . INDEX_FILE . FILE_EXTENSION . '?Module=' . PWCORE_NAME . '&Load=logoff');
define('PWCORE_TERMS_LINK',     ROOT_PATH . INDEX_FILE . FILE_EXTENSION . '?Module=' . PWCORE_NAME . '&Load=terms');
define('PWCORE_PRIVACY_LINK',   ROOT_PATH . INDEX_FILE . FILE_EXTENSION . '?Module=' . PWCORE_NAME . '&Load=privacy');
define('PWCORE_DOC_LINK',       PW_DOC_LINK . '?Book=' . PWCORE_NAME . '&Chapter=');
define('PWCORE_LOGO_LINK',      ROOT_PATH);
define('PWCORE_LOGO_GIF',       PWCORE_DIRECTORY . TEMPLATE_PATH . IMAGE_DIRECTORY . 'pdmweb_logo.png');

//
// set the language marker variables
//
$GLOBALS['MarkerValues']['INDEX_FILE']      = ROOT_PATH . INDEX_FILE . FILE_EXTENSION;
$GLOBALS['MarkerValues']['PWCORE_DOC_LINK'] = PWCORE_DOC_LINK;

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
//$GLOBALS['Languages'][45] = 'en-gb';
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

//
// Timezone offsets.
//
$GLOBALS['TimeZone'][0]  = -12;
$GLOBALS['TimeZone'][1]  = -11;
$GLOBALS['TimeZone'][2]  = -10;
$GLOBALS['TimeZone'][3]  = -9;
$GLOBALS['TimeZone'][4]  = -8;
$GLOBALS['TimeZone'][5]  = -7;
$GLOBALS['TimeZone'][6]  = -7;
$GLOBALS['TimeZone'][7]  = -6;
$GLOBALS['TimeZone'][8]  = -6;
$GLOBALS['TimeZone'][9]  = -6;
$GLOBALS['TimeZone'][10] = -6;
$GLOBALS['TimeZone'][11] = -5;
$GLOBALS['TimeZone'][12] = -5;
$GLOBALS['TimeZone'][13] = -5;
$GLOBALS['TimeZone'][14] = -4;
$GLOBALS['TimeZone'][15] = -4;
$GLOBALS['TimeZone'][16] = -4;
$GLOBALS['TimeZone'][17] = -3.5;
$GLOBALS['TimeZone'][18] = -3;
$GLOBALS['TimeZone'][19] = -3;
$GLOBALS['TimeZone'][20] = -3;
$GLOBALS['TimeZone'][21] = -2;
$GLOBALS['TimeZone'][22] = -1;
$GLOBALS['TimeZone'][23] = -1;
$GLOBALS['TimeZone'][24] = 0;
$GLOBALS['TimeZone'][25] = 0;
$GLOBALS['TimeZone'][26] = 1;
$GLOBALS['TimeZone'][27] = 1;
$GLOBALS['TimeZone'][28] = 1;
$GLOBALS['TimeZone'][29] = 1;
$GLOBALS['TimeZone'][30] = 1;
$GLOBALS['TimeZone'][31] = 2;
$GLOBALS['TimeZone'][32] = 2;
$GLOBALS['TimeZone'][33] = 2;
$GLOBALS['TimeZone'][34] = 2;
$GLOBALS['TimeZone'][35] = 2;
$GLOBALS['TimeZone'][36] = 2;
$GLOBALS['TimeZone'][37] = 3;
$GLOBALS['TimeZone'][38] = 3;
$GLOBALS['TimeZone'][39] = 3;
$GLOBALS['TimeZone'][40] = 3;
$GLOBALS['TimeZone'][41] = 3.5;
$GLOBALS['TimeZone'][42] = 4;
$GLOBALS['TimeZone'][43] = 4;
$GLOBALS['TimeZone'][44] = 4.5;
$GLOBALS['TimeZone'][45] = 5;
$GLOBALS['TimeZone'][46] = 5;
$GLOBALS['TimeZone'][47] = 5.5;
$GLOBALS['TimeZone'][48] = 5.75;
$GLOBALS['TimeZone'][49] = 6;
$GLOBALS['TimeZone'][50] = 6;
$GLOBALS['TimeZone'][51] = 6;
$GLOBALS['TimeZone'][52] = 6.5;
$GLOBALS['TimeZone'][53] = 7;
$GLOBALS['TimeZone'][54] = 7;
$GLOBALS['TimeZone'][55] = 8;
$GLOBALS['TimeZone'][56] = 8;
$GLOBALS['TimeZone'][57] = 8;
$GLOBALS['TimeZone'][58] = 8;
$GLOBALS['TimeZone'][59] = 8;
$GLOBALS['TimeZone'][60] = 9;
$GLOBALS['TimeZone'][61] = 9;
$GLOBALS['TimeZone'][62] = 9;
$GLOBALS['TimeZone'][63] = 9.5;
$GLOBALS['TimeZone'][64] = 9.5;
$GLOBALS['TimeZone'][65] = 10;
$GLOBALS['TimeZone'][66] = 10;
$GLOBALS['TimeZone'][67] = 10;
$GLOBALS['TimeZone'][68] = 10;
$GLOBALS['TimeZone'][69] = 10;
$GLOBALS['TimeZone'][70] = 11;
$GLOBALS['TimeZone'][71] = 12;
$GLOBALS['TimeZone'][72] = 12;
$GLOBALS['TimeZone'][73] = 13;

?>