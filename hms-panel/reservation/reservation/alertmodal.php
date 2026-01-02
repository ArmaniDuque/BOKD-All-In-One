<?php
if (isset($_GET['openAlertModal']) && $_GET['openAlertModal'] == 1) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("alertsmodal"));
            myModal.show();
        });
    </script>';
}
?>
<?php if (isset($reservationid)) {
    $resalerthistory = $app->selectone("SELECT count(reservationid) as reservationalert FROM hmsresalert WHERE reservationid='$reservationid' ");
    $resalerthistory->reservationalert;
}
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="width: 16%;" data-bs-toggle="modal" data-bs-target="#alertsmodal">
    Alerts
    <?php if (isset($reservationid)) {
        if ($resalerthistory->reservationalert == 0) { ?>
        <?php } else { ?>
            <span class="badge badge-danger"><?php echo $resalerthistory->reservationalert; ?></span>
        <?php }
    } ?>
</button>
<!-- Modal -->
<div class="modal fade" id="alertsmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form name="savealert" action="executemodal.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Alerts <?php echo $reservationid; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 ">
                        <table class="table table-striped " id="wraptable">
                            <thead>
                                <tr>
                                    <th>Alert</th>
                                    <th>Area</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $resalerthistory = $app->selectone("SELECT SUM(reservationid) as reservationalert FROM hmsresalert WHERE reservationid='$reservationid' ");
                                $resalerthistory->reservationalert;

                                if ($resalerthistory->reservationalert > 0) {
                                    $query = "SELECT * FROM hmsresalert where reservationid=$reservationid ";
                                    $app = new App;
                                    $alerts = $app->selectAll($query);
                                    ?>
                                    <?php foreach ($alerts as $alert): ?>
                                        <tr>
                                            <td>
                                                <?php $query = "SELECT * FROM hmsalert where id='$alert->alertid'";
                                                $app = new App;
                                                $namealerts = $app->selectAll($query);
                                                foreach ($namealerts as $namealert) {
                                                    echo $namealert->alert;
                                                } ?>
                                            </td>
                                            <td><?php echo $alert->area ?></td>
                                            <td style="white-space: normal;">
                                                <?php echo $alert->description ?>
                                            </td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="update-guestreservationinfo2.php?alertedit=<?php echo $alert->id ?>&reservationid=<?php echo $reservationid ?>&area=<?php echo $alert->area ?>&description=<?php echo $alert->description ?>&openAlertModal=1&alertid=<?php echo $alert->alertid ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>
                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="executemodal.php?alertdelete=<?php echo $alert->id ?>&reservationid=<?php echo $reservationid ?>"
                                                    class="text-danger">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                } else { ?>
                                    <tr>
                                        <td style="text-align:center;" colspan="4">Add Alerts</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </script>
                        </table>
                    </div>
                    <hr>
                    <?php if (!isset($_GET['alertedit'])) { ?>
                        <div class="col-md-12">
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="reservationid" value="<?php echo $reservationid; ?>">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Alert
                                        Code</label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm" id="alertid" name="alertid">
                                            <?php
                                            $query = "SELECT * FROM hmsalert";
                                            $app = new App;
                                            $alert1s = $app->selectAll($query);
                                            ?>
                                            <?php foreach ($alert1s as $alert1): ?>
                                                <option value="<?php echo $alert1->id ?>">
                                                    <?php echo $alert1->alert ?>
                                                </option>
                                            <?php endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Area</label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm" id="area" name="area">
                                            <option value="Checkin">Checkin</option>
                                            <option value="Checkout">Checkout</option>
                                            <option value="Billing">Billing</option>
                                            <option value="Reservation">Reservation</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="description" oninput="sanitizeInput(this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary"
                            href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>"> Close
                        </a>

                        <button type="submit" class="btn btn-primary" name="savealert">Save</button>
                    </div>

                <?php } else { ?>
                    <?php
                    $reservationid = $_GET['reservationid'];
                    $id = $_GET['alertedit'];
                    $area = $_GET['area'];
                    $description = $_GET['description'];
                    $openAlertModal = $_GET['openAlertModal'];
                    $alertid = $_GET['alertid'];
                    ?>
                    <div class="col-md-12">
                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="alertedit" value="<?php echo $id; ?>">
                                <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="reservationid" value="<?php echo $reservationid; ?>">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> Alert
                                    Code</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="alertid" name="alertid">
                                        <?php
                                        $query = "SELECT * FROM hmsalert where id='$alertid'";
                                        $app = new App;
                                        $alert1s = $app->selectAll($query);
                                        ?>
                                        <?php foreach ($alert1s as $alert1): ?>
                                            <option value="<?php echo $alert1->id ?>">
                                                <?php echo $alert1->alert ?>
                                            </option>
                                        <?php endforeach;
                                        ?>
                                        <?php
                                        $query = "SELECT * FROM hmsalert";
                                        $app = new App;
                                        $aalert1s = $app->selectAll($query);
                                        ?>
                                        <?php foreach ($aalert1s as $aalert1): ?>
                                            <option value="<?php echo $aalert1->id ?>">
                                                <?php echo $aalert1->alert ?>
                                            </option>
                                        <?php endforeach;
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Area</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="area" name="area">
                                        <option value="<?php echo $area ?>"><?php echo $area ?></option>
                                        <option value="Checkin">Checkin</option>
                                        <option value="Checkout">Checkout</option>
                                        <option value="Billing">Billing</option>
                                        <option value="Reservation">Reservation</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="colFormLabelSm"
                                    class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="description" value="<?php echo $description ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary"
                        href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>"> Close
                    </a>
                    <a class="btn btn-primary"
                        href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>&openAlertModal=1">
                        Add
                    </a>
                    <button type="submit" class="btn btn-primary" name="updatealert">Update</button>
                </div>
            <?php } ?>
        </form>
    </div>
</div>
</div>
<script src="removehtmlcode.js"></script>