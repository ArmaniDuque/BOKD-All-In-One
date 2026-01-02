<nav class="navbar navbar-expand-sm bg-body-tertiary bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="index.php">General Information</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item ">
                    <a class="nav-link active"
                        href="<?php echo APPURL; ?>asset-panel/assetlist/otherinfo.php?select=<?php echo $id ?>">Other
                        Information</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active"
                        href="<?php echo APPURL; ?>asset-panel/assetlist/historyinfo.php?select=<?php echo $id ?>">Item
                        History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo APPURL; ?>asset-panel/assetlist/maintenanceinfo.php?select=<?php echo $id ?>">Maintenance</a>

                </li>



            </ul>
        </div>
    </div>
</nav>