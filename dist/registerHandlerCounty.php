<html lang="en">
<head>

<style>

</style>

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
session_start();
include 'config.php';
//start the session
$isAdmin = $_SESSION['isAdmin'];
$country = $_SESSION['country'];
$state = $_SESSION['state'];
$email = $_SESSION['email'];
//$isAdmin = $_SESSION['isAdmin'];
//echo $confirmEmail;
/*echo $isAdmin;
echo $country;
echo $state;*/

?>
</head>
<p>
<body>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
    include 'config.php';
    session_start();
    //$isAdmin = $_SESSION['isAdmin'];
    echo "hello";
    //echo $isAdmin;
    //echo $country;
    //echo $state;
	
	
    if (!empty($_REQUEST['submitButton'])) {
    //$email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $cpass = $_REQUEST['confirmPassword'];
    if ($pass != $cpass) {
        echo "<script> alert(' Please enter same password');
        window.history.back();
        </script>";
        //header ('Location: register.php');
        //exit;
    } else {
        //echo "<script> alert(' Success ')</script>";
}
    
	   // $servername = "database-1.cpiufp9nryjo.us-east-1.rds.amazonaws.com";
        //$username = "admin";
        //$password = "Administrator!";
        //$dbname = "sys";
        //$DBConnect= mysqli_connect($servername, $username, $password, $dbname);
	    //$DBConnect= mysqli_connect("database-1.cpiufp9nryjo.us-east-1.rds.amazonaws.com", "admin", "Administrator!", "sys");
	
	    /*if($DBConnect === false) {
		//print"Unable to connect to the database, error, number:".mysqli_errno();
             echo "<script> alert(' Unable to connect to the database, error, number:'.mysqli_errno())</script>";

		    }else{
            //print"connected to DB";
            //echo "<script> alert()"
    //create connection
   /* $DBConnect = new mysqli($servername, $username, $password, $dbname);

    //check connection
    if ($DBConnect->connect_error) {
        die("Connection failed: " . $DBConect->connect_error);
      }*/

      
			
			    $userTable = "users";
                $locationTable = "location";
                //$Country = stripslashes($_POST['country']);
                //$state = stripslashes($_POST['state/province']);
                $username = stripslashes($_POST['username']);
                //$email = stripslashes($_POST['email']);           
                $password = stripslashes($_POST['password']);
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $fedAdmin = "no";
                $isActive = "yes";
                
                
                /*if(isset($_POST['isAdmin'])){
                    $isAdmin = "yes";
                    } else {
                         $isAdmin = "no";
                }*/
                
                $_SESSION['username'] = $username;
            $confirmPassword = stripslashes($_POST['confirmPassword']);
            if($password != $confirmPassword) {
                print"Passwords do not match";
                //header('refresh:15; url=register.php');
							//exit;
            } else {

           
			//$name = $_SESSION['name'];
			//$username = $_SESSION['username'];
                $stmt = $DBConnect->prepare("Select * from $userTable where username = ?");
                $stmt->bind_param("s", $username);
                  $stmt ->execute();

                //$stmt ->bind_param("s", $username);
                //$stmt ->execute();
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

             //$SQLString = "select * from $locationTable where country = '$Country' and state = '$state'";
			
			//$QueryResult = mysqli_query($DBConnect, $SQLString);
                $QueryResult = $stmt -> get_result();

			    $ResultId = mysqli_fetch_assoc($QueryResult);
				if(mysqli_num_rows($QueryResult) == 0){
                    $stmt2 =$DBConnect ->prepare("insert into location (country, state) values (?, ?)");
                    $stmt2->bind_param("ss", $country, $state);
                   // $stmt2 ->execute();
				    //$SQLString = "insert into location (country, state) values ('$Country', '$state')";
                   
                    //if(mysqli_query($DBConnect, $SQLString)){
                    if(!$stmt2 -> execute()) {
                                //print "New location has been added";
                                echo "<script> alert(' Unable to add location)
                                 window.history.back();
                                 </script>";
                            }else {
                               // print"There was an error";
                           // }

                   // $getLocationId = "select * from $locationTable where country = '$Country' and state = '$state'";
                        $getLocationId = $DBConnect -> prepare("select * from $locationTable where country = ? and state = ?");
                        $getLocationId ->bind_param("ss", $country, $state);
         
                   // $SQLRetrieve = mysqli_query($DBConnect, $getLocationId);
                        if($getLocationId ->execute()) {
                        
                             $SQLRetrieve = $getLocationId -> get_result();
                            $result = mysqli_fetch_assoc($SQLRetrieve);
                            $locationID = $result['locationID'];
                            $_SESSION['locationID'] = $locationID;
                        //echo $locationID;

					/*echo $username;
					print"project handler user does not exist";					
					header('refresh:3; url=incorrectLogin.php');					
					exit;*/
                         $stmt -> close();
                        $stmt2 -> close();
                        $getLocationId -> close();
				         }
                     }
               }
					else 
						    $locationID = $ResultId['locationID'];
							//$locationID = $ResultId['locationID'];
                           /* If ($Weapons == "Other") {
                                $Weapons ="$Weapons:  $otherWeapons";
                           }
                           If ($officerInvolv == "Other") {
                               $officerInvolv = "$officerInvolv: $otherInvolvement";
                           }

                           If ($Outcome =="Other") {
                               $Outcome = "$Outcome: $otherOutcome";
                           }*/
                           //$SQLString = "select * from $usersTable where username = '$username'";

							//$SQLStringInsert = "insert into $userTable(username, password, email, locationID, isAdmin) values('$username', '$hash', '$email', '$locationID', '$isAdmin')";
                           $SQLStringInsert = $DBConnect -> prepare("insert into $userTable(username, password, email, locationID, isAdmin, fedAdmin, isActive) values(?, ?, ?, ?, ?, ?, ?)");
                           $SQLStringInsert -> bind_param("sssisss", $username, $hash, $email, $locationID, $isAdmin, $fedAdmin, $isActive);
                            
                            //if(mysqli_query($DBConnect, $SQLStringInsert)){
                            if($SQLStringInsert ->execute()) {
                                echo "<script> alert('New record has been added')</script>";
                                header("Location: login.php");

                                //print "New record has been added";
                            }else {
                                //print"There was an error";
                                /*echo"<script> alert ('There was an error adding the user')
                                 window.history.back();
                                 </script>";*/
                            }
                                
                                
							   
							    $SQLStringInsert -> close();
                                mysqli_close($DBConnect);
					}
				
				}	
		}
    //}
?>

</body>
</p>
</html>
