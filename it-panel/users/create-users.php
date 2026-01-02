<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Profile</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="userslist.php" class="btn btn-primary">Back</a>
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
                    <h1 class="h5 mb-3"><b>Create User</h1>

                </div><br>
                <!-- /.BODY -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">ID No.</label>
                                <input type="text" name="idno" id="slug" class="form-control" placeholder="ID Number">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Full Name</label>
                                <input type="text" name="name" id="slug" class="form-control" placeholder="Full Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Position</label>
                                <input type="text" name="position" id="Position" class="form-control"
                                    placeholder="Position">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="category">Department / Division</label>
                                    <select name="department" id="department" class="form-control">
                                        <option value="">Accounting</option>
                                        <option value="">Engineering </option>
                                        <option value="">Executive Office </option>
                                        <option value="">Food and Beverage Production</option>
                                        <option value="">Food and Beverage Service</option>
                                        <option value="">Front Office</option>
                                        <option value="">Grounds Department </option>
                                        <option value="">Housekeeping</option>
                                        <option value="">Human Resources</option>
                                        <option value="">MIS</option>
                                        <option value="">Makati Head Office</option>
                                        <option value="">Motorpool</option>
                                        <option value="">Sports & Recreation</option>
                                        <option value="">Warehouse</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="category">Job Level</label>
                                    <select name="joblevel" id="joblevel" class="form-control">
                                        <option value="">Managerial</option>
                                        <option value="">Supervisor</option>
                                        <option value="">Rank and File </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="category">Employment Status</label>
                                    <select name="employmentstatus" id="employmentstatus" class="form-control">
                                        <option value="">Regular</option>

                                        <option value="">Regular Seasonal</option>
                                        <option value="">Makati Hired </option>
                                        <option value="">Probitionary</option>
                                        <option value="">Fixed - Term</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Date Hired</label>
                                <input type="date" name="datehired" id="datehired" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Contact</label>
                                <input type="number" name="contact" id="contact" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Date Birth</label>
                                <input type="date" name="datebirth" id="datebirth" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Age</label>
                                <input type="text" name="age" id="age" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="category">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="category">Civil Status</label>
                                <select name="civilstatus" id="civilstatus" class="form-control">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widow">Widow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Useranme</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Password</label>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category">User Role</label>
                                <select name="userrole" id="userrole" class="form-control">
                                    <option value="manager">Manager</option>
                                    <option value="visor">Supervisor</option>
                                    <option value="staff">Staff</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Remarks</label>
                                <textarea type="text" name="remarks" id="remarks" class="form-control"></textarea>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary">Create</button>
            <a href="userslist.php" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>