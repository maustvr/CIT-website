<!--<?php include ('formHandler.php')?>-->

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
    header ("Location: login.php");
    exit;
}
include 'config.php';

$username = $_SESSION['username'];
//$username = "maine";
//$locationID = 14;
//$userID = 18;
$locationID = $_SESSION['locationID'];
$userID = $_SESSION['userID'];


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Incident Report</title>
        <!-- <title>SB Admin - Start Bootstrap Template</title> -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Incident Report</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="formHandler.php" name="incident">
                                            <!--<?php include('errors.php'); ?>-->
                                        <form>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                <label for="inputIncidentNumber" class="required-field">Incident Number</label>
                                                   
                                                 
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <br>
                                                        <input required class="form-control" id="inputIncidentNumber" type="text"  placeholder="Incident Number"  name="Incident" >
                                                        
                                                    </div>
                                                </div>
                        
                                            </div>
                                            <label for="inputCounty" class="required-field">County or Jurisdiction</label>
                                            <div class="form-floating mb-3">
                                            <br>
                                            <select required class="form-control" id="inputCounty" type="text" placeholder="County"  name="county" onchange="get()">
                                            <option value="">Please Select</option>
                                            <?php
                                                echo $username;
                                                //$DBConnect= mysqli_connect("database-1.cpiufp9nryjo.us-east-1.rds.amazonaws.com", "admin", "Administrator!", "sys");
                                               /* $sqlquery = "select * from users where username = '$username'";
                                                $connect = mysqli_query($DBConnect, $sqlquery);
                                                $result = mysqli_fetch_assoc($connect);
                                                $userLocation = $result['locationID'];*/
                                                //echo $userLocation;
                                                $Query = "select distinct county from departments where userID = '$userID'";
                                                //$Query = "select * from Counties where locationID = $userLocation";
                                                 $Result = @mysqli_query($DBConnect, $Query);
                                                if(mysqli_num_rows($Result) > 0) {
                                                
                                                while($Row = mysqli_fetch_assoc($Result)){?>
                                                                                                
                                                <option value="<?php echo $Row["county"]; ?>" ><?php echo $Row["county"]; ?></option>
                                                                                               
                                                <?php }
                                                 }
                                             ?>
                                             </select>

                                             <script>
                                                /*function get() {                         
                                                    var val = document.getElementById("inputCounty").value;
                                                    
	                                                $.ajax({          
        	                                            type:"POST",
        	                                            url:"getDept.php",                                                        
        	                                           data:'county='+val,
                                                       //alert(data);
        	                                            success: function(response){
                                                        //alert(response);
        		                                        $("#inputDepartment").html(response);
        	                                            }
	                                                });
                                                        }*/
                                       
                                             </script>
                                            </div>
                                            <label for="inputDepartment" class="required-field">Department</label>
                                            <div class="form-floating mb-3">
                                            <br>
                                                <select  required class="form-control" id="inputDepartment" name="department"  value="">

                                                <option value ="">Please Select</option>
                                               <!--<?php
                                                /*$county = $_SESSION['county'];
                                                $DBConnect= mysqli_connect("database-1.cpiufp9nryjo.us-east-1.rds.amazonaws.com", "admin", "Administrator!", "sys");
                                                $sqlquery = "select * from Counties where county = '$county'";
                                               $connect = mysqli_query($DBConnect, $sqlquery);
                                               $result = mysqli_fetch_assoc($connect);
                                                $countyId = $result['CountyID'];
                                                $_SESSION ['countyID'] = $countyId;

                                                $Query = "select * from departments where countyID = $countyId";
                                                 $Result = @mysqli_query($DBConnect, $Query);
                                                if(mysqli_num_rows($Result) > 0) {
                                           
                                                    while($Row = mysqli_fetch_assoc($Result)){?>
                                               <option value="<?php echo $Row["department"]; ?>" ><?php echo $Row["department"]; ?></option>
                                              <?php 
                                              }
                                                 }*/
                                             ?>-->
  
                                                </select>
                                            </div>
                                            <label for="inputMobileCrisisInvolvement" class="required-field">MOBILE CRISIS Involvement</label>
                                            <div class="form-floating mb-3">
                                            <br>
                                                <select  required class="form-control" id="inputMobileCrisisInvolvement" type="text"  placeholder="involvement" name="involvement">
                                                <option value ="">Please Select</option>
                                                <option value ="Not Needed">Not Needed</option>
                                                <option value ="Called, arrived in a timely manner">Called, arrived in a timely manner</option>
                                                <option value ="Called, arrived late">Called, arrived late </option>
                                                <option value ="Called, no show">Called, no show </option>
                                                <option value ="Called, discussed, no mobile response">Called, discussed, no mobile response </option>
                                                </select>
                                            </div>
                                            <label for="inputThreatAssessment" class="required-field">Consumer Threat Assessment</label>
                                            <div class="form-floating mb-3">
                                            <br>
                                                <select required class="form-control" id="inputThreatAssessment" type="text" placeholder="ThreatAssessment" name="threatAssessment"/>
                                                <option value ="">Please Select</option>
                                                <option value ="No Threat">No threat</option>
                                                <option value ="Threatened self or others">Threatened self or others</option>
                                                <option value ="Injured self or others">Injured self or others</option>
                                                
                                                </select>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                <label for="inputWeaponsPresent" class="required-field">Weapons Present</label>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <br>
                                                        <select required class="form-control" id="inputWeaponsPresent" type="text"  placeholder="WeaponsPresent"  name="weaponsPresent" onchange="showHideWeapons() " >

                                                        <option value ="">Please Select</option>
                                                        <option value ="None">None</option>
                                                        <option value ="Blade/edged weapon">Blade/edged weapon</option>
                                                        <option value ="Firearm">Firearm</option>
                                                        <option value ="Other">Other Please specify:</option>
                                                
                                                         </select>
                                                        

                                                        
                                                <input class="form-control" style="display: none;" id="inputOtherWeapon" name="otherWeapon" type="text" placeholder="OtherWeapon" /> 
                                                    </div>
                                                </div>
                        
                                            </div>
                                            <label for="inputOfficerIntervention" class="required-field">Officer Intervention</label>
                                            <div class="form-floating mb-3">
                                            <br>
                                                <select  required class="form-control" id="inputOfficerIntervention" type="text" placeholder="Officer Intervention" name="officerIntervention" onchange="showHideIntervention()"/>
                                                        <option value ="">Please Select</option>
                                                        <option value ="None">None</option>
                                                        <option value ="Deescalation">Deescalation</option>
                                                        <option value ="Physical Restraint">Phyiscal Restraint</option>
                                                        <option value ="Non-lethal">Non-lethal (Taser, baton, spray, beanbag, etc.)</option>
                                                        <option value ="Firearm">Firearm</option>
                                                        <option value ="Other">Other Please specify:</option>
                                                
                                                </select>
                                                <input class="form-control" style="display: none;" id="inputOtherIntervention" name="otherIntervention" type="text" placeholder="OtherIntervention"  /> 

                                            </div>
                                            <label for="inputCITOfficers" class="required-field">Certified CIT Officers on Scene</label>
                                            <div class="form-floating mb-3">
                                            <br>
                                                <select required class="form-control" id="inputCITOfficers" type="text" placeholder="CIT Officers on Scene" name="CITOfficers"/>
                                                        <option value ="">Please Select</option>
                                                        <option value ="None">None</option>
                                                        <option value ="Reporting officer (you)">Reporting officer (you)</option>
                                                        <option value ="Other LEOs">Other LEOs</option>
                                                       
                                                </select>
                                            </div>
                                            <label for="inputConsumerOutcome" class="required-field">Outcome for Consumer</label>
                                            <div class="form-floating mb-3">
                                            <br>
                                                <select required class="form-control" id="inputConsumerOutcome" type="text" placeholder="ConsumerOutcome " name="consumerOutcome" onchange="showHideOutcome()"/>
                                                        <option value ="">Please Select</option>
                                                        <option value ="No action">No action</option>
                                                        <option value ="Referred for mental health follow up">Referred for mental health follow up</option>
                                                        <option value ="Injured prior to intervention">Injured prior to intervention</option>
                                                        <option value ="Evaluated at ER">Evaluated at ER</option>
                                                        <option value ="Evaluated at walk-in crisis center">Evaluated at walk-in crisis center</option>
                                                        <option value ="Arrested">Arrested</option>
                                                        <option value ="Other">Other Please specify:</option>
                                                
                                                </select>
                                                <input class="form-control" style="display: none;" id="inputOtherOutcome" name="otherOutcome" type="text" placeholder="OtherOutcome" />
                                            </div>
                                            <label for="inputOptionalFeedback">Optional Feedback</label>
                                            <div class="form-floating mb-3">
                                            <br>
                                                <input class="form-control" id="inputOptionalFeedback" type="text" placeholder="feedback" name="feedback"/>
                                                
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                            <label for="submit">Submit Form</label>
                                                <div class="d-grid"><input type="submit" id="submit" value ="submit" class="btn btn-primary btn-block" ></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <!-- <div class="small"><a href="login.html">Have an account? Go to login</a></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
         
        <script src="js/scripts2.js"></script>

    </body>
</html>
