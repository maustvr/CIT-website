
<?php //error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
    header ("Location: login.php");
    exit;
}

include 'config.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';

$mail->Username = "your_gmail_user_name@gmail.com";
$mail->Password = "your_gmail_password";

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "your_gmail_user_name@gmail.com";
$mail->FromName = "Your Name";

$mail->addAddress("user.1@yahoo.com","User 1");
$mail->addAddress("user.2@gmail.com","User 2");

$mail->addCC("user.3@ymail.com","User 3");
$mail->addBCC("user.4@in.com","User 4");*/

    
    if(isset($_POST['submit']) && $_POST['email']) {
     
        $email = $_POST['email'];
       
        if(isset($_POST['isAdmin'])){
                    $isAdmin = "yes";
                    } else {
                         $isAdmin = "no";
                }
            
            $link = '<!DOCTYPE html
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            </head>
                <body>

            <div>            
            <p>Please click the following link to register as a new user  "<a href ="http://localhost/CIT%20database/dist/register.php?email=' . $email . '&isAdmin=' . $isAdmin . '">Register Account</a>"</p>

         </div>
         </body>
        </html>';
              
            $to_email = $email;

            $mail_subject = "Account Registration";
            $mail_content = stripslashes($link);
            //$email_content = "<a href="resetPassword.php?username=%22.%24username.%22&token=%22.%24token.%22">Click To Reset password</a>";
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= "From: maustvr@hotmail.com" . "\r\n";
            
            // Send email
            if(mail($to_email, $mail_subject, $link, $headers)) {
                echo "<script> alert(an invitation has been sent to the requested email address.)</script>";
               header("Location: adminDashboard.php");
							    
			     exit;
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
?>


