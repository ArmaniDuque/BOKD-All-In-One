<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Profile</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item ">
                    <a class="nav-link active"
                        href="<?php echo APPURL; ?>hms-panel/reservation/profile/create-profile.php">Guest Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page"
                        href="<?php echo APPURL; ?>hms-panel/reservation/profile/companyprofile.php">Company
                        Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo APPURL; ?>hms-panel/reservation/profile/travelagencyprofile.php">Travel
                        Agency Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo APPURL; ?>hms-panel/reservation/reservation/newreservation.php">Back</a>
                </li>



            </ul>
        </div>
    </div>
</nav>