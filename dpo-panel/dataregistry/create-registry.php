<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
$query = "SELECT * FROM dpodataregistry";
$app = new App;
$checks = $app->selectAll($query);

?>
<?php
if (isset($_POST['submit'])) {

    //echo $processno = $_POST['processno'];
    echo $userid = $_SESSION['userid'];

    //echo $department = $_POST['department'];
    echo $processname = $_POST['processname'];
    echo $scope = $_POST['scope'];
    echo $purpose = $_POST['purpose'];
    echo $requirements = $_POST['requirements'];
    echo $specification = $_POST['specification'];
    echo $anylinks = $_POST['anylinks'];
    echo $date = $_POST['date'];
    echo $thresa = $_POST['thresa'];
    echo $thresb = $_POST['thresb'];
    echo $thresc = $_POST['thresc'];
    echo $thresd = $_POST['thresd'];
    echo $threse = $_POST['threse'];
    echo $thresf = $_POST['thresf'];
    echo $thresg = $_POST['thresg'];
    echo $thresh = $_POST['thresh'];
    echo $stakeholders = $_POST['stakeholders'];
    echo $personaldata = $_POST['personaldata'];
    echo $collect1 = $_POST['collect1'];
    echo $collect2 = $_POST['collect2'];
    echo $collect3 = $_POST['collect3'];
    echo $collect4 = $_POST['collect4'];
    echo $storage1 = $_POST['storage1'];
    echo $storage2 = $_POST['storage2'];
    echo $storage3 = $_POST['storage3'];
    echo $usage1 = $_POST['usage1'];
    echo $retension1 = $_POST['retension1'];
    echo $retension2 = $_POST['retension2'];
    echo $disclosure1 = $_POST['disclosure1'];
    echo $disclosure2 = $_POST['disclosure2'];
    echo $disposal1 = $_POST['disposal1'];
    echo $disposal2 = $_POST['disposal2'];


    // echo $approveddpo = $_POST['approveddpo'];
    // echo $approvedgm = $_POST['approvedgm'];
    // echo $status = $_POST['status'];
    // echo $remarks = $_POST['remarks'];



    $query = "INSERT INTO dpodataregistry (userid, processname, scope, purpose, requirements, specification, anylinks, date, thresa, thresb, thresc, thresd, threse, thresf, thresg, thresh, stakeholders, personaldata, collect1, collect2, collect3, collect4, storage1, storage2, storage3, usage1, retension1, retension2, disclosure1, disclosure2, disposal1, disposal2)
     VALUES(:userid, :processname, :scope, :purpose, :requirements, :specification, :anylinks, :date, :thresa, :thresb, :thresc, :thresd, :threse, :thresf, :thresg, :thresh, :stakeholders, :personaldata, :collect1, :collect2, :collect3, :collect4, :storage1, :storage2, :storage3, :usage1, :retension1, :retension2, :disclosure1, :disclosure2, :disposal1, :disposal2)";

    $arr = [


        ":userid" => $userid,
        ":processname" => $processname,
        ":scope" => $scope,
        ":purpose" => $purpose,
        ":requirements" => $requirements,
        ":specification" => $specification,
        ":anylinks" => $anylinks,
        ":date" => $date,
        // ":documents" => $documents,
        ":thresa" => $thresa,
        ":thresb" => $thresb,
        ":thresc" => $thresc,
        ":thresd" => $thresd,
        ":threse" => $threse,
        ":thresf" => $thresf,
        ":thresg" => $thresg,
        ":thresh" => $thresh,
        ":stakeholders" => $stakeholders,
        ":personaldata" => $personaldata,
        ":collect1" => $collect1,
        ":collect2" => $collect2,
        ":collect3" => $collect3,
        ":collect4" => $collect4,
        ":storage1" => $storage1,
        ":storage2" => $storage2,
        ":storage3" => $storage3,
        ":usage1" => $usage1,
        ":retension1" => $retension1,
        ":retension2" => $retension2,
        ":disclosure1" => $disclosure1,
        ":disclosure2" => $disclosure2,
        ":disposal1" => $disposal1,
        ":disposal2" => $disposal2,
        // ":approveddpo" => $approveddpo,
        // ":approvedgm" => $approvedgm,
        // ":status" => $status,
        // ":remarks" => $remark,

    ];



    $path = "registry.php";
    $app->register($query, $arr, $path);



}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Process Registry</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="registry.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <form class="row g-3" method="POST" action="create-registry.php" enctype="multipart/form-data">
            <!-- I -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3">I. Project/System Description</h1>

                    </div><br>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Process No.</label>
                                    <input type="text" name="processno" id="processno" class="form-control"
                                        placeholder="Process No.">
                                </div>
                            </div> -->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Process Name</label>
                                    <input type="hidden" name="userid" id="userid" class="form-control">
                                    <input type="text" name="processname" id="processname" class="form-control"
                                        placeholder="Process Name">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category">Department</label>


                                        <?php
                                        if ($_SESSION['userrole'] == "admin") {
                                            echo '<select name="department" id="department" class="form-control">';
                                            $query = "SELECT DISTINCT dpouserdepartment FROM usermasterfile";
                                            $app = new App;
                                            $departments = $app->selectAll($query);
                                            foreach ($departments as $department) {
                                                echo '<option value=' . $department->userdepartment . '>' . $department->userdepartment . '</option>';
                                            }
                                            echo '</select>';
                                        } else {
                                            echo '<input disabled type="text" name="slug" id="slug"
                                    value=' . $_SESSION['userdepartment'] . ' class="form-control"
                                   >';
                                        }
                                        ?>







                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Scope
                                        </label>
                                        <textarea class="form-control" name="scope" id="scope" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Purpose
                                        </label>
                                        <textarea class="form-control" name="purpose" id="purpose" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Requirements
                                        </label>
                                        <textarea class="form-control" name="requirements" id="requirements"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Specification</label>
                                <input type="text" name="specification" id="specification" class="form-control"
                                    placeholder="Specification">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Any Links</label>
                                <input type="text" name="anylinks" id="anylinks" class="form-control"
                                    placeholder="Any Links">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Date</label>
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Upload the approved documents here</label>
                                        <div class="form-check">
                                            <div class="col-md-6">
                                                <input type="file" name="documents" class="form-control-file border">

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
            <!-- /.card -->
            <!-- II -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3">II. Threshold Analysis</h1>

                    </div><br>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category"> a. Will the project or system involve the collection of
                                            new
                                            information about individuals?</label>
                                        <select name="thresa" id="thresa" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category"> Is the information about individuals sensitive in nature
                                            and likely to raise privacy concerns or expectations e.g. health records,
                                            criminal records or other information people would consider particularly
                                            private?</label>
                                        <select name="thresb" id="thresb" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category"> c. Are you using information about individuals for a
                                            purpose
                                            it is not currently used for, or in
                                            a way it is not currently used?</label>
                                        <select name="thresc" id="thresc" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category">d. Will the initiative require you to contact individuals
                                            in
                                            ways which they may find intrusive?</label>
                                        <select name="thresd" id="thresd" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category">e. Will information about individuals be disclosed to
                                            organizations or people who have not
                                            previously had routine access to the information?</label>
                                        <select name="threse" id="threse" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category"> f. Does the initiative involve you using new technology
                                            which
                                            might be perceived as being
                                            privacy intrusive (e.g. biometrics or facial recognition)?</label>
                                        <select name="thresf" id="thresf" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category">g. Will the initiative result in you making decisions or
                                            taking action against individuals in ways
                                            which can have a significant impact on them?</label>
                                        <select name="thresg" id="thresg" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category">h. Are the personal data collected prior to August 2016?
                                        </label>
                                        <select name="thresh" id="thresh" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <!-- /.card -->
            <!-- III -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3">III. Stakeholder(s) Engagement</h1>

                    </div><br>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row"></div>
                        <div class="col-md-8">
                            <div class="mb-3">

                                <div class="form-group">
                                    <label for="email">State all project stakeholders, consulted in conducting PIA.
                                        Identify
                                        which part they were involved.
                                        (Describe how stakeholders were engaged in the PIA process)
                                    </label>
                                    <textarea class="form-control" name="stakeholders" id="exampleFormControlTextarea1"
                                        rows="3"
                                        placeholder="Name, Role, Involvemen, Inputs/Recommecndation"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <!-- /.card -->
            <!--IV -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3">IV. Personal Data Flows</h1>

                    </div><br>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row"></div>
                        <div class="col-md-8">
                            <div class="mb-3">

                                <div class="form-group">
                                    <label for="email"> What personal data are being or will be processed by this
                                        project/system?
                                    </label><br>
                                    <span for="email"> List all personal data (e.g. Personal Full Name, address, gender,
                                        phone number, etc.,) and state which is/
                                        are the sensitive personal information (e.g. race, ethnicity, marital status,
                                        health, genetic, government issued
                                        numbers).</span><br>
                                    <textarea class="form-control" name="personaldata" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Collection</label><br>
                                <span for="email"> 1. State who collected or will be collecting the personal information
                                    and/or sensitive information. </span><br>

                                <input type="text" name="collect1" id="collect1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <span for="email">2. How the personal information/sensitive personal information is
                                    collected and from whom
                                    it was collected?</span><br>
                                <span for="email">>> If personal information is collected from some source other than
                                    the
                                    individual?</span><br>
                                <input type="text" name="collect2" id="collect2" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <span for="email"> 3. What is/are the purpose(s) of collecting the personal
                                    data?</span><br>
                                <span for="email">>> Be clear about the purpose of collecting the information</span><br>
                                <span for="email">>> Are you collecting what you only need?</span><br>

                                <input type="text" name="collect3" id="collect3" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <span for="email">4. How was or will the consent be obtained?</span><br>
                                <span for="email"> Do individuals have the opportunity and/or right to decline to
                                    provide
                                    data?</span><br>
                                <span for="email"> What happen if they decline?</span><br>
                                <input type="text" name="collect4" id="collect4" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Storage</label><br>
                                <span for="email">1. Where is it currently being stored?</span><br>
                                <span for="email"> Is it being stored in a physical server or in the cloud?</span><br>
                                <input type="text" name="storage1" id="storage1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <span for="email">2. Is it being stored in other country?</span><br>
                                <span for="email"> If it is subject to a cross-border transfer, specify what country or
                                    countries.</span><br>
                                <input type="text" name="storage2" id="storage2" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <span for="email">3. Collection</span><br>
                                <span for="email">Specify if the storing process is being done in-house or is it handled
                                    by
                                    a service provider</span><br>
                                <input type="text" name="storage3" id="storage3" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Usage</label><br>
                                <span for="email">1. How will the data being used or what is the purpose of its
                                    processing?</span><br>
                                <span for="email">>> Describe how the collected information is being used or will be
                                    used</span><br>
                                <span for="email">>> Specify the processing activities where the personal information is
                                    being used.</span><br>
                                <input type="text" name="usage1" id="usage1" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Retention</label><br>
                                <span for="email"> 1. How long are the data being retained? And Why?</span><br>
                                <span for="email">>> State the length of period the data is being retained?</span><br>
                                <span for="email">>> What is the basis of retaining the data that long? Specify the
                                    reason(s)</span><br>
                                <input type="text" name="retension1" id="retension1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <span for="email"><b> 2. The data is being retained by the organization or is it being
                                        outsourced? </b></span><br>
                                <span for="email">>> Specify if the data retention process is being done in-house or is
                                    it
                                    handled by a service provider</span><br>
                                <input type="text" name="retension2" id="retension2" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Disclosure/Sharing</label><br>
                                <span for="email"><b>1. To whom it is being disclosed to? </b></span><br>
                                <span for="email">>> Describe the process of disposing the personal
                                    information</span><br>
                                <input type="text" name="disclosure1" id="disclosure1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <span for="email"><b>2. Is it being disclosed outside the organization? Why is it being
                                        disclosed? </b></span><br>
                                <span for="email">>> Specify if the personal information is being shared outside the
                                    organization</span><br>
                                <span for="email">>> What are the reasons for disclosing the personal
                                    information</span><br>
                                <input type="text" name="disclosure2" id="disclosure2" class="form-control">
                            </div>
                        </div>



                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Disposal/Destruction</label><br>
                                <span for="email"><b>1. How will the data be disposed</b></span><br>
                                <span for="email">>> Describe the process of disposing the personal
                                    information</span><br>
                                <input type="text" name="disposal1" id="disposal1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <span for="email"><b>2. Who will facilitate the destruction of the data?</b></span><br>
                                <span for="email">>> State if the process in being managed in-house or if it is a third
                                    party</span><br>
                                <input type="text" name="disposal2" id="disposal2" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>



            </div>






            <div class="pb-5 pt-3">
                <button class="btn btn-primary" name="submit">Create</button>
                <a href="brands.php" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --><?php require "../../footer1.php"; ?>