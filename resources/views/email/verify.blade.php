<?php
/**
 * Created by PhpStorm.
 * User: Atheek
 * Date: 2/24/2016
 * Time: 5:00 AM
 */
/*        <!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
Thanks for creating an account with the verification demo app.
Please follow the link below to verify your email address
{{ URL::to('register/verify/' . $confirmation_code) }}.<br/>

</div>

</body>
</html>

*/?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Paint Pal</title>
</head>

<body bgcolor="#8d8e90">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
    <tr>
        <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="61"><a href= "#" target="_blank"><img src="http://paintpal.16mb.com/images/PROMO-GREEN2_01_01.jpg" width="61" height="76" border="0" alt=""/></a></td>
                                <td width="144"><a href= "#" target="_blank"><h3 style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:12px; line-height:20px; text-transform:uppercase " >PAINT PAL</h3></a></td>
                                <td width="393"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="46" align="right" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="67%" align="right"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#68696a; font-size:8px; text-transform:uppercase"><a href= "http://yourlink" style="color:#68696a; text-decoration:none"><strong></strong></a></font></td>
                                                        <td width="29%" align="right"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#68696a; font-size:8px"><a href= "http://yourlink" style="color:#68696a; text-decoration:none; text-transform:uppercase"><strong>SEND TO A FRIEND</strong></a></font></td>
                                                        <td width="4%">&nbsp;</td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td height="30"><img src="http://paintpal.16mb.com/images/PROMO-GREEN2_01_04.jpg" width="393" height="30" border="0" alt=""/></td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td align="center"><a href= "http://yourlink" target="_blank"><img src="http://paintpal.16mb.com/images/mainlbanner.jpg" alt="" width="598" height="323" border="0"/></a></td>
                </tr>
                <tr>
                    <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="2%">&nbsp;</td>
                                <td width="96%" align="center" style="border-bottom:1px solid #000000" height="70"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#68696a; font-size:46px; text-transform:uppercase"><strong>Verify Your Email Address</strong></font></td>
                                <td width="2%">&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="5%">&nbsp;</td>
                                <td width="90%" align="center" valign="middle"><font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:12px; line-height:20px; text-transform:uppercase">Thanks for creating an account with PAINT PAL.
                                        Please follow the link below to verify your email address
                                       <<br/>
                                    </font><br />
                                    <font style="font-family:Verdana, Geneva, sans-serif; color:#f58220; font-size:12px; line-height:20px"><a href= {{ URL::to('register/verify/' . $confirmation_code) }} style="color:#f58220; text-decoration:none"><strong>&lt; CLICK HERE &gt;</strong></a></font></td>
                                <td width="5%">&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>

                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="13%" align="center">&nbsp;</td>
                                <td width="14%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://yourlink" style="color:#010203; text-decoration:none"><strong>UNSUBSCRIBE </strong></a></font></td>
                                <td width="2%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                                <td width="9%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://yourlink" style="color:#010203; text-decoration:none"><strong>ABOUT </strong></a></font></td>
                                <td width="2%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                                <td width="10%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://yourlink" style="color:#010203; text-decoration:none"><strong>PRESS </strong></a></font></td>
                                <td width="2%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                                <td width="11%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://yourlink" style="color:#010203; text-decoration:none"><strong>CONTACT </strong></a></font></td>
                                <td width="2%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                                <td width="17%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://yourlink" style="color:#010203; text-decoration:none"><strong>STAY CONNECTED</strong></a></font></td>
                                <td width="4%" align="right"><a href="https://www.facebook.com/" target="_blank"><img src="http://paintpal.16mb.com/images/PROMO-GREEN2_09_01.jpg" alt="facebook" width="21" height="19" border="0" /></a></td>
                                <td width="5%" align="center"><a href="https://twitter.com/" target="_blank"><img src="http://paintpal.16mb.com/images/PROMO-GREEN2_09_02.jpg" alt="twitter" width="23" height="19" border="0" /></a></td>
                                <td width="4%" align="right"><a href="http://www.linkedin.com/" target="_blank"><img src="http://paintpal.16mb.com/images/PROMO-GREEN2_09_03.jpg" alt="linkedin" width="20" height="19" border="0" /></a></td>
                                <td width="5%">&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#231f20; font-size:8px"><strong>Head Office &amp; Registered Office | Company name Ltd, Adress Line, Company Street, City, State, Zip Code | Tel: 123 555 555 | <a href= "http://yourlink" style="color:#010203; text-decoration:none">seppaintpal@gmail.com.com</a></strong></font></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </table></td>
    </tr>
</table>
</body>
</html>

