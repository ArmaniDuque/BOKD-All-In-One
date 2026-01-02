<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="text-decoration: none;">

        <span class="brand-text font-weight-light">INV POS System</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php //require "hmsnavbar.php";
                // $url = APPURL;
                // echo $url1 = "$url" . '' . "admin-panel/mainnavbar/navbar.php";
                ?>
                <?php include "mainnavbar/navbar.php"; ?>

                <?php //require "inventorynavbar.php"; ?>
                <?php //require "orderingnavbar.php"; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->