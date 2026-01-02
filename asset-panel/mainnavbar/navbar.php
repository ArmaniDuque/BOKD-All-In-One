<li class="nav-item menu-is-opening menu-open">

    <ul class="nav nav-treeview">
        <!-- style="display: none;" -->
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/assetlist/index.php" class="nav-link">
                <i class="fas fa-file-alt nav-icon"></i>
                <p>
                    Asset
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <?php require "assetnavbar.php"; ?>
        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/acquisitionlist/index.php" class="nav-link">
                <i class="far fa-file-alt nav-icon"></i>
                <p>Acquisition</p>
                <!-- <i class="fas fa-angle-left right"></i> -->

            </a>
            <?php //require "frontnavbar.php"; ?>

        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/joborder/index.php" class="nav-link">
                <i class="fas fa-user-cog nav-icon"></i>
                <p>Job Order</p>
                <!-- <i class="fas fa-angle-left right"></i> -->

            </a>
            <?php //require "cashieringnavbar.php"; ?>

        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/joevaluation/index.php" class="nav-link">
                <!-- <i class="fas fa-globe nav-icon"></i> -->
                <i class="fas fa-tasks nav-icon"></i>
                <p>JO Evaluation</p>
                <!-- <i class="fas fa-angle-left right"></i>

                <i class="fas fa-angle-left right"></i> -->

            </a>
            <?php //require "housekeepingnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/disposal/index.php" class="nav-link">
                <i class="fas fa-trash nav-icon"></i>
                <p>Disposal</p>
                <!-- <i class="fas fa-angle-left right"></i> -->

            </a>
            <?php //require "salesnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/maintenance/index.php" class="nav-link">
                <i class="fas fa fa-cogs nav-icon"></i>
                <p>Maintenance</p>
                <!-- <i class="fas fa-angle-left right"></i> -->

            </a>
            <?php //require "arnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/transfer/index.php" class="nav-link">
                <i class="fas fa fa-th-large nav-icon"></i>
                <p>Transfer</p>
                <!-- <i class="fas fa-angle-left right"></i> -->

            </a>
            <?php //require "misceleneousnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/borrower/index.php" class="nav-link">
                <i class="fas fa-user-friends nav-icon"></i>
                <p>Borrower</p>
                <!-- <i class="fas fa-angle-left right"></i> -->

            </a>
            <?php //require "setupnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/masterfile/index.php" class="nav-link">
                <i class="fas fa fa-database nav-icon"></i>
                <p>Master Files</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "masterlistnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/accesibility/index.php" class="nav-link">
                <i class="fas fas fa-user-check nav-icon"></i>
                <p>Accessibility</p>
                <!-- <i class="fas fa-angle-left right"></i> -->

            </a>
            <?php //require "eodnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/reports/index.php" class="nav-link">
                <i class="fas fa fa-file-pdf nav-icon"></i>
                <p>Reports</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "commisionnavbar.php"; ?>

        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>asset-panel/help/index.php" class="nav-link">
                <i class="fas fa-question nav-icon"></i>
                <p>Help</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "helpnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>auth/logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>Exit</p>
                <i class="fas fa-angle-left right"></i>

            </a>


        </li>

    </ul>
</li>