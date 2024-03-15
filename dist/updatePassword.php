
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
//if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
    //header ("Location: login.php");
   // exit;
//}

include 'config.php';
//start the session
session_start();

    
    
    //if(isset($_POST['confirmPassword']) && $_POST['resetToken'] && $_POST['username']) {
        //include "dbconnection.php";
        $password = stripslashes($_POST['confirmPassword']);
        //echo $_POST['confirmPassword'];
        $token = $_POST['resetToken'];
        //echo $token;
        $username = $_POST['username'];
        //echo $username;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        //echo $hash;
        //$10$8mp2LX07hjYDxrMW2LRMMeABt7Qm7DgZO/mNdLMJRU8VYiKoCCIrO
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
