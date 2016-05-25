<?php
//
// +----------------------------------------------------------------------+
// | PDMWeb version Cadmus                                                |
// +----------------------------------------------------------------------+
// | Copyright (c) 2002-2004 PDMWeb                                       |
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
//   $Log: languages.php,v $
//   Revision 1.1  2004/01/27 19:24:47  merritdc
//   Added install language files
//
//   Revision 1.1.1.1  2004/01/16 15:24:39  merritdc
//   Initial release of Cadmus files
//
//

###########################################################################
#
# Name: languages.php
#
# Method: called from the language blcoj
#
# Description: used to set the values for the languages displayed in the
# language select options
#
###########################################################################

//
// Check the hacking bit and if not set die the program
//
if (! defined('IN_PDMWEB') )
{
    die('Hacking attempt!');
}


$GLOBALS['Lang']['PWINSTALL_LANG_BLURB'] = 'Select your install and site-wide default language.';

//
// set the language variables
//
$GLOBALS['LanguageName']['af']    = 'Afrikaans';
$GLOBALS['LanguageName']['sq']    = 'Albanian';
$GLOBALS['LanguageName']['ar']    = 'Arabic';
$GLOBALS['LanguageName']['ar-dz'] = 'Arabic (Algeria)';
$GLOBALS['LanguageName']['ar-bh'] = 'Arabic (Bahrain)';
$GLOBALS['LanguageName']['ar-eg'] = 'Arabic (Egypt)';
$GLOBALS['LanguageName']['ar-iq'] = 'Arabic (Iraq)';
$GLOBALS['LanguageName']['ar-kw'] = 'Arabic (Kuwait)';
$GLOBALS['LanguageName']['ar-lb'] = 'Arabic (Lebanon)';
$GLOBALS['LanguageName']['ar-ly'] = 'Arabic (Libya)';
$GLOBALS['LanguageName']['ar-ma'] = 'Arabic (Morocco)';
$GLOBALS['LanguageName']['ar-om'] = 'Arabic (Oman)';
$GLOBALS['LanguageName']['ar-qa'] = 'Arabic (Qatar)';
$GLOBALS['LanguageName']['ar-sa'] = 'Arabic (Saudi Arabia)';
$GLOBALS['LanguageName']['ar-sy'] = 'Arabic (Syria)';
$GLOBALS['LanguageName']['ar-tn'] = 'Arabic (Tunisia)';
$GLOBALS['LanguageName']['ar-ae'] = 'Arabic (U.A.E.)';
$GLOBALS['LanguageName']['ar-ye'] = 'Arabic (Yemen)';
$GLOBALS['LanguageName']['hy']    = 'Armenian';
$GLOBALS['LanguageName']['ast']   = 'Asturian';
$GLOBALS['LanguageName']['eu']    = 'Basque';
$GLOBALS['LanguageName']['be']    = 'Belarusian';
$GLOBALS['LanguageName']['bs']    = 'Bosnian';
$GLOBALS['LanguageName']['bg']    = 'Bulgarian';
$GLOBALS['LanguageName']['ca']    = 'Catalan';
$GLOBALS['LanguageName']['zh']    = 'Chinese';
$GLOBALS['LanguageName']['zh-cn'] = 'Chinese (China)';
$GLOBALS['LanguageName']['zh-hk'] = 'Chinese (Hong Kong)';
$GLOBALS['LanguageName']['zh-sg'] = 'Chinese (Singapore)';
$GLOBALS['LanguageName']['zh-tw'] = 'Chinese (Taiwan)';
$GLOBALS['LanguageName']['hr']    = 'Croatian';
$GLOBALS['LanguageName']['cs']    = 'Czech';
$GLOBALS['LanguageName']['da']    = 'Danish';
$GLOBALS['LanguageName']['nl']    = 'Dutch';
$GLOBALS['LanguageName']['nl-be'] = 'Dutch (Belgium)';
$GLOBALS['LanguageName']['en']    = 'English';
$GLOBALS['LanguageName']['en-au'] = 'English (Australia)';
$GLOBALS['LanguageName']['en-bz'] = 'English (Belize)';
$GLOBALS['LanguageName']['en-ca'] = 'English (Canada)';
$GLOBALS['LanguageName']['en-ie'] = 'English (Ireland)';
$GLOBALS['LanguageName']['en-jm'] = 'English (Jamaica)';
$GLOBALS['LanguageName']['en-nz'] = 'English (New Zeland)';
$GLOBALS['LanguageName']['en-ph'] = 'English (Philippines)';
$GLOBALS['LanguageName']['en-za'] = 'English (South Africa)';
$GLOBALS['LanguageName']['en-tt'] = 'English (Trinidad)';
$GLOBALS['LanguageName']['en-gb'] = 'English (United Kingdom)';
$GLOBALS['LanguageName']['en-us'] = 'English (United States)';
$GLOBALS['LanguageName']['en-zw'] = 'English (Zimbabwe)';
$GLOBALS['LanguageName']['eo']    = 'Esperanto';
$GLOBALS['LanguageName']['et']    = 'Estonian';
$GLOBALS['LanguageName']['fo']    = 'Faeroese';
$GLOBALS['LanguageName']['fi']    = 'Finnish';
$GLOBALS['LanguageName']['fr']    = 'French';
$GLOBALS['LanguageName']['fr-be'] = 'French (Belgium)';
$GLOBALS['LanguageName']['fr-ca'] = 'French (Canada)';
$GLOBALS['LanguageName']['fr-fr'] = 'French (France)';
$GLOBALS['LanguageName']['fr-lu'] = 'French (Luxembourg)';
$GLOBALS['LanguageName']['fr-mc'] = 'French (Monaco)';
$GLOBALS['LanguageName']['fr-ch'] = 'French (Switzerland)';
$GLOBALS['LanguageName']['gl']    = 'Galician';
$GLOBALS['LanguageName']['ka']    = 'Georgian';
$GLOBALS['LanguageName']['de']    = 'German';
$GLOBALS['LanguageName']['de-at'] = 'German (Austria)';
$GLOBALS['LanguageName']['de-de'] = 'German (Germany)';
$GLOBALS['LanguageName']['de-li'] = 'German (Liechtenstein)';
$GLOBALS['LanguageName']['de-lu'] = 'German (Luxembourg)';
$GLOBALS['LanguageName']['de-ch'] = 'German (Switzerland)';
$GLOBALS['LanguageName']['el']    = 'Greek';
$GLOBALS['LanguageName']['he']    = 'Hebrew';
$GLOBALS['LanguageName']['hu']    = 'Hungarian';
$GLOBALS['LanguageName']['is']    = 'Icelandic';
$GLOBALS['LanguageName']['id']    = 'Indonesian';
$GLOBALS['LanguageName']['in']    = 'Indonesian';
$GLOBALS['LanguageName']['ga']    = 'Irish';
$GLOBALS['LanguageName']['it']    = 'Italian';
$GLOBALS['LanguageName']['it-ch'] = 'Italian (Switzerland)';
$GLOBALS['LanguageName']['ja']    = 'Japanese';
$GLOBALS['LanguageName']['ko']    = 'Korean';
$GLOBALS['LanguageName']['ko-kp'] = 'Korean (North Korea)';
$GLOBALS['LanguageName']['ko-kr'] = 'Korean (South Korea)';
$GLOBALS['LanguageName']['lv']    = 'Latvian';
$GLOBALS['LanguageName']['lt']    = 'Lithuanian';
$GLOBALS['LanguageName']['mk-mk'] = 'Macedonian (Macedonia, F.Y.R. of)';
$GLOBALS['LanguageName']['ms']    = 'Malay';
$GLOBALS['LanguageName']['no']    = 'Norwegian';
$GLOBALS['LanguageName']['nb']    = 'Norwegian Bokmål';
$GLOBALS['LanguageName']['nn']    = 'Norwegian Nynorsk';
$GLOBALS['LanguageName']['pl']    = 'Polish';
$GLOBALS['LanguageName']['pt']    = 'Portuguese';
$GLOBALS['LanguageName']['pt-bz'] = 'Portuguese';
$GLOBALS['LanguageName']['ro']    = 'Romanian';
$GLOBALS['LanguageName']['ru']    = 'Russian';
$GLOBALS['LanguageName']['gd']    = 'Scots Gaelic';
$GLOBALS['LanguageName']['sr']    = 'Serbian';
$GLOBALS['LanguageName']['sk']    = 'Slovak';
$GLOBALS['LanguageName']['sl']    = 'Slovenian';
$GLOBALS['LanguageName']['sb']    = 'Sorbian';
$GLOBALS['LanguageName']['es']    = 'Spanish';
$GLOBALS['LanguageName']['es-ar'] = 'Spanish (Argentina)';
$GLOBALS['LanguageName']['es-bo'] = 'Spanish (Bolivia)';
$GLOBALS['LanguageName']['es-cl'] = 'Spanish (Chile)';
$GLOBALS['LanguageName']['es-co'] = 'Spanish (Colombia)';
$GLOBALS['LanguageName']['es-cr'] = 'Spanish (Costa Rica)';
$GLOBALS['LanguageName']['es-do'] = 'Spanish (Dominican Republic)';
$GLOBALS['LanguageName']['es-ec'] = 'Spanish (Ecuador)';
$GLOBALS['LanguageName']['es-sv'] = 'Spanish (El Salvador)';
$GLOBALS['LanguageName']['es-gt'] = 'Spanish (Guatemala)';
$GLOBALS['LanguageName']['es-hn'] = 'Spanish (Honduras)';
$GLOBALS['LanguageName']['es-mx'] = 'Spanish (Mexico)';
$GLOBALS['LanguageName']['es-ni'] = 'Spanish (Nicaragua)';
$GLOBALS['LanguageName']['es-pa'] = 'Spanish (Panama)';
$GLOBALS['LanguageName']['es-py'] = 'Spanish (Paraguay)';
$GLOBALS['LanguageName']['es-pe'] = 'Spanish (Peru)';
$GLOBALS['LanguageName']['es-pr'] = 'Spanish (Puerto Rico)';
$GLOBALS['LanguageName']['es-es'] = 'Spanish (Spain)';
$GLOBALS['LanguageName']['es-uy'] = 'Spanish (Uruguay)';
$GLOBALS['LanguageName']['es-va'] = 'Spanish (Venezula)';
$GLOBALS['LanguageName']['sv']    = 'Swedish';
$GLOBALS['LanguageName']['sv-fi'] = 'Swedish (Finland)';
$GLOBALS['LanguageName']['th']    = 'Thai';
$GLOBALS['LanguageName']['tr']    = 'Turkish';
$GLOBALS['LanguageName']['uk']    = 'Ukrainian';
$GLOBALS['LanguageName']['vi']    = 'Vietnamese';
$GLOBALS['LanguageName']['cy']    = 'Welsh';
$GLOBALS['LanguageName']['xh']    = 'Xhosa';
$GLOBALS['LanguageName']['yi']    = 'Yiddish';
$GLOBALS['LanguageName']['zu']    = 'Zulu';

?>