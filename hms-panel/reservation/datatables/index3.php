<?php require "../../../header.php"; ?>
<?php require "../../../sidebar.php"; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1> Reservation Information</h1>
                </div> -->
                <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
                <?php require "../navbar.php"; ?>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>New Reservation</h1>
                    </div>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 text-right">
                                <a href="create-profile.php" class="btn btn-primary">Add New Profile</a>
                            </div>
                            <div class="col-md-12 mb-3 ">

                                <div class="col-md-12 ">
                                    <h4 class="mb-3 text-primary">Guest Information

                                    </h4>

                                    <?php
                                    $query = "SELECT * FROM t_customerinfo";
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
                                    <table class="table table-striped " style="width:100%" id="history">

                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Type of Guest</th>
                                                <th>ID</th>

                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>

                                                <th>Contact Number</th>
                                                <th>Natinality</th>
                                                <th>Province</th>
                                                <th>Salutation</th>
                                                <th>Gender</th>
                                                <th>Senior ID</th>
                                                <th>PWD ID</th>
                                                <th>Address</th>

                                                <th>nameExt</th>
                                                <th>isChild</th>

                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($profiles as $profile): ?>

                                            <tr>
                                                <td>
                                                    <a style="text-decoration:none;"
                                                        href="guestreservationinfo2.php?select=<?php echo $profile->customerid ?>"
                                                        class="btn btn-info btn-md">
                                                        <i class="fas fa-plus nav-icon"></i>
                                                        <span class="badge">Reserve</span>

                                                    </a>



                                                </td>
                                                <td>
                                                    <?php
                                                        if ($profile->ismember >= '1') {

                                                            echo ' <span class="badge bg-primary ">Member</span>';
                                                        } else {
                                                            echo ' <span class="badge bg-success ">Guest</span>';
                                                        }
                                                        ?>
                                                </td>


                                                <td><?php echo $profile->customerid ?></td>






                                                <td><?php echo $profile->firstname ?></td>
                                                <td><?php echo $profile->middlename ?></td>
                                                <td><?php echo $profile->lastname ?></td>
                                                <td><?php echo $profile->email1;
                                                    echo $profile->email2; ?></td>


                                                <td><?php echo $profile->number1;
                                                    echo $profile->number2; ?></td>

                                                <td><?php echo $profile->nationality ?></td>
                                                <td><?php echo $profile->province ?></td>
                                                <td><?php echo $profile->tittle ?></td>
                                                <td><?php echo $profile->gender ?></td>
                                                <td><?php echo $profile->seniorid ?></td>
                                                <td><?php echo $profile->pwdid ?></td>
                                                <td><?php echo $profile->address ?></td>
                                                <td> </td>
                                                <td>0</td>
                                            </tr>

                                            <?php endforeach; ?>
                                        </tbody>

                                        <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#history').DataTable({
                                                columnDefs: [{
                                                    width: '20%',
                                                    targets: 0
                                                }],
                                                fixedColumns: true,
                                                paging: false,
                                                scrollCollapse: true,
                                                scrollX: true,
                                                scrollY: 500,
                                                autoWidth: true,
                                                scrollX: true,
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

                        </div>

                    </div>

                </div>

                <!-- /.card -->
            </div>

            <!-- /.container-fluid -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>