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
	
	
			
	/*$DBConnect= mysqli_connect("database-1.cpiufp9nryjo.us-east-1.rds.amazonaws.com", "admin", "Administrator!", "sys");
	
	if($DBConnect === false)
		print"Unable to connect to the database, error, number:".mysqli_errno();

		else{
            print"connected to DB";*/
			$usersTable = "users";
			$IncidentsTable = "Incidents";
            //$countiesTable = "Counties";
            $deptTable = "departments";
            $county = stripslashes($_POST['county']);
            $departments = $_POST['department'];
            
            
            $_SESSION['County'] = $county;
			
			//$name = $_SESSION['name'];
			//$username = $_SESSION['username'];
            //echo $username;
            /*$getLocationId = $DBConnect -> prepare("select * from $usersTable where username = ?");
                        $getLocationId ->bind_param("s", $username);
         
                   // $SQLRetrieve = mysqli_query($DBConnect, $getLocationId);
                        if($getLocationId ->execute()) {
                        
                             $SQLRetrieve = $getLocationId -> get_result();
                            $result = mysqli_fetch_assoc($SQLRetrieve);
                            $locationID = $result['locationID'];*/
                            //echo $locationID;

//}
			 
                   /* $sqlinsert = $DBConnect->prepare("Select * from $countiesTable where county = ? and locationID = ?");
                    $sqlinsert->bind_param("si", $County, $locationID);
                    $sqlinsert ->execute();*/

             //$SQLString = "select * from $locationTable where country = '$Country' and state = '$state'";
			
			//$QueryResult = mysqli_query($DBConnect, $SQLString);
                /*$QueryResult = $sqlinsert -> get_result();

			    $ResultId = mysqli_fetch_assoc($QueryResult);
				if(mysqli_num_rows($QueryResult) == 0){

                  $sqlstmt = $DBConnect->prepare("insert into $countiesTable (county, locationID) values (?, ?)");
                  $sqlstmt->bind_param("si", $County, $locationID);
                  $sqlstmt->execute();

                   $getCountyId = $DBConnect -> prepare("select * from $countiesTable where county = ? and locationID = ?");
                   $getCountyId ->bind_param("si", $County, $locationID);
         
                   // $SQLRetrieve = mysqli_query($DBConnect, $getLocationId);
                       /* if($getCountyId ->execute()) {
                        
                             $SQLResult = $getCountyId -> get_result();
                            $result = mysqli_fetch_assoc($SQLResult);
                            $countyID = $result['CountyID'];
                            echo $countyID;
                            
                            }
                            
                            }else {
                                $countyID = $ResultId['CountyID'];
                                echo $countyID;
                                }*/
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
                //$stmt ->bind_param("s", $username);
                //$stmt ->execute();
                /*QueryResult = $stmt -> get_result();
                $Result = mysqli_fetch_assoc($QueryResult);
                if(mysqli_num_rows($QueryResult) > 0) {
                    echo "<script> alert('user already exists');
                    window.history.back();
                    </script>";
                  //$sql = "insert into departments(county, department) values ('$County', '$department')";
                  //mysqli_query($DBConnect, $sql);*/
                 
               //}
             /* }
              }
             /* $serialized_data  = serialize($department);
                $sql = "insert into departments(details) value ('$serialized_data')";
                mysqli_query($DBConnect, $sql);
                           

                          /* $Query = "Select * from $usersTable where username = '$username'";
                           $QueryResult = mysqli_query($DBConnect,$Query);
                           $Result = mysqli_fetch_assoc($QueryResult);

                           $locationID = $Result['locationID'];
                           echo $locationID;


                           if(isset($_POST['Incident'])) {
                                $stmt = $DBConnect->prepare("insert into $IncidentsTable(IncidentNum, locationID,  County, department, MCInvolvement, ConsThreatAsses,
                                Weapons, officerInvolv, CITOnScene, Outcome, Feedback) values(?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?)");
                                $stmt->bind_param("sisssssssss", $IncidentNum, $locationID, $County, $department,
                                 $MCInvolvement, $ConsThreatAsses, $Weapons,$officerInvolv, $CITOnScene, $Outcome, $Feedback);
                                if($stmt ->execute()) {

             //$SQLString = "select * from $locationTable where country = '$Country' and state = '$state'";
			
			//$QueryResult = mysqli_query($DBConnect, $SQLString);
                            //$QueryResult = $stmt -> get_result();
							
							/*$SQLStringInsert = "insert into $IncidentsTable(IncidentNum, County, department, MCInvolvement, ConsThreatAsses,
                            Weapons, officerInvolv, CITOnScene, Outcome, Feedback) values('$IncidentNum', '$County', '$department',
                             '$MCInvolvement', '$ConsThreatAsses', '$Weapons',
							'$officerInvolv', '$CITOnScene', '$Outcome', '$Feedback')";*/
                           

                            
                            /*if(mysqli_query($DBConnect, $sql)){
                                    echo "<script> alert(' New record has been added');
                                        //location = 'adminDashboard.php';
                                        </script>";
                                     //"New record has been added"; 
                                 //header('Location: entry-form.php');
                               // exit;
                            }else {
                                 echo "<script> alert(' There was an error')</script>";
                                print"There was an error";
                               // exit;
                            //}*/
                            
							
							    $stmt ->close();
                                //}
                                mysqli_close($DBConnect);
					//}
				
					
		

?>

</body>
</p>
</html>
