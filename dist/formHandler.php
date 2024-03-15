<html lang="en">
<head>

<style>

</style>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
$userID = $_SESSION['userID'];  
include 'config.php';

?>
</head>
<p>
<body>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
	
	
			
	//$DBConnect= mysqli_connect("database-1.cpiufp9nryjo.us-east-1.rds.amazonaws.com", "admin", "Administrator!", "sys");
	
	if($DBConnect === false)
		print"Unable to connect to the database, error, number:".mysqli_errno();

		else{
            print"connected to DB";
			$usersTable = "users";
			$IncidentsTable = "Incidents";
            $IncidentNum = stripslashes($_POST['Incident']);
            $County = stripslashes($_POST['county']);
            $department = stripslashes($_POST['department']);
            $MCInvolvement = stripslashes($_POST['involvement']);
            $ConsThreatAsses = stripslashes($_POST['threatAssessment']);           
            $otherWeapons = stripslashes($_POST['otherWeapon']);
            $Weapons = stripslashes($_POST['weaponsPresent']);
            $officerInvolv = stripslashes($_POST['officerIntervention']);
            $otherInvolvement = stripslashes($_POST['otherIntervention']);
            $CITOnScene = stripslashes($_POST['CITOfficers']);
            $Outcome = stripslashes($_POST['consumerOutcome']);
            $otherOutcome = stripslashes($_POST['otherOutcome']);
            $Feedback = stripslashes($_POST['feedback']);
            $_SESSION['IncidentsTable'] = $IncidentsTable;
            $_SESSION['County'] = $County;
			$_SESSION['department'] = $department;
            $_SESSION['MCInvolvement'] = $MCInvolvement;
            $_SESSION['ConsThreatAsses'] = $ConsThreatAsses;
            $_SESSION['Weapons'] = $Weapons;
            $_SESSION['officerInvolv'] = $officerInvolv;
            $_SESSION['CITOnScene'] = $CITOnScene;
            $_SESSION['Outcome'] = $Outcome;
            $_SESSION['Feedback'] = $Feedback;
			$name = $_SESSION['name'];
			$username = $_SESSION['username'];
            echo $username;


			//$SQLString = "select * from $usersTable where username = '$username'";
			
			//$QueryResult = mysqli_query($DBConnect, $SQLString);
			//$ResultId = mysqli_fetch_assoc($QueryResult);
				/*if(mysqli_num_rows($QueryResult) == 0){
				
					echo $username;
					print"project handler user does not exist";					
					header('refresh:3; url=incorrectLogin.php');					
					exit;					
				}
					else 
						 
							$ID = $ResultId['ID'];*/

                            If ($Weapons == "Other") {
                                $Weapons ="$Weapons:  $otherWeapons";
                           }
                           If ($officerInvolv == "Other") {
                               $officerInvolv = "$officerInvolv: $otherInvolvement";
                           }

                           If ($Outcome =="Other") {
                               $Outcome = "$Outcome: $otherOutcome";
                           }

                           $Query = "Select * from $usersTable where username = '$username'";
                           $QueryResult = mysqli_query($DBConnect,$Query);
                           $Result = mysqli_fetch_assoc($QueryResult);

                           $locationID = $Result['locationID'];
                           echo $locationID;

                           $queryDept = "Select * from departments where department = '$department'";
                           $deptResult = mysqli_query($DBConnect, $queryDept);
                           $dept = mysqli_fetch_assoc($deptResult);
                           $deptId = $dept['deptID'];
                           echo $deptId;


                           if(isset($_POST['Incident'])) {
                                $stmt = $DBConnect->prepare("insert into $IncidentsTable(IncidentNum, deptId, MCInvolvement, ConsThreatAsses,
                                Weapons, officerInvolv, CITOnScene, Outcome, Feedback) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                $stmt->bind_param("sisssssss", $IncidentNum, $deptId,
                                 $MCInvolvement, $ConsThreatAsses, $Weapons,$officerInvolv, $CITOnScene, $Outcome, $Feedback);
                                if($stmt ->execute()) {

             //$SQLString = "select * from $locationTable where country = '$Country' and state = '$state'";
			
			//$QueryResult = mysqli_query($DBConnect, $SQLString);
                            //$QueryResult = $stmt -> get_result();
							
							/*$SQLStringInsert = "insert into $IncidentsTable(IncidentNum, County, department, MCInvolvement, ConsThreatAsses,
                            Weapons, officerInvolv, CITOnScene, Outcome, Feedback) values('$IncidentNum', '$County', '$department',
                             '$MCInvolvement', '$ConsThreatAsses', '$Weapons',
							'$officerInvolv', '$CITOnScene', '$Outcome', '$Feedback')";*/
                           

                            
                            //if(mysqli_query($DBConnect, $SQLStringInsert)){
                                    echo "<script> alert(' New record has been added')
                                        location = 'adminDashboard.php';
                                        </script>";
                                     //"New record has been added"; 
                                 //header('Location: entry-form.php');
                               // exit;
                            }else {
                                 echo "<script> alert(' There was an error')</script>";
                                print"There was an error";
                               // exit;
                            }
                            
							
							    $stmt ->close();
                                }
                                mysqli_close($DBConnect);
					}
				
					
		

?>

</body>
</p>
</html>
