<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rooms Equipment</h1>
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
                    <h1 class="h5 mb-3"><b>Lists of Registered Data Processes</b> </h1>

                </div><br>
                <div class="col-sm-12 invoice-col">
                    <span>
                        A Data Protection Impact Assestment (DPIA) is a process to help you identify and minimize the
                        data protection risks.
                    </span><br><br>
                </div>

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
                                <th width="60">#</th>
                                <th>Full Name</th>
                                <th>Montemar Email</th>
                                <th>Password</th>
                                <th>Department</th>
                                <th>Old Gmail</th>
                                <th>Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>1</td>
                                <td>2024-01-01</td>
                                <td>MIS</td>
                                <td>2024-01-01</td>
                                <td>2024-01-01</td>
                                <td>8:40 AM</td>
                                <td>No Internet Connection for Room 314-318</td>

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
                                <td>2024-01-01</td>
                                <td>MIS</td>
                                <td>2024-01-01</td>
                                <td>2024-01-01</td>
                                <td>8:40 AM</td>
                                <td>No Internet Connection for Room 314-318</td>

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
                                <td>2024-01-01</td>
                                <td>MIS</td>
                                <td>2024-01-01</td>
                                <td>2024-01-01</td>
                                <td>8:40 AM</td>
                                <td>No Internet Connection for Room 314-318</td>

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
                                <td>2024-01-01</td>
                                <td>MIS</td>
                                <td>2024-01-01</td>
                                <td>2024-01-01</td>
                                <td>8:40 AM</td>
                                <td>No Internet Connection for Room 314-318</td>

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
                                <td>2024-01-01</td>
                                <td>MIS</td>
                                <td>2024-01-01</td>
                                <td>8:40 AM</td>
                                <td>8:40 AM</td>
                                <td>No Internet Connection for Room 314-318</td>

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
                                <td>2024-01-01</td>
                                <td>MIS</td>
                                <td>2024-01-01</td>
                                <td>8:40 AM</td>
                                <td>8:40 AM</td>
                                <td>No Internet Connection for Room 314-318</td>

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
<?php require "../../footer1.php"; ?>