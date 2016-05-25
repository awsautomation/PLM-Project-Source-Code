
                        <script type="text/javascript" language="JavaScript">
                        //<![CDATA[
                            function Redirect()
                            {
                                location.href = "./";
                            }
                        //]]>
                        </script>
                        <form name="Stage5" method="post" action="{INSTALL_FILE}">
                            <table border="0" cellpadding="2" cellspacing="0" width="70%" summary="done">
                                <col />
                                <thead>
                                    <tr>
                                        <td align="left" valign="middle">
                                            {PWINSTALL_DONE_BLURB}
                                            <br />
                                            <br />
                                        </td>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td align="center" valign="middle">
                                            <br />
                                            <input type="button" name="Submit" value="{PWINSTALL_DONE}" onclick="Redirect();" class="default_button" />
                                            <input type="hidden" name="Stage" value="Stage6" />
                                            <input type="hidden" name="InstallLanguage" value="{PWINSTALL_LANGUAGE}" />
                                            <input type="hidden" name="Database[Hostname]" value="{PWINSTALL_HOSTNAME_VALUE}" />
                                            <input type="hidden" name="Database[Username]" value="{PWINSTALL_USERNAME_VALUE}" />
                                            <input type="hidden" name="Database[Password]" value="{PWINSTALL_PASSWORD_VALUE}" />
                                            <input type="hidden" name="Database[Database]" value="{PWINSTALL_DATABASE_VALUE}" />
                                            <input type="hidden" name="Database[Prefix]" value="{PWINSTALL_PREFIX_VALUE}" />
                                            <input type="hidden" name="Database[Type]" value="{PWINSTALL_TYPE_VALUE}" />
                                            <input type="hidden" name="InstallType" value="{PWINSTALL_INSTALL_VALUE}" />
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td align="left" valign="middle">
                                            {PWINSTALL_DONE_ERROR}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>