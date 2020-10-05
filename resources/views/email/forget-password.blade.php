<html><head><div data-template-type="headers"><style type="text/css">
.ReadMsgBody { width: 100%; background-color: #ffffff; }
.ExternalClass { width: 100%; background-color: #ffffff; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
html { width: 100%; }
body { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }
table { border-spacing: 0; table-layout: auto; margin: 0 auto; }
.yshortcuts a { border-bottom: none !important; }
img:hover { opacity: 0.9 !important; }
a { color: #3cb2d0; text-decoration: none; }
.textbutton a { font-family: 'open sans', arial, sans-serif !important; }
.btn-link a { color: #FFFFFF !important; }

@media only screen and (max-width: 479px) {
body { width: auto !important; font-family: 'Open Sans', Arial, Sans-serif !important;}
.table-inner{ width: 90% !important; text-align: center !important;}
.table-full { width: 100%!important; max-width: 100%!important; text-align: center !important;}
/*gmail*/
u + .body .full { width:100% !important; width:100vw !important;}
}
</style>
</div></head><body><div data-template-type="html" style="-webkit-font-smoothing: subpixel-antialiased;">

  <table data-module="noti-2" class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody><tr>
      <td data-bgcolor="Main BG" data-background="Main BG" background="{{asset('images/bg.jpg')}}" bgcolor="#494c50" valign="top" style="background-size: cover; background-position: center center; background-image: url(&quot;{{asset('images/bg.jpg')}}&quot;); background-color: rgb(25, 45, 235);">
        <table class="table-inner" align="center" width="600" style="max-width: 600px; height: 868px;" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td height="40"></td>
          </tr>
          <tr>
            <td data-bgcolor="Panel" bgcolor="#FFFFFF" style="border-top-left-radius: 4px;border-top-right-radius: 4px;" align="center">
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td height="50"></td>
                </tr>
                <!-- logo -->
                <tr>
                  <td align="center" style="line-height: 0px;"><img mc:edit="noti-2-1" src="{{asset(\App\Model\SiteSetting::latest()->value('logo'))}}" alt="{{App\Model\SiteSetting::latest()->value('site_title')}}" height="60" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="logo"></td>
                </tr>
                <!-- end logo -->
                <tr>
                  <td height="15"></td>
                </tr>
                <!-- slogan -->
                <tr>
                  <td mc:edit="noti-2-2" data-link-style="text-decoration:none; color:#3cb2d0;" data-link-color="Slogan Link" data-color="Slogan" data-size="Slogan" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:12px; color:#3b3b3b; text-transform:uppercase; letter-spacing:2px; font-weight: normal;">
                    <singleline label="title">One-Time Password For Reset Login Password</singleline>
                  </td>
                </tr>
                <!-- end slogan -->
                <tr>
                  <td height="40"></td>
                </tr>
              </tbody></table>
            </td>
          </tr>
          <tr>
            <td data-bgcolor="Content BG" align="center" bgcolor="#f3f3f3">
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td height="50"></td>
                </tr>
                <!-- title -->
                <tr>
                  <td mc:edit="noti-2-3" data-link-style="text-decoration:none; color:#3cb2d0;" data-link-color="Content Link" data-color="Headline" data-size="Headline" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:36px; color:#3b3b3b; font-weight: bold; letter-spacing:4px;">
                    <singleline label="title">Reset Your Password</singleline>
                  </td>
                </tr>
                <!-- end title -->
                <tr>
                  <td height="15"></td>
                </tr>
                <tr>
                  <td align="center">
                    <table data-width="Dash" width="25" border="0" cellspacing="0" cellpadding="0">
                      <tbody><tr>
                        <td data-bgcolor="Dash" bgcolor="#3cb2d0" height="2"></td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr>
                  <td height="20"></td>
                </tr>
                <!-- content -->
                <tr>
                  <td mc:edit="noti-2-4" data-link-style="text-decoration:none; color:#3cb2d0;" data-link-color="Content Link" data-color="Main Text" data-size="Main Text" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#7f8c8d; line-height:29px;">
                    <multiline label="content">
                    If you've forgotten your password, you can always reset your password.
                    Envato is an ecosystem of sites to help you get creative. It includes Envato Market, the leading marketplace for images, themes, project files and creative assets.</multiline>
                  </td>
                </tr>
                <!-- end content -->
                <tr>
                  <td height="50"></td>
                </tr>
              </tbody></table>
            </td>
          </tr>
          <tr>
            <td data-bgcolor="Panel" bgcolor="#FFFFFF" style="border-bottom-left-radius: 4px;border-bottom-right-radius: 4px;" align="center">
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td height="40"></td>
                </tr>
                <!-- button -->
                <tr>
                  <td align="center">
                    <table class="textbutton" align="center" border="0" cellspacing="0" cellpadding="0">
                      <tbody><tr>
                        <td mc:edit="noti-2-5" data-bgcolor="Button Color" data-size="Button" bgcolor="#3cb2d0" height="55" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#FFFFFF;font-weight: bold;padding-left: 25px;padding-right: 25px;border-radius:4px;">
                          <singleline label="button">OTP: {{@$otp}}</singleline>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- end button -->
                <tr>
                  <td height="25"></td>
                </tr>
                <!-- preference -->
                <tr>
                  <td mc:edit="noti-2-6" data-link-style="text-decoration:none; color:#7f8c8d;" data-link-color="Text Link" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#7f8c8d;">
                    {{-- <webversion>Webversion</webversion>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <unsubscribe>Unsubscribe</unsubscribe> --}}
                  </td>
                </tr>
                <!-- end preference -->
                <tr>
                  <td height="30"></td>
                </tr>
              </tbody></table>
            </td>
          </tr>
          <tr>
            <td height="25"></td>
          </tr>
          <!-- copyright -->
          <tr>
            <td mc:edit="noti-2-7" data-color="copyright" data-size="copyright" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#ffffff;">
              <singleline label="copyright">© 2019 Koble All Rights Reserved.</singleline>
            </td>
          </tr>
          <!-- end copyright -->
          <tr>
            <td height="25"></td>
          </tr>
          <!-- social -->
          <tr>
            <td align="center">
              <table align="center" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img data-color="Social icon" mc:edit="noti-2-8" data-crop="false" src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2019/02/20/Gd1vwkYrC2Mmcy9Wq43N6tZB/Notification-2/images/fb.png" alt="img" width="16" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-1"> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img data-color="Social icon" mc:edit="noti-2-9" data-crop="false" src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2019/02/20/Gd1vwkYrC2Mmcy9Wq43N6tZB/Notification-2/images/tw.png" alt="img" width="16" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-2"> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img data-color="Social icon" mc:edit="noti-2-10" data-crop="false" src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2019/02/20/Gd1vwkYrC2Mmcy9Wq43N6tZB/Notification-2/images/gg.png" alt="img" width="16" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-3"> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img data-color="Social icon" mc:edit="noti-2-11" data-crop="false" src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2019/02/20/Gd1vwkYrC2Mmcy9Wq43N6tZB/Notification-2/images/in.png" alt="img" width="16" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-4"> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img data-color="Social icon" mc:edit="noti-2-12" data-crop="false" src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2019/02/20/Gd1vwkYrC2Mmcy9Wq43N6tZB/Notification-2/images/bh.png" alt="img" width="16" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-5"> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img data-color="Social icon" mc:edit="noti-2-13" data-crop="false" src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2019/02/20/Gd1vwkYrC2Mmcy9Wq43N6tZB/Notification-2/images/db.png" alt="img" width="16" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-6"> </a>
                  </td>
                </tr>
              </tbody></table>
            </td>
          </tr>
          <!-- end social -->
          <tr>
            <td height="45"></td>
          </tr>
        </tbody></table>
      </td>
    </tr>
  </tbody></table>
</div></body></html>