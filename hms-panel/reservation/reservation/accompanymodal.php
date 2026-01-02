<?php
if (isset($_GET['openaccompanyModal']) && $_GET['openaccompanyModal'] == 1) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("accompanymodal"));
            myModal.show();
        });
    </script>';
}
?>
<?php if (isset($reservationid)) {
    $accompanyhistory = $app->selectone("SELECT count(reservationid) as reservationaccompany FROM hmsaccompany WHERE reservationid='$reservationid' ");
    $accompanyhistory->reservationaccompany;
}
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="width: 16%;" data-bs-toggle="modal"
    data-bs-target="#accompanymodal">
    Accompany
    <?php if (isset($reservationid)) {
        if ($accompanyhistory->reservationaccompany == 0) { ?>
        <?php } else { ?>
            <span class="badge badge-danger"><?php echo $accompanyhistory->reservationaccompany; ?></span>
        <?php }
    } ?>




</button>

<!-- Modal -->
<div class="modal fade" id="accompanymodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Accompany <?php echo $reservationid; ?></h5>
                <label for="adults">Adults:</label>
                <input type="number" id="adults" name="adults" min="0" value="">

                <label for="kids">Kids:</label>
                <input type="number" id="kids" name="kids" min="0" value="">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 ">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Accompany</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $accompanyhistory = $app->selectone("SELECT SUM(reservationid) as reservationaccompany FROM hmsaccompany WHERE reservationid='$reservationid' ");
                            $accompanyhistory->reservationaccompany;

                            if ($accompanyhistory->reservationaccompany > 0) {
                                $query = "SELECT * FROM hmsaccompany where reservationid=$reservationid ";
                                $app = new App;
                                $accompanys = $app->selectAll($query);
                                ?>
                                <?php foreach ($accompanys as $accompany): ?>
                                    <tr>
                                        <td>
                                            <?php echo $accompany->customerid; ?>
                                        </td>
                                        <td>
                                            <?php $query = "SELECT * FROM hmst_customerinfo where customerid='$accompany->customerid'";
                                            $app = new App;
                                            $nameaccompanys = $app->selectAll($query);
                                            foreach ($nameaccompanys as $nameaccompany) {
                                                echo $nameaccompany->firstname;
                                                echo " ";
                                                echo $nameaccompany->lastname;
                                            } ?>
                                        </td>

                                        <td>

                                            <a style="text-decoration:none;"
                                                href="executemodal.php?accompanydelete=<?php echo $accompany->id ?>&reservationid=<?php echo $reservationid ?>"
                                                class="text-danger">&nbsp;&nbsp;
                                                <i class="nav-icon fas fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            } else { ?>
                                <tr>
                                    <td style="text-align:center;" colspan="4">Add Accompany</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </script>
                    </table>
                </div>
                <hr>
                <form method="POST" name="saveaccompany">
                    <div class="col-md-12">
                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="reservationid" value="<?php echo $reservationid; ?>">



                                <div class="col-sm-12 text-center mb-2">
                                    <a href="../profile/create-profile.php" class="btn btn-primary">Add New
                                        Profile</a>
                                </div>
                                <hr>
                                <div class="col-sm-12">

                                    <?php
                                    $query = "SELECT * FROM hmst_customerinfo";
                                    $app = new App;
                                    $profiles = $app->selectAll($query);
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
                                    <table class="table table-striped " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Actions</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <?php

                                    echo "<script>var reservationIdFromPHP = '" . htmlspecialchars($reservationid, ENT_QUOTES, 'UTF-8') . "';</script>";
                                    ?>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#history').DataTable({
                                                serverSide: true,
                                                deferRender: true,
                                                ajax: 'get_customerinfo.php',
                                                columns: [{
                                                    data: null,
                                                    render: function (data, type, row) {
                                                        // return '<a style="text-decoration:none;" href="index.php?select=' +
                                                        return '<a style="text-decoration:none;" href="executemodal.php?addaccompanyid=' +
                                                            row.customerid +
                                                            '&reservationid=' +
                                                            reservationIdFromPHP +
                                                            // Add reservationid here
                                                            '" class="text-success">&nbsp;&nbsp;<i class="nav-icon fas fa-caret-square-right"> Add</i></a>';
                                                    }
                                                },
                                                {
                                                    data: 'firstname'
                                                },
                                                {
                                                    data: 'lastname'
                                                },
                                                ],
                                                "pageLength": 3,
                                            });
                                        });
                                        $('#history [data-toggle="tooltip"]').tooltip({
                                            animated: 'fade',
                                            placement: 'bottom',
                                            html: true
                                        });
                                    </script>






                                </div>
                            </div>
                        </div>


                    </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary"
                    href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>"> Close
                </a>
                <button type="submit" class="btn btn-primary" name="saveaccompany">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>