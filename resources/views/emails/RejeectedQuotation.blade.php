<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
    a:hover {
        text-decoration: underline !important;
    }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                             <a href="#" title="logo" target="_blank">
                                <h2 style="color:#385defa7;">Procurement System</h2>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0"  cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h2
                                            style="color:#1e1e2d;text-align:left; margin:0;font-family:'Rubik',sans-serif;">
                                            Hello  {{ $rejected['name'] }},</h2>
                                            <br>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            Your quotation has been denied by supervisor. We would like you to re-prepare quotations for purchase requisition related to {{ $rejected['pr'] }}.

                                        </p>



                                        <p style="color:#455056; text-align: center;">You may review it through this link </p>


                                        <a href="{{ url('/procurementPanel') }}"
                                            style="background:#385defa7;text-decoration:none !important; font-weight:500; margin-top:35px; color:#2222fb;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;"> click this</a>
                                        </p>

                                    </td>

                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p
                                style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">
                                Copyright ©  <strong>2023</strong> All rights reserved.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>

     </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>
