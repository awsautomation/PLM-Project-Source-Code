
                        <form name="Stage4" method="post" action="{INSTALL_FILE}">
                            <table border="0" cellpadding="2" cellspacing="0" width="70%" summary="install type">
                                <col />
                                <col />
                                <thead>
                                    <tr>
                                        <td align="left" valign="middle" colspan="2">
                                            {PWINSTALL_TYPE_BLURB}
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
                                            <input type="hidden" name="Stage" value="Stage5" />
                                            <input type="hidden" name="InstallLanguage" value="{PWINSTALL_LANGUAGE}" />
                                            <input type="hidden" name="Database[Hostname]" value="{PWINSTALL_HOSTNAME_VALUE}" />
                                            <input type="hidden" name="Database[Username]" value="{PWINSTALL_USERNAME_VALUE}" />
                                            <input type="hidden" name="Database[Password]" value="{PWINSTALL_PASSWORD_VALUE}" />
                                            <input type="hidden" name="Database[Database]" value="{PWINSTALL_DATABASE_VALUE}" />
                                            <input type="hidden" name="Database[Prefix]" value="{PWINSTALL_PREFIX_VALUE}" />
                                            <input type="hidden" name="Database[Type]" value="{PWINSTALL_TYPE_VALUE}" />
                                            <input type="hidden" name="Database[Email]" value="{PWINSTALL_EMAIL_VALUE}" />
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td align="right" valign="middle" width="50%">
                                            <input type="radio" name="InstallType" value="New" checked="checked" />
                                        </td>
                                        <td align="left" valign="middle" width="50%">
                                            {PWINSTALL_NEW}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="middle" width="50%">
                                            <input type="radio" name="InstallType" value="Upgrade" />
                                        </td>
                                        <td align="left" valign="middle" width="50%">
                                            {PWINSTALL_UPGRADE}
                                            <script type="text/javascript" language="JavaScript">
                                            //<![CDATA[
                                                document.forms[0].InstallType[1].disabled = {PWINSTALL_DISABLE};
                                            //]]>
                                            </script>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>