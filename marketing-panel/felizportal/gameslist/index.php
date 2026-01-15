<?php require "../../../config/config.php"; ?>
<?php require "../../../libs/app.php"; ?>
<?php include "../../../layouts/url.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body>

    <div class="dashboard-container">
        <img src="../FelizLogo.png" alt="Feliz Hotel Logo" class="company-logo">
        <div class="welcome-msg">Games List</div>
        <div class="button-grid">
            <!-- <div class="button-grid">
            <?php
            // $currentdate = date("m-d-Y");
            // $query = "SELECT * FROM mktgeventcategory";
            // $app = new App;
            // $category = $app->selectAll($query);
            ?>
            <?php //foreach ($category as $categorylist): ?>
                <a href="todaysevent.php?id=<?php //echo $categorylist->id; ?>" class="flat-btn">
                    <span class="icon">🎁</span>
                    <?php //echo $categorylist->location; ?>
                </a>
            <?php //endforeach; ?>


            
            <a href="alfresco.php" class="flat-btn btn-nye">
                <span class="icon">🎆</span>
                Alfresco Events 
            </a>-->
            </a>
            <a target="_blank" href="https://www.duckrace-game.com/" class="flat-btn">
                <span class="icon">📅</span>
                Racing Duck
            </a>

            <a target="_blank" href="https://wheelofnames.com/" class="flat-btn">
                <span class="icon">📅</span>
                Wheel of Names
            </a>
            <a target="_blank" href="https://www.namepickerninja.com/" class="flat-btn">
                <span class="icon">📅</span>
                Name Picker Ninja
            </a>


        </div>
    </div>

</body>

</html>