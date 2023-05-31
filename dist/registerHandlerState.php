<html lang="en">
<head>

<style>

</style>

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
session_start();
include 'config.php';
//start the session
$isAdmin = "yes";
$country = $_SESSION['country'];
$state = $_SESSION['state'];
$email = $_SESSION['email'];
//$isAdmin = $_SESSION['isAdmin'];
echo $confirmEmail;
echo $country;
echo $state;*/

?>
</head>
<p>
<body>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
    include 'config.php';
    session_start();
    echo "hello";
    if (!empty($_REQUEST['submitButton'])) {
    $pass = $_REQUEST['password'];
    $cpass = $_REQUEST['confirmPassword'];
    if ($pass != $cpass) {
        echo "<script> alert(' Please enter same password');
        window.history.back();
        </script>";
    } else {
        echo "<script> alert(' Success ')</script>";
}
    
	$userTable = "users";
    $locationTable = "location";
    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $fedAdmin = "no";
    $isActive = "yes";
    $_SESSION['username'] = $username;
    $confirmPassword = stripslashes($_POST['confirmPassword']);
    if($password != $confirmPassword) {
        print"Passwords do not match";
        } else {
            $stmt = $DBConnect->prepare("Select * from $userTable where username = ?");
            $stmt->bind_param("s", $username);
            $stmt ->execute();
            $QueryResult = $stmt -> get_result();
            $Result = mysqli_fetch_assoc($QueryResult);
            if(mysqli_num_rows($QueryResult) > 0) {
                echo "<script> alert('user already exists');
                window.history.back();
                </script>";
                }else {
            
             $userID = $Result['usersID'];
             $_SESSION['userID'] = $userID;
            //prepare and bind
            $stmt = $DBConnect->prepare("Select * from $locationTable where country = ? and state = ?");
            $stmt->bind_param("ss", $country, $state);
            $stmt ->execute();
            $QueryResult = $stmt -> get_result();
            $ResultId = mysqli_fetch_assoc($QueryResult);
			if(mysqli_num_rows($QueryResult) == 0){
                $stmt2 =$DBConnect ->prepare("insert into location (country, state) values (?, ?)");
                $stmt2->bind_param("ss", $country, $state);
                if(!$stmt2 -> execute()) {
                    echo "<script> alert(' Unable to add location)
                    window.history.back();
                    </script>";
                    }else {
                        $getLocationId = $DBConnect -> prepare("select * from $locationTable where country = ? and state = ?");
                        $getLocationId ->bind_param("ss", $country, $state);
                        if($getLocationId ->execute()) {
                            $SQLRetrieve = $getLocationId -> get_result();
                            $result = mysqli_fetch_assoc($SQLRetrieve);
                            $locationID = $result['locationID'];
                            $_SESSION['locationID'] = $locationID;
                        
                         $stmt -> close();
                        $stmt2 -> close();
                        $getLocationId -> close();
				         }
                     }
               }
					else 
						$locationID = $ResultId['locationID'];
						$SQLStringInsert = $DBConnect -> prepare("insert into $userTable(username, password, email, locationID, isAdmin, fedAdmin, isActive) values(?, ?, ?, ?, ?, ?, ?)");
                        $SQLStringInsert -> bind_param("sssisss", $username, $hash, $email, $locationID, $isAdmin, $fedAdmin, $isActive);
                        if($SQLStringInsert ->execute()) {
                            echo "<script> alert('New record has been added')</script>";
                            header("Location: deptSetup.php");

                            }else {
                                echo"<script> alert ('There was an error adding the user')
                                 window.history.back();
                                 </script>";
                            }
                                							   
							    $SQLStringInsert -> close();
                                mysqli_close($DBConnect);
					}
				
				}	
		}
?>

</body>
</p>
</html>
