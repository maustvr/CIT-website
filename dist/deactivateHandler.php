<html lang="en">
<head>

<style>

</style>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();

include 'config.php';
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
$userState = $_SESSION['userState'];
$userCountry = $_SESSION['userCountry'];
$isActive = $_SESSION['isActive'];
 $isAdmin = $_SESSION['isAdmin'];
 $fedAdmin = $_SESSION['fedAdmin'];

?>
</head>
<p>
<body>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
	
			    $userTable = "users";  
                $deactivateUser = stripslashes($_POST['deactivateUser']);
                //echo $deactivateUser;
                /*$password = stripslashes($_POST['password']);
                $hash = password_hash($password, PASSWORD_DEFAULT);
                echo "<script> alert('<?php echo $username; ?>')</script>";
                            //exit;

                $_SESSION['username'] = $username;
			    $_SESSION['password'] = $password;*/

                $stmt = $DBConnect->prepare("Select * from $userTable where usersID = ?");
                $stmt->bind_param("i", $deactivateUser);
                  $stmt ->execute();
                $QueryResult = $stmt -> get_result();
                $Result = mysqli_fetch_assoc($QueryResult);
                $isAdmin = $Result['isAdmin'];
                $isUser = $Result['usersID'];
                $inviteBy = $Result['inviteByID'];
                if(!mysqli_num_rows($QueryResult) > 0) {
                   
                    echo "<script> alert('user does not exist');
                    window.history.back();
                    </script>";
                    
                   }else  {
                   
                               
                            if($inviteBy == $userID) {
                             $stmt = $DBConnect->prepare("update $userTable set isActive = 'no' where usersID = ?");
                              $stmt->bind_param("i", $deactivateUser);
                                if($stmt ->execute()){
                                 echo "<script> alert('user has been deactivated');
                                window.history.back();
                                </script>";
                                    } else {
                                        echo "<script> alert('there was an error');
                                            window.history.back();
                                            </script>";

                                    }
                                    } else {
                                            echo "<script> alert('you do not have access to deactivate this user');
                                            window.history.back();
                                            </script>";
                }

							   $stmt ->close();
							   // $SQLStringInsert -> close();
                                mysqli_close($DBConnect);
					}

?>

</body>
</p>
</html>
