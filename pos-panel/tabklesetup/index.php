<?php require "../head1.php"; ?>
<?php require "../sidebar.php"; ?>


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
                <?php require "navbar.php"; ?>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="guestreservationinfo2.php" method="post">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>New Asset List</h1>
                    </div>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <!-- /.Personal Details -->




                            <div class="col-md-12 mb-3 ">
                                <div class="col-sm-6 text-right">
                                    <a href="../profile/create-profile.php" class="btn btn-primary">Add New
                                        Profile</a>
                                </div>
                                <div class="col-md-12 ">
                                    <h4 class="mb-3 text-primary">Guest and Member Information

                                    </h4>

                                    <?php
                                    $query = "SELECT * FROM assetitemlist";
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
                                                <th>Actions</th>
                                                <th>Customer ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>

                                            </tr>
                                        </thead>
                                    </table>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#history').DataTable({
                                                serverSide: true,
                                                deferRender: true,
                                                ajax: 'get_itemlistnfo.php',
                                                columns: [{
                                                    data: null,
                                                    render: function (data, type, row) {
                                                        // return '<a style="text-decoration:none;" href="index.php?select=' +
                                                        return '<a style="text-decoration:none;" href="itemlistinfo.php?select=' +
                                                            row.FacNO +
                                                            '" class="text-success">&nbsp;&nbsp;<i class="nav-icon fas fa-caret-square-right"> View</i></a>';
                                                    }
                                                },
                                                {
                                                    data: 'FacNO'
                                                },
                                                {
                                                    data: 'FacName'
                                                },
                                                {
                                                    data: 'Description'
                                                },
                                                {
                                                    data: 'cATEGORY'
                                                }

                                                ],
                                                "pageLength": 10,
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
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit" name="submit">Reserve</button>
                    <a href="index.php" class="btn btn-outline-dark ml-3">Clear</a>

                </div>
                <!-- /.card -->
            </div>

            <!-- /.container-fluid -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../footer1.php"; ?>