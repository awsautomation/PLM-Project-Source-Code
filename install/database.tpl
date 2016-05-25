
                        <script type="text/javascript" language="JavaScript">
                        //<![CDATA[
                            function CheckFields()
                            {
                                if (document.forms[0].elements[3].value == "")
                                {
                                    alert("3{PWINSTALL_DATABASE_ERROR}");
                                }
                                else if (document.forms[0].elements[4].value == "")
                                {
                                    alert("{PWINSTALL_DATABASE_ERROR}");
                                }
                                else if (document.forms[0].elements[5].value == "")
                                {
                                    alert("{PWINSTALL_DATABASE_ERROR}");
                                }
                                else if (document.forms[0].elements[6].value == "")
                                {
                                    alert("{PWINSTALL_DATABASE_ERROR}");
                                }
                                else if (document.forms[0].elements[9].value == "")
                                {
                                    alert("{PWINSTALL_DATABASE_ERROR}");
                                }
                                else
                                {
                                    document.forms[0].submit();
                                }
                            }
                        //]]>
                        </script>
                        <form name="Stage3" method="post" action="{INSTALL_FILE}">
                            <table border="0" cellpadding="2" cellspacing="0" width="70%" summary="language options">
                                <col />
                                <col />
                                <thead>
                                    <tr>
                                        <td align="left" valign="middle" colspan="2">
                                            {PWINSTALL_DATABASE_BLURB}
                                            <br />
                                            <br />
                                        </td>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td align="center" valign="middle" colspan="2">
                                            <br />
                                            <input type="button" name="Submit" value="{PWINSTALL_CONTINUE}" class="default_button" onclick="CheckFields();"/>
                                            <input type="hidden" name="Stage" value="Stage4" />
                                            <input type="hidden" name="InstallLanguage" value="{PWINSTALL_LANGUAGE}" />
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td align="right" valign="middle">{PWINSTALL_HOSTNAME}</td>
                                        <td align="left" valign="middle">
                                            <input type="text" name="Database[Hostname]" value="{PWINSTALL_HOSTNAME_VALUE}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="middle">{PWINSTALL_USERNAME}</td>
                                        <td align="left" valign="middle">
                                            <input type="text" name="Database[Username]" value="{PWINSTALL_USERNAME_VALUE}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="middle">{PWINSTALL_PASSWORD}</td>
                                        <td align="left" valign="middle">
                                            <input type="password" name="Database[Password]" value="{PWINSTALL_PASSWORD_VALUE}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="middle">{PWINSTALL_DATABASE}</td>
                                        <td align="left" valign="middle">
                                            <input type="text" name="Database[Database]" value="{PWINSTALL_DATABASE_VALUE}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="middle">{PWINSTALL_PREFIX}</td>
                                        <td align="left" valign="middle">
                                            <input type="text" name="Database[Prefix]" value="{PWINSTALL_PREFIX_VALUE}"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="middle">{PWINSTALL_DBTYPE}</td>
                                        <td align="left" valign="middle">
                                            <select name="Database[Type]">
                                                {PWINSTALL_DATABASE_TYPES}
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="middle">{PWINSTALL_EMAIL}</td>
                                        <td align="left" valign="middle">
                                            <input type="text" name="Database[Email]" value="{PWINSTALL_EMAIL_VALUE}" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
