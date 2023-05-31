
<?php 
session_start();
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
    header ("Location: login.php");
    exit;
}
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];


include 'config.php';

if(isset($_POST['submit']) && $_POST['email']) {
     
    $email = $_POST['email'];
    $country = $_POST['country'];
    $state = $_POST['state/province'];
    $link = '<!DOCTYPE html
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
            <body>

            <div>
            
            <p>Please click the following link to register as a new user  "<a href ="http://localhost/CIT%20database/dist/registerState.php?email=' . $email . '&country=' . $country . '&state=' . $state . '">Register Account</a>"</p>

         </div>
         </body>
        </html>';
            $to_email = $email;

            $mail_subject = "Account Registration";
            $mail_content = stripslashes($link);
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= "From: maustvr@hotmail.com" . "\r\n";
            
            // Send email
            if(mail($to_email, $mail_subject, $link, $headers)) {
                echo "<script> alert(an invitation has been sent to the requested email address.)</script>";
               header("Location: fedAdminDashboard.php");
							    
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


