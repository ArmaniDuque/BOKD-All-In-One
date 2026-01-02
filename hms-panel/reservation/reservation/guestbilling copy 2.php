<?php require "../../../headerscrolldatatables.php"; ?>
<?php require "../../../sidebar.php"; ?>

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
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table  table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th>Guest Name:</th>
                                        <th><?php echo $selctedname->firstname; ?>         <?php echo $selctedname->lastname; ?>
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
                    </div>

                    <div class="row">


                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Win: 1 <?php echo $selctedname->firstname; ?>
                                        <?php echo $selctedname->lastname; ?>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- <div class="card-body " style="height: 300px;"> -->
                                <div class="card-body  " style="height: 300px;">
                                    <table class="table table-striped table-head-fixed text-nowrap" id="history1">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Code-Description</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $paymentshistory = $app->selectone("SELECT SUM(reservationid) as reservationpay FROM hmsguestfolio WHERE reservationid='$reservationid' and win='1'  ");
                                            $paymentshistory->reservationpay;

                                            if ($paymentshistory->reservationpay > 0) {
                                                $query = "SELECT * FROM hmsguestfolio where reservationid=$reservationid and win='1' ";
                                                $app = new App;
                                                $pays = $app->selectAll($query);
                                                ?>
                                                <?php foreach ($pays as $pay): ?>
                                                    <tr>
                                                        <td><?php echo $pay->date ?></td>
                                                        <td>
                                                            <?php
                                                            $query = "SELECT * FROM hmstransactions where id=$pay->transactionid ";
                                                            $app = new App; // Assuming 'App' is your class for database interaction
                                                            $transs = $app->selectAll($query);
                                                            ?>
                                                            <?php foreach ($transs as $trans): ?>
                                                                <?php echo $trans->code . '-' . $trans->description ?>
                                                            <?php endforeach; ?>

                                                        </td>
                                                        <td><?php echo $total = $pay->qty * $pay->amount; ?></td>
                                                    </tr>
                                                <?php endforeach;
                                            } else { ?>
                                                <tr>
                                                    <td style="text-align:center;" colspan="3">Post Transaction</td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Win: 3 <?php echo $selctedname->firstname; ?>
                                        <?php echo $selctedname->lastname; ?>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- <div class="card-body " style="height: 300px;"> -->
                                <div class="card-body  " style="height: 300px;">
                                    <table class="table table-striped table-head-fixed text-nowrap" id="history3">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Code-Description</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $paymentshistory = $app->selectone("SELECT SUM(reservationid) as reservationpay FROM hmsguestfolio WHERE reservationid='$reservationid' and win='3'  ");
                                            $paymentshistory->reservationpay;

                                            if ($paymentshistory->reservationpay > 0) {
                                                $query = "SELECT * FROM hmsguestfolio where reservationid=$reservationid and win='3' ";
                                                $app = new App;
                                                $pays = $app->selectAll($query);
                                                ?>
                                                <?php foreach ($pays as $pay): ?>
                                                    <tr>
                                                        <td><?php echo $pay->date ?></td>
                                                        <td>
                                                            <?php
                                                            $query = "SELECT * FROM hmstransactions where id=$pay->transactionid ";
                                                            $app = new App; // Assuming 'App' is your class for database interaction
                                                            $transs = $app->selectAll($query);
                                                            ?>
                                                            <?php foreach ($transs as $trans): ?>
                                                                <?php echo $trans->code . '-' . $trans->description ?>
                                                            <?php endforeach; ?>

                                                        </td>
                                                        <td><?php echo $total = $pay->qty * $pay->amount; ?></td>
                                                    </tr>
                                                <?php endforeach;
                                            } else { ?>
                                                <tr>
                                                    <td style="text-align:center;" colspan="3">Post Transaction</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Win: 2 <?php echo $selctedname->firstname; ?>
                                        <?php echo $selctedname->lastname; ?>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- <div class="card-body " style="height: 300px;"> -->
                                <div class="card-body  " style="height: 300px;">
                                    <table class="table table-striped table-head-fixed text-nowrap" id="history2">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Code-Description</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $paymentshistory = $app->selectone("SELECT SUM(reservationid) as reservationpay FROM hmsguestfolio WHERE reservationid='$reservationid' and win='2' ");
                                            $paymentshistory->reservationpay;

                                            if ($paymentshistory->reservationpay > 0) {
                                                $query = "SELECT * FROM hmsguestfolio where reservationid=$reservationid and win='2' ";
                                                $app = new App;
                                                $pays = $app->selectAll($query);
                                                ?>
                                                <?php foreach ($pays as $pay): ?>
                                                    <tr>
                                                        <td><?php echo $pay->date ?></td>
                                                        <td>
                                                            <?php
                                                            $query = "SELECT * FROM hmstransactions where id=$pay->transactionid ";
                                                            $app = new App; // Assuming 'App' is your class for database interaction
                                                            $transs = $app->selectAll($query);
                                                            ?>
                                                            <?php foreach ($transs as $trans): ?>
                                                                <?php echo $trans->code . '-' . $trans->description ?>
                                                            <?php endforeach; ?>

                                                        </td>
                                                        <td><?php echo $total = $pay->qty * $pay->amount; ?></td>
                                                    </tr>
                                                <?php endforeach;
                                            } else { ?>
                                                <tr>
                                                    <td style="text-align:center;" colspan="3">Post Transaction</td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Win: 4 <?php echo $selctedname->firstname; ?>
                                        <?php echo $selctedname->lastname; ?>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- <div class="card-body " style="height: 300px;"> -->
                                <div class="card-body  " style="height: 300px;">
                                    <table class="table table-striped table-head-fixed text-nowrap" id="history4">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Code-Description</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $paymentshistory = $app->selectone("SELECT SUM(reservationid) as reservationpay FROM hmsguestfolio WHERE reservationid='$reservationid'and win='4' ");
                                            $paymentshistory->reservationpay;

                                            if ($paymentshistory->reservationpay > 0) {
                                                $query = "SELECT * FROM hmsguestfolio where reservationid=$reservationid and win='4' ";
                                                $app = new App;
                                                $pays = $app->selectAll($query);
                                                ?>
                                                <?php foreach ($pays as $pay): ?>
                                                    <tr>
                                                        <td><?php echo $pay->date ?></td>
                                                        <td>
                                                            <?php
                                                            $query = "SELECT * FROM hmstransactions where id=$pay->transactionid ";
                                                            $app = new App; // Assuming 'App' is your class for database interaction
                                                            $transs = $app->selectAll($query);
                                                            ?>
                                                            <?php foreach ($transs as $trans): ?>
                                                                <?php echo $trans->code . '-' . $trans->description ?>
                                                            <?php endforeach; ?>

                                                        </td>
                                                        <td><?php echo $total = $pay->qty * $pay->amount; ?></td>
                                                    </tr>
                                                <?php endforeach;
                                            } else { ?>
                                                <tr>
                                                    <td style="text-align:center;" colspan="3">Post Transaction</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>

                    </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        <?php } ?>
    <?php } ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#history1').DataTable({
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



    $(document).ready(function () {
        $('#history2').DataTable({
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

    $(document).ready(function () {
        $('#history3').DataTable({
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
    $(document).ready(function () {
        $('#history4').DataTable({
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
    $(document).ready(function () {
        var dragSrcRow = null; // Keep track of the source row
        var srcTable = ''; // Global tracking of table being dragged for 'over' class setting
        var rows = []; // Global rows for #example
        var rows2 = []; // Global rows for #example2

        var data = [
            [
                "Tiger Nixon",
                "System Architect",
                "Edinburgh",
                "5421",
                "2011/04/25",
                "$320,800"
            ],
            [
                "Garrett Winters",
                "Accountant",
                "Tokyo",
                "8422",
                "2011/07/25",
                "$170,750"
            ],
            [
                "Ashton Cox",
                "Junior Technical Author",
                "San Francisco",
                "1562",
                "2009/01/12",
                "$86,000"
            ],
            [
                "Cedric Kelly",
                "Senior Javascript Developer",
                "Edinburgh",
                "6224",
                "2012/03/29",
                "$433,060"
            ],
        ];

        var data2 = [
            [
                "Rhona Davidson",
                "Integration Specialist",
                "Tokyo",
                "6200",
                "2010/10/14",
                "$327,900"
            ],
            [
                "Colleen Hurst",
                "Javascript Developer",
                "San Francisco",
                "2360",
                "2009/09/15",
                "$205,500"
            ],
            [
                "Sonya Frost",
                "Software Engineer",
                "Edinburgh",
                "1667",
                "2008/12/13",
                "$103,600"
            ],
            [
                "Jena Gaines",
                "Office Manager",
                "London",
                "3814",
                "2008/12/19",
                "$90,560"
            ],
        ]

        var table = $('#history1').DataTable({
            data: data,
            paging: false,

            // Add HTML5 draggable class to each row
            createdRow: function (row, data, dataIndex, cells) {
                $(row).attr('draggable', 'true');
            },

            drawCallback: function () {
                // Add HTML5 draggable event listeners to each row
                rows = document.querySelectorAll('#history1 tbody tr');
                [].forEach.call(rows, function (row) {
                    row.addEventListener('dragstart', handleDragStart, false);
                    row.addEventListener('dragenter', handleDragEnter, false)
                    row.addEventListener('dragover', handleDragOver, false);
                    row.addEventListener('dragleave', handleDragLeave, false);
                    row.addEventListener('drop', handleDrop, false);
                    row.addEventListener('dragend', handleDragEnd, false);
                });
            }
        });



        var table2 = $('#history2').DataTable({
            data: data2,
            paging: false,

            // Add HTML5 draggable class to each row
            createdRow: function (row, data, dataIndex, cells) {
                $(row).attr('draggable', 'true');
            },

            drawCallback: function () {
                // Add HTML5 draggable event listeners to each row
                rows2 = document.querySelectorAll('#history2 tbody tr');
                [].forEach.call(rows2, function (row) {
                    row.addEventListener('dragstart', handleDragStart, false);
                    row.addEventListener('dragenter', handleDragEnter, false)
                    row.addEventListener('dragover', handleDragOver, false);
                    row.addEventListener('dragleave', handleDragLeave, false);
                    row.addEventListener('drop', handleDrop, false);
                    row.addEventListener('dragend', handleDragEnd, false);
                });
            }
        });
        var table = $('#history3').DataTable({
            data: data,
            paging: false,

            // Add HTML5 draggable class to each row
            createdRow: function (row, data, dataIndex, cells) {
                $(row).attr('draggable', 'true');
            },

            drawCallback: function () {
                // Add HTML5 draggable event listeners to each row
                rows = document.querySelectorAll('#history3 tbody tr');
                [].forEach.call(rows, function (row) {
                    row.addEventListener('dragstart', handleDragStart, false);
                    row.addEventListener('dragenter', handleDragEnter, false)
                    row.addEventListener('dragover', handleDragOver, false);
                    row.addEventListener('dragleave', handleDragLeave, false);
                    row.addEventListener('drop', handleDrop, false);
                    row.addEventListener('dragend', handleDragEnd, false);
                });
            }
        });



        var table2 = $('#history4').DataTable({
            data: data2,
            paging: false,

            // Add HTML5 draggable class to each row
            createdRow: function (row, data, dataIndex, cells) {
                $(row).attr('draggable', 'true');
            },

            drawCallback: function () {
                // Add HTML5 draggable event listeners to each row
                rows2 = document.querySelectorAll('#history4 tbody tr');
                [].forEach.call(rows2, function (row) {
                    row.addEventListener('dragstart', handleDragStart, false);
                    row.addEventListener('dragenter', handleDragEnter, false)
                    row.addEventListener('dragover', handleDragOver, false);
                    row.addEventListener('dragleave', handleDragLeave, false);
                    row.addEventListener('drop', handleDrop, false);
                    row.addEventListener('dragend', handleDragEnd, false);
                });
            }
        });





        function handleDragStart(e) {
            // this / e.target is the source node.

            // Set the source row opacity
            this.style.opacity = '0.4';

            // Keep track globally of the source row and source table id
            dragSrcRow = this;
            srcTable = this.parentNode.parentNode.id

            // Allow moves
            e.dataTransfer.effectAllowed = 'move';

            // Save the source row html as text
            e.dataTransfer.setData('text/plain', e.target.outerHTML);

        }

        function handleDragOver(e) {
            if (e.preventDefault) {
                e.preventDefault(); // Necessary. Allows us to drop.
            }

            // Allow moves
            e.dataTransfer.dropEffect = 'move';

            return false;
        }

        function handleDragEnter(e) {
            // this / e.target is the current hover target.  

            // Get current table id
            var currentTable = this.parentNode.parentNode.id

            // Don't show drop zone if in source table
            if (currentTable !== srcTable) {
                this.classList.add('over');
            }
        }

        function handleDragLeave(e) {
            // this / e.target is previous target element.

            // Remove the drop zone when leaving element
            this.classList.remove('over');
        }

        function handleDrop(e) {
            // this / e.target is current target element.

            if (e.stopPropagation) {
                e.stopPropagation(); // stops the browser from redirecting.
            }

            // Get destination table id, row
            var dstTable = $(this.closest('table')).attr('id');
            var dstRow = $(this).closest('tr');

            // No need to process if src and dst table are the same
            if (srcTable !== dstTable) {

                // Get source transfer data
                var srcData = e.dataTransfer.getData('text/plain');

                // Add row to destination Datatable
                $('#' + dstTable).DataTable().row.add($(srcData)).draw();

                // Remove ro from source Datatable
                $('#' + srcTable).DataTable().row(dragSrcRow).remove().draw();

            }
            return false;
        }

        function handleDragEnd(e) {
            // this/e.target is the source node.

            // Reset the opacity of the source row
            this.style.opacity = '1.0';

            // Clear 'over' class from both tables
            // and reset opacity
            [].forEach.call(rows, function (row) {
                row.classList.remove('over');
                row.style.opacity = '1.0';
            });

            [].forEach.call(rows2, function (row) {
                row.classList.remove('over');
                row.style.opacity = '1.0';
            });
        }



    });
</script>







<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>