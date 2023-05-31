
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));


include 'config.php';
//start the session
session_start();

    
    
    //if(isset($_POST['confirmPassword']) && $_POST['resetToken'] && $_POST['username']) {
        //include "dbconnection.php";
        $password = stripslashes($_POST['confirmPassword']);
        
        
        $username = $_POST['username'];
       
        $hash = password_hash($password, PASSWORD_DEFAULT);
       
        $oldPassword = $_POST['oldPassword'];
        $pwHash = password_hash($oldPassword, PASSWORD_DEFAULT);
        $stmt = $DBConnect->prepare("Select * from users where username = ?");
                $stmt->bind_param("s", $username);
                  $stmt ->execute();

                
                $QueryResult = $stmt -> get_result();
                $Result = mysqli_fetch_assoc($QueryResult);
            
                    $PW = $Result['password'];
                   
                    if (password_verify($oldPassword, $PW)) {
                    echo "<p>MATCHED.</p>";
        
           if( mysqli_query($DBConnect,"UPDATE users set password='$hash', resetToken='NO' WHERE username='$username'")){
           echo"<script> alert('Your password has been updated')
           location = 'dashboard.php';
    
           </script>";
           
          
        } else {
             echo"<script> alert(' Somehting went wrong, please try again');
        window.history.back();
        </script>";
           
      
       }
    }else {
        echo"<script> alert('Incorrect password.');
        window.history.back();
        </script>";
        //exit;
        
       }
?>
