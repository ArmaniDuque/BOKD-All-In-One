<?php require "../../header.php"; ?>
<?php require "../../sidebar.php"; ?>
<style>
thead input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Front Desk Module</h1>
                </div> -->

                <?php require "navbar.php"; ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->

        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Front Desk Dashboard</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            <table id="example" class="display" style="width:100%">
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $currentdate = date("m-d-Y");
                                    $query = "SELECT * FROM reservation ";
                                    // where status!='history' and departuredate >='$currentdate'
                                    $app = new App;
                                    $reservations = $app->selectAll($query);
                                    ?>
                                    <?php foreach ($reservations as $reservation): ?>
                                    <tr>
                                        <td><?php echo $reservation->reservationid ?></td>
                                        <td>
                                            <?php $reservation->customerid;
                                                $query = "SELECT * FROM t_customerinfo where customerid='$reservation->customerid'";
                                                $app = new App;
                                                $names = $app->selectAll($query);
                                                foreach ($names as $name) {
                                                    echo "$name->firstname $name->lastname";
                                                }
                                                ?>
                                        </td>
                                        <td><?php echo $reservation->arrivaldate ?></td>
                                        <td><?php echo $reservation->departuredate ?></td>
                                        <td><?php echo $reservation->roomno ?></td>
                                        <td><?php echo $reservation->roomtype ?></td>
                                        <td><?php echo $reservation->status ?></td>
                                        <td><?php echo $reservation->user ?></td>
                                        <td>
                                            <?php
                                                if ($reservation->departuredate == $currentdate) {

                                                    echo '<span class="badge bg-danger "> Due Out</span>';

                                                } elseif ($reservation->status == "reserve") {
                                                    echo ' <span class="badge bg-primary ">Arrival</span>';
                                                } else {
                                                    echo ' <span class="badge bg-success ">Inhouse</span>';
                                                }

                                                ?>
                                        </td>

                                        <td>
                                            <a style="text-decoration:none;"
                                                href="update-reservation.php?edit=<?php //echo $user->userid ?>"
                                                class="text-success">&nbsp;&nbsp;
                                                <i class="nav-icon fas fa fa-edit"></i>Update

                                            </a>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Res No</th>
                                        <th>Customer ID</th>
                                        <th>Arrival</th>
                                        <th>Departure</th>
                                        <th>Room</th>
                                        <th>Room Type</th>
                                        <th>Status</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                new DataTable('#example', {

                    initComplete: function() {
                        this.api()
                            .columns()
                            .every(function() {
                                let column = this;
                                let title = column.header().textContent;

                                // Create input element
                                let input = document.createElement('input');
                                input.placeholder = title;
                                column.header().replaceChildren(input);

                                // Event listener for user input
                                input.addEventListener('keyup', () => {
                                    if (column.search() !== this.value) {
                                        column.search(input.value).draw();
                                    }
                                });
                            });
                    }
                });
                </script>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>