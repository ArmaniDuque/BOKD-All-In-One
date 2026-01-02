<?php require "../../../headerscrolldatatables.php"; ?>
<?php require "../../sidebar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Accounts</h1>
                </div> -->

                <?php require "../navbar.php"; ?>
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
                    <h1 class="h5 mb-3"><b>Blocked List </h1>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class=" col-md-12 mb-3 ">
                            <?php
                            $currentdate = date("Y-m-d");
                            // $currentdate = date("m-d-Y");
                            // $query = "SELECT * FROM reservations where status!='history' and checkoutdate >='$currentdate'";
                            // $query = "SELECT * FROM reservations where checkoutdate >='$currentdate'";
                            $query = "SELECT * FROM hmsreservations where checkindate>=$currentdate";
                            $app = new App;
                            $reservations = $app->selectAll($query);

                            ?>
                            <style>
                                th,
                                td {
                                    white-space: nowrap;
                                }

                                div.dataTables_wrapper {
                                    margin: 0 auto;
                                }
                            </style>

                            <table class=" table table-striped " style=" width:100%;" id="history">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Confirmation No.</th>
                                        <th>Customer ID</th>
                                        <th>Check IN Date</th>
                                        <th>Check OUT Date</th>
                                        <th>Adults</th>
                                        <th>Kids</th>
                                        <th>Date Today</th>

                                        <th>Status</th>
                                        <th>Room No.</th>
                                        <th>No. of Room</th>
                                        <th>Room Type</th>
                                        <th>Room Code</th>
                                        <!-- <th>Bed Type</th> -->
                                        <!-- <th>Status</th> -->
                                        <th>Amount Due</th>
                                        <th>Folio No.</th>
                                        <th>Blocked Code</th>
                                        <th>Company</th>
                                        <th>Group</th>
                                        <th>Market</th>
                                        <th>Source</th>
                                        <th>Agent</th>
                                        <!-- <th>Booker</th> -->
                                        <th>Accompany 1</th>
                                        <th>Accompany 2</th>
                                        <th>Accompany 3</th>
                                        <th>Accompany 4</th>
                                        <th>Accompany 5</th>
                                        <th>Accompany 6</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($reservations == 0) { ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    <?php } else { ?>

                                        <?php foreach ($reservations as $reservation): ?>

                                            <tr>
                                                <td>
                                                    <a href="update-guestreservationinfo2.php?reservationid=<?php echo $reservation->reservationid; ?>"
                                                        class="btn btn-block btn-primary btn-sm">Update
                                                        Reservation </a>

                                                    </a>

                                                </td>
                                                <td><?php echo $reservation->reservationid ?></td>
                                                <td>

                                                    <?php $reservation->customerid;

                                                    $query = "SELECT * FROM hmst_customerinfo where customerid='$reservation->customerid'";
                                                    $app = new App;
                                                    $names = $app->selectAll($query);
                                                    foreach ($names as $name) {
                                                        echo "$name->firstname $name->lastname";
                                                    }

                                                    ?>


                                                </td>
                                                <td><?php echo $reservation->checkindate ?></td>
                                                <td><?php echo $reservation->checkoutdate ?></td>

                                                <td><?php echo $reservation->adults ?></td>
                                                <td><?php echo $reservation->kids ?></td>
                                                <td><?php echo $currentdate ?></td>
                                                <td>





                                                    <?php

                                                    // if (!$reservation->checkindate || !$reservation->checkoutdate || !$currentdate) {
                                                    //     return "Invalid Date Format"; // Handle invalid date formats
                                                    // }
                                            
                                                    if ($reservation->status === "Checkout") {
                                                        echo "<span class='badge bg-primary'>Checkout</span>";

                                                    } elseif ($reservation->checkindate == $currentdate) {
                                                        if ($reservation->status === "Checkin") {

                                                            echo "<span class='badge bg-primary'>Inhouse</span>";
                                                        } elseif ($reservation->status === "Reserve") {
                                                            echo "<span class='badge bg-primary'>Arrival1</span>";
                                                        }
                                                    } elseif ($reservation->checkoutdate == $currentdate && $reservation->status === "Checkin") {

                                                        echo "<span class='badge bg-primary'>Due Out</span>";
                                                    } elseif ($reservation->checkindate < $currentdate) {
                                                        if ($reservation->status === "Checkin") {
                                                            echo "<span class='badge bg-primary'>Inhouse</span>";
                                                        } elseif ($reservation->status === "Reserve") {
                                                            echo "<span class='badge bg-primary'>Arrival2</span>";
                                                        } else {
                                                            return "<span class='badge bg-primary'>Checkout</span>"; // If status is checkout, it is already checked out.
                                                        }
                                                    } elseif ($reservation->checkindate > $currentdate) {
                                                        echo "<span class='badge bg-primary'>Arrival3</span>";
                                                    } elseif ($reservation->checkoutdate < $currentdate && $reservation->status !== "Checkout") {
                                                        echo "<span class='badge bg-primary'>Due Out</span>";
                                                    } else {
                                                        echo "<span class='badge bg-primary'>Arrival4</span>";// Default
                                                    }



























                                                    // $reservation->status = htmlspecialchars($reservation->status); // Sanitize output
                                            
                                                    // if ($reservation->status === "Checkout") {
                                                    //     echo $reservation->status . ': <span class="badge bg-primary">Checkout</span>';
                                                    // } elseif ($reservation->checkindate == $currentdate) {
                                                    //     if ($reservation->status === "Checkin") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary">Inhouse Due Out</span>';
                                                    //     } elseif ($reservation->status === "Reserve") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary">Arrival</span>';
                                                    //     }
                                                    // } elseif ($reservation->checkoutdate == $currentdate && $reservation->status === "Checkin") {
                                                    //     echo $reservation->status . ': <span class="badge bg-primary">Due Out</span>';
                                                    // } elseif ($reservation->checkindate < $currentdate) {
                                                    //     if ($reservation->status === "Checkin") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary">Inhouse Due Out</span>';
                                                    //     } elseif ($reservation->status === "Reserve") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary">Arrival Overdue</span>';
                                                    //     } else {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary">Checkout Date Issue</span>';
                                                    //     }
                                                    // } elseif ($reservation->checkoutdate < $currentdate && $reservation->status !== "Checkout") {
                                                    //     echo $reservation->status . ': <span class="badge bg-primary">Checkout Overdue</span>';
                                                    // } elseif ($reservation->checkindate > $currentdate) {
                                                    //     echo $reservation->status . ': <span class="badge bg-primary">Incoming</span>';
                                                    // } elseif ($reservation->checkoutdate > $currentdate && $reservation->status !== "Checkout") {
                                                    //     echo $reservation->status . ': <span class="badge bg-primary">Incoming Checkout</span>';
                                                    // } else {
                                                    //     echo $reservation->status . ': <span class="badge bg-primary">Status Issue</span>';
                                                    // }
                                            
                                                    ?>




















                                                    <?php
                                                    // if ($reservation->checkindate == $currentdate) {
                                            
                                                    //     if ($reservation->status == "Checkin") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Inhouse</span>';
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Due Out</span>';
                                                    //     } elseif ($reservation->status == "Reserve") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Arrival Today</span>';
                                                    //     } elseif ($reservation->status == "Checkout") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary "> Checkout </span>';
                                                    //     }
                                            

                                                    // } elseif ($reservation->checkindate < $currentdate) {
                                            
                                                    //     // echo $reservation->status . ': <span class="badge bg-primary ">Hindi pa nacheckin</span>';
                                                    //     if ($reservation->status == "Checkin") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Inhouse Due out</span>';
                                                    //     } elseif ($reservation->status == "Reserve") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Hindi pa nacheckin</span>';
                                                    //     } elseif ($reservation->status == "Checkout") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Unable Checkout Date</span>';
                                                    //     }
                                            
                                                    // } elseif ($reservation->checkindate > $currentdate) {
                                            
                                                    //     echo $reservation->status . ': <span class="badge bg-primary ">Incoming Arrival</span>';
                                            
                                                    // } else {
                                            
                                                    //     // echo "1";
                                                    // }
                                            


                                                    // if ($reservation->checkoutdate == $currentdate) {
                                            
                                                    //     if ($reservation->status == "Checkin") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Due Out</span>';
                                                    //     } elseif ($reservation->status == "Reserve") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Adjust Checkout Date</span>';
                                                    //     } elseif ($reservation->status == "Checkout") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary "> Already Checkout </span>';
                                                    //     }
                                            
                                                    // } elseif ($reservation->checkoutdate < $currentdate) {
                                                    //     // echo $reservation->status . ': <span class="badge bg-primary ">Hindi pa nacheckin</span>';
                                                    //     if ($reservation->status == "Checkin") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Due out</span>';
                                                    //     } elseif ($reservation->status == "Reserve") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary ">Adjust Checkout Date</span>';
                                                    //     } elseif ($reservation->status == "Checkout") {
                                                    //         echo $reservation->status . ': <span class="badge bg-primary "> Checkout Na</span>';
                                                    //     }
                                                    // } elseif ($reservation->checkoutdate > $currentdate) {
                                                    //     // echo $reservation->status . ': <span class="badge bg-primary ">Incoming Checkout</span>';
                                            
                                                    // } else {
                                            
                                                    //     // echo "1";
                                                    // }
                                            











                                                    // } elseif ($reservation->checkindate >= $currentdate && $reservation->status == "Checkin") {
                                                    //     echo $reservation->status . ': <span class="badge bg-success "> Inhouse</span>';
                                                    // } elseif ($reservation->status == "Cancel") {
                                                    //     echo $reservation->status . ': <span class="badge bg-danger "> Cancel</span>';
                                                    // } elseif ($reservation->status == "Reserve") {
                                                    //     echo $reservation->status . ':  <span class="badge bg-warning ">Reserve</span>';
                                                    // } elseif ($reservation->status == "Checkout") {
                                                    //     echo $reservation->status . ':  <span class="badge bg-danger ">Checkout</span>';
                                                    // } else {
                                                    //     // echo $reservation->status . ':  <span class="badge bg-secondary "> Checkout</span>';
                                                    // }
                                            
                                                    ?>
                                                </td>

                                                <td><?php echo $reservation->roomnumber ?></td>
                                                <td><?php echo $reservation->noofrooms ?></td>
                                                <td><?php echo $reservation->roomtypeid;
                                                $query = "SELECT * FROM hmsroomtypes where id='$reservation->roomtypeid'";
                                                $app = new App;
                                                $toomtypess = $app->selectAll($query);
                                                foreach ($toomtypess as $toomtypes) {
                                                    echo $toomtypes->code;
                                                } ?></td>
                                                <td><?php echo $reservation->ratecodeid;
                                                $query = "SELECT * FROM hmsratecode where id='$reservation->ratecodeid'";
                                                $app = new App;
                                                $codes = $app->selectAll($query);
                                                foreach ($codes as $code) {
                                                    echo $code->code;
                                                }
                                                ?>
                                                </td>

                                                <td><?php echo $reservation->rate ?></td>
                                                <td><?php echo $reservation->folioid ?></td>
                                                <td><?php
                                                if ($reservation->blockecodeid == Null) {
                                                    echo " ";
                                                } else {
                                                    $query = "SELECT * FROM hmsblocked where id='$reservation->blockecodeid'";
                                                    $app = new App;
                                                    $blockeds = $app->selectAll($query);
                                                    foreach ($blockeds as $blocked) {
                                                        echo $blocked->blocked;
                                                    }
                                                }
                                                ?></td>
                                                <td><?php
                                                if ($reservation->companyid == Null) {
                                                    echo " ";
                                                } else {
                                                    $query = "SELECT * FROM hmscompany where id='$reservation->companyid'";
                                                    $app = new App;
                                                    $companys = $app->selectAll($query);
                                                    foreach ($companys as $company) {
                                                        echo $company->company;
                                                    }
                                                }
                                                ?></td>
                                                <td><?php
                                                if ($reservation->groupid == Null) {
                                                    echo " ";
                                                } else {
                                                    $query = "SELECT * FROM hmsgroups where id='$reservation->groupid'";
                                                    $app = new App;
                                                    $groups = $app->selectAll($query);
                                                    foreach ($groups as $group) {
                                                        echo $group->groups;
                                                    }
                                                }
                                                ?></td>
                                                <td><?php
                                                if ($reservation->marketid == Null) {
                                                    echo " ";
                                                } else {
                                                    $query = "SELECT * FROM hmsmarket where id='$reservation->marketid'";
                                                    $app = new App;
                                                    $markets = $app->selectAll($query);
                                                    foreach ($markets as $market) {
                                                        echo $market->market;
                                                    }
                                                }
                                                ?></td>
                                                <td><?php
                                                if ($reservation->sourceid == Null) {
                                                    echo " ";
                                                } else {
                                                    $query = "SELECT * FROM hmssource where id='$reservation->sourceid'";
                                                    $app = new App;
                                                    $sources = $app->selectAll($query);
                                                    foreach ($sources as $source) {
                                                        echo $source->source;
                                                    }
                                                }
                                                ?></td>
                                                <td><?php
                                                if ($reservation->agentid == Null) {
                                                    echo " ";
                                                } else {
                                                    $query = "SELECT * FROM hmsagent where id='$reservation->agentid'";
                                                    $app = new App;
                                                    $agents = $app->selectAll($query);
                                                    foreach ($agents as $agent) {
                                                        echo $agent->agent;
                                                    }
                                                }
                                                ?></td>
                                                <td><?php echo $reservation->roomnumber ?></td>
                                                <td><?php echo $reservation->roomnumber ?></td>
                                                <td><?php echo $reservation->roomnumber ?></td>
                                                <td><?php echo $reservation->roomnumber ?></td>
                                                <td><?php echo $reservation->roomnumber ?></td>
                                                <td><?php echo $reservation->roomnumber ?></td>

                                            </tr>


                                        <?php endforeach;
                                    } ?>
                                </tbody>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#history').DataTable({
                                            columnDefs: [{
                                                width: '20%',
                                                targets: 0
                                            }],
                                            fixedColumns: true,
                                            paging: false,
                                            scrollCollapse: true,
                                            scrollX: true,
                                            scrollY: 500,
                                            autoWidth: true,

                                            "pageLength": 5

                                        });
                                    });
                                    // $('#history [data-toggle="tooltip"]').tooltip({
                                    //     animated: 'fade',
                                    //     placement: 'bottom',
                                    //     html: true
                                    // });
                                </script>
                            </table>
                            <hr>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>