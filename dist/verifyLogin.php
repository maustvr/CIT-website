<html lang="en">
<head>

<style>

</style>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();

include 'config.php';

?>
</head>
<p>
<body>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
	
	$userTable = "users";  
    $username = stripslashes($_POST['username']);                       
    $password = stripslashes($_POST['password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);
     echo "<script> alert('<?php echo $username; ?>')</script>";
    $_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
    $stmt = $DBConnect->prepare("Select * from $userTable where username = ?");
    $stmt->bind_param("s", $username);
    $stmt ->execute();
    $QueryResult = $stmt -> get_result();
    $Result = mysqli_fetch_assoc($QueryResult);
    if(mysqli_num_rows($QueryResult) == 0) {
        echo "<script> alert('Incorrect username')
        location = 'login.php';
        </script>";
            exit;
            } else {
                $PW = $Result['password'];
                $username = $Result['username'];
                if (password_verify($password, $PW)) {
                        $ID = $Result['usersID'];
                        $_SESSION ['userID'] = $ID;
						$_SESSION['logged_in'] = true;
                         print"logged in";
                        echo $ID;
                        $stmt2 = $DBConnect->prepare("select * from location where locationID IN 
		                    (select locationID from users where usersID = ?)");
                        $stmt2->bind_param("s", $ID);
                        $stmt2 ->execute();
                        $QueryReturn = $stmt2 -> get_result();
                        $Return = mysqli_fetch_assoc($QueryReturn);
                        $userState = $Return['state'];
                        $userCountry = $Return['country'];
                        $locationID = $Return['locationID'];
                        $isActive = $Result['isActive'];
                        $isAdmin = $Result['isAdmin'];
                        $fedAdmin = $Result['fedAdmin'];
                        $_SESSION['isActive'] = $isActive;
                        $_SESSION['isAdmin'] = $isAdmin;
                        $_SESSION['fedAdmin'] = $fedAdmin;
                        $_SESSION['userState'] = $userState;
                        $_SESSION['userCountry'] = $userCountry;
                        $_SESSION['locationID'] = $locationID;
                        $isFed = $_SESSION['fedAdmin'];
                        if($isActive == "yes") {
                            header("Location: dashboard.php");
                                exit;
						}else 
						     echo "<script> alert('Your account is inactive')
                            location = 'login.php';
                        </script>";
                             exit;
						} else {
                           echo "<script> alert('incorrect login')
                                    location = 'login.php';
                                    </script>";
                                    exit;
					} 
                    }
                    $stmt ->close();
				    mysqli_close($DBConnect);

?>

</body>
</p>
</html>
