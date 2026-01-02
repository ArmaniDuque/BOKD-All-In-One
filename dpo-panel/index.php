<?php require "../config/config.php"; ?>
<?php require "../libs/app.php"; ?>
<?php include "../layouts/url.php"; ?>
<?php require "../validate.php"; ?>
<?php
$app = new App;
$app->validateSessionAdminInside();
$userid = $_SESSION['userid'];
$role = $_SESSION['userrole'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Montemar Beach Club Portal</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>css/custom.css">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.3/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href=""> -->

    <!-- modal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->




    <!-- Print -->

    <link rel="stylesheet" href="<?php echo APPURL; ?>assets/tableExport/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>assets/tableExport/buttons.dataTables.min.css">

    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/jszip.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/buttons.print.min.js"></script>


</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <div class="navbar-nav pl-2">
                <!-- <ol class="breadcrumb p-0 m-0 bg-white">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                        <img src="<?php echo APPURL; ?>img/avatar5.png" class='img-circle elevation-2' width="40"
                            height="40" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                        <h4 class="h4 mb-0"><strong><?php echo $_SESSION['userfullname']; ?></strong></h4>
                        <div class="mb-3">
                            <?php echo $_SESSION['email']; ?><br><b>Role : </b><?php echo $_SESSION['userrole']; ?>
                        </div>

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <?php require "sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Requirements for Compliance</h1>
                        </div>
                        <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header pt-3">
                                    <h1 class="h5 mb-3">Please complete the requirements on or before September, 2024
                                    </h1>

                                </div>


                                <div class="card-header pt-3">
                                    <div class="row invoice-info">
                                        <div class="col-sm-12 invoice-col">
                                            <h1 class="h5 mb-3"><span class="text-success">1. DATA REGISTRY</span></h1>

                                            <div class="col-sm-12 invoice-col">
                                                <span>
                                                    -Declaring your Operational Data Processes
                                                </span><br><br>
                                                <span>
                                                    As a personal information controller (the Club) or personal
                                                    information
                                                    processor (Employee), an
                                                    organization must implement reasonable and appropriate physical,
                                                    technical
                                                    and organizational measures for the protection of personal data.
                                                    Security
                                                    measures aim to maintain the availability, integrity and
                                                    confidentiality of
                                                    personal data and protect them against natural dangers such as
                                                    accidental
                                                    loss or destruction, and human dangers such as unlawful access,
                                                    fraudulent
                                                    misuse, unlawful destruction, alteration, and contamination. This
                                                    section
                                                    gives you a general description of those measures.
                                                </span><br><br>
                                                <span>
                                                    <strong>Conduct a Departmental Privacy Impact Assessment (DPIA)
                                                    </strong><br>
                                                </span>
                                                <span> Example:</span><br>

                                                <span>
                                                    All department shall conduct a
                                                    Privacy Impact Assessment (PIA) relative to all <strong>activities,
                                                        Operational
                                                        strong procedures, projects</strong> and
                                                    <strong>systems</strong>
                                                    involving the
                                                    processing of personal or
                                                    confidential data.
                                                </span><br><br>

                                                <span>Duty of Confidentiality</span><br>

                                                <span> Example:</span><br><br>
                                                <i>All employees will be
                                                    asked to sign a Non-Disclosure Agreement. All employees with access
                                                    to
                                                    personal data shall operate and hold personal data under strict
                                                    confidentiality if the same is not intended for public
                                                    disclosure.</i>
                                            </div><br>


                                            <h1 class="h5 mb-3"><span class="text-success">2. PROCESS REQUEST</span>
                                            </h1>

                                            <div class="col-sm-12 invoice-col">
                                                <span>
                                                    Recording and documentation of activities carried out by the DPO, or
                                                    the
                                                    organization itself, to ensure compliance with the DPA, its IRR and
                                                    other
                                                    relevant policies.


                                                </span><br>

                                                <span>Example:</span><br>
                                                <i>There shall be a detailed and accurate documentation of all
                                                    activities,
                                                    projects and processing systems of the Club, to
                                                    be carried out by the Risk Management Officer, in coordination with
                                                    the Data
                                                    Protection Officer.
                                                </i>
                                            </div><br><br>

                                            <h1 class="h5 mb-3"><span class="text-success">3. DATA SECURITY
                                                    AWARENESS</span>
                                            </h1>

                                            <div class="col-sm-12 invoice-col">
                                                <span>
                                                    Conduct of trainings or seminars to keep personnel, especially the
                                                    Data
                                                    Protection Officer updated vis-à-vis developments in data privacy
                                                    and
                                                    security

                                                </span><br>

                                                <span>Example:</span><br>
                                                <i>There shall be a detailed and accurate documentation of all
                                                    activities,
                                                    projects and processing systems of the Club, to
                                                    be carried out by the Risk Management Officer, in coordination with
                                                    the Data
                                                    Protection Officer.
                                                </i>
                                            </div><br><br>

                                            <h1 class="h5 mb-3"><span class="text-success">4. 5S CHECKLIST</span>
                                            </h1>

                                            <div class="col-sm-12 invoice-col">
                                                <span>

                                                    This portion shall feature the procedures intended to monitor and
                                                    limit
                                                    access to the facility containing the personal data,
                                                    including the activities therein. It shall provide for the actual
                                                    design of
                                                    the facility, the physical arrangement
                                                    of equipment and furniture and the schedule and means of retention
                                                    and
                                                    disposal of data, among others. To ensure that mechanical
                                                    destruction, tampering and alteration of personal data under the
                                                    custody of
                                                    the Club are protected from
                                                    man-made disasters, power disturbances, external access, and other
                                                    similar
                                                    threats, provisions like the following must be included
                                                    in the 5S Checklist:


                                                </span><br><br>
                                                <strong>1. Format of data to be collected</strong><br>

                                                <span>Example:</span><br>
                                                <i>Personal data in the custody of the Clubs Department may be in
                                                    digital/electronic format and
                                                    paper-based/physical format.

                                                </i><br><br>
                                                <!-- 5s -->
                                                <strong>2. Storage type and location (e.g. filing cabinets, electronic
                                                    storage
                                                    system, personal data room/
                                                    separate room or part of an existing room);
                                                </strong><br>

                                                <span>Example:</span><br>
                                                <i>All personal and confidential data being processed by the department
                                                    shall be
                                                    stored in a data room, where
                                                    paper-based documents are kept in locked filing cabinets while the
                                                    digital/electronic files
                                                    are stored in computers provided and installed by the MIS with
                                                    encryption.


                                                </i><br><br>
                                                <!-- 5s -->

                                                <strong>3. Access procedure of the Clubs personnel
                                                </strong><br>

                                                <span>Example:</span><br>
                                                <i>Only authorized personnel shall be allowed inside the data room or
                                                    confidential area. For this purpose, they
                                                    shall each be given a duplicate of the key to the room. Other
                                                    personnel may
                                                    be granted
                                                    access to the room upon filing of an access request form with the
                                                    Data
                                                    Protection Officer
                                                    and the latter’s approval thereof.


                                                </i><br><br>
                                                <!-- 5s -->

                                                <strong>4. Monitoring and limitation of access to room or facility
                                                </strong><br>

                                                <span>Example:</span><br>
                                                <i>All personnel authorized to enter and access the data room or
                                                    facility must
                                                    fill out and
                                                    register with the online registration platform of the organization,
                                                    and a
                                                    logbook placed
                                                    at the entrance of the room. They shall indicate the date, time,
                                                    duration,
                                                    and purpose of
                                                    each access.



                                                </i><br><br>
                                                <!-- 5s -->
                                                <strong>5. Design of office space/work station </strong><br>
                                                <span>Example:</span><br>
                                                <i>Persons involved in processing shall always maintain confidentiality
                                                    and
                                                    integrity of
                                                    personal data. They are not allowed to bring their own gadgets or
                                                    storage
                                                    device of any
                                                    form when entering their offices or station

                                                </i><br><br>

                                                <!-- 5s -->
                                                <strong>6. Persons involved in processing, and their duties and
                                                    responsibilities</strong><br>
                                                <span>Example:</span><br>
                                                <i>The computers are positioned with considerable spaces between them to
                                                    maintain privacy
                                                    and protect the processing of personal data.
                                                </i><br><br>
                                                <!-- 5s -->
                                                <strong>7. Modes of transfer of personal data within the organization,
                                                    or to
                                                    third parties</strong><br>
                                                <span>Example:</span><br>
                                                <i>Transfers of personal data via electronic mail shall use a secure
                                                    email
                                                    facility with encryption of the data,
                                                    including any or all attachments. Facsimile technology shall not be
                                                    used for
                                                    transmitting documents containing personal or
                                                    confidential data

                                                </i><br><br>
                                                <!-- 5s -->
                                                <strong>8. Retention and disposal procedure</strong><br>
                                                <span>Example:</span><br>
                                                <i>The organization shall retain the personal data of a client for one
                                                    (1) year
                                                    from the data
                                                    of purchase. Upon expiration of such period, all physical and
                                                    electronic
                                                    copies of the
                                                    personal data shall be destroyed and disposed of using secure
                                                    technology.

                                                </i>






                                            </div><br>

                                            <h1 class="h5 mb-3"><span class="text-success">5. DATA INVENTORY</span>
                                            </h1>

                                            <div class="col-sm-12 invoice-col">
                                                <span>
                                                    A data inventory is a fully described record of the data assets
                                                    maintained
                                                    by the Clubs department. The inventory
                                                    records basic information about a data asset including its name,
                                                    contents,
                                                    update frequency, use license, owner/maintainer,
                                                    privacy considerations, data source, and other relevant details.


                                                </span><br><br>
                                                <strong>Why Conduct an Inventory?</strong><br>
                                                <span>
                                                    Managing a data inventory reduces risk and uncertainty by creating a
                                                    checklist for security and compliance requirements
                                                    and improves a city’s ability to designate accountability for the
                                                    quality of
                                                    the data collected and created.



                                                </span><br><br>

                                                <span>Example:</span><br>
                                                <i>The datasets worth inventorying are those which are considered assets
                                                    to
                                                    employees, departments, executive
                                                    leadership, and the general public. Data assets can range from
                                                    individual
                                                    datasets that are connected to forms
                                                    that people fill out, to integrated databases that track a city’s
                                                    operations.

                                                </i>
                                            </div><br><br>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require "../footer1.php"; ?>