<html lang="en">
<head>

<style>

</style>

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
session_start();
include 'config.php';
//start the session
$isAdmin = $_SESSION['isAdmin'];
$confirmEmail = $_SESSION['confirmEmail'];
//$isAdmin = $_SESSION['isAdmin'];
echo $confirmEmail;
echo $isAdmin;

?>
</head>
<p>
<body>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
    include 'config.php';
    session_start();
    $isAdmin = $_SESSION['isAdmin'];
    echo "hello";
    echo $isAdmin;
	
	
    if (!empty($_REQUEST['submitButton'])) {
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $cpass = $_REQUEST['confirmPassword'];
    if ($pass != $cpass) {
        echo "<script> alert(' Please enter same password');
        window.history.back();
        </script>";
        
    } else {
        //echo "<script> alert(' Success ')</script>";
}
    
	    $userTable = "users";
        $locationTable = "location";
        $Country = stripslashes($_POST['country']);
        $state = stripslashes($_POST['state/province']);
        $username = stripslashes($_POST['username']);
        $email = stripslashes($_POST['email']);           
        $password = stripslashes($_POST['password']);
        $hash = password_hash($password, PASSWORD_DEFAULT);
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
                $stmt->bind_param("ss", $Country, $state);
                $stmt ->execute();
                $QueryResult = $stmt -> get_result();
			    $ResultId = mysqli_fetch_assoc($QueryResult);
				if(mysqli_num_rows($QueryResult) == 0){
                    $stmt2 =$DBConnect ->prepare("insert into location (country, state) values (?, ?)");
                    $stmt2->bind_param("ss", $Country, $state);
                    if(!$stmt2 -> execute()) {
                        echo "<script> alert(' Unable to add location)
                        window.history.back();
                        </script>";
                        }else {
                        $getLocationId = $DBConnect -> prepare("select * from $locationTable where country = ? and state = ?");
                        $getLocationId ->bind_param("ss", $Country, $state);
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
                    $SQLStringInsert = $DBConnect -> prepare("insert into $userTable(username, password, email, locationID, isAdmin) values(?, ?, ?, ?, ?)");
                    $SQLStringInsert -> bind_param("sssis", $username, $hash, $email, $locationID, $isAdmin);
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
