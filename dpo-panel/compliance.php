<?php require "../config/config.php"; ?>
<?php require "../libs/app.php"; ?>

<?php include "../layouts/url.php"; ?>
<?php require "../validate.php"; ?>


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
                            <h1>Compliance Check</h1>
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
                            <h1 class="h5 mb-3"><b>How Compliant are we?</b> </h1>

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
                        <div class="card-body table-responsive">
                            <table class="table table-hover text-wrap">
                                <thead>
                                    <tr>
                                        <th width="25%">Evidence of Compliance</th>
                                        <th width="50%">Status</th>
                                        <th width="25%">Remarks</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td colspan="3"> <b>1. Establish Data Privacy Governance</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Designation/Appointment Papers/ Contract of the DPO</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque(Date Hire as DPO August 28 2024)</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Data Privacy Team</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">DATA PRIVACY, PROTECTION AND SECURITY COMMITTEE</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3"> <b>2. Privacy Risk Assessment</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Inventory of personal data processing systems


                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Done Collecting Data Inventory </td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Visible announcement showing the contact details of DPO and
                                            privacy
                                            notice(e.g. website, social media, electronic form, public area)</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 75%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">75%</div>
                                            </div>
                                        </td>
                                        <td width="25%"> Public Area, Front Office, HR Office, Accounting Office,
                                            Lamarea
                                            Restaurant<br><span class="text-danger">Pending Website and Social
                                                Media</span></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Phase I - Registration Form (Notarized) Privacy Impact
                                            Assessment (PIA)
                                            report
                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 50%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Done Registration Form
                                            <br><span class="text-danger">Pending Impact Assessment</span>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="3"> <b>3. Maintain Organization Commitment</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><a
                                                href="https://privacy.gov.ph/creating-a-privacy-manual/">Privacy
                                                Manual</a> </td>

                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%"><span class="text-danger">Ongoing </span></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><a
                                                href="https://privacy.gov.ph/wp-content/uploads/2022/01/DPA_QuickGuidefolder_10191.pdf">List
                                                of activities on privacy and data protection</a></td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%"><span class="text-danger">Ongoing </span></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">List of key personnel assigned responsibilities for privacy and
                                            data
                                            protection within the organization</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%"><b>IT/DPO : </b>Duque, Armani

                                            <br><b>GM : </b>Vergel De Dios JR, Rolando
                                            <br><b>HR : </b>Ramos, Benidict V.
                                            <br><b>FO : </b>Albarda, Glenah Paguio
                                            <br><b>Membership & Reservations : </b> Cortado, Maricel Dayao
                                            <br><b>Accounting : </b>Ramirez, Catherine Joy Banito
                                            <br><b>Security : </b>Security OIC

                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="3"> <b>4. Privacy and Data Protection in day to day operations</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Valid Privacy Notice in Website and/or within organization
                                            (where
                                            collection of personal data occurs)</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Consent forms for collection and use of personal data</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                                            </div>
                                        </td>
                                        <td width="25%">
                                            <br><b>IT/DPO : </b>Training and Seminar for all PIC and PIP
                                            <br><b>HR : </b>For Employee Consent Form
                                            <br><b>FO : </b>For Guest and Members Consent Form
                                            <br><b>Membership & Reservations : </b> For Guest and Members Consent Form
                                            <br><b>Accounting : </b>For Supplier Consent Form
                                            <br><b>Security : </b>For CCTV Consent Form
                                            <!-- <a href="download.php?id=<?php echo $request->file ?>" target="_thapa">
                                        <?php echo $request->file ?> View
                                        Documents</a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%">List of Policies and Procedures in place that relate to privacy
                                            and data
                                            protection (may be in privacy manual)</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Policies and Procedure in dealing with requests for information
                                            from
                                            parties other than the data subjects (media, law enforcement,
                                            representatives)</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Data subjects informed of rights through privacy notices, and
                                            other
                                            means</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 80%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">80%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Form or platform for data subjects to request copy of their
                                            personal
                                            information and request correction</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Procedure for addressing complaints of data subjects Certificate
                                            of
                                            registration and notification</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>


                                    <!-- /.NO -->
                                    <tr>
                                        <td colspan="3"> <b>5. Manage Security Risks</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Data Center and Storage area with limited physical access</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Report on technical security measures and information security
                                            tools in
                                            place</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Firewalls used</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Encryption used for transmission Encryption used for storage
                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Access Policy for onsite, remote and online access Audit logs
                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Back-up solutions</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Report of Internal Security Audit or other internal assessments
                                            Certifications or accreditations maintained</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Vulnerability Assessment</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Penetration Testing for applications and network Other means to
                                            demonstrate compliance</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <!-- /.6 -->
                                    <tr>
                                        <td colspan="3"> <b>6. Data Breach Management</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Schedule of breach drills</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Number of Trainings conducted for internal personnel on breach
                                            management</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Personnel Order constituting the Data Breach Response Team
                                            Incident
                                            Response Policy and Procedure (may be in Privacy Manual)</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Record of Security incidents and personal data breaches,
                                            including
                                            notification for personal data breaches</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <!-- /.7 -->
                                    <tr>
                                        <td colspan="3"> <b>7. Manage Third Party Risks</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Data Sharing Agreements</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">List of recipients of personal data (PIPs, other PICs, service
                                            providers, government agencies)</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Review of Contracts with PIPs</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>

                                    <!-- /.8 -->
                                    <tr>
                                        <td colspan="3"> <b>Review of Contracts for cross-border transfers Other means
                                                to
                                                demonstrate
                                                compliance</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"> <b>8. Human Resources Management</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">No. of employees who attended trainings on privacy and data
                                            protection
                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Commitment to comply with Data Privacy Act as part of Code of
                                            Conduct or
                                            through written document to be part of employee files</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Certificate of Training of DPO Certifications of DPOs</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">NDAs or confidentiality agreements Security Clearance Policy
                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <!-- /.9 -->
                                    <tr>
                                        <td colspan="3"> <b>9. Continuing Assessment and Development</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Policy for Conduct of PIA (may be in manual)</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Policy on conduct of Internal Assessments and Security Audits
                                            Privacy
                                            Manual contains policy for regular review



                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">List of activities to evaluate Privacy Management program
                                            (survey of
                                            customer, personnel assessment)</td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>

                                    <!-- /.10 -->
                                    <tr>
                                        <td colspan="3"> <b>10. Manage Privacy Ecosystem</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">No. of trainings and conferences attended on privacy and data
                                            protection
                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Policy papers, legal or position papers, or other research
                                            initiatives
                                            on emerging technologies, data privacy best practices, sector specific
                                            standards,
                                            and international data protection standards
                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">No. of management meetings which included privacy and data
                                            protection in
                                            the agenda

                                        </td>
                                        <td width="50%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </td>
                                        <td width="25%">Armani Duque</td>
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