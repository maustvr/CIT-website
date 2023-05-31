<!--<?php
//start the session
session_start();


$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

?>-->

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
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Admin
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                                                       
                                    <a class="nav-link" href="deptSetup.php">Add Departments</a>
                                    <a class="nav-link" href="deleteReport.php">Delete Report</a>
                                    
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Reports
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">

                                            <a class="nav-link" href="charts.php">
                                             
                                            <a class="nav-link" href="login.html">Add New Account</a>
                                            <a class="nav-link" href="register.html">Deactivate User</a>
                                            <a class="nav-link" href="password.html">View Users</a>
                                            <a class="nav-link" href="password.html">Reset Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseCharts" aria-expanded="false" aria-controls="pagesCollapseError">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area">Charts</i></div>
                                        Charts
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseCharts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="chartsAll.php">All Locations</a>
                                            <a class="nav-link" href="chartsCountry.php">Countries</a>
                                            <a class="nav-link" href="chartsState.php">States</a>
                                            <a class="nav-link" href="chartsCounty.php">Counties</a>
                                            <a class="nav-link" href="chartsDept.php">Department</a>
                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseTables" aria-expanded="false" aria-controls="pagesCollapseError">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table">Tables</i></div>
                                        Tables
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseTables" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="tablesAll.php">All Locations</a>
                                            <a class="nav-link" href="tablesCountry.php">Countries</a>
                                            <a class="nav-link" href="tablesState.php">States</a>
                                            <a class="nav-link" href="tablesCounty.php">Counties</a>
                                            <a class="nav-link" href="tablesDept.php">Department</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $username?>
                        <?php echo $userID?>
                    </div>
                </nav>
            </div>
