<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
include 'config.php';
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {

    header ("Location: login.php");
    exit;

}
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
//$username = 'maine';

//$userID = 18;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin</title>
        <!--<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!--<script src="js/scripts2.js"></script>-->
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <!---<a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>-->
            <!-- Sidebar Toggle-->
            <a class="navbar-brand ps-3" ><?php echo $username?> </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color:white"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown" style="color:white">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw" style="color:white"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!--<li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>-->
                        <li><a class="dropdown-item" href="#!">Change Password</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!--<div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="entry-form.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                New Report
                            </a>-->
                            <div class="sb-sidenav-menu-heading">Links</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Admin
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="inviteStateAdmin.php">Invite new State</a>
                                    <a class="nav-link" href="inviteCountryAdmin.php">Invite new Country</a>
                                    <!--<a class="nav-link" href="deptSetup.php">Add Departments</a>-->
                                    <a class="nav-link" href="forgotPassword.php">Reset Password</a>
                                    <a class="nav-link" href="viewUsers.php">View Users</a>
                                    <a class="nav-link" href="deActivateUser.php">Deactivate User</a>
                                    <!--<a class="nav-link" href="deleteIncident.php">Delete Incident</a>-->

                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Reports
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <!--<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Charts-->
                                        <!--<a class="nav-link" href="fedAdminCharts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="fedAdminTables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>-->
                                        <!--<div class="sb-sidenav-menu-heading">Addons</div>-->
                                        <!--<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area">Charts</i></div></a>
                                        Charts
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>-->
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">

                                            <a class="nav-link" href="charts.php">
                                             
                                            <a class="nav-link" href="login.html">Add New Account</a>
                                            <a class="nav-link" href="register.html">Deactivate User</a>
                                            <a class="nav-link" href="password.html">View Users</a>
                                            <a class="nav-link" href="password.html">Reset Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area">Charts</i></div>
                                        Charts
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="fedAdminCharts.php">All Locations</a>
                                            <a class="nav-link" href="fedAdminCountryCharts.php">Countries</a>
                                            <a class="nav-link" href="fedAdminStateCharts.php">States</a>
                                            <a class="nav-link" href="fedAdminCountyCharts.php">Counties</a>
                                            <a class="nav-link" href="fedAdminDeptCharts.php">Department</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <!--<div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>-->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $username?>
                        <?php echo $userID?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!--<div class="card bg-primary text-white mb-4">-->
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body" href="entry-form.php">Incident Report</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="entry-form.php">File New Report</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body" href="stateReportFedAdmin.php">State Data</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="stateReportFedAdmin.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body" href="countryReportFedAdmin.php">Country Data</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="countryReportFedAdmin.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body" href="allReportsFedAdmin.php">All Locations</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="allReportsFedAdmin.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <?php echo $username?>

                            </div>

                           

            <script>

           
             </script>
                                              </div>  
                                            </div>
                            <div class="card-body">
                            <div class="col col-md-6 text-right">
        <button type="button" id="export_button"  class="btn btn-primary btn-sm">Export to Excel</button>
    </div>
    <br>

                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Incident Number</th>
                                            <th>County</th>
                                            <th>Department</th>
                                            <th>MOBILE CRISIS Unit Involvement</th>
                                            <th>Threat Assessment</th>
                                            <th>Weapons</th>
                                            <th>Officer Involvement</th>
                                            <th>CIT On Scene</th>
                                            <th>Outcome</th>
                                            <th>Feedback</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php

                                   //$DBConnect= mysqli_connect("database-1.cpiufp9nryjo.us-east-1.rds.amazonaws.com", "admin", "Administrator!", "sys");
                                  /* $MyQuery = "select * from users where username = '$username'";
                                   $userResult = mysqli_query($DBConnect, $MyQuery);
                                   $user = mysqli_fetch_assoc($userResult);
                                   $userID = 18;
                                   //$userID = $user['usersID'];
                                   echo $userID;
                                   //$locationID = '14';
                                   function resultToArray($result) {
                                    $rows = array();
                                    while($row = $result->fetch_assoc()) {
                                        $rows[] = $row;
                                        }
                                            return $rows;
}
                                   $SqlQuery = "select * from departments where userID = '$userID' ";
                                   $return = mysqli_query($DBConnect, $SqlQuery);
                                   $depts = mysqli_fetch_all($return);
                                   $dept = $depts['department'];*/

                                   $Query = "select * from Incidents JOIN departments on Incidents.deptId = departments.deptID where departments.deptId IN (select deptID from departments where userID = '$userID')";
                                    $Result = @mysqli_query($DBConnect, $Query);
                                    if(mysqli_num_rows($Result)>0) {
                                        while(($Row = mysqli_fetch_assoc($Result))== true){ ?>
                                        <tr>
                                        <td><?php echo $Row["IncidentNum"]; ?></td>
                                        <td><?php echo $Row["county"]; ?></td>
                                        <td><?php echo $Row["department"]; ?></td>
                                        <td><?php echo $Row["MCInvolvement"]; ?></td>
                                        <td><?php echo $Row["ConsThreatAsses"]; ?></td>
                                        <td><?php echo $Row["Weapons"]; ?></td>
                                        <td><?php echo $Row["OfficerInvolv"]; ?></td>
                                        <td><?php echo $Row["CITOnScene"]; ?></td>
                                        <td><?php echo $Row["Outcome"]; ?></td>
                                        <td><?php echo $Row["Feedback"]; ?></td>
                                        </tr>
                                        <?php }
                                     }
                                     ?>
                                    
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Incident Number</th>
                                            <th>County</th>
                                            <th>Department</th>
                                            <th>MOBILE CRISIS Unit Involvement</th>
                                            <th>Threat Assessment</th>
                                            <th>Weapons</th>
                                            <th>Officer Involvement</th>
                                            <th>CIT On Scene</th>
                                            <th>Outcome</th>
                                            <th>Feedback</th>
                                        </tr>
                                    </tfoot>
                                </table>
                               <script>
                                     function html_table_to_excel(type) {
                                     var data = document.getElementById('datatablesSimple');

                                    var file = XLSX.utils.table_to_book(data, { sheet: "sheet1" });

                                    XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

                                    XLSX.writeFile(file, 'file.' + type);
                                }

                                const export_button = document.getElementById('export_button');

                                export_button.addEventListener('click', () => {
                                    html_table_to_excel('xlsx');
                                    });
                            </script>
                            </div>
                                                      
                        </div>
                    </div>
                </main>
                <br>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <!--<div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>-->
                    </div>
                </footer>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        <!--<script>
        function html_table_to_excel(type) {
                                     var data = document.getElementById('datatablesSimple');

                                    var file = XLSX.utils.table_to_book(data, { sheet: "sheet1" });

                                    XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

                                    XLSX.writeFile(file, 'file.' + type);
                                }

                                const export_button = document.getElementById('export_button');

                                export_button.addEventListener('click', () => {
                                    html_table_to_excel('xlsx');
                                    });

        </script>-->
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>-->

         
        






        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="src/jquery.table2excel.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../dist/tableToExcel.js"></script><
       <script src="tableExport/tableExport.js"></script>
        <script type="text/javascript" src="tableExport/jquery.base64.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="../dist/tableToExcel.js"></script>
         <script src="FileSaver.js"></script> <script src="tableexport.js"></script>
         <script src="xlsx.core.js"></script>
        <script src="src/jquery.table2excel.js"></script>-->

    </body>
</html>
