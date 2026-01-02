<?php require "../../../header.php"; ?>

<?php if (isset($_GET['reservationid'])) {

  $reservationid = $_GET['reservationid'];


  $query = "SELECT * FROM reservations where reservationid=$reservationid";
  $app = new App;
  $selectedreservations = $app->selectAll($query);
  foreach ($selectedreservations as $selectedreservation) {

    $query = "SELECT * FROM t_customerinfo where customerid=$selectedreservation->customerid";
    $app = new App;
    $selctednames = $app->selectAll($query);
    foreach ($selctednames as $selctedname) {
      ?>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">

                <div class="text-justify">
                    <br>
                    <p> <img src="<?php echo APPURL; ?>img/logo1.png" class='mx-auto d-block' width="200" alt=""></p>
                    <br>
                    <h1 class="text-center">REGISTRATION FORM</h1>
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Control
                                    No. :<?php echo $selectedreservation->reservationid; ?></label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> ETA
                                    . : <?php echo $selectedreservation->checkindate; ?></label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Vehicle
                                    Information. : 115as , 1245a</label>
                            </div>
                            <div class="col-sm-6">
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">
                                    Reservation
                                    No. :<?php echo $selectedreservation->reservationid; ?></label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">ETD
                                    . : <?php echo $selectedreservation->checkoutdate; ?></label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Room
                                    Number . : <?php echo $selectedreservation->roomnumber ?></label>
                            </div>
                            <div class="col-sm-12"> <label for="colFormLabelSm"
                                    class="col-sm-12 col-form-label col-form-label-sm">Name</label></div>

                            <div class="col-sm-4">
                                <label for="colFormLabelSm"
                                    class="col-sm-12 col-form-label col-form-label-sm"><?php echo $selctedname->lastname; ?></label>

                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Last
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label for="colFormLabelSm"
                                    class="col-sm-12 col-form-label col-form-label-sm"><?php echo $selctedname->firstname; ?>
                                </label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">First
                                    Name</label>
                            </div>
                            <div class="col-sm-4">
                                <label for="colFormLabelSm"
                                    class="col-sm-12 col-form-label col-form-label-sm"><?php echo $selctedname->middlename; ?>
                                </label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Middle
                                    Name</label>
                            </div>
                            <div class="col-sm-12">
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Home
                                    Address : </label>
                                <label for="colFormLabelSm"
                                    class="col-sm-12 col-form-label col-form-label-sm"><?php echo $selctedname->address; ?></label>
                                <hr>
                            </div>

                            <div class="col-sm-6">
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Mobile
                                    No. :<?php echo $selctedname->number1; ?> /
                                    <?php echo $selctedname->number2; ?></label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">
                                    Passport/Senior Id No. : <?php echo $selctedname->pwdid; ?> /
                                    <?php echo $selctedname->seniorid; ?> /
                                    <?php echo $selctedname->membersid; ?></label>

                            </div>
                            <div class="col-sm-6">
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">
                                    Email : <?php echo $selctedname->email1; ?> /
                                    <?php echo $selctedname->email2; ?></label>
                                <label for="colFormLabelSm"
                                    class="col-sm-12 col-form-label col-form-label-sm">Nationality :
                                    Filipino</label>

                            </div>

                            <div class="col-sm-12">
                                <hr>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Name of
                                    companion(s)/other occupants: </label>
                                <?php
                      $accompanyhistory = $app->selectone("SELECT SUM(reservationid) as reservationaccompany FROM accompany WHERE reservationid='$reservationid' ");
                      $accompanyhistory->reservationaccompany;

                      if ($accompanyhistory->reservationaccompany > 0) {
                        $query = "SELECT * FROM accompany where reservationid=$reservationid ";
                        $app = new App;
                        $accompanys = $app->selectAll($query);
                        ?>
                                <?php foreach ($accompanys as $accompany): ?>
                                <?php $accompany->customerid;

                          $query = "SELECT * FROM t_customerinfo where customerid=$accompany->customerid ";
                          $app = new App;
                          $accompanynames = $app->selectAll($query);
                          foreach ($accompanynames as $accompanyname) {

                            $accompanyname->firstname . ' ' . $accompanyname->lastname . ' ' . $accompanyname->middlename;
                            $dateOfBirth = $accompanyname->birthday;
                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($dateOfBirth), date_create($today));
                            // echo 'Age is ' . $diff->format('%y');
                            $agecategory = $diff->format('%y');

                            ?>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Kids:
                                    <?php if ($agecategory <= 12) {

                                echo $accompanyname->firstname . '' . $accompanyname->lastname . ' ' . $accompanyname->middlename . ' Age ' . $agecategory;
                              } ?>
                                </label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Adults:
                                    <?php
                              if ($agecategory <= 59) {
                                echo $accompanyname->firstname . '' . $accompanyname->lastname . ' ' . $accompanyname->middlename . ' Age ' . $agecategory;
                              } ?>
                                </label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Senior:
                                    <?php if ($agecategory >= 60) {
                                echo $accompanyname->firstname . '' . $accompanyname->lastname . ' ' . $accompanyname->middlename . ' Age ' . $agecategory;
                              } ?>
                                </label>
                                <?php

                          }
                          ?>

                                <?php endforeach;
                      }
                      ?>



                                <!-- <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Adults:
                                    Armani
                                    Duque 30yrs old, Armani Duque 30yrs old, Armani Duque 30yrs old</label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Kids:
                                    Armani
                                    Duque 30yrs old, Armani Duque 30yrs old, Armani Duque 30yrs old</label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">
                                    Senior/PWD:
                                    Armani
                                    Duque 30yrs old, Armani Duque 30yrs old, Armani Duque 30yrs old</label> -->
                                <hr>
                            </div>
                            <div class="col-sm-6">
                                <label for="colFormLabelSm"
                                    class="col-sm-12 col-form-label col-form-label-sm">Sponsord/Endorse By :
                                    Armani
                                    Duque</label>
                            </div>
                            <div class="col-sm-6">
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">
                                    Billing Arrangemenr. : Cash/Manila Sale Office</label>

                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-10 ">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                        <i class="far fa-circle text-danger-lg"> : With ID</i>
                                    </label>
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                        <i class=" far fa-circle text-danger-lg"> : With Intro Letter</i>
                                    </label>
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                        <i class=" far fa-circle text-danger-lg"> : Walk IN</i>
                                    </label>


                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-10 ">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                        <i class=" far fa-circle text-danger-lg"> : Extra Bed</i>
                                    </label>
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                        <i class=" far fa-circle text-danger-lg"> : Extra Person</i>
                                    </label>
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                        <i class=" far fa-circle text-danger-lg"> : Extra Matress</i>
                                    </label>

                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12">
                                <hr>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Other
                                    Remarks: </label>
                                <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"> Remarks
                                    RemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarksRemarks</label>
                                <hr>
                                <p>By providing the details requested by Montemar Beach Club, I hereby freely,
                                    willfully, and
                                    volunta
                                    r ily
                                    give
                                    my full consent to the <b>collection, storage, processing, use, recording,
                                        organization,
                                        updating,
                                        modification, retrieval, consultation, consolidation, blocking, erasure, and
                                        destruction
                                    </b>(collectively
                                    referred to as “Use”) by Montemar Beach Club, its officers, employees, agents,
                                    representatives,
                                    and
                                    personnel as well as its extension offices (collectively referred to as “Club”) of
                                    any or all
                                    sensitive,
                                    personal, and privileged information.</p>

                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-5 ">
                                    <hr>


                                    <b class="d-flex justify-content-center">Signature over Printer Name</b>


                                </div>
                            </div>
                            <div class="col-sm-12">

                                <p>By providing the details requested by Montemar Beach Club, I hereby freely,
                                    willfully, and
                                    volunta
                                    r ily
                                    give
                                    my full consent to the <b>collection, storage, processing, use, recording,
                                        organization,
                                        updating,
                                        modification, retrieval, consultation, consolidation, blocking, erasure, and
                                        destruction
                                    </b>(collectively
                                    referred to as “Use”) by Montemar Beach Club, its officers, employees, agents,
                                    representatives,
                                    and
                                    personnel as well as its extension offices (collectively referred to as “Club”) of
                                    any or all
                                    sensitive,
                                    personal, and privileged information.</p>

                            </div>
                            <div class="col-sm-12">

                                <p>By providing the details requested by Montemar Beach Club, I hereby freely,
                                    willfully, and
                                    volunta
                                    r ily
                                    give
                                    my full consent to the <b>collection, storage, processing, use, recording,
                                        organization,
                                        updating,
                                        modification, retrieval, consultation, consolidation, blocking, erasure, and
                                        destruction
                                    </b>(collectively
                                    referred to as “Use”) by Montemar Beach Club, its officers, employees, agents,
                                    representatives,
                                    and
                                    personnel as well as its extension offices (collectively referred to as “Club”) of
                                    any or all
                                    sensitive,
                                    personal, and privileged information.</p>

                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-5 ">
                                    <hr>


                                    <b class="d-flex justify-content-center">Signature over Printer Name</b>


                                </div>
                            </div>

                        </div>
                    </div>




                </div>
            </div>


            <div class="row">

                <div class="text-justify">
                    <br>
                    <p> <img src="<?php echo APPURL; ?>img/logo1.png" class='mx-auto d-block' width="250" alt=""></p>
                    <br>
                    <h1 class="text-center">DATA PRIVACY CONSENT FORM</h1>
                    <h5 class="text-center">UNDER Data Privacy Act of the Philippines RA 10173</h5><br>
                    <p>By providing the details requested by Montemar Beach Club, I hereby freely, willfully, and
                        volunta
                        r ily
                        give
                        my full consent to the <b>collection, storage, processing, use, recording, organization,
                            updating,
                            modification, retrieval, consultation, consolidation, blocking, erasure, and destruction
                        </b>(collectively
                        referred to as “Use”) by Montemar Beach Club, its officers, employees, agents, representatives,
                        and
                        personnel as well as its extension offices (collectively referred to as “Club”) of any or all
                        sensitive,
                        personal, and privileged information.</p>
                    <p>I disclose to the Club for the purpose of:</p>
                    <p><b>A. Use </b></p>
                    <ul>

                        <li>Personal data collected shall be used by the Club for documentation purposes, membership
                            registration,
                            billing and payment processing, communication regarding Club activities and updates,
                            marketing and
                            promotional activities, enhancing member experience, and compliance with legal and
                            regulatory
                            requirements.
                        </li>
                    </ul>
                    <p><b>B. Collection</b></p>
                    <ul>
                        <li>
                            <b>Type of Data Collected:</b> Full name, contact information (email, phone number), date of
                            birth,
                            address,
                            payment information, membership details, preferences, and interests.
                        </li>
                        <li>
                            <b>Mode of Collection:</b> Data may be collected through membership forms, email
                            communications, and
                            in-person
                            interactions.
                        </li>
                        <li>
                            <b>Person Collecting Information:</b> Authorized personnel of Montemar Beach Club.
                        </li>
                    </ul>
                    <p><b>C. Storage, Retention, and Destruction</b></p>
                    <ul>
                        <li><b>Means of Storage:</b> Data will be stored securely in electronic and physical formats.
                        </li>
                        <li><b>Security Measures:</b> Appropriate technical and organizational measures will be
                            implemented to
                            protect
                            your

                            data against unauthorized access, alteration, disclosure, or destruction.</li>
                        <li><b>Form of Information Stored:</b> Personal data will be stored in databases and secure
                            filing
                            systems.
                        </li>
                        <li><b>Retention Period:</b> Data will be retained for as long as necessary to fulfill the
                            purposes for
                            which it
                            was
                            collected and in accordance with legal requirements.</li>
                        <li><b>Disposal Procedure:</b> Data will be securely deleted or destroyed when no longer needed.
                        </li>
                    </ul>

                    <p>
                        <b> D. Disclosure and Sharing</b>
                    </p>
                    <ul>
                        <li><b>Individuals to Whom Personal Data is Shared:</b> Data may be shared with service
                            providers who
                            assist
                            in

                            operating the Club and government agencies for legal processes</li>

                    </ul>
                    <p>I hereby certify that all information provided is true and correct. I authorize the Club to ve
                        r ify all of
                        this information. I recognize that I am entitled to certain rights in relation to the
                        information,


                        including
                        the right to object to its use, and to access, correct, and request deletion of the same.
                        However,
                        I
                        accept
                        that the Club cannot delete the information without restricting or removing its ability to
                        effectively
                        execute its responsibilities to facilitate transactions with government and regulatory bodies
                        for
                        purposes

                        of complying with applicable and pertinent laws and other regulations for the above purposes
                        indicated.
                    </p>
                    <p>I further understand and agree that the Club may not accommodate a request to correct and delete
                        the
                        information if the Club believes the same would violate any legal requirement or cause the
                        information
                        or
                        historical transactions to be incorrect.</p>
                    <p>I hereby release the Club, its Board of Directors, Officers, Management, and personnel from any
                        liability
                        whatsoever, including but not limited to liability under the Data Privacy Act of 2012 for the
                        use of the
                        information for the foregoing purposes, and any liability in connection with or arising from any
                        activity
                        that may occur or result therefrom.</p>
                    <p>Any concerns or inquiries with respect to your Personal Data may be sent to our designated Data
                        Privacy
                        Officer, with the following contact details below:</p>


                    <p class="text-center">Designation: Data Privacy Officer <br>
                        Company Name: Montemar Beach Club <br>
                        <b>No.: +63 916 486 1586 </b><br>
                        Email: dpo@montemar.com.ph
                    </p><br><br>
                </div>
            </div>
            <!-- /.content -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
    window.addEventListener("load", window.print());
    </script>
</body>
<?php
    }
  }
} ?>