<?php
if (isset($_GET['opennoteModal']) && $_GET['opennoteModal'] == 1) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("notesmodal"));
            myModal.show();
        });
    </script>';
}
?>
<?php if (isset($reservationid)) {
    $resnotehistory = $app->selectone("SELECT count(reservationid) as reservationnote FROM resnote WHERE reservationid='$reservationid' ");
    $resnotehistory->reservationnote;
}
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="width: 16%;" data-bs-toggle="modal" data-bs-target="#notesmodal">
    Notes
    <?php if (isset($reservationid)) {
        if ($resnotehistory->reservationnote == 0) { ?>
        <?php } else { ?>
            <span class="badge badge-danger"><?php echo $resnotehistory->reservationnote; ?></span>
        <?php }
    } ?>
</button>

<!-- Modal -->
<div class="modal fade" id="notesmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form name="savenote" action="executemodal.php" method="POST">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Notes <?php echo $reservationid; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 ">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Note Code</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $resnotehistory = $app->selectone("SELECT SUM(reservationid) as reservationnote FROM resnote WHERE reservationid='$reservationid' ");
                                $resnotehistory->reservationnote;

                                if ($resnotehistory->reservationnote > 0) {
                                    $query = "SELECT * FROM resnote where reservationid=$reservationid ";
                                    $app = new App;
                                    $notes = $app->selectAll($query);
                                    ?>
                                    <?php foreach ($notes as $note): ?>
                                        <tr>
                                            <td>
                                                <?php $query = "SELECT * FROM note where id='$note->noteid'";
                                                $app = new App;
                                                $namenotes = $app->selectAll($query);
                                                foreach ($namenotes as $namenote) {
                                                    echo $namenote->note;
                                                } ?>
                                            </td>
                                            <td style="white-space: normal;"><?php echo $note->note ?></td>

                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="update-guestreservationinfo2.php?noteedit=<?php echo $note->id ?>&reservationid=<?php echo $reservationid ?>&note=<?php echo $note->note ?>&opennoteModal=1&noteid=<?php echo $note->noteid ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>
                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="executemodal.php?notedelete=<?php echo $note->id ?>&reservationid=<?php echo $reservationid ?>"
                                                    class="text-danger">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                } else { ?>
                                    <tr>
                                        <td style="text-align:center;" colspan="4">Add Notes</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </script>
                        </table>
                    </div>
                    <hr>
                    <?php if (!isset($_GET['noteedit'])) { ?>
                        <div class="col-md-12">
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="reservationid" value="<?php echo $reservationid; ?>">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Note
                                        Code</label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm" id="noteid" name="noteid">
                                            <?php
                                            $query = "SELECT * FROM note";
                                            $app = new App;
                                            $note1s = $app->selectAll($query);
                                            ?>
                                            <?php foreach ($note1s as $note1): ?>
                                                <option value="<?php echo $note1->id ?>">
                                                    <?php echo $note1->note ?>
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Notes</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="note">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary"
                            href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>"> Close
                        </a>


                        <button type="submit" class="btn btn-primary" name="savenote">Save</button>

                    </div>
                <?php } else { ?>
                    <?php
                    $reservationid = $_GET['reservationid'];
                    $id = $_GET['noteedit'];
                    $note = $_GET['note'];
                    $opennoteModal = $_GET['opennoteModal'];
                    $noteid = $_GET['noteid'];
                    ?>
                    <div class="col-md-12">
                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="noteedit" value="<?php echo $id; ?>">
                                <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="reservationid" value="<?php echo $reservationid; ?>">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Note
                                    Code</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="noteid" name="noteid">

                                        <?php
                                        $query = "SELECT * FROM note  where id='$noteid'";
                                        $app = new App;
                                        $note1s = $app->selectAll($query);
                                        ?>
                                        <?php foreach ($note1s as $note1): ?>
                                            <option value="<?php echo $note1->id ?>">
                                                <?php echo $note1->note ?>
                                            </option>
                                        <?php endforeach;
                                        ?>




                                        <?php
                                        $query = "SELECT * FROM note";
                                        $app = new App;
                                        $anote1s = $app->selectAll($query);
                                        ?>
                                        <?php foreach ($anote1s as $anote1): ?>
                                            <option value="<?php echo $anote1->id ?>">
                                                <?php echo $anote1->note ?>
                                            </option>
                                        <?php endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Notes</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="note"
                                        value="<?php echo $note ?>">
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
                        href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>&opennoteModal=1">
                        Add
                    </a>
                    <button type="submit" class="btn btn-primary" name="updatenote">Update</button>

                </div>
            <?php } ?>
        </form>
    </div>
</div>
</div>
<script src="removehtmlcode.js"></script>