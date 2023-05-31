

<?php
session_start();
if(isset($_GET['email'], $_GET['country'], $_GET['state'])) {
    $country = $_GET['country'];
    $_SESSION['country'] = $_GET['country'];
    $state = $_GET['state'];
    $_SESSION['state'] = $_GET['state'];
    $email = $_GET['email'];
    $_SESSION['email'] = $_GET['email'];
    }

if (!empty($_REQUEST['submitButton'])) {
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $cpass = $_REQUEST['confirmPassword'];
    if ($pass != $cpass) {
        echo "<script> alert(' Please enter same password')</script>";
    } else if ($email != $email){
        echo"<script> alert('Email address not valid')</script>";
        }else {
        echo "<script> alert(' Success ')</script>"; }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="registerHandlerState.php">
                                        <form>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputUsername" type="text" placeholder="Username" name="username">
                                                        <label for="inputUsername" class="required-field">Username</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="password" />
                                                        <label for="inputPassword" class="required-field">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="confirmPassword" />
                                                        <label for="inputPasswordConfirm" class="required-field">Confirm Password</label>
                                                    </div>
                                                </div>                                                
                                                <div class="form-floating mb-3">
                                                    <br>
                                                </div>

                                            </div>
                                            <div class="mt-4 mb-0">
                                            
                                            <label for="submit">Create Account</label>
                                                <div class="d-grid"><input type="submit"  value ="Create Account" class="btn btn-primary btn-block" name="submitButton"></div>
                                                
                                                </div>
                                                <br>
                                                <a class="small" href="Login.php">Already have an account? Click here to login</a>
                                        </form>
                                    </div>
                                    
                                    <div class="card-footer text-center py-3">
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
                    </div>
                </footer>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        
    </body>
</html>
