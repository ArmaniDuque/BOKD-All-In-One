<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php


?>
<?php
if (isset($_GET['id'])) {

    $refid = $_GET['id'];
    $query = "SELECT * FROM dpopia WHERE refid='$refid' ";
    $app = new App;
    $pias = $app->selectAll($query);

}

if (isset($_POST['submit'])) {

    $refid = $_POST['refid'];
    $query = "SELECT * FROM dpopia WHERE refid='$refid' ";
    $app = new App;
    $pias = $app->selectAll($query);

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


    <?php foreach ($pias as $pia): ?>

        <!-- Main content -->
        <section class="content">
            <form class="row g-3" method="POST" action="updatepia.php" enctype="multipart/form-data">


                <!-- V -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header pt-3">
                            <h1 class="h5 mb-3">V. Privacy Impact Analysis for <?php echo $pia->refid ?></h1>

                        </div><br>
                        <!-- /.BODY -->
                        <div class="card-body">
                            <div class="row">
                                <!-- /.TRANPARENCY -->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <span for="email">Each program, project or means for collecting personal
                                                information should be tested for consistency with the following Data Privacy
                                                Principles (as identified in Rule IV, Implementing Rules and Regulations of
                                                Republic Act No. 10173, known as the “Data Privacy Act of 2012”). Respond
                                                accordingly with the questions by checking either the “Yes” or “No” column
                                                and/or listing the what the questions may indicate.</span><br><br>
                                            <h1 class="h5 mb-3"><span class="text-success">Transparency</span></h1>

                                            <label for="category">1. Are data subjects aware of the nature, purpose, and
                                                extent of the processing of his or her personal data?</label>
                                            <select name="transp1" id="transp1" class="form-control">
                                                <option value="<?php echo $pia->transp1 ?>"><?php echo $pia->transp1 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>

                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category"> 2. Are data subjects aware of the risks and safeguards
                                                involved in the processing of his or her personal data?</label>
                                            <select name="transp2" id="transp2" class="form-control">
                                                <option value="<?php echo $pia->transp2 ?>"><?php echo $pia->transp2 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">3. Are data subjects aware of his or her rights as a data
                                                subject and how these can be exercised?</label><br>
                                            <span for="email">Below are the rights of the data subjects: <br> Right to
                                                be
                                                informed<br> Right to object<br> Right to access<br> Right to correct<br>
                                                Right for
                                                erasure or blocking<br> Right to file a complaint<br> Right to damages<br>
                                                Right to
                                                data portability</span><br>
                                            <select name="transp3" id="transp3" class="form-control">
                                                <option value="<?php echo $pia->transp3 ?>"><?php echo $pia->transp3 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">4. Is there a document available for public review that
                                                sets out the policies for the management of personal data?</label>

                                            <select name="transp4" id="transp4" class="form-control">
                                                <option value="<?php echo $pia->transp4 ?>"><?php echo $pia->transp4 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select><br>
                                            <span for="email">Please identify document(s) and provide link where available:
                                            </span><br>
                                            <input type="text" class="form-control" name="transp4desc" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">5. Are there steps in place to allow an individual to know
                                                what personal data it holds about them and its purpose of collection, usage
                                                and disclosure?</label>
                                            <select name="transp5" id="transp5" class="form-control">
                                                <option value="<?php echo $pia->transp5 ?>"><?php echo $pia->transp5 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category"> 6. Are the data subjects aware of the identity of the
                                                personal information controller or the organization/entity processing their
                                                personal data?</label>
                                            <select name="transp6" id="transp6" class="form-control">
                                                <option value="<?php echo $pia->transp6 ?>"><?php echo $pia->transp6 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">7. Are the data subjects provided information about how to
                                                contact the organization’s Data Protection Officer (DPO)?</label>
                                            <select name="transp7" id="transp7" class="form-control">
                                                <option value="<?php echo $pia->transp7 ?>"><?php echo $pia->transp7 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.LEGITIMATE PURPOSE -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Legitimate Purpose</span></h1>

                                            <label for="category">1. Is the processing of personal data compatible with a
                                                declared and specified purpose which are not contrary to law, morals, or
                                                public policy?</label>
                                            <select name="legit1" id="legit1" class="form-control">
                                                <option value="<?php echo $pia->legit1 ?>"><?php echo $pia->legit1 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">2. Is the processing of personal data authorized by a
                                                specific law or regulation, or by the individual through express
                                                consent?</label>
                                            <select name="legit2" id="legit2" class="form-control">
                                                <option value="<?php echo $pia->legit2 ?>"><?php echo $pia->legit2 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Proportionality -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Proportionality</span></h1>

                                            <label for="category">1. Is the processing of personal data adequate, relevant,
                                                suitable, necessary and not excessive in relation to a declared and
                                                specified purpose? </label>
                                            <select name="proport1" id="proport1" class="form-control">
                                                <option value="<?php echo $pia->proport1 ?>"><?php echo $pia->proport1 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">2. Is the processing of personal data necessary to fulfill
                                                the purpose of the processing and no other means are available? </label>
                                            <select name="proport2" id="proport2" class="form-control">
                                                <option value="<?php echo $pia->proport2 ?>"><?php echo $pia->proport2 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Collection -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Collection</span></h1>

                                            <label for="category">1. Is the collection of personal data for a declared,
                                                specified and legitimate purpose?</label>
                                            <select name="collect1" id="collect1" class="form-control">
                                                <option value="<?php echo $pia->collect1 ?>"><?php echo $pia->collect1 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">2. Is individual consent secured prior to the collection
                                                and processing of personal data? </label>
                                            <select name="collect2" id="collect2" class="form-control">
                                                <option value="<?php echo $pia->collect2 ?>"><?php echo $pia->collect2 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                            <span for="email">If no,specify the reason
                                            </span>
                                            <input type="text" class="form-control" name="collect2desc" id="collect2desc"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">3. Is consent time-bound in relation to the declared,
                                                specified and legitimate purpose?</label>
                                            <select name="collect3" id="collect3" class="form-control">
                                                <option value="<?php echo $pia->collect3 ?>"><?php echo $pia->collect3 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">4. Can consent be withdrawn? </label>
                                            <select name="collect4" id="collect4" class="form-control">
                                                <option value="<?php echo $pia->collect4 ?>"><?php echo $pia->collect4 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">5. Are all the personal data collected necessary for the
                                                program?</label>
                                            <select name="collect5" id="collect5" class="form-control">
                                                <option value="<?php echo $pia->collect5 ?>"><?php echo $pia->collect5 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">6. Are the personal data anonymized or de-identified?
                                            </label>
                                            <select name="collect6" id="collect6" class="form-control">
                                                <option value="<?php echo $pia->collect6 ?>"><?php echo $pia->collect6 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">7. Is the collection of personal data directly from the
                                                individual? </label>
                                            <select name="collect7" id="collect7" class="form-control">
                                                <option value="<?php echo $pia->collect7 ?>"><?php echo $pia->collect7 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">8. Is there authority for collecting personal data about
                                                the individual from other sources? </label>
                                            <select name="collect8" id="collect8" class="form-control">
                                                <option value="<?php echo $pia->collect8 ?>"><?php echo $pia->collect8 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">9. Is it necessary to assign or collect a unique
                                                identifier to individuals to enable your organization to carry out the
                                                program?</label>
                                            <select name="collect9" id="collect9" class="form-control">
                                                <option value="<?php echo $pia->collect9 ?>"><?php echo $pia->collect9 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">10. Is it necessary to collect a unique identifier of
                                                another agency? e.g. SSS number, PhilHealth, TIN, Pag-IBIG, etc.,</label>
                                            <select name="collect10" id="collect10" class="form-control">
                                                <option value="<?php echo $pia->collect10 ?>"><?php echo $pia->collect10 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.Use and Disclosure -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Use and Disclosure</span></h1>

                                            <label for="category">1. Will Personal data only be used or disclosed for the
                                                primary purpose? </label>
                                            <select name="usendis1" id="usendis1" class="form-control">
                                                <option value="<?php echo $pia->usendis1 ?>"><?php echo $pia->usendis1 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">2. Are the uses and disclosures of personal data for a
                                                secondary purpose authorized by law or the individual? </label>
                                            <select name="usendis2" id="usendis2" class="form-control">
                                                <option value="<?php echo $pia->usendis2 ?>"><?php echo $pia->usendis2 ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Data Quality -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Data Quality</span></h1>

                                            <label for="category">1. Please identify all steps taken to ensure that all data
                                                that is collected, used or disclosed will be accurate, complete and up to
                                                date: </label>
                                            <select name="dq1" id="dq1" class="form-control">
                                                <option value="<?php echo $pia->dq1 ?>"><?php echo $pia->dq1 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">1.2 *The system is regularly tested for accuracy</label>
                                            <select name="dq12" id="dq12" class="form-control">
                                                <option value="<?php echo $pia->dq12 ?>"><?php echo $pia->dq12 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">1.3 *Periodic reviews of the information</label>
                                            <select name="dq13" id="dq13" class="form-control">
                                                <option value="<?php echo $pia->dq13 ?>"><?php echo $pia->dq13 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">1.4 *A disposal schedule in place that deletes information
                                                that is over the retention period</label>
                                            <select name="dq14" id="dq14" class="form-control">
                                                <option value="<?php echo $pia->dq14 ?>"><?php echo $pia->dq14 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">1.5 *Staff are trained in the use of the tools and receive
                                                periodic updates</label>
                                            <select name="dq15" id="dq15" class="form-control">
                                                <option value="<?php echo $pia->dq15 ?>"><?php echo $pia->dq15 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">1.6 *Reviews of audit trails are undertaken
                                                regularly</label>
                                            <select name="dq16" id="dq16" class="form-control">
                                                <option value="<?php echo $pia->dq16 ?>"><?php echo $pia->dq16 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">1.7 *Independent oversight</label>
                                            <select name="dq17" id="dq17" class="form-control">
                                                <option value="<?php echo $pia->dq17 ?>"><?php echo $pia->dq17 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">1.8 *Incidents are reviewed for lessons learnt and
                                                systems/ processes updated appropriately</label>
                                            <select name="dq18" id="dq18" class="form-control">
                                                <option value="<?php echo $pia->dq18 ?>"><?php echo $pia->dq18 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">1.9 *Others, please specify </label>
                                            <select name="dq19" id="dq19" class="form-control">
                                                <option value="<?php echo $pia->dq19 ?>"><?php echo $pia->dq19 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select><br>

                                            <input type="text" class="form-control" name="dq19disc" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Data Security -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Data Security</span></h1>

                                            <label for="category">1. Do you have appropriate and reasonable organizational,
                                                physical and technical security measures in place? </label><br>
                                            <span for="email">organizational measures - refer to the system’s environment,
                                                particularly to the individuals carrying them out. Implementing the
                                                organizational data protection policies aim to maintain the availability,
                                                integrity, and confidentiality of personal data against any accidental or
                                                unlawful processing (i.e. access control policy, employee training,
                                                surveillance, etc.,) physical measures – refers to policies and procedures
                                                shall be implemented to monitor and limit access to and activities in the
                                                room, workstation or facility, including guidelines that specify the proper
                                                use of and access to electronic media (i.e. locks, backup protection,
                                                workstation protection, etc.,)technical measures - involves the
                                                technological aspect of security in protecting personal information (i.e.
                                                encryption, data center policies, data transfer policies,
                                                etc.,)</span><br><br>
                                            <select name="ds1" id="ds1" class="form-control">
                                                <option value="<?php echo $pia->ds1 ?>"><?php echo $pia->ds1 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.Organizational Security -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Organizational
                                                    Security</span></h1>

                                            <label for="category">*Have you appointed a data protection officer or
                                                compliance officer?</label>
                                            <select name="os1" id="os1" class="form-control">
                                                <option value="<?php echo $pia->os1 ?>"><?php echo $pia->os1 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">*Are there any data protection and security measure
                                                policies in place?</label>
                                            <select name="os2" id="os2" class="form-control">
                                                <option value="<?php echo $pia->os2 ?>"><?php echo $pia->os2 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">*Do you have an inventory of processing systems? Will you
                                                include this project/system?</label>
                                            <select name="os3" id="os3" class="form-control">
                                                <option value="<?php echo $pia->os3 ?>"><?php echo $pia->os3 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">*If the processing is delegated to a Personal Information
                                                Processor, have you reviewed the contract with the personal information
                                                processor?</label>
                                            <select name="os4" id="os4" class="form-control">
                                                <option value="<?php echo $pia->os4 ?>"><?php echo $pia->os4 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.Physical Security -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Physical Security </span></h1>

                                            <label for="category">*Are there policies and procedures to monitor and limit
                                                the access to this project/system?</label>
                                            <select name="ps1" id="ps1" class="form-control">
                                                <option value="<?php echo $pia->ps1 ?>"><?php echo $pia->ps1 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">*Are the duties, responsibilities and schedule of the
                                                individuals that will handle the personal data processing clearly
                                                defined?</label>
                                            <select name="ps2" id="ps2" class="form-control">
                                                <option value="<?php echo $pia->ps2 ?>"><?php echo $pia->ps2 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">*Do you have an inventory of processing systems? Will you
                                                include this project/system?</label>
                                            <select name="ps3" id="ps3" class="form-control">
                                                <option value="<?php echo $pia->ps3 ?>"><?php echo $pia->ps3 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Technical Security -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Technical Security </span></h1>

                                            <label for="category">*Is there a security policy with respect to the processing
                                                of personal data?</label>
                                            <select name="ts11" id="ts11" class="form-control">
                                                <option value="<?php echo $pia->ts11 ?>"><?php echo $pia->ts11 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">*Do you have policies and procedures to restore the
                                                availability and access to personal data when an incident happens?</label>
                                            <select name="ts12" id="ts12" class="form-control">
                                                <option value="<?php echo $pia->ts12 ?>"><?php echo $pia->ts12 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">*Do/Will you regularly test, assess and evaluate the
                                                effectiveness of the security measures of this project/ system?</label>
                                            <select name="ts13" id="ts13" class="form-control">
                                                <option value="<?php echo $pia->ts13 ?>"><?php echo $pia->ts13 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">*Are the personal data processed by this project/system
                                                encrypted while in transit or at rest?</label>
                                            <select name="ts14" id="ts14" class="form-control">
                                                <option value="<?php echo $pia->ts14 ?>"><?php echo $pia->ts14 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">2. The program has taken reasonable steps to protect the
                                                personal data it holds from misuse and loss and from unauthorized access,
                                                modification or disclosure?</label>
                                            <select name="ts2" id="ts2" class="form-control">
                                                <option value="<?php echo $pia->ts2 ?>"><?php echo $pia->ts2 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">3. If yes, which of the following has the program
                                                undertaken to protect personal data across the information lifecycle:
                                            </label>
                                            <select name="ts3" id="ts3" class="form-control">
                                                <option value="<?php echo $pia->ts3 ?>"><?php echo $pia->ts3 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">3.1 * Identifying and understanding information types
                                            </label>
                                            <select name="ts31" id="ts31" class="form-control">
                                                <option value="<?php echo $pia->ts31 ?>"><?php echo $pia->ts31 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">3.2 * Assessing and determining the value of the
                                                information</label>
                                            <select name="ts32" id="ts32" class="form-control">
                                                <option value="<?php echo $pia->ts32 ?>"><?php echo $pia->ts32 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">3.3 * Identifying the security risks to the
                                                information</label>
                                            <select name="ts33" id="ts33" class="form-control">
                                                <option value="<?php echo $pia->ts33 ?>"><?php echo $pia->ts33 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">3.4 * Applying security measures to protect the
                                                information</label>
                                            <select name="ts34" id="ts34" class="form-control">
                                                <option value="<?php echo $pia->ts34 ?>"><?php echo $pia->ts34 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">3.5 * Managing the information risks.</label>
                                            <select name="ts35" id="ts35" class="form-control">
                                                <option value="<?php echo $pia->ts35 ?>"><?php echo $pia->ts35 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <!-- /.Disposal -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Data Security</span></h1>

                                            <label for="category">1. The program will take reasonable steps to destroy or
                                                de- identify personal data if it is no longer needed for any
                                                purpose.</label><br>
                                            <select name="dsy1" id="dsy1" class="form-control">
                                                <option value="<?php echo $pia->dsy1 ?>"><?php echo $pia->dsy1 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select><br>
                                            <span for="email"> If YES, please list the steps
                                            </span>
                                            <input type="text" class="form-control" name="dsy1desc"
                                                value="<?php echo $pia->dsy1desc ?>">

                                        </div>
                                    </div>
                                </div>
                                <!-- /.Cross-border Data Flows (optional) -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <h1 class="h5 mb-3"><span class="text-success">Cross-border Data Flows
                                                    (optional)</span></h1>

                                            <label for="category">1. The program will transfer personal data to an
                                                organization or person outside of the Philippines </label><br>
                                            <select name="cdf1" id="cdf1" class="form-control">
                                                <option value="<?php echo $pia->cdf1 ?>"><?php echo $pia->cdf1 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select><br>
                                            <span for="email"> If YES, please describe
                                            </span>
                                            <input type="text" class="form-control" name="cdf1desc"
                                                value="<?php echo $pia->cdf1desc ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">



                                            <label for="category">2. Personal data will only be transferred to someone
                                                outside of the Philippines if any of the following apply: </label><br>
                                            <span for="email">a. The individual consents to the transfer </span><br>
                                            <span for="email">b. The organization reasonably believes that the recipient is
                                                subject to laws or a contract enforcing information handling principles
                                                substantially similar to the DPA of 2012 </span><br>
                                            <span for="email">c. The transfer is necessary for the performance of a contract
                                                between the individual and the organization </span><br>
                                            <span for="email">d. The transfer is necessary as part of a contract in the
                                                interest of the individual between the organization and a third party
                                            </span><br>
                                            <span for="email">e. The transfer is for the benefit of the individual;
                                            </span><br>
                                            <select name="cdf2" id="cdf2" class="form-control">
                                                <option value="<?php echo $pia->cdf2 ?>"><?php echo $pia->cdf2 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select><br>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">


                                            <label for="category">3. The organization has taken reasonable steps so that the
                                                information transferred will be stored, used, disclosed and otherwise
                                                processed consistently with the DPA of 2012</label><br>
                                            <span for="email"> If YES, please describe</span><br><br>
                                            <select name="cdf3" id="cdf3" class="form-control">
                                                <option value="<?php echo $pia->cdf3 ?>"><?php echo $pia->cdf3 ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select><br>
                                            <span for="email"> If YES, please describe
                                            </span>
                                            <input type="text" class="form-control" name="cdf3desc"
                                                value="<?php echo $pia->cdf3desc ?>">

                                        </div>
                                    </div>
                                </div>
                                <!-- /.Collection -->






                            </div>
                        </div>


                    </div>

                </div>
                <!-- VI -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header pt-3">
                            <h1 class="h5 mb-3">VI. Privacy Risk Management</h1>

                        </div><br>
                        <div class="card-body">
                            <div class="row">
                                <!-- /.TRANPARENCY -->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">

                                            <span for="email">For the purpose of this section, a risk refers to the
                                                potential of an incident to result in harm or danger to a data subject or
                                                organization. Risks are those that could lead to the unauthorized
                                                collection, use, disclosure or access to personal data. It includes risks
                                                that the confidentiality, integrity and availability of personal data will
                                                not be maintained, or the risk that processing will violate rights of data
                                                subjects or privacy principles (transparency, legitimacy and
                                                proportionality).</span><br>
                                            <span for="email">The first step in managing risks is to identify them,
                                                including threats and vulnerabilities, and by evaluating its impact and
                                                probability. </span><br><br>
                                            <span for="email">The following definitions are used in this section,
                                            </span><br>
                                            <span for="email"><b>Risk </b>- “the potential for loss, damage or destruction
                                                as a result of a threat exploiting a vulnerability”;</span><br>
                                            <span for="email"><b>Threat </b> - “a potential cause of an unwanted
                                                incident, which may result in harm to a system or organization”; </span><br>

                                            <span for="email"><b>Impact </b> - severity of the injuries that might arise if
                                                the event does occur (can be ranked from trivial injuries to major
                                                injuries);</span><br>
                                            <span for="email"><b>Probability </b> - chance or probability of something
                                                happening; </span><br>

                                            <div class="card-body ">
                                                <table class="table table-striped " style="width:100%" id="example">
                                                    <thead>
                                                        <tr>

                                                            <th colspan="3" style="text-align: center;">Impact</th>


                                                        </tr>
                                                        <tr>
                                                            <!-- <th width="60">Reg #</th> -->
                                                            <th>Rating</th>
                                                            <th>Types</th>
                                                            <th>Description</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Negligible</td>
                                                            <td>The data subjects will either not be affected or may
                                                                encounter a few inconveniences, which they will overcome
                                                                without any problem. </td>

                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Limited</td>
                                                            <td>The data subject may encounter significant inconveniences,
                                                                which they will be able to overcome despite a few
                                                                difficulties. </td>

                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Significant</td>
                                                            <td>The data subjects may encounter significant inconveniences,
                                                                which they should be able to overcome but with serious
                                                                difficulties.</td>

                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Maximum</td>
                                                            <td>The data subjects may encounter significant inconveniences,
                                                                or even irreversible, consequences, which they may not
                                                                overcome.</td>

                                                        </tr>
                                                    </tbody>
                                                </table><br><br>
                                                <table class="table table-striped " style="width:100%" id="example">
                                                    <thead>
                                                        <tr>

                                                            <th colspan="3" style="text-align: center;">Probability</th>


                                                        </tr>
                                                        <tr>
                                                            <!-- <th width="60">Reg #</th> -->
                                                            <th>Rating</th>
                                                            <th>Types</th>
                                                            <th>Description</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Unlikely</td>
                                                            <td>Not expected, but there is a slight possibility it may occur
                                                                at some time. </td>

                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Possible</td>
                                                            <td>Casual occurrence. It might happen at some time. </td>

                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Likely</td>
                                                            <td>Frequent occurrence. There is a strong possibility that it
                                                                might occur.</td>

                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Almost Certain</td>
                                                            <td>Very likely. It is expected to occur in most circumstances.
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table><br>
                                                <span for="email">Select the appropriate level or criteria of impact and
                                                    probability to better assess the risk. Kindly refer to the table below
                                                    for the criteria.</span><br>
                                                <span for="email">Note: Try to itemize your risks by designating a reference
                                                    number. This will be used as a basis on the next sections (VII.
                                                    Recommended Privacy Solutions and VIII. Sign off and Action Plan). Also,
                                                    base the risks on the violation of privacy principles, rights of data
                                                    subjects and confidenti- ality, integrity and availability of personal
                                                    data.</span><br><br>
                                                <table class="table table-striped table-bordered " style="width:100%; "
                                                    id="example">
                                                    <thead>

                                                        <tr style="text-align:center;">
                                                            <!-- <th width=" 60">Reg #</th> -->
                                                            <th>Ref #</th>
                                                            <th>Threats/Vulnerabilities</th>
                                                            <th colspan="4">Impact</th>
                                                            <th colspan="4">Probalility</th>
                                                            <th colspan="2">Risk Rating</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="text-align:center;">
                                                            <td>123#</td>
                                                            <td>aa</td>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td>4</td>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td>4</td>
                                                            <td>risk</td>
                                                            <td>risk</td>

                                                        </tr>
                                                        <tr style="text-align:center;">
                                                            <!-- <th width=" 60">Reg #</th> -->
                                                            <th><input type="hidden" class="form-control" name="piaid"
                                                                    value="<?php echo $pia->piaid ?>">
                                                                <input type="hidden" class="form-control" name="refid"
                                                                    value="<?php echo $pia->refid ?>"><?php echo $pia->refid ?>
                                                            </th>
                                                            <th><input type="number" class="form-control" name="prmthreats"
                                                                    value="<?php echo $pia->prmthreats ?>">
                                                            </th>
                                                            <th colspan="4"><input type="number" class="form-control"
                                                                    name="prmimpact" value="<?php echo $pia->prmimpact ?>">
                                                            </th>
                                                            <th colspan="4"><input type="number" class="form-control"
                                                                    name="prmprobability"
                                                                    value="<?php echo $pia->prmprobability ?>"></th>
                                                            <th colspan="2"><input type="number" style="text-align:center;"
                                                                    class="form-control" name="prrating"
                                                                    value="<?php echo $pia->prresult ?>" readonly>

                                                                <?php if ($pia->prresult == NULL) {


                                                                } else if ($pia->prresult == 1) {
                                                                    echo '<span class="badge bg-success ">Low Risk</span>';

                                                                } else if ($pia->prresult <= 4) {
                                                                    echo '<span class="badge bg-success ">Low Risk</span>';

                                                                } else if ($pia->prresult <= 9) {
                                                                    echo '<span class="badge bg-warning ">Medium Risk</span>';

                                                                } else if ($pia->prresult >= 10) {
                                                                    echo '<span class="badge bg-danger ">High Risk</span>';
                                                                }
                                                                ?>

                                                            </th>

                                                        </tr>

                                                    </tbody>
                                                </table><br>
                                                <span for="email">Kindly follow the formula below for getting the Risk
                                                    Rating:.</span><br>
                                                <span for="email"><b>Risk Rating = Impact x Probability</b></span><br>
                                                <span for="email">Kindly refer to the table below for the
                                                    criteria.</span><br>
                                                <table class="table table-striped " style="width:100%" id="example">
                                                    <thead>

                                                        <tr>
                                                            <!-- <th width="60">Reg #</th> -->
                                                            <th>Rating</th>
                                                            <th>Types</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Negligible</td>


                                                        </tr>
                                                        <tr>
                                                            <td>2 to 4</td>
                                                            <td>Low Risk</td>


                                                        </tr>
                                                        <tr>
                                                            <td>6 to 9</td>
                                                            <td>Medium Risk</td>


                                                        </tr>
                                                        <tr>
                                                            <td>10 to 16</td>
                                                            <td>High Risk</td>


                                                        </tr>
                                                    </tbody>
                                                </table><br><br>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- VII -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header pt-3">
                            <h1 class="h5 mb-3">VII. Recommended Privacy Solutions</h1>

                        </div><br>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="mb-3">

                                    <span for="email">From the risks stated in the previous section, identify the
                                        recommended solution or mitigation measures. You can cite your existing controls to
                                        treat the risks in the same column.</span><br>
                                    <div class="form-group">
                                        <label for="email">Recommended Solutions (Please provide justification)
                                        </label>
                                        <textarea class="form-control" name="rpsdesc" id="rpsdesc" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="update">Save</button>
                    <a href="registry.php" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>


        </section>
    <?php endforeach; ?>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --><?php require "../../footer1.php"; ?>