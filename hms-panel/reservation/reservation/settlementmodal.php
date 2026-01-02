<?php
if (isset($_GET['opensettlementModal']) && $_GET['opensettlementModal'] == 1) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("settlementmodal"));
            myModal.show();
        });
    </script>';
}
?>

<!-- Modal -->
<div class="modal fade" id="settlementmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form name="savesettlement" action="executemodal.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Settlement Transaction
                        <?php echo $reservationid; ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped">
                        <thead>

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
                                <?php } ?>
                            <?php } ?>
                        </thead>

                    </table>

                    <table>
                        <thead>
                            <tr>
                                <th>Code - Description</th>

                                <th>Amount</th>
                                <th>Qty</th>
                                <th>Win</th>
                                <th>Check No</th>
                                <th>Supplement</th>
                                <th>Reference</th>
                                <th>Chit No</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <select class="form-control form-control-sm" style="width: 280px;"
                                        id="transactionid" name="transactionid">
                                        <?php
                                        $query = "SELECT * FROM hmstransactions";
                                        $app = new App; // Assuming 'App' is your class for database interaction
                                        $transs = $app->selectAll($query);
                                        ?>
                                        <?php foreach ($transs as $trans): ?>
                                            <option value="<?php echo $trans->id ?>">
                                                <?php echo $trans->code . '-' . $trans->description ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </th>



                                <th><input type="text" name="amount" id="amount" class="form-control form-control-sm"
                                        style="width: 130px;" value="<?php $pdo = new PDO("mysql:host=localhost;dbname=allinonedb", "root", "");
                                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $stmt = $pdo->prepare("SELECT SUM(gf.qty * gf.amount) AS balance FROM hmsguestfolio gf WHERE gf.reservationid = :reservationid");
                                        $stmt->bindParam(':reservationid', $reservationid);
                                        $stmt->execute();
                                        $balance = $stmt->fetchColumn();
                                        echo number_format((float) $balance, 2);
                                        ?>" readonly></th>
                                <th><input type="text" name="qty" id="qty" class="form-control form-control-sm"
                                        style="width: 80px;" value="1" readonly></th>
                                <th>
                                    <select style="width: 80px;" class="form-control form-control-sm" name="win"
                                        id="win">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </th>
                                <th><input type="text" name="checkno" id="checkno" class="form-control form-control-sm"
                                        style="width: 130px;"></th>
                                <th><input type="text" name="supplement" id="supplement"
                                        class="form-control form-control-sm" style="width: 130px;"></th>
                                <th><input type="text" name="reference" id="reference"
                                        class="form-control form-control-sm" style="width: 130px;"></th>
                                <th><input type="text" name="chitno" id="chitno" class="form-control form-control-sm"
                                        style="width: 130px;"></th>
                            </tr>
                        </tbody>


                    </table>
                </div>




                <div class="modal-footer">
                    <a class="btn btn-primary" href="guestbilling.php?reservationid=<?php echo $reservationid ?>">
                        Close
                    </a>

                    <button type="submit" class="btn btn-primary" name="savesettlement">Save</button>
                </div>

        </form>
    </div>
</div>
</div>
<script src="removehtmlcode.js"></script>