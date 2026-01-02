<?php
if (isset($_GET['openmessageModal']) && $_GET['openmessageModal'] == 1) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("messagesmodal"));
            myModal.show();
        });
    </script>';
}
?>
<?php if (isset($reservationid)) {
    $resmessagehistory = $app->selectone("SELECT count(reservationid) as reservationmessage FROM resmessage WHERE reservationid='$reservationid' ");
    $resmessagehistory->reservationmessage;
}
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="width: 16%;" data-bs-toggle="modal"
    data-bs-target="#messagesmodal">
    Messages

    <?php if (isset($reservationid)) {
        if ($resmessagehistory->reservationmessage == 0) { ?>
    <?php } else { ?>
    <span class="badge badge-danger"><?php echo $resmessagehistory->reservationmessage; ?></span>
    <?php }
    }?>

</button>

<!-- Modal -->
<div class="modal fade" id="messagesmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form name="savemessage" action="executemodal.php" method="POST">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Messages <?php echo $reservationid; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 ">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Message</th>

                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $resmessagehistory = $app->selectone("SELECT SUM(reservationid) as reservationmessage FROM resmessage WHERE reservationid='$reservationid' ");
                                $resmessagehistory->reservationmessage;

                                if ($resmessagehistory->reservationmessage > 0) {
                                    $query = "SELECT * FROM resmessage where reservationid=$reservationid ";
                                    $app = new App;
                                    $messages = $app->selectAll($query);
                                    ?>
                                <?php foreach ($messages as $message): ?>
                                <tr>
                                    <td>
                                        <?php $query = "SELECT * FROM messages where id='$message->messageid'";
                                                $app = new App;
                                                $namemessages = $app->selectAll($query);
                                                foreach ($namemessages as $namemessage) {
                                                    echo $namemessage->messages;
                                                } ?>
                                    </td>

                                    <td style="white-space: normal;"><?php echo $message->description ?></td>
                                    <td>
                                        <a style="text-decoration:none;"
                                            href="update-guestreservationinfo2.php?messageedit=<?php echo $message->id ?>&reservationid=<?php echo $reservationid ?>&description=<?php echo $message->description ?>&openmessageModal=1&messageid=<?php echo $message->messageid ?>"
                                            class="text-success">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-edit"></i>
                                        </a> |
                                        <a style="text-decoration:none;"
                                            href="executemodal.php?messagedelete=<?php echo $message->id ?>&reservationid=<?php echo $reservationid ?>"
                                            class="text-danger">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;
                                } else { ?>
                                <tr>
                                    <td style="text-align:center;" colspan="4">Add Messages</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </script>
                        </table>
                    </div>
                    <hr>
                    <?php if (!isset($_GET['messageedit'])) { ?>
                    <div class="col-md-12">
                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="reservationid" value="<?php echo $reservationid; ?>">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Message
                                    Code</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="messageid" name="messageid">
                                        <?php
                                            $query = "SELECT * FROM messages";
                                            $app = new App;
                                            $message1s = $app->selectAll($query);
                                            ?>
                                        <?php foreach ($message1s as $message1): ?>
                                        <option value="<?php echo $message1->id ?>">
                                            <?php echo $message1->messages ?>
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
                                    class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
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


                    <button type="submit" class="btn btn-primary" name="savemessage">Save</button>

                </div>
                <?php } else { ?>
                <?php
                    $reservationid = $_GET['reservationid'];
                    $id = $_GET['messageedit'];
                    $description = $_GET['description'];
                    $openmessageModal = $_GET['openmessageModal'];
                    $messageid = $_GET['messageid'];
                    ?>
                <div class="col-md-12">
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                name="messageedit" value="<?php echo $id; ?>">
                            <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                name="reservationid" value="<?php echo $reservationid; ?>">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Message
                                Code</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" id="messageid" name="messageid">

                                    <?php
                                        $query = "SELECT * FROM messages where id='$messageid'";
                                        $app = new App;
                                        $message1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($message1s as $message1): ?>
                                    <option value="<?php echo $message1->id ?>">
                                        <?php echo $message1->messages ?>
                                    </option>
                                    <?php endforeach;
                                        ?>


                                    <?php
                                        $query = "SELECT * FROM messages";
                                        $app = new App;
                                        $amessage1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($amessage1s as $amessage1): ?>
                                    <option value="<?php echo $amessage1->id ?>">
                                        <?php echo $amessage1->messages ?>
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
                    href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>&openmessageModal=1">
                    Add
                </a>
                <button type="submit" class="btn btn-primary" name="updatemessage">Update</button>

            </div>
            <?php } ?>
        </form>
    </div>
</div>
</div>
<script src="removehtmlcode.js"></script>