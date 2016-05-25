
                        <form name="Stage2" method="post" action="{INSTALL_FILE}">
                            <table border="0" cellpadding="2" cellspacing="0" width="70%" summary="license">
                                <col />
                                <thead>
                                    <tr>
                                        <td align="left" valign="middle">
                                            {PWINSTALL_LICENSE_BLURB}
                                            <br />
                                            <br />
                                        </td>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td align="center" valign="middle">
                                            <br />
                                            <input type="submit" name="Submit" value="{PWINSTALL_AGREE}" class="default_button" />
                                            <input type="hidden" name="Stage" value="Stage3" />
                                            <input type="hidden" name="InstallLanguage" value="{PWINSTALL_LANGUAGE}" />
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td align="center" valign="middle">
                                            <textarea name="license" cols="80" rows="20">
                                                {PWINSTALL_LICENSE}
                                            </textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
