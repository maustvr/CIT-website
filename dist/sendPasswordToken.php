
<?php //error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

include 'config.php';
    
    if(isset($_POST['submit']) && $_POST['username']) {
     
        $username = $_POST['username'];
        //echo $username;
     
        $result = mysqli_query($DBConnect,"SELECT * FROM users WHERE username='$username'");
     
        if(mysqli_num_rows($result) > 0) {
         
            $token = md5($username);
           
            // echo $token;
         
            $expiry_time = mktime(date("H", time()+3600), date("i"), date("s"), date("m"), date("d"), date("Y"));
         
            $expiry_date = date("Y-m-d H:i:s", $expiry_time);

            
            $query = mysqli_query($DBConnect, "update users set resetToken ='$token', expiryDate = '$expiry_date' where username = '$username'");
         
            //$link ="<a href="resetPassword.php?username=%22.%24username.%22&token=%22.%24token.%22">Click To Reset password</a>";
            $link = '<!DOCTYPE html
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            </head>
                <body>

            <div>
           
            <p>Please click the following link to proceed to the Questionnaire "<a href ="http://localhost/CIT%20database/dist/resetPassword.php?username=' . $username . '&token=' . $token . '">Reset Password</a>"</p>


        </div>
        </body>
        </html>';
       
            $return = mysqli_fetch_assoc($result);
            $email = $return['email'];

            //echo $email;
            
            $to_email = $email;

            $mail_subject = "Reset Password";
            $mail_content = stripslashes($link);
            
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= "From: maustvr@hotmail.com" . "\r\n";
            
            // Send email
            if(mail($to_email, $mail_subject, $link, $headers)) {
               // echo $to_email;
                echo"<script> alert('Check your email for a link to reset your password')
           location = 'login.php';
    
           </script>";
                //window.history.back();
               //location.href = 'login.php';
                
            } else {
              echo "<script> alert( Could not send email. Please try again.)
               window.history.back();
               </script>";
            }

        } else {
            echo "<script> alert(Invalid Email Address. Go back)
             window.history.back();
            </script>";
        }
            echo"error";
}

?>


