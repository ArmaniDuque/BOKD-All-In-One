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
                        <div class="text-right">
                            <a href="create-assetlist.php" class="btn btn-primary">Add New
                                Asset List</a>
                        </div>
                    </div>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <!-- /.Personal Details -->




                            <div class="col-md-12 mb-3 ">

                                <div class="col-md-12 ">
                                    <h4 class="mb-3 text-primary">Asset List Information

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
                                                <th>Fixed Asset No</th>
                                                <th>Fixed Asset Name</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Item Class</th>
                                                <th>Brand</th>
                                                <th>Color</th>
                                                <th>Serial No.</th>
                                                <th>Barcode No.</th>
                                                <th>Supplier</th>
                                                <th>Dimension</th>
                                                <th>Department</th>
                                                <th>Asset Holder</th>
                                                <th>Item Location</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Acquisition Date</th>

                                                <th>Acquition Amount</th>
                                                <th>Life in Year</th>
                                                <th>Depreciated Amount</th>

                                                <th>Salvage Amount</th>


                                            </tr>
                                        </thead>
                                    </table>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#history').DataTable({

                                                // Enable horizontal scrolling
                                                scrollX: true,
                                                // Enable vertical scrolling and set fixed height for table body
                                                scrollY: '400px', // Adjust height as needed
                                                // Optionally disable pagination if scrollY is used to show all data
                                                scrollCollapse: true,
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
                                                },
                                                {
                                                    data: 'ItemClass'
                                                },
                                                {
                                                    data: 'Brand'
                                                },
                                                {
                                                    data: 'Color'
                                                },
                                                {
                                                    data: 'serialNo'
                                                },
                                                {
                                                    data: 'BarcodeNo'
                                                },
                                                {
                                                    data: 'suppName'
                                                },
                                                {
                                                    data: 'Dimention'
                                                },
                                                {
                                                    data: 'Department'
                                                },
                                                {
                                                    data: 'Holder'
                                                },
                                                {
                                                    data: 'ItemLocation'
                                                },
                                                {
                                                    data: 'balance_unit'
                                                },
                                                {
                                                    data: 'Unit'
                                                },
                                                {
                                                    data: 'Adate'
                                                },
                                                {
                                                    data: 'AAmount'
                                                },
                                                {
                                                    data: 'EndDate'
                                                },
                                                {
                                                    data: 'Percent'
                                                },
                                                {
                                                    data: 'Abre'
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

                <!-- /.card -->
            </div>

            <!-- /.container-fluid -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../footer1.php"; ?>