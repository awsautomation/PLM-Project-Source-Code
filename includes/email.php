<?
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
//   $Log: email.php,v $
//   Revision 1.2  2004/02/17 23:33:08  merritdc
//   Daily updates
//
//   Revision 1.1  2004/01/21 20:19:02  merritdc
//   Daily updates
//
//

###########################################################################
#
# Name: email.php
#
# Method: called when the web server processes a request to display the
# default index file
#
# Description: to prevent the web server providing a list of files in a
# directory when the directoy index file hasn't been configured on the web
# server this will redirect the browser up one directory
#
###########################################################################



/**************************************************************************
 * Sends an email message.  The address fields From, Cc, Bcc must use
 * either "full name <email>" or "email".  Multiple names must be seperated
 * by a comma i.e. "email1,email2".  The To field can only be of the form
 * "email".  However, if you wish to add a full name to the To, you can set
 * this with the additional headers of the mail() function.  If the
 * constant EMAIL_XHTML is true then the email header will be modified to
 * allow sending xhtml content in the body of the email.
 *
 * @param   string   $Email['Template']  Email template file name.
 * @param   string   $Email['Subject']   Subject line for email.
 * @param   string   $Email['Message']   Body of email.
 * @param   string   $Email['To']        Email address to send the mail to.
 * @param   string   $Email['ToName']    Full name of who to send the email to.
 * @param   string   $Email['From']      (optional) Return address of the
 *                                       sender.  If blank will use the default
 *                                       email address in the config file.
 * @param   string   $Email['Cc']        (optional) Who to carbon copy the
 *                                       email to.
 * @param   string   $Email['Bcc']       (optional) Who to blind carbon copy
 *                                       the email to.
 * @param   integer  $Email['Priority']  (optional) Priority of email. 1 is
 *                                       high, 3 is normal, 5 is low. Defaults
 *                                       to 3.
 * @return  boolean
 */
function Email_SendEmail($Email)
{
    $Email['Message'] = Email_CreateEmail($Email['Template']);

    $Error['Header'] = "MIME-Version: 1.0\r\n";

    if ( EMAIL_XHTML )
    {
        $Error['Header'] = $Error['Header'] . "Content-type: text/html; charset=iso-8859-1\r\n";
    }
    else
    {
        $Error['Header'] = $Error['Header'] . "Content-type: text/plain; charset=iso-8859-1\r\n";
    }

    if (! empty($Email['ToName']) )
    {
        $Error['Header'] = $Error['Header'] . 'To: ' .  $Email['ToName'] . ' <' . $Email['To'] . '>' . "\r\n";
    }

    if ( empty($Email['From']) )
    {
        $Email['From'] = ADMIN_FULLNAME . ' <' . EMAIL_ADMIN . '>';
    }

    $Error['Header'] = $Error['Header'] . 'From: ' .  $Email['From'] . "\r\n";
    $Error['Header'] = $Error['Header'] . 'Reply-To: ' .  $Email['From'] . "\r\n";

    if ( empty($Email['Priority']) )
    {
        $Error['Header'] = $Error['Header'] . 'X-Priority: ' . "3\r\n";
    }
    else
    {
        $Error['Header'] = $Error['Header'] . 'X-Priority: ' . $Email['Priority'] . "\r\n";
    }

    if (! empty($Email['Cc']) )
    {
        $Error['Header'] = $Error['Header'] . 'Cc: ' . $Email['Cc'] . "\r\n";
    }

    if (! empty($Email['Bcc']) )
    {
        $Error['Header'] = $Error['Header'] . 'Bcc: ' . $Email['Bcc'] . "\r\n";
    }

    if (! @mail($Email['To'], $Email['Subject'], $Email['Message'], $Error['Header']) )
    {
        return(FALSE);
    }
    else
    {
        return(TRUE);
    }
}


//
// sets the full path name for the email template file and checks if the
// template file exists
//
function Email_TemplateLocation($BaseFile)
{
    $TemplateFile = PWUSER_DIRECTORY . TEMPLATE_PATH . EMAIL_DIRECTORY;

    if ( EMAIL_XHTML )
    {
        $TemplateFile = $TemplateFile . EMAIL_XHTML_DIRECTORY;
    }
    else
    {
        $TemplateFile = $TemplateFile . EMAIL_TEXT_DIRECTORY;
    }

    $TemplateFile = $TemplateFile . $BaseFile;

    if (! file_exists($TemplateFile) )
    {
        die('Template_SetTemplateLocation(): Error - cannot find file * ' . $TemplateFile . '*!');
    }

    return($TemplateFile);
}


//
// reads in the contents of the template file
//
function Email_CreateEmail($TemplateFile)
{
    $TemplateFile = Email_TemplateLocation($TemplateFile);

    if ( $TemplatePointer = @fopen($TemplateFile, 'r') )
    {
        $Template = fread($TemplatePointer, filesize($TemplateFile));
        fclose($TemplatePointer);
    }
    else
    {
        die('Template_OpenTemplateFile(): Error - cannot open file * ' . $TemplateFile . '*!');
    }

    return(Template_ReplaceMarkers($Template, $GLOBALS['MarkerValues']));
}


/**************************************************************************
 * Validates an email address to confirm if it is of the correct format.
 * This is from Clay Loveless <clay@killersoft.com> who's program is below
 * in it's entirety.
 *
 * @param   string   $email  email address to validate
 * @return  boolean
 */
////////////////////////////////////////////////////////////////////////
//
// validateEmailFormat.php - v 1.0
//
// PHP translation of Email Regex Program (optimized)
// Derived from:
//   Appendix B - Email Regex Program
//   _Mastering Regular Expressions_ (First Edition, May 1997 revision)
//     by Jeffrey E.F. Friedl
//     Copyright 1997 O'Reilly & Associates
//     ISBN: 1-56592-257-3
//   For more info on this title, see:
//     http://www.oreilly.com/catalog/regex/
//   For original perl version, see:
//     http://examples.oreilly.com/regex/
//
// Follows RFC 822 about as close as is possible.
// http://www.faqs.org/rfcs/rfc822.html
//
//
// DESCRIPTION:
//  bool validateEmailFormat ( string string )
//
//  Returns TRUE if the email address passed is in a valid format
//  according to RFC 822, returns FALSE if email address passed
//  is not in a valid format.
//
// EXAMPLES:
//  Example #1:
//  $email = "Jeffy <\"That Tall Guy\"@foo.com (blah blah blah)";
//  $isValid = validateEmailFormat($email);
//  if($isValid) {
//    ...  // Yes, the above address is a valid format!
//  } else {
//    echo "sorry, that address isn't formatted properly.";
//  }
//
//  Example #2:
//  $email = "foo@bar.co.il";
//  $isValid = validateEmailFormat($email);
//  if($isValid) {
//    ...
//  } else {
//    echo "sorry ...";
//  }
//
// Translated by Clay Loveless <clay@killersoft.com> on March 11, 2002
// ... in hopes that the "here's how to check an e-mail address!"
// discussion can finally end. After all ...
//
//       Friedl is the master -- Hail to the King, baby!
//
////////////////////////////////////////////////////////////////////////
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
//
// Hell, it might not even work for you.
//
// By using this code you agree to indemnify Clay Loveless,
// KillerSoft, and Crawlspace, Inc. from any liability that might
// arise from its use.
//
// Have fun!
//
////////////////////////////////////////////////////////////////////////
function Email_ValidateAddress($email)
{

    // Some shortcuts for avoiding backslashitis
    $esc        = '\\\\';               $Period      = '\.';
    $space      = '\040';               $tab         = '\t';
    $OpenBR     = '\[';                 $CloseBR     = '\]';
    $OpenParen  = '\(';                 $CloseParen  = '\)';
    $NonASCII   = '\x80-\xff';          $ctrl        = '\000-\037';
    $CRlist     = '\n\015';  // note: this should really be only \015.

    // Items 19, 20, 21 -- see table on page 295 of 'Mastering Regular Expressions'
    $qtext = "[^$esc$NonASCII$CRlist\"]";               // for within "..."
    $dtext = "[^$esc$NonASCII$CRlist$OpenBR$CloseBR]";  // for within [...]
    $quoted_pair = " $esc [^$NonASCII] ";   // an escaped character

    // *********************************************
    // Items 22 and 23, comment.
    // Impossible to do properly with a regex, I make do by allowing at most
    // one level of nesting.
    $ctext = " [^$esc$NonASCII$CRlist()] ";

    // $Cnested matches one non-nested comment.
    // It is unrolled, with normal of $ctext, special of $quoted_pair.
    $Cnested = "";
        $Cnested .= "$OpenParen";                   // (
        $Cnested .= "$ctext*";                      //    normal*
        $Cnested .= "(?: $quoted_pair $ctext* )*";  //    (special normal*)*
        $Cnested .= "$CloseParen";                  //                      )

    // $comment allows one level of nested parentheses
    // It is unrolled, with normal of $ctext, special of ($quoted_pair|$Cnested)
    $comment = "";
        $comment .= "$OpenParen";                       //  (
        $comment .= "$ctext*";                          //     normal*
        $comment .= "(?:";                              //       (
        $comment .= "(?: $quoted_pair | $Cnested )";    //         special
        $comment .= "$ctext*";                          //         normal*
        $comment .= ")*";                               //            )*
        $comment .= "$CloseParen";                      //                )

    // *********************************************
    // $X is optional whitespace/comments
    $X = "";
        $X .= "[$space$tab]*";                  // Nab whitespace
        $X .= "(?: $comment [$space$tab]* )*";  // If comment found, allow more spaces


    // Item 10: atom
    $atom_char = "[^($space)<>\@,;:\".$esc$OpenBR$CloseBR$ctrl$NonASCII]";
    $atom = "";
        $atom .= "$atom_char+";     // some number of atom characters ...
        $atom .= "(?!$atom_char)";  // ... not followed by something that
                                    //     could be part of an atom

    // Item 11: doublequoted string, unrolled.
    $quoted_str = "";
        $quoted_str .= "\"";                            // "
        $quoted_str .= "$qtext *";                      //   normal
        $quoted_str .= "(?: $quoted_pair $qtext * )*";  //   ( special normal* )*
        $quoted_str .= "\"";                            //        "


    // Item 7: word is an atom or quoted string
    $word = "";
        $word .= "(?:";
        $word .= "$atom";       // Atom
        $word .= "|";           // or
        $word .= "$quoted_str"; // Quoted string
        $word .= ")";

    // Item 12: domain-ref is just an atom
    $domain_ref = $atom;

    // Item 13: domain-literal is like a quoted string, but [...] instead of "..."
    $domain_lit = "";
        $domain_lit .= "$OpenBR";                       // [
        $domain_lit .= "(?: $dtext | $quoted_pair )*";  //   stuff
        $domain_lit .= "$CloseBR";                      //         ]

    // Item 9: sub-domain is a domain-ref or a domain-literal
    $sub_domain = "";
        $sub_domain .= "(?:";
        $sub_domain .= "$domain_ref";
        $sub_domain .= "|";
        $sub_domain .= "$domain_lit";
        $sub_domain .= ")";
        $sub_domain .= "$X"; // optional trailing comments

    // Item 6: domain is a list of subdomains separated by dots
    $domain = "";
        $domain .= "$sub_domain";
        $domain .= "(?:";
        $domain .= "$Period $X $sub_domain";
        $domain .= ")*";

    // Item 8: a route. A bunch of "@ $domain" separated by commas, followed by a colon.
    $route = "";
        $route .= "\@ $X $domain";
        $route .= "(?: , $X \@ $X $domain )*"; // additional domains
        $route .= ":";
        $route .= "$X"; // optional trailing comments

    // Item 5: local-part is a bunch of $word separated by periods
    $local_part = "";
        $local_part .= "$word $X";
        $local_part .= "(?:";
        $local_part .= "$Period $X $word $X"; // additional words
        $local_part .= ")*";

    // Item 2: addr-spec is local@domain
    $addr_spec = "$local_part \@ $X $domain";

    // Item 4: route-addr is <route? addr-spec>
    $route_addr = "";
        $route_addr .= "< $X";
        $route_addr .= "(?: $route )?"; // optional route
        $route_addr .= "$addr_spec";    // address spec
        $route_addr .= ">";

    // Item 3: phrase........
    $phrase_ctrl = '\000-\010\012-\037'; // like ctrl, but without tab

    // Like atom-char, but without listing space, and uses phrase_ctrl.
    // Since the class is negated, this matches the same as atom-char plus space and tab
    $phrase_char = "[^()<>\@,;:\".$esc$OpenBR$CloseBR$NonASCII$phrase_ctrl]";

    // We've worked it so that $word, $comment, and $quoted_str to not consume trailing $X
    // because we take care of it manually.
    $phrase = "";
        $phrase .= "$word";                         // leading word
        $phrase .= "$phrase_char *";                // "normal" atoms and/or spaces
        $phrase .= "(?:";
        $phrase .= "(?: $comment | $quoted_str )";  // "special" comment or quoted string
        $phrase .= "$phrase_char *";                //  more "normal"
        $phrase .= ")*";

    // Item 1: mailbox is an addr_spec or a phrase/route_addr
    $mailbox = "";
        $mailbox .= "$X";                   // optional leading comment
        $mailbox .= "(?:";
        $mailbox .= "$addr_spec";           // address
        $mailbox .= "|";                    // or
        $mailbox .= "$phrase  $route_addr"; // name and address
        $mailbox .= ")";

    // test it and return results
    $isValid = preg_match("/^$mailbox$/xS",$email);

    return($isValid);
}

?>