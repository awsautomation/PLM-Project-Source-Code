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
 *   $Log: install_pw_users.sql,v $
 *   Revision 1.6  2004/03/02 17:25:09  merritdc
 *   Added additional fields
 *
 *   Revision 1.5  2004/02/18 13:29:06  merritdc
 *   Updated guest email to match admin email address
 *
 */

INSERT INTO {DATABASE_PREFIX}users
    ( tsid, first_name, last_name, password, email, hint, style, language, timezone, avatar, admin, active )
VALUES
    ( {TSID_USER_ADMIN}, "PDMWeb", "Administrator", "1465cb328b5b3e8f077697da49ea1e4c", "{PWINSTALL_EMAIL_VALUE}", "", "default", "{LANG_DEFAULT}", "{TIMEZONE_DEFAULT}", "", 1, 1),
    ( {TSID_USER_GUEST}, "PDMWeb", "Guest",         "084e0343a0486ff05530df6c705c8bb4", "{PWINSTALL_EMAIL_VALUE}", "", "default", "{LANG_DEFAULT}", "{TIMEZONE_DEFAULT}", "", 0, 1);