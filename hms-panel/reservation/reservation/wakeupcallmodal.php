<?php
if (isset($_GET['openwakeupcallModal']) && $_GET['openwakeupcallModal'] == 1) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("wakeupcallmodal"));
            myModal.show();
        });
    </script>';
}
?>
<?php if (isset($reservationid)) {
    $reswakeuphistory = $app->selectone("SELECT count(reservationid) as reservationwakeup FROM hmsreswakeup WHERE reservationid='$reservationid' ");
    $reswakeuphistory->reservationwakeup;
}
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="width: 16%;" data-bs-toggle="modal"
    data-bs-target="#wakeupcallmodal">
    Wakeup Call
    <?php if (isset($reservationid)) {
        if ($reswakeuphistory->reservationwakeup == 0) { ?>
    <?php } else { ?>
    <span class="badge badge-danger"><?php echo $reswakeuphistory->reservationwakeup; ?></span>
    <?php }
    } ?>


</button>

<!-- Modal -->
<div class="modal fade" id="wakeupcallmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form name="savewakeupcall" action="executemodal.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Wakeup Call <?php echo $reservationid; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 ">
                        <table class="table table-striped ">
                            <thead>
                                <tr>

                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Descrition</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $reswakeuphistory = $app->selectone("SELECT SUM(reservationid) as reservationwakeup FROM hmsreswakeup WHERE reservationid='$reservationid' ");
                                $reswakeuphistory->reservationwakeup;

                                if ($reswakeuphistory->reservationwakeup > 0) {
                                    $query = "SELECT * FROM hmsreswakeup where reservationid=$reservationid ";
                                    $app = new App;
                                    $wakeupcall = $app->selectAll($query);
                                    ?>
                                <?php foreach ($wakeupcall as $wakeup): ?>
                                <tr>

                                    <td><?php echo $wakeup->id ?></td>
                                    <td><?php echo $wakeup->date ?></td>
                                    <td><?php echo $wakeup->time ?></td>
                                    <td style="white-space: normal;"><?php echo $wakeup->description ?></td>

                                    <td>
                                        <a style="text-decoration:none;"
                                            href="update-guestreservationinfo2.php?wakeupcalledit=<?php echo $wakeup->id ?>&reservationid=<?php echo $reservationid ?>&date=<?php echo $wakeup->date ?>&time=<?php echo $wakeup->time ?>&description=<?php echo $wakeup->description ?>&openwakeupcallModal=1"
                                            class="text-success">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-edit"></i>
                                        </a> |
                                        <a style="text-decoration:none;"
                                            href="executemodal.php?wakeupcalldelete=<?php echo $wakeup->id ?>&reservationid=<?php echo $reservationid ?>"
                                            class="text-danger">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;
                                } else { ?>
                                <tr>
                                    <td style="text-align:center;" colspan="5">Add Wakeup Call</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </script>
                        </table>
                    </div>
                    <hr>
                    <?php if (!isset($_GET['wakeupcalledit'])) { ?>
                    <div class="col-md-12">
                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="reservationid" value="<?php echo $reservationid; ?>">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Date
                                </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm" id="date" name="date"
                                        value="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="colFormLabelSm"
                                    class="col-sm-3 col-form-label col-form-label-sm">Time</label>
                                <div class="col-sm-9">
                                    <input type="time" class="form-control form-control-sm" name="time" id="time"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="colFormLabelSm"
                                    class="col-sm-3 col-form-label col-form-label-sm">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary"
                        href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>"> Close
                    </a>

                    <button type="submit" class="btn btn-primary" name="savewakeupcall">Save</button>
                </div>

                <?php } else { ?>
                <?php
                    $reservationid = $_GET['reservationid'];
                    $id = $_GET['wakeupcalledit'];
                    $date = $_GET['date'];
                    $time = $_GET['time'];
                    $description = $_GET['description'];
                    $openwakeupcallModal = $_GET['openwakeupcallModal'];
                    // $id = $_GET['id'];
                    ?>
                <div class="col-md-12">
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                name="reservationid" value="<?php echo $reservationid; ?>">
                            <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                name="wakeupcalledit" value="<?php echo $id; ?>">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Date
                            </label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm" id="date" name="date"
                                    value="<?php echo $date ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Time</label>
                            <div class="col-sm-9">
                                <input type="time" class="form-control form-control-sm" name="time" id="time"
                                    value="<?php echo $time ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <label for="colFormLabelSm"
                                class="col-sm-3 col-form-label col-form-label-sm">Descrition</label>
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
                    href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>&openwakeupcallModal=1">
                    Add
                </a>
                <button type="submit" class="btn btn-primary" name="updatewakeupcall">Update</button>
            </div>
            <?php } ?>
        </form>
    </div>
</div>
</div>
<script src="removehtmlcode.js"></script>