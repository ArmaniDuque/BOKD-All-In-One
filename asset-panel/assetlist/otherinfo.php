<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php

if (isset($_GET['select'])) {
    $id = $_GET['select'];
    $query = "SELECT * FROM assetitemlist where id='$id'";
    $app = new App;
    $itemlists = $app->selectAll($query);

    if (isset($_POST['submit'])) {

        $id = $_POST['select'];
        $checkofficephoto = $_FILES['checkofficephoto']['name'];
        $Adate = $_POST['Adate'] ?? null;
        $Remarks = $_POST['Remarks'] ?? null;
        $StartDate = $_POST['StartDate'] ?? null;
        $EndDate = $_POST['EndDate'] ?? null;
        $dir = "../../img/" . basename($checkofficephoto);
        $query = "UPDATE assetitemlist SET checkofficephoto=:checkofficephoto,
         Remarks = :Remarks,
         Adate = :Adate,
         StartDate = :StartDate,
        EndDate = :EndDate
        WHERE id = :id";
        $arr = [

            ":Remarks" => $Remarks,
            ":StartDate" => $StartDate,
            ":EndDate" => $EndDate,
            ":Adate" => $Adate,
            ":checkofficephoto" => $checkofficephoto,
            ":id" => $id // Crucial for the WHERE clause
        ];
        $path = "otherinfo.php?select=$id";

        if (move_uploaded_file($_FILES['checkofficephoto']['tmp_name'], $dir)) {
            $app->update($query, $arr, $path);
        }

    }





    // Warning: Undefined variable $dir in C:\xampp\htdocs\Laravel10\montemarportal1\admin-panel\5schecklist\dataview.php on line 48




    ?>


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
        <?php foreach ($itemlists as $itemlist): ?>
            <section class="content">
                <!-- Default box -->

                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header pt-3">
                            <div class="text-right">
                                <a href="update-assetlist.php?select=<?php echo $itemlist->id ?>" class="btn btn-primary">Update
                                    Information</a>
                            </div>
                        </div>
                        <!-- /.BODY -->
                        <div class="card-body">
                            <div class="row">
                                <!-- /.Personal Details -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header pt-3">
                                            <div class="row invoice-info">

                                                <div class="col-sm-6 invoice-col">

                                                    <table style="widtd:100%;" class="table table-stripe">
                                                        <tdead>
                                                            <tr>
                                                                <td>Asset No</td>
                                                                <td colspan="2"> <?php echo $itemlist->FacNO ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Asset Name</td>
                                                                <td colspan="2"><?php echo $itemlist->FacName ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Description</td>
                                                                <td colspan="2"> <?php echo $itemlist->Description ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Category</td>
                                                                <td>

                                                                    <?php
                                                                    $query = "SELECT * FROM assetcategory WHERE id='$itemlist->cATEGORY'";
                                                                    $app = new App;
                                                                    $categorys = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($categorys as $category): ?>

                                                                        <?php echo $category->category ?>

                                                                    <?php endforeach; ?>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Item Class</td>
                                                                <td> <?php
                                                                $query = "SELECT * FROM assetitemclass WHERE id='$itemlist->ItemClass'";
                                                                $app = new App;
                                                                $itemclasss = $app->selectAll($query);
                                                                ?>
                                                                    <?php foreach ($itemclasss as $itemclass): ?>
                                                                        <?php echo $itemclass->itemclass ?>
                                                                    <?php endforeach; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brand</td>
                                                                <td> <?php
                                                                $query = "SELECT * FROM assetbrand WHERE id='$itemlist->Brand'";
                                                                $app = new App;
                                                                $brands = $app->selectAll($query);
                                                                ?>
                                                                    <?php foreach ($brands as $brand): ?>
                                                                        <?php echo $brand->brand ?>
                                                                    <?php endforeach; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Color</td>
                                                                <td><?php
                                                                $query = "SELECT * FROM assetcolor WHERE id='$itemlist->Color'";
                                                                $app = new App;
                                                                $colors = $app->selectAll($query);
                                                                ?>
                                                                    <?php foreach ($colors as $color): ?>

                                                                        <?php echo $color->color ?>

                                                                    <?php endforeach; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Serial No.</td>
                                                                <td> <?php echo $itemlist->serialNo ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Barcode No.</td>
                                                                <td> <?php echo $itemlist->BarcodeNo ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Supplier</td>
                                                                <td> <?php echo $itemlist->suppName ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dimension</td>
                                                                <td> <?php echo $itemlist->Dimention ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Department</td>
                                                                <td> <?php echo $itemlist->Dimention ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Asset Holder</td>
                                                                <td><?php
                                                                $query = "SELECT * FROM assetusermasterfile WHERE userid='$itemlist->Holder'";
                                                                $app = new App;
                                                                $usermasterfiles = $app->selectAll($query);
                                                                ?>
                                                                    <?php foreach ($usermasterfiles as $usermasterfile): ?>

                                                                        <?php echo $usermasterfile->userfullname ?>

                                                                    <?php endforeach; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Item Location</td>
                                                                <td> <?php
                                                                $query = "SELECT * FROM assetlocation WHERE id='$itemlist->ItemLocation'";
                                                                $app = new App;
                                                                $locations = $app->selectAll($query);
                                                                ?>
                                                                    <?php foreach ($locations as $location): ?>

                                                                        <?php echo $location->location ?>

                                                                    <?php endforeach; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quantity</td>
                                                                <td> <?php echo $itemlist->balance_unit ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Unit</td>
                                                                <td>
                                                                    <?php
                                                                    $query = "SELECT * FROM assetunit WHERE id='$itemlist->Unit'";
                                                                    $app = new App;
                                                                    $units = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($units as $unit): ?>

                                                                        <?php echo $unit->unit ?>

                                                                    <?php endforeach; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Acquisition Date</td>
                                                                <td> <?php echo $itemlist->Adate ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Acquition Amount</td>
                                                                <td> <?php echo $itemlist->AAmount ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Life in Year</td>
                                                                <td><?php echo $itemlist->EndDate ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Depreciated Amount</td>
                                                                <td><?php echo $itemlist->Percent ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Salvage Amount</td>
                                                                <td> <?php echo $itemlist->Abre ?></td>

                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <td> <?php
                                                                $query = "SELECT * FROM assetstatus WHERE id='$itemlist->xStatus'";
                                                                $app = new App;
                                                                $statuss = $app->selectAll($query);
                                                                ?>
                                                                    <?php foreach ($statuss as $status): ?>

                                                                        <?php echo $status->status ?>

                                                                    <?php endforeach; ?>
                                                                </td>

                                                            </tr>


                                                        </tdead>
                                                    </table>

                                                </div>
                                                <div class="col-sm-6 invoice-col">
                                                    <div class="col-md-6">
                                                        <b>Asset Photo</b>
                                                        <form method="POST"
                                                            action="otherinfo.php?select=<?php echo htmlspecialchars($itemlist->id); ?>"
                                                            enctype="multipart/form-data">

                                                            <div class="form-group">
                                                                <label for="adate">Date:</label>
                                                                <input type="date" class="form-control" id="adate" name="Adate"
                                                                    value="<?php echo htmlspecialchars($itemlist->Adate ?? ''); ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="remarks">Remarks:</label>
                                                                <textarea class="form-control" id="remarks" name="Remarks"
                                                                    rows="3"><?php echo htmlspecialchars($itemlist->Remarks ?? ''); ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="startDate">Warranty Start Date:</label>
                                                                <input type="date" class="form-control" id="startDate"
                                                                    name="StartDate"
                                                                    value="<?php echo htmlspecialchars($itemlist->StartDate ?? ''); ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="endDate">Warranty End Date:</label>
                                                                <input type="date" class="form-control" id="endDate"
                                                                    name="EndDate"
                                                                    value="<?php echo htmlspecialchars($itemlist->EndDate ?? ''); ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="checkofficephoto">Upload Photo:</label>
                                                                <input type="file" name="checkofficephoto" id="checkofficephoto"
                                                                    class="form-control-file border">
                                                            </div>

                                                            <input type="hidden" name="select"
                                                                value="<?php echo htmlspecialchars($itemlist->id); ?>">

                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary btn-sm mt-2">Upload Office Photo</button>
                                                        </form>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div style="
 width: 700px;           /* Fixed width for the frame/image container */
        height: 400px;          /* Fixed height for the frame/image container */
        border: 2px solid #ccc; /* Frame border */
        padding: 5px;           /* Space between frame and image (matting) */
        margin-top: 10px;       /* Keep original margin for the entire block */
        overflow: hidden;       /* Hide any overflow if object-fit: contain is used and frame is smaller */
        box-shadow: 2px 2px 5px rgba(0,0,0,0.2); /* Optional: subtle shadow */
        display: flex;          /* Use flexbox to easily center the image if needed */
        align-items: center;    /* Center vertically */
        justify-content: center; /* Center horizontally */
    ">
                                                            <img src="<?php echo htmlspecialchars(APPURL); ?>img/<?php
                                                               if ($itemlist->checkofficephoto == NULL) { // Assuming checkofficephoto stores the main asset photo
                                                                   echo 'bg.png';
                                                               } else {
                                                                   echo htmlspecialchars($itemlist->checkofficephoto);
                                                               }
                                                               ?>" style="
                                                               width: 100%;       /* Image fills 100% of the container's width */
                                                               height: 100%;      /* Image fills 100% of the container's height */
                                                               object-fit: cover; /* This is key: Crops the image to fit the container without distortion */
                                                               display: block;    /* Ensures image behaves as a block element */
                                                           ">
                                                        </div>
                                                    </div>

                                                <?php endforeach; ?>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>

            <!-- /.card -->
        </div>

        <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../footer1.php"; ?>