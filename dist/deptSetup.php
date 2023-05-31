

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
    header ("Location: login.php");
    exit;
}
$username = $_SESSION['username'];
$locationID = $_SESSION['locationID'];
$userID = $_SESSION['userID'];
$isAdmin = $_SESSION['isAdmin'];
$username = $_SESSION['username'];

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
        <title>Department Set Up</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Set Up Departments</h3></div>
                                    <div class="card-body">
                                        <form  method="post" action="deptSetupHandler.php">
                                            
                                        <form>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                
                                                </div>
                        
                                            </div>
                                            <label for="inputCounty" class="required-field">County or Jurisdiction</label>
                                            <div class="form-floating mb-3">
                                            <br>
                                                <input required class="form-control" id="inputCounty" type="text" placeholder="County" name="county">
                                               
                                            </div>
                                            <label for="inputDepartment" >Department</label>
                                            <div  class="form-floating mb-3">
                                            <br>
                                                <div id="dept"><input class="form-control" id="inputDepartment" name="department[]" value="">
                                                <br></div>
                                                </div>
                                                <label for="addDept">Add Department</label>
                                                <div class="form-floating mb-3">
                                                <div>
                                                <button type="button" id="addDept"  class="btn btn-primary btn-block">Add Department</button>
                                                <p id="demo"></p>
                                                
                                                </div>
                                                </div>
                                                
                                            
                                            <div class="mt-4 mb-0">
                                            <label for="submit">Submit Form</label>
                                                <div class="d-grid"><input type="submit" id="submit" value ="submit" class="btn btn-primary btn-block" ></div>
                                            </div>
                                            <br>
                                            <a class="small" href="dashboard.php">Skip setup, continue to Dashboard</a> 
                                            
                                          
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
        <script>
            
          
        </script>
      
    </body>
</html>
