
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

include 'config.php';
//start the session
session_start();

        $password = stripslashes($_POST['confirmPassword']);
        $token = $_POST['resetToken'];
        $username = $_POST['username'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = mysqli_query($DBConnect,"SELECT * FROM users WHERE resetToken='$token' and username='$username'");
        $row = mysqli_num_rows($query);
        if($row){             
           </script>";
           if( mysqli_query($DBConnect,"UPDATE users set password='$hash', resetToken='NULL', expiryDate='NULL' WHERE username='$username'")){         
                echo"<script> alert('your password has been updated successfully')
            location = 'login.php';
            </script>";
        } else {
            echo"<script> alert('Something went wrong, please try again')
            window.history.back();           
           </script>";
        }
    }
?>
