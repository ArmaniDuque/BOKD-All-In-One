<?php
$query = "SELECT * FROM customerprofile";
$app = new App;
$profiles = $app->selectAll($query);


if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    // $query = "SELECT * FROM datainventory where datainventoryid='$id'";
    // $query = "SELECT * FROM usermasterfile where userid='$id'";
    $query = "SELECT * FROM reservation where customerid='$id'";
    $app = new App;
    $reservations = $app->selectAll($query);

}
?>












<div class="tab-pane fade" id="custom-content-below-5" role="tabpanel" aria-labelledby="custom-content-below-5-tab">
    <div class="card-body ">
        <div class="col-sm-6 text-right">
            <a href="create-profile.php" class="btn btn-primary">Add New Profile</a>
        </div>
        <table class="table table-striped " style="width:100%" id="profile">

            <thead>
                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Address</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profiles as $profile): ?>

                    <tr>

                        <td><?php echo $profile->customerid ?></td>
                        <td><?php echo $profile->firstname ?></td>
                        <td><?php echo $profile->address ?></td>
                        <td><?php echo $profile->mobilenumber ?></td>
                        <td><?php echo $profile->email ?></td>
                        <td><?php echo $profile->address ?></td>


                        <td>
                            <a style="text-decoration:none;" href="index.php?edit=<?php echo $profile->customerid ?>"
                                class="text-success">&nbsp;&nbsp;
                                <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                            </a>|
                            <!-- <a style="text-decoration:none;" href="userslist.php?delete=<?php //echo $user->userid ?>"
                                class="text-danger">&nbsp;&nbsp;
                                <i class="nav-icon fas fa fa-trash"></i>&nbsp;&nbsp;

                            </a> -->
                        </td>





                    </tr>

                <?php endforeach; ?>
            </tbody>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#profile').DataTable({
                        "pageLength": 5,
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]


                    });



                });


                $('#profile [data-toggle="tooltip"]').tooltip({
                    animated: 'fade',
                    placement: 'bottom',
                    html: true
                });
            </script>
        </table>
    </div>

    <div class="card-body ">
        <div class="col-sm-6 text-right">
            <h3>Future/History</h3>
        </div>
        <table class="table table-striped " style="width:100%" id="history">

            <thead>
                <tr>

                    <th>Res No</th>
                    <th>Customer ID</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Room</th>
                    <th>Room Type</th>

                    <th>Status</th>
                    <th>User</th>


                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>

                    <tr>
                        <td><?php echo $reservation->reservationid ?></td>
                        <td><?php echo $reservation->customerid ?></td>
                        <td><?php echo $reservation->arrivaldate ?></td>
                        <td><?php echo $reservation->departuredate ?></td>
                        <td><?php echo $reservation->roomno ?></td>
                        <td><?php echo $reservation->roomtype ?></td>
                        <td><?php echo $reservation->status ?></td>
                        <td><?php echo $reservation->user ?></td>



                        <td>
                            <a style="text-decoration:none;" href="update-usersinfo.php?edit=<?php //echo $user->userid ?>"
                                class="text-success">&nbsp;&nbsp;
                                <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                            </a>|
                            <a style="text-decoration:none;" href="userslist.php?delete=<?php //echo $user->userid ?>"
                                class="text-danger">&nbsp;&nbsp;
                                <i class="nav-icon fas fa fa-trash"></i>&nbsp;&nbsp;

                            </a>
                        </td>
                    </tr>


                <?php endforeach; ?>
            </tbody>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#history').DataTable({
                        "pageLength": 5,
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]


                    });



                });


                $('#history [data-toggle="tooltip"]').tooltip({
                    animated: 'fade',
                    placement: 'bottom',
                    html: true
                });
            </script>
        </table>
    </div>
</div>