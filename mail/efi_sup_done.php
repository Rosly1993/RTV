
<?php

$a=date('M-d-Y');
extract($_POST);
$host = "10.216.128.114";
$username = "root";
$password = "Ncfldbuser21!";
$database = "parts_rtv";

$conn = new mysqli($host, $username, $password, $database);


//get email
$query2=mysqli_query($conn, "SELECT * FROM tbl_user where is_active='1' and area='Prod-Manager' and user_role='Approver' ");
 while($rows2=mysqli_fetch_array($query2)){


$mail[]=$rows2['email_address'];

 }
       // EMAIL SETUP
       $headers =  'MIME-Version: 1.0' . "\r\n";
       $receiver =  implode(", ", $mail);
    // $receiver =  $email_address;
       
       
       $headers .= 'From: Parts RTV <ncfl-systems-engineering@nidec.com>' . "\r\n";
       // $headers .= 'Cc: ' . $row['emailcc'] . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       $headers .= "X-Priority: 1 (Highest)\n";
       $headers .= "X-MSMail-Priority: High\n";
       $headers .= "Importance: High\n";

       $subject = "Part's RTV Request For Approval Prod-Manager $a";
       $body    = "";

       

       //starts the table tag
       $body .= "
       <!DOCTYPE html PUBLIC '
    <html xmlns='http://www.w3.org/1999/xhtml'xmlns:o='urn:schemas-microsoft-com:office:office'>

    <head>
    <meta charset='UTF-8'>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <meta name='x-apple-disable-message-reformatting'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta content='telephone=no' name='format-detection'>
    <title></title>
    <!--[if (mso 16)]>
    <style type='text/css'>
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
    <xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body>
    <div class='es-wrapper-color'>
        <!--[if gte mso 9]>
			<v:background xmlns:v='urn:schemas-microsoft-com:vml' fill='t'>
				<v:fill type='tile' color='#fafafa'></v:fill>
			</v:background>
		<![endif]-->
       
                        <table cellpadding='0' cellspacing='0' class='es-content' align='center'>
                            <tbody>
                                <tr>
                                    <td class='esd-stripe' align='center'>
                                        <table bgcolor='#ffffff' class='es-content-body' align='center' cellpadding='0' cellspacing='0' width='600'>
                                            <tbody>
                                                <tr>
                                                    <td class='esd-structure es-p30t es-p30b es-p20r es-p20l' align='left'>
                                                        <table cellpadding='0' cellspacing='0' width='100%'>
                                                            <tbody>
                                                                <tr>
                                                                    <td width='560' class='esd-container-frame' align='center' valign='top'>
                                                                        <table cellpadding='0' cellspacing='0' width='100%'>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align='center' class='esd-block-image es-p10t es-p10b' style='font-size: 0px;'><a target='_blank'><img src='https://swlkiu.stripocdn.email/content/guids/CABINET_67e080d830d87c17802bd9b4fe1c0912/images/55191618237638326.png' alt style='display: block;' width='100'></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align='center' class='esd-block-text es-p10b es-m-txt-c'>
                                                                                        <h1 style='font-size: 36px; line-height: 100%;'>Part's RTV</h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align='center' class='esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l'>
                                                                                        <p>Dear User,</p>
                                                                                        <p>This is to inform you that you have for approval request on Part's RTS.</p></td></tr>
                                                                                <tr>
                                                                                        <td align='left' class='esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l'>
                                                                                        <p><b style='font-size:15px'>Request Details:</b>
                                                                                        <br>Requested By: &nbsp; $req
                                                                                        <br>Reviewed By(MFI-GL): &nbsp; $rev_by
                                                                                        <br>Noted By(MFI-MED): &nbsp; $med_by
                                                                                        <br>Noted By(EFI-Sup): &nbsp; $name
                                                                                        <br>Control #: &nbsp; $ctrl
                                                                                        <br>Model: &nbsp; $mod
                                                                                        <br>Item Code: &nbsp; $item_co
                                                                                        <br>Letter Code: &nbsp; $let_code</p>
                                                                                    </td>
                                                                                </tr>
                                                                               
                                                                                <tr>
                                                                                    <td align='center' class='esd-block-button es-p10t es-p10b'>
                                                                                    <a href='http://10.216.128.114/Parts_RTV'  style='text-decoration:none;background-color:blue;border-radius:5px;color:white;height:30px;padding:10px'>Login
                                                                                    </a>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                <td align='center' class='esd-block-text es-p10t es-p5b'>
                                                                                   <br>
                                                                                </td>
                                                                            </tr>
                                                                                <tr>
                                                                                    <td align='center' class='esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l'>
                                                                                        <i>This is an automated e-mail please do not reply.</i>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding='0' cellspacing='0' class='es-footer' align='center'>
                            <tbody>
                                <tr>
                                    <td class='esd-stripe' align='center' esd-custom-block-id='388980'>
                                        <table class='es-footer-body' align='center' cellpadding='0' cellspacing='0' width='640' style='background-color: transparent;'>
                                            <tbody>
                                                <tr>
                                                    <td class='esd-structure es-p20t es-p20b es-p20r es-p20l' align='left'>
                                                        <table cellpadding='0' cellspacing='0' width='100%'>
                                                            <tbody>
                                                                <tr>
                                                                    <td width='600' class='esd-container-frame' align='left'>
                                                                        <table cellpadding='0' cellspacing='0' width='100%'>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class='esd-block-menu' esd-tmp-menu-padding='5|5' esd-tmp-divider='1|solid|#cccccc' esd-tmp-menu-color='#999999'>
                                                                                        <table cellpadding='0' cellspacing='0' width='100%' class='es-menu'>
                                                                                            <tbody>
                                                                                                <tr class='links'>
                                                                                                    <td align='center' valign='top' width='33.33%' class='es-p10t es-p10b es-p5r es-p5l' style='padding-top: 5px; padding-bottom: 5px;'><a target='_blank' href='https://' style='color: #999999;'>@2023</a></td>
                                                                                                    <td align='center' valign='top' width='33.33%' class='es-p10t es-p10b es-p5r es-p5l' style='padding-top: 5px; padding-bottom: 5px; border-left: 1px solid #cccccc;'><a target='_blank' href='https://' style='color: #999999;'>Production Development Center</a></td>
                                                                                                    <td align='center' valign='top' width='33.33%' class='es-p10t es-p10b es-p5r es-p5l' style='padding-top: 5px; padding-bottom: 5px; border-left: 1px solid #cccccc;'><a target='_blank' href='https://' style='color: #999999;'>System Engineering</a></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding='0' cellspacing='0' class='es-content esd-footer-popover' align='center'>
                            <tbody>
                                <tr>
                                    <td class='esd-stripe' align='center' esd-custom-block-id='388983'>
                                        <table class='es-content-body' align='center' cellpadding='0' cellspacing='0' width='600' style='background-color: transparent;' bgcolor='rgba(0, 0, 0, 0)'>
                                            <tbody>
                                                <tr>
                                                    <td class='esd-structure es-p20' align='left'>
                                                        <table cellpadding='0' cellspacing='0' width='100%'>
                                                            <tbody>
                                                                <tr>
                                                                    <td width='560' class='esd-container-frame' align='center' valign='top'>
                                                                        <table cellpadding='0' cellspacing='0' width='100%'>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align='center' class='esd-empty-container' style='display: none;'></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>"; //closes the table
        "
       </body>
       </html>";
       


       // MAIL SENDING
    //    if($count >0){
         (mail($receiver, $subject, $body, $headers));
    //    }

       
         
    //    //   SEND MAIL
    //    else{
    //      echo 'Sent Failed';
    //    }

?>