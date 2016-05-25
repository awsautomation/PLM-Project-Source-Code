
                        <form name="Stage1" method="post" action="{INSTALL_FILE}">
                            <table border="0" cellpadding="2" cellspacing="0" width="70%" summary="language options">
                                <col />
                                <col />
                                <thead>
                                    <tr>
                                        <td align="left" valign="middle" colspan="2">
                                            {PWINSTALL_LANG_BLURB}
                                            <br />
                                            <br />
                                        </td>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td align="center" valign="middle" colspan="2">
                                            <br />
                                            <input type="submit" name="Submit" value="{PWINSTALL_CONTINUE}" class="default_button" />
                                            <input type="hidden" name="Stage" value="Stage2" />
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td align="right" valign="middle" nowrap="nowrap">{PWINSTALL_SELECT_LANG}</td>
                                        <td align="left" valign="middle">
                                                <select name="InstallLanguage" size="1">
                                                    {PWINSTALL_LANG_OPTIONS}
                                                </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>