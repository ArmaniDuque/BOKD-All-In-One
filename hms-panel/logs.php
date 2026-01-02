<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>System Logs</h1>
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
                    <h1 class="h5 mb-3"><b>Department Logs</b> </h1>

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
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">Full Name</th>
                                <th>Position</th>
                                <th>Department</th>
                                <th>Logs</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>Armani Duque</td>
                                <td>IT Specialist</td>
                                <td>IT</td>
                                <td>Create New User </td>
                                <td>01/01/2024</td>

                            </tr>
                            <tr>

                                <td>Armani Duque</td>
                                <td>IT Specialist</td>
                                <td>IT</td>
                                <td>Create New User </td>
                                <td>01/01/2024</td>

                            </tr>
                            <tr>

                                <td>Armani Duque</td>
                                <td>IT Specialist</td>
                                <td>IT</td>
                                <td>Create New User </td>
                                <td>01/01/2024</td>

                            </tr>
                            <tr>

                                <td>Armani Duque</td>
                                <td>IT Specialist</td>
                                <td>IT</td>
                                <td>Create New User </td>
                                <td>01/01/2024</td>

                            </tr>
                            <tr>

                                <td>Armani Duque</td>
                                <td>IT Specialist</td>
                                <td>IT</td>
                                <td>Create New User </td>
                                <td>01/01/2024</td>

                            </tr>


                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../footer1.php"; ?>