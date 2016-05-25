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
 *   $Log: install_pw_objects.sql,v $
 *   Revision 1.4  2004/02/12 16:07:46  merritdc
 *   Reomved roles from the base install
 *
 *   Revision 1.3  2004/02/11 22:15:14  merritdc
 *   Daily updates
 *
 *   Revision 1.2  2004/02/09 18:00:01  merritdc
 *   Daily updates
 *
 *   Revision 1.1  2004/02/06 15:39:04  merritdc
 *   Added SQL install files
 *
 */

INSERT INTO {DATABASE_PREFIX}objects
    ( tsid, type, name, description, icon, hidden )
VALUES
    ( {TSID_USER_ADMIN}, "user", "pdmweb", "PDMWeb administrator", "user.gif", 1 ),
    ( {TSID_USER_GUEST}, "user", "guest",  "Guest account",        "user.gif", 0 );