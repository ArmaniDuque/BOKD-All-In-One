<?php require "../header.php"; ?>


<?php require "../sidebar.php"; ?>

<?php echo $userid = $_SESSION['userid'];
$query = "SELECT * FROM meal_logs where emp_id='$userid' and date = CURDATE();";
$app = new App;
$meals = $app->selectAll($query);

?>
<?php

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
                            // 1. Check if there is data in the $meals variable
                            if (!empty($meals) && count($meals) > 0) {
                                // If data exists, loop through and get values
                                foreach ($meals as $meal) {
                                    $bfast_availed = (bool) $meal->bfast;
                                    $lunch_availed = (bool) $meal->lunch;
                                    $dinner_availed = (bool) $meal->diner;
                                }
                            } else {
                                // 2. DEFAULT VALUES if database is empty for today
                                $bfast_availed = false;
                                $lunch_availed = false;
                                $dinner_availed = false;
                            }


                            // --- BREAKFAST LOGIC ---
                            if ($bfast_availed) {
                                $bfastClass = "availed";
                                $bfastText = " (Already Availed)";
                            } else {
                                $isBfastTime = ($currentHour >= 4 && $currentHour < 10);
                                $bfastClass = $isBfastTime ? "" : "disabled";
                                $bfastText = $isBfastTime ? "" : " (Closed)";
                            }

                            // --- LUNCH LOGIC ---
                            if ($lunch_availed) {
                                $lunchClass = "availed";
                                $lunchText = " (Already Availed)";
                            } else {
                                $isLunchTime = ($currentHour >= 10 && $currentHour < 15);
                                $lunchClass = $isLunchTime ? "" : "disabled";
                                $lunchText = $isLunchTime ? "" : " (Closed)";
                            }

                            // --- DINNER LOGIC ---
                            if ($dinner_availed) {
                                $dinnerClass = "availed";
                                $dinnerText = " (Already Availed)";
                            } else {
                                $isDinnerTime = ($currentHour >= 15 && $currentHour < 22);
                                $dinnerClass = $isDinnerTime ? "" : "disabled";
                                $dinnerText = $isDinnerTime ? "" : " (Closed)";
                            }


                            ?>
                            <div class="meal-wrapper">
                                <div class="meal-card breakfast <?php echo $bfastClass; ?>">
                                    <span>Breakfast <?php echo $bfastText; ?></span>
                                </div>

                                <div class="meal-card lunch <?php echo $lunchClass; ?>">
                                    <span>Lunch <?php echo $lunchText; ?></span>
                                </div>

                                <div class="meal-card dinner <?php echo $dinnerClass; ?>">
                                    <span>Dinner <?php echo $dinnerText; ?></span>
                                </div>
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