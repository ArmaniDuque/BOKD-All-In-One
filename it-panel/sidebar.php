<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="text-decoration: none;">
        <!-- <img src="' . APPURL . 'img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">IT Management System</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                <!-- <li class="nav-item"> -->
                <!-- <span style="text-align:center;font-size:small;color:#ffffff;">GENERAL</span> -->

                <!-- <a href="it-panel/index.php" class="nav-link">
                        <i class="nav-icon fas fa-dashboard"></i>
                        <p>Home</p>
                    </a>
                </li> -->


                <?php
                $ruserid = $_SESSION['userid'];
                if ($_SESSION['userrole'] == "admin") {
                    echo '<li class="nav-item">
                    <a href="' . APPURL . '/it-panel/itrequest/itrequest.php" class="nav-link">
                <i class="nav-icon fas fa-ticket-alt"></i>
                <p>IT Request</p>
                </a>
                </li>

                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/accomplishment/accomplishment.php" class="nav-link">
                <i class="nav-icon fas fa-check-circle"></i>
                <p>Accomplishment</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/cctv/cctv.php" class="nav-link">
                        <i class="nav-icon fas fa-camera text-success"></i>
                        <p>CCTV</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/wifi/internetwifi.php" class="nav-link">
                        <i class="nav-icon fas fa-wifi text-success"></i>
                        <p>Wifi Access</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/meals/index.php" class="nav-link">
                        <i class="nav-icon fas fa-wifi text-success"></i>
                        <p>Meals</p>
                    </a>
                        <ul class="nav nav-treeview">
                             <li class="nav-item">
                                <a href="' . APPURL . 'it-panel/meals/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-wifi text-success"></i>
                                    <p>Meal Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="' . APPURL . 'it-panel/meals/mealinventory.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inventory</p>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a href="' . APPURL . 'it-panel/meals/mealinventoryhistory.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Meal History</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                 <a href="' . APPURL . 'it-panel/meals/generatecodemealtoday.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Code Generator</p>
                                </a>
                            </li>
                        </ul>
                </li>
                <li class="nav-item">

                    <a href="' . APPURL . 'it-panel/panelbox/panelbox.php" class="nav-link">
                        <i class="nav-icon fas fa-network-wired text-success"></i>
                        <p>Switch Inventory</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/telephone/index.php" class="nav-link">
                        <i class="nav-icon fas fa-phone-square text-success"></i>
                        <p>Telephone</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/tv/index.php" class="nav-link">
                        <i class="nav-icon fas fa-tv text-success"></i>
                        <p>Television</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/email/email.php" class="nav-link">
                        <i class="nav-icon fas fa-envelope text-success"></i>
                        <p>Email List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/server/servers.php" class="nav-link">
                        <i class="nav-icon fas fa-server text-success"></i>
                        <p>Server</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/allipaddress/ipaddress.php" class="nav-link">
                        <i class="nav-icon fas fa-ethernet text-success"></i>
                        <p>IP Address</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/project/index.php" class="nav-link">
                        <i class="nav-icon fas fa-bug text-success"></i>
                        <p>Projects</p>
                    </a>
                </li>
                <li class="nav-item">
        <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
              <i class="nav-icon fas fa-bug text-success"></i>   
                <p>Ticket</p>
                </a>
               
            
                      <ul class="nav nav-treeview">
    <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/systemconcern/systemconcern.php" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                        <p>System Concern</p>
                    </a>
 </li>
                      <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/systemconcern/activeticket.php" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                        <p>Active Ticket</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/systemconcern/doneticket.php" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                        <p>Done Ticket</p>
                    </a>
                </li>
                <hr style="text-align:left;margin:0 auto;color:#ffffff;width:50%;">
                </ul>
                </li>
                
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concern/concern.php" class="nav-link">
                        <i class="nav-icon fas fa-comment-dots text-success"></i>
                        <p>Department Concern</p>
                    </a>
                    
                    <ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Front Office</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reservation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>F&B Service</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>F&B Production</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Human Resources</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Engineering</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Housekeeping</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Finance</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="' . APPURL . 'it-panel/concer/index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Security</p>
                    </a>
                </li>
               
                <hr style="text-align:left;margin:0 auto;color:#ffffff;width:50%;">
            </ul>
            </li>
            <li class="nav-item">

                <a href="' . APPURL . 'it-panel/accounts/accounts.php" class="nav-link">
                    <i class="nav-icon fas fa-address-book text-success"></i>
                    <p>Accounts & Credentials</p>
                </a>
            </li>
            <li class="nav-item">

                <a href="' . APPURL . 'it-panel/itsoftware/subscription.php" class="nav-link">
                    <i class="nav-icon fas fa-cloud text-success"></i>
                    <p>Subscription Software</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="' . APPURL . 'it-panel/radio/radio.php" class="nav-link">
                    <i class="nav-icon fas fa-volume-up text-success"></i>
                    <p>Radio</p>
                </a>
            </li>
            <li class="nav-item">

                <a href="' . APPURL . 'it-panel/roomsequipment/roomsequipment.php" class="nav-link">
                    <i class="nav-icon fas fa-desktop"></i>
                    <p>Rooms IT Equipment</p>
                </a>
            </li>
            <li class="nav-item">

                <a href="' . APPURL . 'it-panel/itequipment/itequipment.php" class="nav-link">
                    <i class="nav-icon fas fa-toolbox"></i>
                    <p>IT Tools</p>
                </a>
            </li>
            <li class="nav-item">

                <a href="' . APPURL . 'it-panel/officeinventory/officeinventory.php" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list text-success"></i>
                    <p>Office Inventory</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="' . APPURL . 'it-panel/users/userslist.php" class="nav-link">
                    <i class="nav-icon fas fa-users text-success"></i>
                    <p>System Users</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="' . APPURL . 'it-panel/logs/logs.php" class="nav-link">
                    <i class="nav-icon fas fa-scroll"></i>
                    <p>Network Logs</p>
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a href="' . APPURL . 'auth/logout.php" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt "></i>
                    <p>Logout</p>
                </a>
            </li>';

                } else if ($_SESSION['userrole'] == "manager" || $_SESSION['userrole'] == "supervisor") {

                } else {
                    echo '<li class="nav-item">
                <a href="' . APPURL . 'it-panel/systemconcern/systemconcern.php" class="nav-link">
                    <i class="nav-icon fas fa-bug text-success"></i>
                    <p>System Concern</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="' . APPURL . 'it-panel/concern/concern.php" class="nav-link">
                    <i class="nav-icon fas fa-comment-dots text-success"></i>
                    <p>Department Concern</p>
                </a>
            </li> <li class="nav-item">
                <a href="' . APPURL . 'auth/logout.php" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt "></i>
                    <p>Logout</p>
                </a>
            </li>';


                }
                ?>










            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->