<li class="nav-item menu-is-opening menu-open">

    <ul class="nav nav-treeview">
        <!-- style="display: none;" -->
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/poslist/index.php" class="nav-link">
                <i class="fas fa-file-alt nav-icon"></i>
                <p>Dashboard</p>
            </a>
            <?php //require "posnavbar.php"; ?>
        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/mbcislide.php" class="nav-link">
                <i class="far fa-file-alt nav-icon"></i>
                <p>Order Entry</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/pos1/index.php" class="nav-link">
                <i class="far fa-file-alt nav-icon"></i>
                <p>POS1</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/pos/index5.php" class="nav-link">
                <i class="far fa-file-alt nav-icon"></i>
                <p>POS</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/dashboard2.php" class="nav-link ">
                <i class="fas fa-user-cog nav-icon text-success"></i>
                <p>Table Management</p>
            </a>
            <?php require "tablemanagenavbar.php"; ?>
        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/dashboard3.php" class="nav-link">
                <!-- <i class="fas fa-globe nav-icon"></i> -->
                <i class="fas fa-tasks nav-icon"></i>
                <p>Payments</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/announcement/index.php" class="nav-link">
                <i class="fas fa-trash nav-icon"></i>
                <p> Cashier Functions</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/guest/index1.php" class="nav-link ">
                <i class="fas fa fa-cogs nav-icon text-success"></i>
                <p>Guest Display</p>

            </a>

        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/cashier/index.php" class="nav-link ">
                <i class="fas fa fa-cogs nav-icon text-success"></i>
                <p>Cashier Display</p>

            </a>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/kitchen/index.php" class="nav-link ">
                <i class="fas fa fa-th-large nav-icon text-success"></i>
                <p>Kitchen Display</p>
            </a>

        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/dispatcher/index.php" class="nav-link ">
                <i class="fas fa fa-th-large nav-icon text-success"></i>
                <p>Dispatcher Display</p>
            </a>

        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/ordeing.php" class="nav-link ">
                <i class="fas fa fa-th-large nav-icon text-success"></i>
                <p>Ordering Display</p>
            </a>

        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/gallery/index.php" class="nav-link ">
                <i class="fas fa-user-friends nav-icon text-success"></i>
                <p>Menu Management</p>

            </a>
            <?php require "menunavbar.php"; ?>

        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/gallery/index.php" class="nav-link ">
                <i class="fas fa-user-friends nav-icon text-success"></i>
                <p>Reports</p>

            </a>
            <?php require "reportnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/menusetup/index.php" class="nav-link">
                <i class="fas fa fa-database nav-icon"></i>
                <p>Setup</p>
            </a>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/accesibility/index.php" class="nav-link">
                <i class="fas fas fa-user-check nav-icon"></i>
                <p>Inventory</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/reports/index.php" class="nav-link">
                <i class="fas fa fa-file-pdf nav-icon"></i>
                <p>Reports</p>
            </a>

        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>pos-panel/help/index.php" class="nav-link">
                <i class="fas fa-question nav-icon"></i>
                <p>Help</p>
            </a>


        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>auth/logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>Exit</p>
            </a>
        </li>

    </ul>
</li>