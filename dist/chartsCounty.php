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
$country = stripslashes($_POST['country']);
//$state = "Pennsylvania";

$state = stripslashes($_POST['state']);
$county = stripslashes($_POST['county']);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Charts</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href = "/bootstrap/css/bootstrap.min.css" rel = "stylesheet">
      <script src = "/scripts/jquery.min.js"></script>
      <script src = "/bootstrap/js/bootstrap.min.js"></script>
      <script src="js/scripts2.js"></script>
       
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
            
            <a class="navbar-brand ps-3" ><?php echo $username?> </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="#!">Change Password</a></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>

                    </ul>
                </li>
            </ul>
        </nav>
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Charts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="chartsAll.php">All Locations</a></li>
                            <li class="breadcrumb-item"><a href="chartsCountry.php">Countries</a></li>
                            <li class="breadcrumb-item"><a href="chartsState.php">States/Provinces</a>
                            <li class="breadcrumb-item active">Counties</li>
                            <li class="breadcrumb-item"><a href="chartsDept.php">Departments</a></li>
                        </ol>
                       
                        <form method="post" action="" name="incident">
                        <p>Please select Country, State and County</p>
                        <div class="input-group">
                        <label for="selectCountry" style="margin-right: 1%;">Country</label>
                        
                                            
                        <select   class="nav-item dropdown" style="margin-left:2%;" id="selectCountry" type="text" placeholder="Country"  name="country" onchange="getState()">
                          <option value="">Please Select</option>
  
                          <?php
                              
                              $Query = "select distinct country from location;";
                              
                                $Result = @mysqli_query($DBConnect, $Query);
                              if(mysqli_num_rows($Result) > 0) {
                              
                              while($Row = mysqli_fetch_assoc($Result)){?>
                                                                              
                              <option value="<?php echo $Row["country"]; ?>" ><?php echo $Row["country"]; ?></option>
                                                                              
                              <?php }
                                }
                            ?>
                            </select>
                            
                            <br>
                                             
                       
                        <a class="navbar-brand ps-3" id="State" value=""> </a>
                        <label for="selectState" >State/Province</label>
                        
                                           
                     <select class="nav-item dropdown" style="margin-left:1%;" id="selectState" placeholder="Please select state" name="state"  onchange="getCounty()" >
                    <option value="">Select</option>

                    </select>
                    <a class="navbar-brand ps-3" id="County" value=""> </a>
                        <label for="selectCounty" >County</label>
                        
                                           
                     <select class="nav-item dropdown" style="margin-left:1%;" id="selectCounty" placeholder="Please select county" name="county" >
                    <option value="">Select</option>

                    </select>
                    
                    <div class="d-grid"><input style="margin-left: 7%;" type="submit" id="submit" value ="submit" class="btn btn-primary btn-block" ></div>
                  </div>
                <br>
                
                
            </form>
                        <a class="navbar-brand ps-3" id="county" value=""><?php echo $county?> </a>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Weapons
                                    </div>
                                    <div class="card-body"><canvas id="Weapons" width="100%" height="50"></canvas></div>
                                    <?php
                                        $Query = "select Weapons, count(*) from Incidents JOIN departments on Incidents.deptId = departments.deptID where departments.locationID IN
	                                            (select locationID from location where county = '$county')
                                                group by Weapons;";
                                        $Result = @mysqli_query($DBConnect, $Query);
                                        $Weapons = array();
                                        $CountWeapons = array();
                                        if (mysqli_num_rows($Result) > 0) {
                                            foreach ($Result as $Row){
                                                $Weapons[] = $Row["Weapons"];
                                                $CountWeapons[] = $Row["count(*)"];
                                            }
                                            
                                        }
                                     ?>                                                       
                                </div>
                            </div>
                            

                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Mobile Crisis Involvement
                                    </div>
                                    <div class="card-body"><canvas id="MCInvolv" width="100%" height="50"></canvas></div>
                                    <?php
                                        
                                        $Query = "select MCInvolvement, count(*) from Incidents JOIN departments on Incidents.deptId = departments.deptID where departments.locationID IN
	                                            (select locationID from location where county = '$county')
                                                group by MCInvolvement;";
                                        $Result = @mysqli_query($DBConnect, $Query);
                                        $MCInvolvement = array();
                                        $Count = array();
                                        if (mysqli_num_rows($Result) > 0) {
                                            foreach ($Result as $Row){
                                                $MCInvolvement[] = $Row["MCInvolvement"];
                                                $Count[] = $Row["count(*)"];
                                            }
                                           
                                        }
                                     ?>                                                                                
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Officer Involvement
                                    </div>
                                    <div class="card-body"><canvas id="OfficerInvolv" width="100%" height="50"></canvas></div>
                                    <?php
                                        $Query = "select OfficerInvolv, count(*) from Incidents JOIN departments on Incidents.deptId = departments.deptID where departments.locationID IN
	                                            (select locationID from location where county = '$county')
                                                group by OfficerInvolv;";
                                        $Result = @mysqli_query($DBConnect, $Query);
                                        $OfficerInvolv = array();
                                        $CountOffInvolv = array();
                                        if (mysqli_num_rows($Result) > 0) {
                                            foreach ($Result as $Row){
                                                $OfficerInvolv[] = $Row["OfficerInvolv"];
                                                $CountOffInvolv[] = $Row["count(*)"];
                                            }
                                           
                                        }
                                     ?>                                                       
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Consumer Threat Assessment
                                    </div>
                                    <div class="card-body"><canvas id="ThreatAsses" width="100%" height="50"></canvas></div>
                                    <?php
                                        $Query = "select ConsThreatAsses, count(*) from Incidents JOIN departments on Incidents.deptId = departments.deptID where departments.locationID IN
	                                            (select locationID from location where county = '$county')
                                                group by ConsThreatAsses;";
                                        $Result = @mysqli_query($DBConnect, $Query);
                                        $ThreatAssess = array();
                                        $CountThreat = array();
                                        if (mysqli_num_rows($Result) > 0) {
                                            foreach ($Result as $Row){
                                                $ThreatAssess[] = $Row["ConsThreatAsses"];
                                                $CountThreat[] = $Row["count(*)"];
                                            }
                                        }
                                     ?>                                                       
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        CIT Officer On Scene
                                    </div>
                                    <div class="card-body"><canvas id="CITOnScene" width="100%" height="50"></canvas></div>
                                    <?php
                                        $Query = "select CITOnScene, count(*) from Incidents JOIN departments on Incidents.deptId = departments.deptID where departments.locationID IN
	                                            (select locationID from location where county = '$county')
                                                group by CITOnScene;";
                                        $Result = @mysqli_query($DBConnect, $Query);
                                        $CITOnScene = array();
                                        $CountCIT = array();
                                        if (mysqli_num_rows($Result) > 0) {
                                            foreach ($Result as $Row){
                                                $CITOnScene[] = $Row["CITOnScene"];
                                                $CountCIT[] = $Row["count(*)"];
                                            }
                                            
                                        }
                                     ?>                                                       
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Outcome for Consumer
                                    </div>
                                    <div class="card-body"><canvas id="Outcome" width="100%" height="50"></canvas></div>
                                    <?php
                                        $Query = "select Outcome, count(*) from Incidents JOIN departments on Incidents.deptId = departments.deptID where departments.locationID IN
	                                            (select locationID from location where county = '$county')
                                                group by Outcome;";
                                        $Result = @mysqli_query($DBConnect, $Query);
                                        $Outcome = array();
                                        $CountOutcome = array();
                                        if (mysqli_num_rows($Result) > 0) {
                                            foreach ($Result as $Row){
                                                $Outcome[] = $Row["Outcome"];
                                                $CountOutcome[] = $Row["count(*)"];
                                            }
                                            
                                        }
                                     ?>                                                       
                                </div>
                            </div>
                        
                    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                    </div>
                
                </footer>
            </div>
        </div>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
    </body>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
        <script type="text/javascript">

            
             Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
             Chart.defaults.global.defaultFontColor = '#292b2c';

              // Pie Chart Example
              var ctx = document.getElementById("MCInvolv");
              var myPieChart = new Chart(ctx, {
              type: 'pie',
              data: {
                       labels: <?php echo json_encode($MCInvolvement); ?>,
                      
                       datasets: [{
                              data:<?php echo json_encode($Count); ?>,
                              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#9932cc'],
                                  }],
                       },
              });

              // Weapons Chart
                var ctx = document.getElementById("Weapons");
                var myLineChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: <?php echo json_encode($Weapons); ?>,
                    datasets: [{
                      label: "Total",
                      backgroundColor: "rgba(2,117,216,1)",
                      borderColor: "rgba(2,117,216,1)",
                      data: <?php echo json_encode($CountWeapons); ?>,
                    }],
                  },
                  options: {
                    scales: {
                      xAxes: [{
                        time: {
                          unit: 'Weapon Type'
                        },
                        gridLines: {
                          display: false
                        },
                        
                      }],
                      yAxes: [{
                            ticks: {
                            beginAtZero: true
                        },
                        
                        gridLines: {
                          display: true
                        }
                      }],
                    },
                    legend: {
                      display: false
                    }
                  }
                });

                // Officer Involvement Chart
                var ctx = document.getElementById("OfficerInvolv");
                var myLineChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: <?php echo json_encode($OfficerInvolv); ?>,
                    datasets: [{
                      label: "Total",
                      backgroundColor: "rgba(2,117,216,1)",
                      borderColor: "rgba(2,117,216,1)",
                      data: <?php echo json_encode($CountOffInvolv); ?>,
                    }],
                  },
                  options: {
                    scales: {
                      xAxes: [{
                        time: {
                          unit: 'Involvement'
                        },
                        gridLines: {
                          display: false
                        },
                       
                      }],
                      yAxes:[{
                            ticks: {
                            beginAtZero: true
                        },
                       
                        gridLines: {
                          display: true
                        }
                      }],
                    },
                    legend: {
                      display: false
                    }
                  }
                });

                // Consumer Threat Assessment
              var ctx = document.getElementById("ThreatAsses");
              var myPieChart = new Chart(ctx, {
              type: 'pie',
              data: {
                       labels: <?php echo json_encode($ThreatAssess); ?>,
                       datasets: [{
                              data:<?php echo json_encode($CountThreat); ?>,
                              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#9932cc'],
                                  }],
                       },
              });

              //CIT On Scene  Chart
                var ctx = document.getElementById("CITOnScene");
                var myLineChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: <?php echo json_encode($CITOnScene); ?>,
                    datasets: [{
                      label: "Total",
                      backgroundColor: "rgba(2,117,216,1)",
                      borderColor: "rgba(2,117,216,1)",
                      data: <?php echo json_encode($CountCIT); ?>,
                    }],
                  },
                  options: {
                    scales: {
                      xAxes: [{
                        time: {
                          unit: 'CIT on Scene'
                        },
                        gridLines: {
                          display: false
                        },
                        
                      }],
                      yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                          display: true
                        }
                      }],
                    },
                    legend: {
                      display: false
                    }
                  }
                });

               // Consumer Outcome
              var ctx = document.getElementById("Outcome");
              var myPieChart = new Chart(ctx, {
              type: 'pie',
              data: {
                       labels: <?php echo json_encode($Outcome); ?>,
                       datasets: [{
                              data:<?php echo json_encode($CountOutcome); ?>,
                              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#9932cc'],
                                  }],
                       },
              });
        </script>                                    
</html>
