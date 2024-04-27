
<?php

$a=date('M-d-Y');

$host = "10.216.128.114";
$username = "root";
$password = "Ncfldbuser21!";
$database = "tool_monitoring";

$conn = new mysqli($host, $username, $password, $database);

//  $query1=mysqli_query($conn, "SELECT * FROM email_table where is_active='1' ");
//  while($rows1=mysqli_fetch_array($query1)){


// $mail[]=$rows1['email_address'];


       // EMAIL SETUP
       $headers =  'MIME-Version: 1.0' . "\r\n";
      //  $receiver =  implode(", ", $mail);
       $receiver =  'rosly.rapada@nidec.com';
       
       
       $headers .= 'From: Parts RTS <ncfl-systems-engineering@nidec.com>' . "\r\n";
       // $headers .= 'Cc: ' . $row['emailcc'] . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       $headers .= "X-Priority: 1 (Highest)\n";
       $headers .= "X-MSMail-Priority: High\n";
       $headers .= "Importance: High\n";

       $subject = "Part's RTS Account Registration $a";
       $body    = "<h3>Hi admin,<br>This is to inform you that $name  sign-up to Part's RTV please confirm immediately.
       <br>For more information about Part's RTV, please  do visit this website:<i><a href='http://10.216.128.114/Parts_RTV'  style='text-decoration:none'>Part's RTV
       </a></i></h3><i>This is an automated email please do not reply</i><br>";

       

       //starts the table tag
       $body .= "
       <!DOCTYPE html>
       <html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>
       <head>
         <meta charset='UTF-8'>
         <meta name='viewport' content='width=device-width,initial-scale=1'>
         <meta name='x-apple-disable-message-reformatting'>
         <title></title> 
       </head>
       <body style='background-color:grey'>
           <table align='center' border='0' cellpadding='0' cellspacing='0'
                  width='550' bgcolor='white' style='border:2px solid #03045E'>
               <tbody>
                   <tr>
                       <td align='center'>
                           <table align='center' border='0' cellpadding='0' cellspacing='0' class='col-550' width='550'>
                               <tbody>
                                   <tr>
                                       <td align='center' style='background-color:#279EFF;height: 50px;'>
         
                                           <a href='#' style='text-decoration: none;'>
                                               <p style='color:white;font-weight:bold;font-size: 18px;'>
                                                       Part's RTV
                                               </p>
                                           </a>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                       </td>
                   </tr>
                   <tr style='display: inline-block;'>
                       <td style='height: 150px;padding: 20px;border: none; border-bottom: 0px solid #FF06B7;background-color: white;'>
                           
                           <h3 style='text-align: left;align-items: center;'>
                           Hi admin,<br>This is to inform you that $name  sign-up to Part's RTV please confirm immediately.
                          </h3>
                           <p class='data' style='text-align: justify-all;align-items: center; font-size: 15px;padding-bottom: 12px;'>
                              Username :&nbsp;$user_name<br>
                              Area :&nbsp;$area<br>
                              User Role :&nbsp;$user_role<br>
                              
                             
                           </p>
                           <p>
                              
                              <a href='http://10.216.128.114/Parts_RTV' style='text-decoration: none; color:black; border: 2px solid #4cb96b; padding: 10px 30px;font-weight: bold;'></a> 
                               </p>
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
    //      echo "Sent Failed";
    //    }

?>