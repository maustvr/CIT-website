<html lang="en">
<head>

<style>

</style>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
include 'config.php';
$username = $_SESSION['username'];
$locationID = $_SESSION['locationID'];

$userID = $_SESSION['userID'];

$userState = $_SESSION['userState'];
$userCountry = $_SESSION['userCountry'];

echo $uerID;

?>
</head>
<p>
<body>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
	
		$usersTable = "users";
		$IncidentsTable = "Incidents";
        //$countiesTable = "Counties";
        $deptTable = "departments";
        $county = stripslashes($_POST['county']);
        $departments = $_POST['department'];            
        $_SESSION['County'] = $county;
			                 
            foreach ($departments as $department) {
                if($department != null) {
                echo $department."<br>";
                $stmt = $DBConnect->prepare("insert into $deptTable (county, department, userID, locationID) values (?, ?, ?, ?)");
                $stmt->bind_param("ssii", $county, $department, $userID, $locationID);
                    if(!$stmt->execute()){
                        echo "<script> alert(' Unable to add location)</script>";
                        } else {
                            echo "<script> alert(' New record has been added')
                            location = 'dashboard.php';
                            </script>";
                                }
                        }
                    }               
              }
             							
			    $stmt ->close();
                mysqli_close($DBConnect);
				
?>

</body>
</p>
</html>
