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
//   $Log: mysql.php,v $
//   Revision 1.4  2004/02/17 20:40:15  merritdc
//   Daily updates
//
//   Revision 1.3  2004/01/29 14:14:26  merritdc
//   Daily updates
//

###########################################################################
#
# Name: mysql.php
#
# Method: called from the database include file
#
# Description: contains any functions needed by all the modules to access
# and perform sql commands on a mysql database
#
###########################################################################

//
// Check the hacking bit and if not set die the program
//
if (! defined('IN_PDMWEB') )
{
    die('Hacking attempt!');
}


/**
 * Sets up the database DSN connection.  Will either return a valid
 * valid connection string if succesful false if cannot access
 * database for some reason
 *
 * @param   string  DATABASE_HOSTNAME  (required) Database server name
 * @param   string  DATABASE_TABLE     (required) Name of database table on server above to access
 * @param   string  DATABASE_USERNAME  (required) Username to access database above with
 * @param   string  DATABASE_PASSWORD  (required) Password of user above to access database
 * @return  mixed
 *
 */
function Database_Connect()
{
    $Connection = mysql_pconnect(DATABASE_HOSTNAME, DATABASE_USERNAME, $GLOBALS['DatabasePassword']);

    if ( $Connection && mysql_select_db(DATABASE_DATABASE) )
    {
        return($Connection);
    }
    else
    {
        //
        // Call the display javascript alertbox function.
        //
        $Error             = array();
        $Error['Type']     = 'System';
        $Error['ErrorId']  = 1001;
        $Error['ErrorOut'] = TRUE;
        Html_DisplayAlert($Error);

        return(FALSE);
    }
}

/**
 * Executes a SQL command other than a select command.  Calls the
 * databse connect function, executes the SQL command, and returns
 * true if successfully executed or false if unsuccessful
 *
 * @param   string  $Sql['Query']  (required) Sql string to execute other than select
 * @param   int     $Sql['Error']  (optional) System error code to display
 * @return  boolean
 *
 */
function Database_SqlExecute($Sql)
{
    //
    // Verify the required variables exist first or die page with
    // an obnoxious system error.
    //
    if ( empty($Sql['Query']) )
    {
        Html_SystemDie();
    }

    if (! Database_Connect() )
    {
        return(FALSE);
    }
    else
    {
        if (! mysql_query($Sql['Query']) )
        {
            //
            // Call the display javascript alertbox function.
            //
            $Error            = array();
            $Error['Type']    = 'System';
            if ( empty($Sql['Error']) )
            {
                $Error['ErrorId'] = 1002;
            }
            else
            {
                $Error['ErrorId'] = $Sql['Error'];
            }
            Html_DisplayAlert($Error);

            return(FALSE);
        }
        else
        {
            return(TRUE);
        }
    }
}

/**
 * Executes a SQL select command.  Calls the database connect function,
 * executes the SQL select command, and returns false if unsuccessful,
 * null if no match, or an array of the SQL results if matches found.
 *
 * @param   string  $Sql['Query']  (required) Sql string to execute other than select
 * @param   int     $Sql['Error']  (optional) System error code to display
 * @return  mixed
 *
 */
function Database_SqlSelect($Sql)
{
    //
    // Verify the required variables exist first or die page with
    // an obnoxious system error.
    //
    if ( empty($Sql['Query']) )
    {
        Html_SystemDie();
    }

    if (! Database_Connect() )
    {
        return(FALSE);
    }
    else
    {
        $SqlResult = mysql_query($Sql['Query']);

        if (! $SqlResult)
        {
            $Error = array();
            $Error['Type']    = 'System';
            if ( empty($Sql['Error']) )
            {
                $Error['ErrorId'] = 1006;
            }
            else
            {
                $Error['ErrorId'] = $Sql['Error'];
            }
            //Html_DisplayAlert($Error);
            //echo $Error['ErrorId'];

            return(FALSE);
        }
        elseif (mysql_num_rows ($SqlResult) == 0)
        {
            return(NULL);
        }
        else
        {
            $QueryResults = array();

            while ($SqlRow = mysql_fetch_array($SqlResult, MYSQL_NUM))
            {
                $QueryResults[] = $SqlRow;
            }
            return($QueryResults);
        }
    }
}

/**
 * Inserts the object operation into the history table, returns true if sql
 * insert is successful, false if fails.  Operation defaults to Modify, can be
 * Create, Delete
 *
 * @param   string   $Sql['Query']  (required) Sql string to execute other than select
 * @param   string   $Operation     (optional) Database operation type, defaults to modify
 * @return  boolean
 *
 */
function Database_ObjectHistory($Tsid, $Operation = 'Modify')
{
    $Sql['Query'] = 'INSERT INTO ' . DATABASE_PREFIX . 'history
                     (
                        tsid, datestamp, userid, modification
                     )
                     VALUES
                     (' .
                        $Tsid . ', ' .
                        gmdate('YmdHis', substr($Tsid, 0, -6)) . ', ' .
                        $Tsid . ',
                        "{LANG_HISTORY_' . strtoupper($Operation) . '}"
                     )';

    $QueryResults = Database_SqlExecute($Sql);
    return($QueryResults);
}

?>