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
$userState = $_SESSION['userState'];
$userCountry = $_SESSION['userCountry'];

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
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                    
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Invite User</h3></div>
                                    <div class="card-body">
                                    <form method="post" action="sendCountyInvitation.php">
                                        <div class="row mb-3">
                                                <div class="col-md-12">
                                                <br>
                                                <div class="form-floating mb-3">
                                                        <input type="hidden" class="form-control" id="inputCountry" type="text"   name="country"  value="<?php echo $userCountry ?>">
                                                        <!--<select required class="form-control" id="inputCountry" type="text"   name="country" >
                                                        
                                                        <select required class="form-control" id="inputCountry" type="text" placeholder="country" name="country" />
                                                        <label for="inputCountry" class="required-field">Country</label>-->
                                                      </select>  
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="hidden" class="form-control" id="inputState" type="text"   name="state"  value="<?php echo $userState ?>">
                                                        </select>  
                                                    </div>
                                                    
                                                    <div>
                                                     <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputUsername" type="text" placeholder="Username" name="username">
                                                        <label for="inputUsername" class="required-field">Username</label>
                                                    </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputCounty" type="text" placeholder="county" name="county">
                                                        <label for="inputCounty" class="required-field">County</label>
                                                    </div>
                                                </div>
                                                    <div class="small mb-3 text-muted">Enter the email address to send a registration link.</div>
                                                        <div class="form-floating mb-3">
                                                        <!--<select required class="form-control" id="inputCountry" type="text"   name="country" >
                                                        
                                                        <select required class="form-control" id="inputCountry" type="text" placeholder="country" name="country" />
                                                        <label for="inputCountry" class="required-field">Country</label>-->
                                                     
                                                    
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="" />
                                                <label for="inputEmail">Email address</label>
                                            </div>

                                            <!--<div class="form-floating mb-3">
                                                    <br>
                                                    <div class="admin">
                                                    <input type="checkbox" class="checkbox" id="isAdmin" name="isAdmin" value="isAdmin"/>
                                                    <label for="isAdmin" class="checkbox-label">Is Administrator</label>
                                                        </div>-->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!--<a class="small" href="login.php">Return to login</a>-->
                                                <div class="d-grid"><input type="submit"  value ="Submit" class="btn btn-primary btn-block" name="submit"></div>

                                            </div>
                                        </form>
                                    </div>
                                    <!--<div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>-->
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
