<?php require "../../../config/config.php"; ?>
<?php require "../../../libs/app.php"; ?>
<?php include "../../../layouts/url.php"; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM mktgeventcategory where id=$id";
    $app = new App;
    $category = $app->selectAll($query);
}
?>
<?php foreach ($category as $categorylist): ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "headerevents1.php"; ?>

    <body>
        <div id="start-overlay">
            <button id="start-btn"><?php echo $categorylist->location; ?> TV POSTING</button>
        </div>

        <!-- <div class="background-container">
        <img src="../bg.jpg" class="bg-media" alt="Background">
    </div> -->

        <!-- With Effect -->
        <?php include "snoweffect.php"; ?>


        <div class="content">

            <img src="../FelizLogo.png" alt="Feliz Hotel Logo" class="company-logo">

            <p class="welcome-text">Welcome to Feliz Hotel Boracay</p>
            <?php
            $currentdate = date("Y-m-d");
            $query = "SELECT * FROM mktgeventdisplay WHERE eventcategoryid=$categorylist->id AND enddate>='$currentdate' AND startdate <= '$currentdate'";
            $app = new App;
            $description = $app->selectAll($query);
            ?>

            <?php if (!empty($description)): ?>
                <?php foreach ($description as $descriptionlist): ?>
                    <h1 class="event-title"><?php echo $descriptionlist->title; ?></h1>

                    <img src="<?php echo APPURL; ?>img/mktg/eventlogo/<?php echo $descriptionlist->checkofficephoto ?>"
                        alt="Sunlife Logo" class="client-logo">

                    <div class="event-details">
                        <p class="date-text">
                            <!-- <?php //echo date("F j Y", strtotime($descriptionlist->startdate)); ?> to
                <?php //echo date("F j Y", strtotime($descriptionlist->enddate)); ?> -->

                            <?php
                            $start = strtotime($descriptionlist->startdate);
                            $end = strtotime($descriptionlist->enddate);

                            // Check if Month and Year are the same
                            if (date("F Y", $start) === date("F Y", $end)) {
                                // Format: January 4 to 6 2026
                                echo date("F j", $start) . " to " . date("j Y", $end);
                            } else {
                                // Fallback for if the event spans across two different months
                                // Format: January 30 to February 2 2026
                                echo date("F j", $start) . " to " . date("F j Y", $end);
                            }
                            ?>
                        </p>
                        <p class="venue-text">
                            <?php echo $categorylist->location; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h1 class="event-title">No setup event in this location</h1>
            <?php endif; ?>



















            <!-- <?php
            // $currentdate = date("Y-m-d");
            // $query = "SELECT * FROM mktgeventdisplay where eventcategoryid=$categorylist->id AND enddate>='$currentdate' AND startdate <= '$currentdate'";
            // $app = new App;
            // $description = $app->selectAll($query);
            ?>
            <?php foreach ($description as $descriptionlist): ?>
                <h1 class="event-title"><?php echo $descriptionlist->title; ?></h1>

                <img src="../Sun-Life-Logo.png" alt="Sunlife Logo" class="client-logo">
                <div class="event-details">
                    <p class="date-text"><?php echo $descriptionlist->startdate; ?> - <?php echo $descriptionlist->enddate; ?>
                    </p>
                    <p class="venue-text"> <?php echo $categorylist->location; ?> </p>
                </div>
            <?php endforeach; ?> -->

            <p class="hotel-note">Enjoy your event with us!</p>

        </div>


        <!-- <script>
        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.display = 'none';
            // Optional: add music trigger here if needed
        });
    </script> -->
        <!-- With Effect -->

        <script src="effect.js"></script>
    </body>

    </html>
<?php endforeach; ?>