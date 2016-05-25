/*
 * +----------------------------------------------------------------------+
 * | PDMWeb version Cadmus                                                |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2002-2004 PDMWeb                                       |
 * +----------------------------------------------------------------------+
 * | This program is free software; you can redistribute it and/or modify |
 * | it under the terms of the GNU General Public License as published by |
 * | the Free Software Foundation; either version 2 of the License, or    |
 * | (at your option) any later version.                                  |
 * |                                                                      |
 * | This program is distributed in the hope that it will be useful,      |
 * | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
 * | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        |
 * | GNU General Public License for more details.                         |
 * |                                                                      |
 * | You should have received a copy of the GNU General Public License    |
 * | along with this program; if not, write to the Free Software          |
 * | Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.            |
 * +----------------------------------------------------------------------+
 * | Authors: David Merritt <merritdc@users.sourceforge.net>              |
 * +----------------------------------------------------------------------+
 *
 * CVS Log Info:
 *   $Log: install_pw_blocks.sql,v $
 *   Revision 1.8  2004/03/02 17:23:42  merritdc
 *   Fixed bug in install
 *
 *   Revision 1.7  2004/02/18 13:28:44  merritdc
 *   Modified block locations
 *
 *   Revision 1.6  2004/02/09 18:00:01  merritdc
 *   Daily updates
 *
 *   Revision 1.5  2004/02/06 15:40:22  merritdc
 *   Daily updates
 *
 */

INSERT INTO {DATABASE_PREFIX}blocks
    ( page_location, position, module, block, login_state, active )
VALUES
    ( "Footer",       0, "PW-Core",      "footer.php",    1, 1 ),
    ( "HeaderCenter", 0, "PW-Core",      "blank.php",     1, 0 ),
    ( "HeaderLeft",   0, "PW-Core",      "logo.php",      1, 1 ),
    ( "HeaderRight",  0, "PW-Core",      "language.php",  0, 1 ),
    ( "HeaderRight",  0, "PW-Core",      "user.php",      2, 1 ),
    ( "MainTop",      0, "PW-Core",      "blank.php",     0, 1 ),
    ( "MainTop",      0, "PW-Core",      "blank.php",     2, 0 ),
    ( "MainBottom",   0, "PW-Motd",      "cartoon.php",   0, 1 ),
    ( "MainBottom",   0, "PW-Core",      "blank.php",     2, 1 ),
    ( "MarginLeft",   0, "PW-Core",      "login.php",     0, 1 ),
    ( "MarginLeft",   0, "PW-Search",    "search.php",    2, 1 ),
    ( "MarginLeft",   1, "PW-Search",    "recent.php",    2, 1 ),
    ( "MarginLeft",   2, "PW-Menu",      "menu.php",      2, 1 ),
    ( "MarginRight",  0, "PW-Tasks",     "tasklist.php",  2, 1 ),
    ( "MarginRight",  1, "PW-Watches",   "watchlist.php", 2, 1 ),
    ( "MarginRight",  2, "PW-Sets",      "setlist.php",   2, 1 );