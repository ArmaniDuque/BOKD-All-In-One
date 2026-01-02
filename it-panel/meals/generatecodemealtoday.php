<?php require "../header.php"; ?>


<?php require "../sidebar.php"; ?>


<?php
$query = "SELECT * FROM itprojects";
$app = new App;
$projects = $app->selectAll($query);

?>

<style>
    /* Container takes up the full viewport height */
    .meal-wrapper {
        display: flex;
        flex-direction: column;
        height: 40vh;
        gap: 10px;
        padding: 10px;
        box-sizing: border-box;
        background-color: #1a1a1a;
    }

    /* Big Button Cards */
    .meal-card {
        flex: 1;
        /* Makes each button grow to fill equal space */
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        cursor: pointer;
        transition: transform 0.2s, filter 0.2s;
        overflow: hidden;
    }

    .meal-card span {
        color: white;
        font-size: 3rem;
        font-weight: 900;
        text-transform: uppercase;
        font-family: sans-serif;
        letter-spacing: 2px;
        text-shadow: 2px 4px 10px rgba(0, 0, 0, 0.3);
    }

    /* Color Themes */
    .breakfast {
        background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);
    }

    .lunch {
        background: linear-gradient(45deg, #5ee7df 0%, #b490ca 100%);
    }

    .dinner {
        background: linear-gradient(45deg, #30cfd0 0%, #330867 100%);
    }

    /* Interaction */
    .meal-card:hover {
        filter: brightness(1.1);
        transform: scale(0.99);
    }

    .meal-card:active {
        transform: scale(0.95);
    }

    /* The Disabled State */
    .meal-card.disabled {
        background: #d1d1d1 !important;
        /* Flat grey */
        filter: grayscale(1);
        /* Removes all color */
        cursor: not-allowed;
        /* Shows 'block' icon on hover */
        opacity: 0.6;
        /* Makes it look "faded" */
        transform: none !important;
        /* Prevents the hover 'lift' effect */
        pointer-events: none;
        /* Makes it unclickable */
        text-align: center;

    }

    /* Optional: change the text for disabled buttons */
    .meal-card.disabled span {
        text-shadow: none;
        color: #888;
    }


    /* The Availed/Completed State */
    .meal-card.availed {
        position: relative;
        cursor: default;
        pointer-events: none;
        /* Prevents clicking */
        filter: saturate(0.5) brightness(0.7);
        /* Dims the original colors */
        text-align: center;

    }

    /* Creating the Overlay Text */
    .meal-card.availed::after {
        content: "✓ You already availed your meal";
        position: absolute;
        bottom: 20px;
        background: rgba(0, 0, 0, 0.6);
        color: #2ecc71;
        /* Success Green */
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 1rem;
        font-weight: bold;
        font-family: sans-serif;
        text-transform: none;
        letter-spacing: 0;
        border: 1px solid #2ecc71;
    }

    /* Optional: Strike through the main text */
    .meal-card.availed span {
        text-decoration: line-through;
        opacity: 0.5;
        font-size: 2.5rem;
        /* Shrink slightly */
    }

    <style>.meal-wrapper {
        display: flex;
        flex-direction: column;
        height: 100vh;
        gap: 15px;
        padding: 20px;
        font-family: sans-serif;
    }

    /* The Big Button */
    .meal-card {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
        color: white;
        transition: 0.3s;
        text-align: center;
    }

    .lunch.active {
        background: linear-gradient(45deg, #f093fb, #f5576c);
    }

    .lunch.disabled {
        background: #7f8c8d;
        opacity: 0.5;
        pointer-events: none;
    }

    .lunch.availed {
        background: #27ae60;
        pointer-events: none;
    }

    .meal-card span {
        font-size: 2.5rem;
        font-weight: bold;
    }

    /* The Stub Form */
    .stub-container {
        margin-top: 20px;
        padding: 20px;
        background: #eee;
        border-radius: 10px;
    }

    input[type="text"] {
        padding: 10px;
        font-size: 1.2rem;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 200px;
    }

    button.btn-submit {
        padding: 10px 20px;
        font-size: 1.2rem;
        background: #2980b9;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .error {
        color: #e74c3c;
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>
/* Responsive adjustment for desktop */
@media (min-width: 768px) {
.meal-wrapper {
flex-direction: row;
}
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Meal Monitoring</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="systemconcern.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Hi <strong><?php echo $_SESSION['userfullname']; ?></strong>
                            Availe you Meal Today</h1>


                </div><br>
                <!-- /.BODY -->

                <form class="row g-3" method="POST" action="create-systemconcern.php" enctype="multipart/form-data">

                    <div class="card-body ">


                        <div class="row">
                            <div class="col-md-3">
                                <label for="name">Date</label>
                                <input type="text" readonly name="datereported" id="datereported" class="form-control"
                                    value="<?php echo "" . date("Y-d-m") . ""; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="name">Time</label>
                                <input type="text" readonly name="datereported" id="datereported" class="form-control"
                                    value="<?php
                                    date_default_timezone_set('Asia/Manila');
                                    echo "" . date("h:i A") . ""; ?>">
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <?php
                            date_default_timezone_set('Asia/Manila');
                            $currentHour = (int) date("H");

                            // 1. MOCK DATA (In a real app, these come from your Database)
                            $valid_stub_code = "MEAL2025"; // The secret code they must enter
                            $user_has_availed = false;    // Change to true to test the 'Availed' state
                            
                            // 2. CHECK SUBMISSION
                            $error_message = "";
                            $success_mode = false;

                            if (isset($_POST['submit_stub'])) {
                                $input_code = $_POST['stub_code'];

                                if ($input_code === $valid_stub_code) {
                                    $success_mode = true;
                                    // Here you would run a SQL query to mark the meal as "Availed" in your DB
                                } else {
                                    $error_message = "Invalid Stub Code! Please try again.";
                                }
                            }

                            // 3. MEAL STATE LOGIC (Lunch Example)
                            $is_lunch_time = ($currentHour >= 11 && $currentHour < 15);

                            if ($user_has_availed || $success_mode) {
                                $lunchClass = "availed";
                                $lunchText = "Successfully Availed!";
                            } elseif (!$is_lunch_time) {
                                $lunchClass = "disabled";
                                $lunchText = "Lunch (Closed)";
                            } else {
                                $lunchClass = "active";
                                $lunchText = "Lunch (Available)";
                            }
                            ?>
                            <div class="meal-wrapper">


                                <div class="meal-card lunch <?php echo $lunchClass; ?>">
                                    <span><?php echo $lunchText; ?></span>

                                    <?php if ($lunchClass == "active"): ?>
                                        <p>Enter your stub code below to claim</p>
                                    <?php endif; ?>
                                </div>

                                <?php if ($lunchClass == "active"): ?>
                                    <div class="stub-container">
                                        <?php if ($error_message): ?>
                                            <div class="error"><?php echo $error_message; ?></div>
                                        <?php endif; ?>

                                        <form method="POST">
                                            <input type="text" name="stub_code" placeholder="Enter Stub Code..." required>
                                            <button type="submit" name="submit_submit" class="btn-submit">Claim
                                                Meal</button>
                                        </form>
                                    </div>


                                <?php endif; ?>

                            </div>

                        </div>


                    </div>
            </div>
        </div>
        </form>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Summernote -->
<script src="<?php echo APPURL; ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo APPURL; ?>assets/plugins/dropzone/dropzone.js"></script>
<script src="<?php echo APPURL; ?>assets/js/demo.js"></script>
<script>
    Dropzone.autoDiscover = false;
    $(function () {
        // Summernote
        $('.summernote').summernote({
            height: '600px'
        });

        const dropzone = $("#image").dropzone({
            url: "create-product.html",
            maxFiles: 5,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (file, response) {
                $("#image_id").val(response.id);
            }
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "pageLength": 50,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });



    });


    $('#example [data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'bottom',
        html: true
    });
</script>





<?php require "../../footer1.php"; ?>