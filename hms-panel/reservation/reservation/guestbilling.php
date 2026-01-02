<?php require "../../../header.php"; ?>
<?php // require "../../../headerscrolldatatables.php"; ?>
<?php require "../../sidebar.php"; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<style>
.card {
    margin-bottom: 20px;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-body {
    min-height: 200px;
    /* Adjust as needed */
    overflow-y: auto;
}

.table tbody tr {
    cursor: grab;
    /* Indicate draggable */
}

.total-amount {
    font-weight: bold;
}

.dataTables_wrapper .dataTables_filter {
    float: none;
    text-align: center;
    width: 100%;
}

.dataTables_wrapper .dataTables_filter input {
    width: 600px;
    margin: 0px;
    padding: 2px;
}

.dataTables_wrapper label {
    float: none;
}

.dataTables_wrapper table {
    font-size: 13px;
}
</style>

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
    <?php $reservationid = $_GET['reservationid'];

    $query = "SELECT * FROM hmsreservations where reservationid=$reservationid";
    $app = new App;
    $selectedreservations = $app->selectAll($query);
    foreach ($selectedreservations as $selectedreservation) {

        $query = "SELECT * FROM hmst_customerinfo where customerid=$selectedreservation->customerid";
        $app = new App;
        $selctednames = $app->selectAll($query);
        foreach ($selctednames as $selctedname) {

            ?>


    <section class="content">
        <div class="container-fluid">

            <div class="col-md-12">
                <table class="table  table-bordered table-dark table-sm">
                    <thead>
                        <tr>
                            <th>Guest Name:</th>
                            <th>
                                <?php echo $selctedname->firstname; ?>
                                <?php echo $selctedname->lastname; ?>
                            </th>

                            <th>Arrival:</th>
                            <th><?php echo $selectedreservation->checkindate; ?></th>
                            <th>Rate:</th>
                            <th><?php echo $selectedreservation->rate ?></th>

                        </tr>
                        <tr>
                            <th>Room Number:</th>
                            <th><?php echo $selectedreservation->roomnumber ?></th>
                            <th>Departure:</th>
                            <th><?php echo $selectedreservation->checkoutdate; ?></th>

                            <th>TR No:</th>
                            <th><?php echo $reservationid; ?>
                                <input type="hidden" name="reservationid" value="<?php echo $reservationid; ?>">
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="col-md-12 mb-3">
                <!-- <form name="savecomment" action="executemodal.php" method="POST"> -->
                <a href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid; ?>"
                    class="btn btn-danger">
                    Back
                </a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postmodal">
                    Post
                </button>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentmodal">
                    Payment
                </button>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#settlementmodal" <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=allinonedb", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS balance FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid");
                        $stmt->bindParam(':reservationid', $reservationid);
                        $stmt->execute();
                        $balance = $stmt->fetchColumn();
                        if ($balance == 0) {
                            echo "disabled";
                        } else {
                            echo " ";
                        }
                        ?>>
                    Settlement
                </button>

                <button type="button" class="btn btn-primary" <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=allinonedb", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS balance FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid");
                        $stmt->bindParam(':reservationid', $reservationid);
                        $stmt->execute();
                        $balance = $stmt->fetchColumn();

                        if ($balance == 0) {
                            echo " ";
                        } else {
                            echo "disabled";
                        }
                        ?>>Check Out <?php
                        if ($balance == 0) {
                            // echo $balance;
                        } else {
                            echo "Balance : ";
                            echo $balance;

                        }
                        ?></button>
                <span class="h5">Balance: <?php
                        echo number_format((float) $balance, 2); ?></span>

                <!-- Button trigger modal -->
                <a href="guestfoliowin-print.php?reservationid=<?php echo $reservationid; ?>&win=*"
                    class="btn btn-secondary btn-sm">
                    Print All Billing
                </a>
                <?php require "postmodal.php"; ?>
                <?php require "paymentmodal.php"; ?>
                <?php require "transactionview.php"; ?>
                <?php require "settlementmodal.php"; ?>
                <!-- </form> -->
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title col-6">Win: 1 <?php echo $selctedname->firstname; ?>
                                    <?php echo $selctedname->lastname; ?>
                                </h3>
                                <div class="total-amount col-4 text-danger"> Total :
                                    <?php
                                        $pdo = new PDO("mysql:host=localhost;dbname=allinonedb", "root", "");
                                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $reservationid = $_GET['reservationid']; // Replace with your actual reservation ID
                                        $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_win1 FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid AND gf.win = 1");
                                        $stmt->bindParam(':reservationid', $reservationid);
                                        $stmt->execute();
                                        $totalWin1 = $stmt->fetchColumn();
                                        echo number_format((float) $totalWin1, 2);
                                        ?>
                                </div>
                                <a href="guestfoliowin-print.php?reservationid=<?php echo $reservationid; ?>&win=1"
                                    class="btn btn-secondary btn-sm">
                                    Print
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-head-fixed text-nowrap" id="history1">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Code-Description</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // Assuming you have a database connection established
                                            $pdo = new PDO("mysql:host=localhost;dbname=allinonedb", "root", "");
                                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                            $reservationid = $_GET['reservationid']; // Replace with your actual reservation ID
                                    
                                            $stmt = $pdo->prepare("SELECT gf.id AS guestfolio_id, gf.date, t.code, t.description, gf.qty, gf.amount FROM hmsguestfolio gf JOIN hmstransactions t ON gf.transactionid = t.id WHERE gf.reservationid = :reservationid AND gf.win = 1");
                                            $stmt->bindParam(':reservationid', $reservationid);
                                            $stmt->execute();
                                            $pays1 = $stmt->fetchAll(PDO::FETCH_OBJ);

                                            if ($pays1) {
                                                foreach ($pays1 as $pay): ?>
                                        <tr data-id="<?php echo $pay->guestfolio_id; ?>">
                                            <td><?php echo $pay->date ?></td>
                                            <td><?php echo $pay->code . '-' . $pay->description ?></td>
                                            <td><?php echo $pay->qty * $pay->amount; ?></td>
                                            <td>
                                                <!-- data-bs-toggle="modal" data-bs-target="#openviewModal" -->
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&openviewModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-primary">
                                                    <i class="nav-icon fas fa fa-info-circle"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&opentrasferModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-success">
                                                    <i class="nav-icon fas fa fa-retweet"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&openvoidModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-danger">
                                                    <i class="nav-icon fas fa fa-ban"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;
                                            } else { ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title col-6">Win: 2 <?php echo $selctedname->firstname; ?>
                                    <?php echo $selctedname->lastname; ?>
                                </h3>
                                <div class="total-amount col-4 text-danger">Total:
                                    <?php
                                        $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_win2 FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid AND gf.win = 2");
                                        $stmt->bindParam(':reservationid', $reservationid);
                                        $stmt->execute();
                                        $totalWin2 = $stmt->fetchColumn();
                                        echo number_format((float) $totalWin2, 2);
                                        ?>
                                </div>
                                <a href="guestfoliowin-print.php?reservationid=<?php echo $reservationid; ?>&win=2"
                                    class="btn btn-secondary btn-sm">
                                    Print
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-head-fixed text-nowrap" id="history2">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Code-Description</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stmt = $pdo->prepare("SELECT gf.id AS guestfolio_id, gf.date, t.code, t.description, gf.qty, gf.amount FROM hmsguestfolio gf JOIN hmstransactions t ON gf.transactionid = t.id WHERE gf.reservationid = :reservationid AND gf.win = 2");
                                            $stmt->bindParam(':reservationid', $reservationid);
                                            $stmt->execute();
                                            $pays2 = $stmt->fetchAll(PDO::FETCH_OBJ);

                                            if ($pays2) {
                                                foreach ($pays2 as $pay): ?>
                                        <tr data-id="<?php echo $pay->guestfolio_id; ?>">
                                            <td><?php echo $pay->date ?></td>
                                            <td><?php echo $pay->code . '-' . $pay->description ?></td>
                                            <td><?php echo $pay->qty * $pay->amount; ?></td>
                                            <td>
                                                <!-- data-bs-toggle="modal" data-bs-target="#openviewModal" -->
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&openviewModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-primary">
                                                    <i class="nav-icon fas fa fa-info-circle"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&opentrasferModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-success">
                                                    <i class="nav-icon fas fa fa-retweet"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&openvoidModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-danger">
                                                    <i class="nav-icon fas fa fa-ban"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;
                                            } else { ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title col-6">Win: 3 <?php echo $selctedname->firstname; ?>
                                    <?php echo $selctedname->lastname; ?>
                                </h3>
                                <div class="total-amount col-4 text-danger">Total:
                                    <?php
                                        $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_win3 FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid AND gf.win = 3");
                                        $stmt->bindParam(':reservationid', $reservationid);
                                        $stmt->execute();
                                        $totalWin3 = $stmt->fetchColumn();
                                        echo number_format((float) $totalWin3, 2);
                                        ?>
                                </div>
                                <a href="guestfoliowin-print.php?reservationid=<?php echo $reservationid; ?>&win=3"
                                    class="btn btn-secondary btn-sm">
                                    Print
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-head-fixed text-nowrap" id="history3">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Code-Description</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stmt = $pdo->prepare("SELECT gf.id AS guestfolio_id, gf.date, t.code, t.description, gf.qty, gf.amount FROM hmsguestfolio gf JOIN hmstransactions t ON gf.transactionid = t.id WHERE gf.reservationid = :reservationid AND gf.win = 3");
                                            $stmt->bindParam(':reservationid', $reservationid);
                                            $stmt->execute();
                                            $pays3 = $stmt->fetchAll(PDO::FETCH_OBJ);

                                            if ($pays3) {
                                                foreach ($pays3 as $pay): ?>
                                        <tr data-id="<?php echo $pay->guestfolio_id; ?>">
                                            <td><?php echo $pay->date ?></td>
                                            <td><?php echo $pay->code . '-' . $pay->description ?></td>
                                            <td><?php echo $pay->qty * $pay->amount; ?></td>
                                            <td>
                                                <!-- data-bs-toggle="modal" data-bs-target="#openviewModal" -->
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&openviewModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-primary">
                                                    <i class="nav-icon fas fa fa-info-circle"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&opentrasferModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-success">
                                                    <i class="nav-icon fas fa fa-retweet"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&openvoidModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-danger">
                                                    <i class="nav-icon fas fa fa-ban"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;
                                            } else { ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title col-6">Win: 4 <?php echo $selctedname->firstname; ?>
                                    <?php echo $selctedname->lastname; ?>
                                </h3>
                                <div class="total-amount col-4 text-danger">Total:
                                    <?php
                                        $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_win4 FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid AND gf.win = 4");
                                        $stmt->bindParam(':reservationid', $reservationid);
                                        $stmt->execute();
                                        $totalWin4 = $stmt->fetchColumn();
                                        echo number_format((float) $totalWin4, 2);
                                        ?>
                                </div>
                                <a href="guestfoliowin-print.php?reservationid=<?php echo $reservationid; ?>&win=4"
                                    class="btn btn-secondary btn-sm">
                                    Print
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-head-fixed text-nowrap" id="history4">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Code-Description</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stmt = $pdo->prepare("SELECT gf.id AS guestfolio_id, gf.date, t.code, t.description, gf.qty, gf.amount FROM hmsguestfolio gf JOIN hmstransactions t ON gf.transactionid = t.id WHERE gf.reservationid = :reservationid AND gf.win = 4");
                                            $stmt->bindParam(':reservationid', $reservationid);
                                            $stmt->execute();
                                            $pays4 = $stmt->fetchAll(PDO::FETCH_OBJ);

                                            if ($pays4) {
                                                foreach ($pays4 as $pay): ?>
                                        <tr data-id="<?php echo $pay->guestfolio_id; ?>">
                                            <td><?php echo $pay->date ?></td>
                                            <td><?php echo $pay->code . '-' . $pay->description ?></td>
                                            <td><?php echo $pay->qty * $pay->amount; ?></td>
                                            <td>
                                                <!-- data-bs-toggle="modal" data-bs-target="#openviewModal" -->
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&openviewModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-primary">
                                                    <i class="nav-icon fas fa fa-info-circle"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&opentrasferModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-success">
                                                    <i class="nav-icon fas fa fa-retweet"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="guestbilling.php?reservationid=<?php echo $reservationid; ?>&openvoidModal=1&viewid=<?php echo $pay->guestfolio_id; ?>"
                                                    class="text-danger">
                                                    <i class="nav-icon fas fa fa-ban"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;
                                            } else { ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->


    <script type="text/javascript">
    $(document).ready(function() {
        $('#history1').DataTable({ // Removed space before history1
            columnDefs: [{
                width: '20%',
                targets: 0
            }],
            paging: false,
            scrollX: false,
            scrollY: 200,
            autoWidth: true,
        });
    });

    $(document).ready(function() {
        $('#history2').DataTable({ // Removed space before history2
            columnDefs: [{
                width: '20%',
                targets: 0
            }],
            paging: false,
            scrollX: false,
            scrollY: 200,
            autoWidth: true,
        });
    });

    $(document).ready(function() {
        $('#history3').DataTable({ // Removed space before history3
            columnDefs: [{
                width: '20%',
                targets: 0
            }],
            paging: false,
            scrollX: false,
            scrollY: 150,
            autoWidth: true,
        });
    });

    $(document).ready(function() {
        $('#history4').DataTable({ // Removed space before history4
            columnDefs: [{
                width: '20%',
                targets: 0
            }],
            paging: false,
            scrollX: false,
            scrollY: 150,
            autoWidth: true,
        });
    });
    </script>


    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const history1 = document.getElementById('history1').querySelector('tbody');
        const history2 = document.getElementById('history2').querySelector('tbody');
        const history3 = document.getElementById('history3').querySelector('tbody');
        const history4 = document.getElementById('history4').querySelector('tbody');

        function getRowId(row) {
            return row.dataset.id;
        }

        function getNewWin(targetElement) {
            const cardTitle = targetElement.closest('.card').querySelector('.card-title').textContent;
            return parseInt(cardTitle.split(':')[1].trim());
        }

        function updateDatabaseWin(guestfolioId, newWin) {
            fetch('update_win.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `guestfolio_id=${guestfolioId}&new_win=${newWin}`
                })
                .then(response => response.text())
                .then(data => {
                    console.log('Database update response:', data);
                    // Optionally, provide user feedback
                })
                .catch(error => {
                    console.error('Error updating database:', error);
                });
        }

        Sortable.create(history1, {
            group: 'guestFolios',
            onEnd: function(evt) {
                if (evt.from !== evt.to) {
                    const guestfolioId = getRowId(evt.item);
                    const newWin = getNewWin(evt.to);
                    updateDatabaseWin(guestfolioId, newWin);
                }
            }
        });

        Sortable.create(history2, {
            group: 'guestFolios',
            onEnd: function(evt) {
                if (evt.from !== evt.to) {
                    const guestfolioId = getRowId(evt.item);
                    const newWin = getNewWin(evt.to);
                    updateDatabaseWin(guestfolioId, newWin);
                }
            }
        });

        Sortable.create(history3, {
            group: 'guestFolios',
            onEnd: function(evt) {
                if (evt.from !== evt.to) {
                    const guestfolioId = getRowId(evt.item);
                    const newWin = getNewWin(evt.to);
                    updateDatabaseWin(guestfolioId, newWin);
                }
            }
        });

        Sortable.create(history4, {
            group: 'guestFolios',
            onEnd: function(evt) {
                if (evt.from !== evt.to) {
                    const guestfolioId = getRowId(evt.item);
                    const newWin = getNewWin(evt.to);
                    updateDatabaseWin(guestfolioId, newWin);
                }
            }
        });
    });
    </script>

    <?php } ?>
    <?php } ?>



    <!-- /.content-wrapper -->
    <?php require "../../../footer1.php"; ?>