<?php require "../../../header.php"; ?>

<?php if (isset($_GET['reservationid'])) {

    $reservationid = $_GET['reservationid'];
    $win = $_GET['win'];


    $query = "SELECT * FROM hmsreservations where reservationid=$reservationid";
    $app = new App;
    $selectedreservations = $app->selectAll($query);
    foreach ($selectedreservations as $selectedreservation) {

        $query = "SELECT * FROM hmst_customerinfo where customerid=$selectedreservation->customerid";
        $app = new App;
        $selctednames = $app->selectAll($query);
        foreach ($selctednames as $selctedname) {
            ?>

            <body>
                <div class="wrapper">
                    <!-- Main content -->
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">

                            <div class="text-justify">
                                <br>
                                <p> <img src="<?php echo APPURL; ?>img/logo1.png" class='mx-auto d-block' width="200" alt=""></p>
                                <br>
                                <h1 class="text-center">Guest Folio</h1>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> First
                                                Name. :
                                                <?php echo $selctedname->firstname; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Last
                                                Name : <?php echo $selctedname->lastname; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Middle
                                                Name : <?php echo $selctedname->middlename; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Home
                                                Address :
                                                <?php echo $selctedname->city . ' ' . $selctedname->province . ' ' . $selctedname->region . ' ' . $selctedname->country; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Company
                                                Name: <?php


                                                // echo $selctedname->companyid;
                                                $query = "SELECT * FROM hmscompany WHERE id=$selctedname->companyid";
                                                $app = new App;
                                                $companys = $app->selectAll($query);
                                                foreach ($companys as $company) {
                                                    echo $company->company;
                                                }

                                                ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Billing
                                                Instruction:
                                                <?php
                                                // echo $selectedreservation->paymenttypeid;
                                                $query = "SELECT * FROM hmspayments WHERE id=$selectedreservation->paymenttypeid";
                                                $app = new App;
                                                $paymentss = $app->selectAll($query);
                                                foreach ($paymentss as $payments) {
                                                    echo $payments->description;
                                                }
                                                ?>
                                            </label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Contact
                                                Number :
                                                <?php echo $selctedname->number1 . ' | ' . $selctedname->number2; ?></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">
                                                Registration Number : <?php echo $selctedname->firstname; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Room
                                                Number : <?php echo $selectedreservation->roomnumber; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Room Type
                                                : <?php
                                                // echo $selectedreservation->roomtypeid;
                                                // echo $selctedname->companyid;
                                                $query = "SELECT * FROM hmsroomtypes WHERE id=$selectedreservation->roomtypeid";
                                                $app = new App;
                                                $roomtypes = $app->selectAll($query);

                                                foreach ($roomtypes as $roomtype) {
                                                    echo $roomtype->code;
                                                }

                                                ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> CheckIn
                                                Date : <?php echo $selectedreservation->checkindate; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Checkout
                                                Date: <?php echo $selectedreservation->checkoutdate; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">No of
                                                Nights: <?php echo $selectedreservation->noofnights; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Rate :
                                                <?php echo $selectedreservation->rate; ?></label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> No of
                                                Person :
                                                <?php echo $selectedreservation->adults + $selectedreservation->kids;
                                                ; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                Adult :
                                                <?php echo $selectedreservation->adults; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kids
                                                :<?php echo $selectedreservation->kids; ?></label>
                                        </div>


                                        <div class="col-sm-12">
                                            <hr>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">DETAILS
                                                OF CHARGES AND PAYMENTS: </label>
                                            <style>
                                                #history1 th,
                                                #history1 td {
                                                    border: 1px solid black;
                                                    padding: 8px;

                                                }
                                            </style>

                                            <table class="table table-striped cell-border" id="history1">
                                                <thead style="text-align:center;">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Room No.</th>
                                                        <th>Description</th>
                                                        <th colspan="2">Charges</th>
                                                        <th>Payments</th>
                                                        <th>Total Balance</th>

                                                    </tr>
                                                </thead>
                                                <tbody>






                                                    <?php
                                                    $pdo = new PDO("mysql:host=localhost;dbname=allinonedb", "root", "");

                                                    if ($win == "*") {
                                                        echo "All Windows Transactions";

                                                        $stmt = $pdo->prepare("SELECT gf.id AS guestfolio_id, gf.date, t.code, t.description, gf.qty, gf.amount FROM hmsguestfolio gf JOIN hmstransactions t ON gf.transactionid = t.id WHERE gf.reservationid = :reservationid ORDER BY gf.date ASC ");
                                                        $stmt->bindParam(':reservationid', $reservationid);
                                                        $stmt->execute();
                                                        $pays2 = $stmt->fetchAll(PDO::FETCH_OBJ);

                                                    } else {
                                                        echo 'All Transactions In Window : ' . $win . '';

                                                        $stmt = $pdo->prepare("SELECT gf.id AS guestfolio_id, gf.date, t.code, t.description, gf.qty, gf.amount FROM hmsguestfolio gf JOIN hmstransactions t ON gf.transactionid = t.id WHERE gf.reservationid = :reservationid AND gf.win = $win ORDER BY gf.date ASC");

                                                        $stmt->bindParam(':reservationid', $reservationid);
                                                        $stmt->execute();
                                                        $pays2 = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                    }

                                                    if ($pays2) {
                                                        foreach ($pays2 as $pay): ?>
                                                            <tr data-id="<?php echo $pay->guestfolio_id; ?>">
                                                                <td><?php echo $pay->date ?></td>
                                                                <td><?php echo $selectedreservation->roomnumber; ?></td>
                                                                <td><?php echo $pay->code . '-' . $pay->description ?></td>
                                                                <td>Desc</td>
                                                                <td style="text-align:right;">
                                                                    <?php
                                                                    $trans = number_format((float) ($pay->qty * $pay->amount), 2);
                                                                    if ($trans > 0) {
                                                                        echo number_format((float) ($pay->qty * $pay->amount), 2);
                                                                    }
                                                                    ?>
                                                                </td>

                                                                <td style="text-align:right;"><?php if ($trans < 0) {
                                                                    echo number_format((float) ($pay->qty * $pay->amount), 2);
                                                                } ?></td>

                                                                <td style="text-align:right;">
                                                                    <?php
                                                                    echo number_format((float) ($pay->qty * $pay->amount), 2);
                                                                    ?>

                                                                </td>
                                                            </tr>
                                                        <?php endforeach;
                                                    } else { ?>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    <?php } ?>

                                                    <tr>
                                                        <th colspan="3">Total Charges and Payments</th>
                                                        <th style="text-align:center;">Total</th>
                                                        <th style="text-align:right;">
                                                            <?php
                                                            if ($win == "*") {
                                                                $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_charges FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid AND gf.amount > 0 ");
                                                                $stmt->bindParam(':reservationid', $reservationid);
                                                                $stmt->execute();
                                                                $total_charges = $stmt->fetchColumn();
                                                                echo number_format((float) $total_charges, 2);

                                                            } else {
                                                                $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_charges FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid AND gf.amount > 0 AND gf.win = $win ");
                                                                $stmt->bindParam(':reservationid', $reservationid);
                                                                $stmt->execute();
                                                                $total_charges = $stmt->fetchColumn();
                                                                echo number_format((float) $total_charges, 2);

                                                            }
                                                            ?>

                                                        </th>
                                                        <th style="text-align:right;"><?php
                                                        if ($win == "*") {
                                                            $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_payments FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid AND gf.amount < 0 ");
                                                            $stmt->bindParam(':reservationid', $reservationid);
                                                            $stmt->execute();
                                                            $total_payments = $stmt->fetchColumn();
                                                            echo number_format((float) $total_payments, 2);

                                                        } else {
                                                            $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_payments FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid AND gf.amount < 0 AND gf.win = $win ");
                                                            $stmt->bindParam(':reservationid', $reservationid);
                                                            $stmt->execute();
                                                            $total_payments = $stmt->fetchColumn();
                                                            echo number_format((float) $total_payments, 2);

                                                        }
                                                        ?></th>
                                                        <th>&nbsp;</th>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="6">Amount Due</th>
                                                        <th style="text-align:right;"><?php
                                                        if ($win == "*") {
                                                            $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_win1 FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid ");
                                                            $stmt->bindParam(':reservationid', $reservationid);
                                                            $stmt->execute();
                                                            $totalWin1 = $stmt->fetchColumn();
                                                            echo number_format((float) $totalWin1, 2);
                                                        } else {
                                                            $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS total_win1 FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid AND gf.win = $win");
                                                            $stmt->bindParam(':reservationid', $reservationid);
                                                            $stmt->execute();
                                                            $totalWin1 = $stmt->fetchColumn();
                                                            echo number_format((float) $totalWin1, 2);
                                                        }
                                                        ?></th>

                                                    </tr>
                                                </tbody>

                                            </table>

                                            <hr>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">BREAKDOWN
                                                OF CHARGES & PAYMENTS(PER CATEGORY): </label>
                                            <table class="table table-striped cell-border" id="history1">
                                                <thead>
                                                    <tr>
                                                        <th>Charges</th>
                                                        <th>Vatable Sales</th>
                                                        <th>Vat Exempt Sales</th>
                                                        <th>Vat Zero-rated</th>
                                                        <th>Vat</th>
                                                        <th>SC</th>
                                                        <th>Local Tax</th>
                                                        <th>Total Charges</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Charges</th>
                                                        <td>3</td>
                                                        <td>3</td>
                                                        <td>3</td>
                                                        <td>3</td>
                                                        <td>3</td>
                                                        <td>3</td>
                                                        <td>3</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-striped cell-border" id="history1">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Type of Payment</th>
                                                        <th>Reference #</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4">Total Payments</th>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="col-sm-12">
                                            <hr>
                                            <label for="colFormLabelSm" class="colabm-12 col-form-label col-form-label-sm">Other
                                                Remarks: </label>
                                            <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Remarks
                                                RemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarks</label>
                                            <hr>
                                            <p>By affixing my signature, I confirm and affirm that I and all my guests/companions
                                                shall conform to all rules, regulations, policies, and memoranda issued and enforced
                                                by Montemar. Further, I shall hold the club free and harmless from all losses and
                                                damages that I or my companions may suffer due to my/our negligence, failure to
                                                abide by the said club rules, or any fortuitous events.</p>

                                        </div>


                                    </div>
                                </div>




                            </div>
                        </div>



                        <!-- /.content -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- ./wrapper -->
                <!-- Page specific script -->
                <script>
                    // window.addEventListener("load", window.print());
                </script>
            </body>

            <script type="text/javascript">
                // $(document).ready(function() {
                //     $('#history1').DataTable({

                //     });
                // });
            </script>
            <?php
        }
    }
} ?>