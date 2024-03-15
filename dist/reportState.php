<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
    header ("Location: login.php");
    exit;
}
include 'config.php';
$username = $_SESSION['username'];
//$username = 'maine';
$userID = $_SESSION['userID'];
$isActive = $_SESSION['isActive'];
 $isAdmin = $_SESSION['isAdmin'];
 $fedAdmin = $_SESSION['fedAdmin'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>State Reports</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
                if($fedAdmin == "yes") {
                    include("sidebarFed.php");
                    
                }else if($isAdmin == "yes") {
                    include("sidebarState.php");
                    
                } else {
                    include("sidebarCounty.php");
                    
                    }
                    ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand
            <a class="navbar-brand ps-3" href="index.html"> <?php echo $username?></a>
            <!-- Sidebar Toggle-->
            <a class="navbar-brand ps-3" href="index.html"><?php echo $username?> </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color:white"></i></button>
            <!-- Navbar Search
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>-->
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
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">State Data</h1>
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
                                    <div class="card-body" href="reportState.php">State Data</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="reportState.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body" href="reportCountry.php">Country Data</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="reportCountry.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body" href="reportAll.php">All Locations</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="reportAll.php">View Details</a>
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
                                   
                                   $Query = "select * from Incidents JOIN departments on Incidents.deptId = departments.deptID where departments.locationID IN
	                                            (select locationID from location where state IN 
	                                                (select state from location where locationID IN 
		                                                (select locationID from users where usersID = '$userID')))";
                                    $Result = @mysqli_query($DBConnect, $Query);
                                    if(mysqli_num_rows($Result)>0) {
                                        while(($Row = mysqli_fetch_assoc($Result))== true){
                                        $records[] = array('incident' => $Row["IncidentNum"], 'country' => $Row["country"], 'state' => $Row["state"], 'county' => $Row["county"],
                                        'department' => $Row["department"], 'mcinvolvement' => $Row["MCInvolvement"], 'threat' => $Row["ConsThreatAsses"], 'weapons' => $Row["Weapons"],
                                        'officerinvolv' => $Row["OfficerInvolv"], 'citonscene' => $Row["CITOnScene"], 'outcome' => $Row["Outcome"], 'feedback' => $Row["Feedback"], 'time' => $Row["Time"] );
                                        ?>
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

<table hidden id="hiddenTable" >
                                    <thead>
                                        <tr>
                                            <th>Incident Number</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>County</th>
                                            <th>Department</th>
                                            <th>MOBILE CRISIS Unit Involvement</th>
                                            <th>Threat Assessment</th>
                                            <th>Weapons</th>
                                            <th>Officer Involvement</th>
                                            <th>CIT On Scene</th>
                                            <th>Outcome</th>
                                            <th>Feedback</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php

                                                                    
                                   
                                   // $Result = @mysqli_query($DBConnect, $Query);
                                    //if(mysqli_num_rows($Result)>0) {
                                        //while(($Row = mysqli_fetch_assoc($Result))== true){
                                        foreach($records as $record) {?>
                                        <tr>
                                        <td><?php echo $record["incident"]; ?></td>
                                        <td><?php echo $record["country"]; ?></td>
                                        <td><?php echo $record["state"]; ?></td>
                                        <td><?php echo $record["county"]; ?></td>
                                        <td><?php echo $record["department"]; ?></td>
                                        <td><?php echo $record["mcinvolvement"]; ?></td>
                                        <td><?php echo $record["threat"]; ?></td>
                                        <td><?php echo $record["weapons"]; ?></td>
                                        <td><?php echo $record["officerinvolv"]; ?></td>
                                        <td><?php echo $record["citonscene"]; ?></td>
                                        <td><?php echo $record["outcome"]; ?></td>
                                        <td><?php echo $record["feedback"]; ?></td>
                                        <td><?php echo $record["time"]; ?></td>

                                        </tr>
                                        <?php }
                                     //}
                                     ?>
                                                                          
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Incident Number</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>County</th>
                                            <th>Department</th>
                                            <th>MOBILE CRISIS Unit Involvement</th>
                                            <th>Threat Assessment</th>
                                            <th>Weapons</th>
                                            <th>Officer Involvement</th>
                                            <th>CIT On Scene</th>
                                            <th>Outcome</th>
                                            <th>Feedback</th>
                                            <th>Time</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                               <script>
                                     function html_table_to_excel(type) {
                                     var data = document.getElementById('hiddenTable');

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
