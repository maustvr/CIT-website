<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
    header ("Location: login.php");
    exit;
}
include 'config.php';
$username = $_SESSION['username'];
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
        <title>Invite User</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/countries.js"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                    
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Invite State</h3></div>
                                    <div class="card-body">
                                    <form method="post" action="sendStateInvitation.php">

                                    <div class="row mb-3">
                                                <div class="col-md-12">
                                                     <br>
                                                    <div class="form-floating mb-3">
                                                        <input type="hidden" class="form-control" id="inputCountry" type="text"   name="country"  value="United States">
                                                      </select>  
                                                    </div>
                                                    
                                                    <div>
                                                    <label for="inputState" class="required-field">Select State</label>
                                                    <div class="form-floating mb-3">
                                                     <br>

                                                    <div class="form-floating mb-3">
                                                        <select required class="form-control" id="inputState" type="text"   name="state/province" >
                                                            <option value="">Select State</option>
                                                            <option value="Alabama">Alabama</option>
	                                                        <option value="Alaska">Alaska</option>
	                                                        <option value="Arizona">Arizona</option>
	                                                        <option value="Arkansas">Arkansas</option>
	                                                        <option value="California">California</option>
	                                                        <option value="Colorado">Colorado</option>
	                                                        <option value="Connecticut">Connecticut</option>
	                                                        <option value="Delaware">Delaware</option>
	                                                        <option value="District of Columbia">District Of Columbia</option>
	                                                        <option value="Florida">Florida</option>
	                                                        <option value="Georgia">Georgia</option>
	                                                        <option value="Hawaii">Hawaii</option>
	                                                        <option value="Idaho">Idaho</option>
	                                                        <option value="Illinois">Illinois</option>
	                                                        <option value="Indiana">Indiana</option>
	                                                        <option value="Iowa">Iowa</option>
	                                                        <option value="Kansas">Kansas</option>
	                                                        <option value="Kentucky">Kentucky</option>
	                                                        <option value="Louisiana">Louisiana</option>
	                                                        <option value="Maine">Maine</option>
	                                                        <option value="Maryland">Maryland</option>
	                                                        <option value="Massachusetts">Massachusetts</option>
	                                                        <option value="Michigan">Michigan</option>
	                                                        <option value="Minnesota">Minnesota</option>
	                                                        <option value="Mississippi">Mississippi</option>
	                                                        <option value="Missouri">Missouri</option>
	                                                        <option value="Montana">Montana</option>
	                                                        <option value="Nebraska">Nebraska</option>
	                                                        <option value="Nevada">Nevada</option>
	                                                        <option value="New Hampshire">New Hampshire</option>
	                                                        <option value="New Jersey">New Jersey</option>
	                                                        <option value="New Mexico">New Mexico</option>
	                                                        <option value="New York">New York</option>
	                                                        <option value="North Carolina">North Carolina</option>
	                                                        <option value="North Dakota">North Dakota</option>
	                                                        <option value="Ohio">Ohio</option>
                                                            <option value="Oklahoma">Oklahoma</option>
	                                                        <option value="Oregon">Oregon</option>
	                                                        <option value="Pennsylvania">Pennsylvania</option>
	                                                        <option value="Rhode Island">Rhode Island</option>
	                                                        <option value="South Carolina">South Carolina</option>
	                                                        <option value="South Dakota">South Dakota</option>
	                                                        <option value="Tennessee">Tennessee</option>
	                                                        <option value="Texas">Texas</option>
	                                                        <option value="Utah">Utah</option>
	                                                        <option value="Vermont">Vermont</option>
	                                                        <option value="Virginia">Virginia</option>
	                                                        <option value="Washington">Washington</option>
	                                                        <option value="West Virginia">West Virginia</option>
	                                                        <option value="Wisconsin">Wisconsin</option>
	                                                        <option value="Wyoming">Wyoming</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                            <option value="Virgin Islands">Virgin Islands</option>
                                                      </select>  
                                                    </div>
                                                    <div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputUsername" type="text" placeholder="Username" name="username">
                                                        <label for="inputUsername" class="required-field">Username</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="small mb-3 text-muted">Enter the email address to send a registration link.</div>
                                            <div class="form-floating mb-3">
                                            
                                                <input required class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email"/>
                                                <label for="inputEmail" class="required-field">Email address</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <div class="d-grid"><input type="submit"  value ="Submit" class="btn btn-primary btn-block" name="submit"></div>

                                            </div>
                                        </form>
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
        
        <script src="js/scripts2.js"></script>
    </body>
</html>
