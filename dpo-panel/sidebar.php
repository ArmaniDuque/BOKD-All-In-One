<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=" #" class="brand-link" style="text-decoration: none;">
        <!-- <img src="<?php echo APPURL; ?>img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">Data Privacy System</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                <li class="nav-item">

                    <span style="text-align:center;font-size:small;color:#ffffff;">GENERAL</span>

                    <a href="<?php echo APPURL; ?>dpo-panel/index.php" class="nav-link">
                        <i class="nav-icon fas fa-home text-success"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/request/departmentrequest.php" class="nav-link">
                        <i class="nav-icon fas fa-building text-success"></i>
                        <p>Department Request</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/processrequest/request.php" class="nav-link">
                        <i class="nav-icon fas fa-sync-alt text-success"></i>
                        <p>Process Request</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/datasharing/datasharing.php" class="nav-link">
                        <i class="nav-icon fas fa-hands text-success"></i>
                        <p>Data Sharing</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/incident/incident.php" class="nav-link">
                        <i class="nav-icon 	fas fa-exclamation-triangle text-success"></i>
                        <p>Incident</p>
                    </a>
                </li>
                <li class="nav-item">
                    <span style="text-align:center;font-size:small;color:#ffffff;">FORMS</span>

                    <a href="<?php echo APPURL; ?>dpo-panel/dataprivacyconsent.php" class="nav-link">
                        <i class="nav-icon fas fa-file-contract text-success"></i>
                        <p>Consent Form</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/certificate.php" class="nav-link">
                        <i class="nav-icon fas fa-certificate text-success"></i>
                        <p>Certificate</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/allconsent.php" class="nav-link">
                        <i class="nav-icon fas fa-check-double text-success"></i>
                        <p>All Consent</p>
                    </a>
                </li>
                <li class="nav-item">
                    <span style="text-align:center;font-size:small;color:#ffffff;">COMPLIANCE REQUIREMNETS</span>

                    <a href="<?php echo APPURL; ?>dpo-panel/dataregistry/registry.php" class="nav-link">
                        <i class="nav-icon fas fa-database text-success"></i>
                        <p>Data Registry</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/5schecklist/5schecklist.php" class="nav-link">
                        <i class="nav-icon fas fa-address-card text-success"></i>
                        <p>5s Checklist</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/datainventory/datainventory.php" class="nav-link">
                        <i class="nav-icon fas fa-warehouse text-success"></i>
                        <p>Data Inventory</p>
                    </a>
                </li>
                <li class="nav-item">
                    <span style="text-align:center;font-size:small;color:#ffffff;">DATA PRESENTATION</span>

                    <a href="<?php echo APPURL; ?>dpo-panel/compliance.php" class="nav-link">
                        <i class="nav-icon fas fa-shield-alt"></i>
                        <p>Compliance Check</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/users/userslist.php" class="nav-link">
                        <i class="nav-icon fas fa-users text-success"></i>

                        <p>System Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>dpo-panel/logs.php" class="nav-link">
                        <i class="nav-icon fas fa-scroll"></i>
                        <p>Audit Logs</p>
                    </a>
                </li>
                </li>
                <li class="nav-item">
                    <a href="<?php echo APPURL; ?>auth/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->