
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
$isActive = $_SESSION['isActive'];
 $isAdmin = $_SESSION['isAdmin'];
 $fedAdmin = $_SESSION['fedAdmin'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        eta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>All Locations</title>
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
            
            <a class="navbar-brand ps-3" href="index.html"><?php echo $username?> </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color:white"></i></button>
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
                        <li><a class="dropdown-item" href="#!">Change Password</a></li>
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">All Reports</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Locations</li>
                            <li class="breadcrumb-item"><a href="tablesCountry.php">Countries</a></li>
                            <li class="breadcrumb-item"><a href="tablesStates.php">States</a></li>
                            <li class="breadcrumb-item"><a href="tablesCounty.php">Counties</a></li>
                            <li class="breadcrumb-item"><a href="tablesDept.php">Departments</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <?php echo $username?>

                            </div>
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
                                  
                                   $Query = "select * from Incidents JOIN departments on Incidents.deptId = departments.deptID JOIN location on departments.locationID = location.locationID";
                                    $Result = @mysqli_query($DBConnect, $Query);
                                    if(mysqli_num_rows($Result)>0) {
                                        while(($Row = mysqli_fetch_assoc($Result))== true){ ?>
                                        <tr>
                                        <td><?php echo $Row["IncidentNum"]; ?></td>
                                        <td><?php echo $Row["country"]; ?></td>
                                        <td><?php echo $Row["state"]; ?></td>
                                        <td><?php echo $Row["county"]; ?></td>
                                        <td><?php echo $Row["department"]; ?></td>
                                        <td><?php echo $Row["MCInvolvement"]; ?></td>
                                        <td><?php echo $Row["ConsThreatAsses"]; ?></td>
                                        <td><?php echo $Row["Weapons"]; ?></td>
                                        <td><?php echo $Row["OfficerInvolv"]; ?></td>
                                        <td><?php echo $Row["CITOnScene"]; ?></td>
                                        <td><?php echo $Row["Outcome"]; ?></td>
                                        <td><?php echo $Row["Feedback"]; ?></td>
                                        <td><?php echo $Row["Time"]; ?></td>

                                        </tr>
                                        <?php }
                                     }
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

                                                                    
                                   $Query = "select * from Incidents JOIN departments on Incidents.deptId = departments.deptID JOIN location on departments.locationID = location.locationID";
                                    $Result = @mysqli_query($DBConnect, $Query);
                                    if(mysqli_num_rows($Result)>0) {
                                        while(($Row = mysqli_fetch_assoc($Result))== true){ ?>
                                        <tr>
                                        <td><?php echo $Row["IncidentNum"]; ?></td>
                                        <td><?php echo $Row["country"]; ?></td>
                                        <td><?php echo $Row["state"]; ?></td>
                                        <td><?php echo $Row["county"]; ?></td>
                                        <td><?php echo $Row["department"]; ?></td>
                                        <td><?php echo $Row["MCInvolvement"]; ?></td>
                                        <td><?php echo $Row["ConsThreatAsses"]; ?></td>
                                        <td><?php echo $Row["Weapons"]; ?></td>
                                        <td><?php echo $Row["OfficerInvolv"]; ?></td>
                                        <td><?php echo $Row["CITOnScene"]; ?></td>
                                        <td><?php echo $Row["Outcome"]; ?></td>
                                        <td><?php echo $Row["Feedback"]; ?></td>
                                        <td><?php echo $Row["Time"]; ?></td>

                                        </tr>
                                        <?php }
                                     }
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
                            <!--<div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>-->
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
    
    </body>
</html>
