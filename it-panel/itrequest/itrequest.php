<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Request</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-registry.php" class="btn btn-primary">Create</a>
                </div>
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
                    <h1 class="h5 mb-3"><b>Lists of Request or Job Order for your Department</b> </h1>

                </div><br>


                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <!-- <tr>
                                <td>Minimum date:</td>
                                <td><input type="text" id="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>Maximum date:</td>
                                <td><input type="text" id="max" name="max"></td>
                            </tr> -->
                            <tr>
                                <th width="60">#</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Area/Location</th>
                                <th>Types</th>
                                <th>Reported By</th>

                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Before Photos</th>
                                <th width="100">Priorities</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>1</td>
                                <td>2024-11-28</td>
                                <td>Room 310 Door Lock Problem</td>
                                <td>Inn 3</td>
                                <td>Door Lock</td>
                                <td>Gazebo 2</td>

                                <td>Pending</td>
                                <td>PR Tools</td>
                                <td><img src="<?php echo APPURL; ?>img/avatar2.png" style="width:100px;"></td>
                                <td>Urgent</td>



                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-roomsequipment.php?edit=<?php //echo $userlist->userlistid ?>"
                                        class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="roomsequipment.php?delete=<?php //echo $userlist->userlistid ?>"
                                        class="text-danger">
                                        <i class="nav-icon fas fa fa-trash"></i>

                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td>1</td>
                                <td>2008-11-28</td>
                                <td>Room 310 Door Lock Problem</td>
                                <td>Inn 3</td>
                                <td>Door Lock</td>
                                <td>Gazebo 2</td>

                                <td>Pending</td>
                                <td>PR Tools</td>

                                <td><img src="<?php echo APPURL; ?>img/avatar.png" style="width:100px;"></td>
                                <td>Not Urgent</td>


                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-roomsequipment.php?edit=<?php //echo $userlist->userlistid ?>"
                                        class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="roomsequipment.php?delete=<?php //echo $userlist->userlistid ?>"
                                        class="text-danger">
                                        <i class="nav-icon fas fa fa-trash"></i>

                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
// let minDate, maxDate;

// // Custom filtering function which will search data in column four between two values
// DataTable.ext.search.push(function(settings, data, dataIndex) {
//     let min = minDate.val();
//     let max = maxDate.val();
//     let date = new Date(data[4]);

//     if (
//         (min === null && max === null) ||
//         (min === null && date <= max) ||
//         (min <= date && max === null) ||
//         (min <= date && date <= max)
//     ) {
//         return true;
//     }
//     return false;
// });

// // Create date inputs
// minDate = new DateTime('#min', {
//     format: 'MMMM Do YYYY'
// });
// maxDate = new DateTime('#max', {
//     format: 'MMMM Do YYYY'
// });

// // DataTables initialisation
// let table = new DataTable('#example');

// // Refilter the table
// document.querySelectorAll('#min, #max').forEach((el) => {
//     el.addEventListener('change', () => table.draw());
// });











$(document).ready(function() {
    $('#example').DataTable({
        "pageLength": 50,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

    });



});


$('#example [data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    placement: 'bottom',
    html: true
});
</script><?php require "../../footer1.php"; ?>