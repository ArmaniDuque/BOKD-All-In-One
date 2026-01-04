<?php require "../../../config/config.php"; ?>
<?php require "../../../libs/app.php"; ?>
<?php include "../../../layouts/url.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body>

    <div class="dashboard-container">
        <img src="../FelizLogo.png" alt="Feliz Hotel Logo" class="company-logo">
        <div class="welcome-msg">Events Location</div>

        <div class="button-grid">
            <?php
            $currentdate = date("m-d-Y");
            $query = "SELECT * FROM mktgeventcategory";
            $app = new App;
            $category = $app->selectAll($query);
            ?>
            <?php foreach ($category as $categorylist): ?>
                <a href="todaysevent.php?id=<?php echo $categorylist->id; ?>" class="flat-btn">
                    <span class="icon">🎁</span>
                    <?php echo $categorylist->location; ?>
                </a>
            <?php endforeach; ?>


            <!-- <a href="buenavista.php" class="flat-btn">
                <span class="icon">📅</span>
                Buenavista Events
            </a>
            <a href="lobby.php" class="flat-btn btn-nye">
                <span class="icon">🎆</span>
                Lobby Entrance Event
            </a>
            <a href="alfresco.php" class="flat-btn btn-nye">
                <span class="icon">🎆</span>
                Alfresco Events -->
            </a>

        </div>
    </div>

</body>

</html>