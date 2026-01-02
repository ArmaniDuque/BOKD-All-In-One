<li class="nav-item menu-is-opening menu-open">
    <!-- menu-is-opening menu-open -->
    <a href="#" class="nav-link">

        <!-- 
        <i class="fas fa-solid fa-circle"></i> -->
        <p>
            HMS System
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <!-- style="display: none;" -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>
                    Reservation
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <?php require "resnavbar.php"; ?>
        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/frontdesk/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Front Desk</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "frontnavbar.php"; ?>

        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/cashiering/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Cashiering</p>
                <i class="fas fa-angle-left right"></i>
            </a>
            <?php require "cashieringnavbar.php"; ?>
        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/housekeeping/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Housekeeping</p>
                <i class="fas fa-angle-left right"></i>

                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/sales/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Sales</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/ar/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>AR</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/misceleneous/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Misceleneous</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/setup/roomsetup/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Set-Up</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/utilities/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Utilities</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/eod/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>End Of Day</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/commision/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Commision</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/backofficeinterface/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Office Interface</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>admin-panel/help/index.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Help</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>auth/logout.php" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Exit</p>
                <i class="fas fa-angle-left right"></i>

            </a>
        </li>

    </ul>
</li>