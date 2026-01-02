<li class="nav-item menu-is-opening menu-open">

    <ul class="nav nav-treeview">
        <!-- style="display: none;" -->
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/reservation/reservation/index.php" class="nav-link">
                <i class="fas fa-user-clock nav-icon"></i>
                <p>
                    Reservation
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <?php require "resnavbar.php"; ?>
        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/frontdesk/index.php" class="nav-link">
                <i class="fas fa-clipboard-list nav-icon"></i>
                <p>Front Desk</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "frontnavbar.php"; ?>

        </li>


        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/cashiering/index.php" class="nav-link">
                <i class="fas fa-cash-register nav-icon"></i>
                <p>Cashiering</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "cashieringnavbar.php"; ?>

        </li>
        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/housekeeping/index.php" class="nav-link">
                <i class="fas fa-broom nav-icon"></i>
                <p>Housekeeping</p>
                <i class="fas fa-angle-left right"></i>

                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "housekeepingnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/sales/index.php" class="nav-link">
                <i class="fas fa-handshake nav-icon"></i>
                <p>Sales</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "salesnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/ar/index.php" class="nav-link">
                <i class="fas fa-wallet nav-icon"></i>
                <p>AR</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "arnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/misceleneous/index.php" class="nav-link">
                <i class="fas fa-cube nav-icon"></i>
                <p>Misceleneous</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "misceleneousnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/setup/roomsetup/index.php" class="nav-link">
                <i class="fas fa-cogs nav-icon"></i>
                <p>Set-Up</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "setupnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/utilities/index.php" class="nav-link">
                <i class="fas fa-plug nav-icon"></i>
                <p>Utilities</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "utilitiesnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/eod/index.php" class="nav-link">
                <i class="fas fa-moon nav-icon"></i>
                <p>End Of Day</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "eodnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/commision/index.php" class="nav-link">
                <i class="fas fa-percent nav-icon"></i>
                <p>Commision</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "commisionnavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/backofficeinterface/index.php" class="nav-link">
                <i class="fas fa-briefcase nav-icon"></i>
                <p>Office Interface</p>
                <i class="fas fa-angle-left right"></i>

            </a>
            <?php require "boinavbar.php"; ?>

        </li>

        <li class="nav-item">
            <a href="<?php echo APPURL; ?>hms-panel/help/index.php" class="nav-link">
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