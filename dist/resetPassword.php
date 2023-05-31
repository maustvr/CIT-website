
<!--<?php include ('server.php') ?>-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- <title>Login - SB Admin</title> -->
        <title>Reset Password</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <!--<body class="bg-primary">-->
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                                    <div class="card-body">
                                    <?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
                                        if($_GET['username'] && $_GET['token']) {
                                             include "config.php";
                                           $username = $_GET['username'];
                                            //$username = 'arizona';
                                           $token = $_GET['token'];
                                           //$token = 'df8e13c11753fd7f2a464313834f5dc6';

                                            $query = mysqli_query($DBConnect, "SELECT * FROM users WHERE username='$username' and resetToken = '$token'");

                                            $current_date = date("Y-m-d H:i:s");

                                            if (mysqli_num_rows($query) > 0) {

                                            $row = mysqli_fetch_assoc($query); 

                                            if($row['expiryDate'] >= $current_date)
                                            {
                                            ?>
                                        <form method="post" action="updatePassword.php">
                                            
                                        <form>
                                            <div class="form-floating mb-3">
                                                <input type="hidden" name="username" value="<?php echo $username; ?>">
                                                <input type="hidden" name="resetToken" value="<?php echo $token; ?>">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input required class="form-control" id="inputPassword" type="password" placeholder="Password" name="password"/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input required class="form-control" id="inputConfirmPassword" type="password" placeholder="Password" name="confirmPassword"/>
                                                <label for="inputConfirmPassword">Confirm Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <input type="submit"  class="btn btn-primary" >
                                                <!--<a class="btn btn-success" href="index.html">Login</a>-->
                                            </div>
                                        </form>
                                        <?php }
                                        }
                                           } else {
                                               echo "<p>This forget password link has been expired</p>";
                                           }
                                        //}
                                    ?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <!-- <div class="small"><a href="register.html">Need an account? Sign up!</a></div> -->
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
