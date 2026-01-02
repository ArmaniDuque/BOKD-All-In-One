<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>



<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmstransactions where id='$id'";
    $app = new App;
    $path = "transactions.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['save'])) {
    $code = $_POST['code'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $department = $_POST['department'];
    $categoryid = $_POST['categoryid'];
    $packageelement = isset($_POST['packageelement']) ? $_POST['packageelement'] : 0;
    // $currentdate = date("m-d-Y");
// $enddate = date("m-d-Y", strtotime("+1 year", strtotime($currentdate)));
    $packagestartdate = date("Y-m-d"); // Changed date format to Y-m-d for database consistency
    $packageenddate = date("Y-m-d", strtotime("+1 year", strtotime($packagestartdate))); // Changed date format to Y-m-d
// $packagestartdate = $_POST['packagestartdate'];
// $packageenddate = $_POST['packageenddate'];
    $beopackagelement = isset($_POST['beopackagelement']) ? $_POST['beopackagelement'] : 0;
    $seniordiscount = isset($_POST['seniordiscount']) ? $_POST['seniordiscount'] : 0;
    $rebate = isset($_POST['rebate']) ? $_POST['rebate'] : 0;
    $ratecode = isset($_POST['ratecode']) ? $_POST['ratecode'] : 0;
    $disabletrans = isset($_POST['disabletrans']) ? $_POST['disabletrans'] : 0;
    $cancelrestrans = isset($_POST['cancelrestrans']) ? $_POST['cancelrestrans'] : 0;
    $noshowtrans = isset($_POST['noshowtrans']) ? $_POST['noshowtrans'] : 0;
    $splitcharge = isset($_POST['splitcharge']) ? $_POST['splitcharge'] : 0;
    $splitcode = $_POST['splitcode'];
    $amount = $_POST['amount'];
    $mealbf = isset($_POST['mealbf']) ? $_POST['mealbf'] : 0;
    // isset($_POST['mealbf']) ? $_POST['mealbf'] : 0;
    $meall = isset($_POST['meall']) ? $_POST['meall'] : 0;
    $meald = isset($_POST['meald']) ? $_POST['meald'] : 0;
    $mealpax = $_POST['mealpax'];
    $vatperscent = $_POST['vatperscent'];
    $vatperscentdescription = $_POST['vatperscentdescription'];
    $vatpercentchartcode = $_POST['vatpercentchartcode'];
    $localperscent = $_POST['localperscent'];
    $localperscentdescription = $_POST['localperscentdescription'];
    $localpercentchartcode = $_POST['localpercentchartcode'];
    $scperscent = $_POST['scperscent'];
    $sclperscentdescription = $_POST['sclperscentdescription'];
    $scpercentchartcode = $_POST['scpercentchartcode'];
    $sccbasecharge = isset($_POST['sccbasecharge']) ? $_POST['sccbasecharge'] : 0;
    $sccgross = isset($_POST['sccgross']) ? $_POST['sccgross'] : 0;
    $sccnotdiscount = isset($_POST['sccnotdiscount']) ? $_POST['sccnotdiscount'] : 0;
    $dcoa = $_POST['dcoa'];
    $dsub1 = $_POST['dsub1'];
    $dsub2 = $_POST['dsub2'];
    $dsub3 = $_POST['dsub3'];
    $dsub4 = $_POST['dsub4'];
    $ccoa = $_POST['ccoa'];
    $csub1 = $_POST['csub1'];
    $csub2 = $_POST['csub2'];
    $csub3 = $_POST['csub3'];
    $csub4 = $_POST['csub4'];
    // $adjcode = $_POST['adjcode'];
    $adjcode = "1";
    $adjdescription = $_POST['adjdescription'];
    $query = "INSERT INTO hmstransactions (code, description, price, department, categoryid, packageelement, packagestartdate, packageenddate, beopackagelement, seniordiscount, rebate, ratecode, disabletrans, cancelrestrans, noshowtrans, splitcharge, splitcode, amount, mealbf, meall, meald, mealpax, vatperscent, vatperscentdescription, vatpercentchartcode, localperscent, localperscentdescription, localpercentchartcode, scperscent, sclperscentdescription, scpercentchartcode, sccbasecharge, sccgross, sccnotdiscount, dcoa, dsub1, dsub2, dsub3, dsub4, ccoa, csub1, csub2, csub3, csub4, adjcode, adjdescription)
VALUES(:code, :description, :price, :department, :categoryid, :packageelement, :packagestartdate, :packageenddate, :beopackagelement, :seniordiscount, :rebate, :ratecode, :disabletrans, :cancelrestrans, :noshowtrans, :splitcharge, :splitcode, :amount, :mealbf, :meall, :meald, :mealpax, :vatperscent, :vatperscentdescription, :vatpercentchartcode, :localperscent, :localperscentdescription, :localpercentchartcode, :scperscent, :sclperscentdescription,:scpercentchartcode, :sccbasecharge, :sccgross, :sccnotdiscount, :dcoa, :dsub1, :dsub2, :dsub3, :dsub4, :ccoa, :csub1, :csub2, :csub3, :csub4, :adjcode, :adjdescription)";
    $arr = [
        ":code" => $code,
        ":description" => $description,
        ":price" => $price,
        ":department" => $department,
        ":categoryid" => $categoryid,
        ":packageelement" => $packageelement,
        ":packagestartdate" => $packagestartdate,
        ":packageenddate" => $packageenddate,
        ":beopackagelement" => $beopackagelement,
        ":seniordiscount" => $seniordiscount,
        ":rebate" => $rebate,
        ":ratecode" => $ratecode,
        ":disabletrans" => $disabletrans,
        ":cancelrestrans" => $cancelrestrans,
        ":noshowtrans" => $noshowtrans,
        ":splitcharge" => $splitcharge,
        ":splitcode" => $splitcode,
        ":amount" => $amount,
        ":mealbf" => $mealbf,
        ":meall" => $meall,
        ":meald" => $meald,
        ":mealpax" => $mealpax,
        ":vatperscent" => $vatperscent,
        ":vatperscentdescription" => $vatperscentdescription,
        ":vatpercentchartcode" => $vatpercentchartcode,
        ":localperscent" => $localperscent,
        ":localperscentdescription" => $localperscentdescription,
        ":localpercentchartcode" => $localpercentchartcode,
        ":scperscent" => $scperscent,
        ":sclperscentdescription" => $sclperscentdescription,
        ":scpercentchartcode" => $scpercentchartcode,
        ":sccbasecharge" => $sccbasecharge,
        ":sccgross" => $sccgross,
        ":sccnotdiscount" => $sccnotdiscount,
        ":dcoa" => $dcoa,
        ":dsub1" => $dsub1,
        ":dsub2" => $dsub2,
        ":dsub3" => $dsub3,
        ":dsub4" => $dsub4,
        ":ccoa" => $ccoa,
        ":csub1" => $csub1,
        ":csub2" => $csub2,
        ":csub3" => $csub3,
        ":csub4" => $csub4,
        ":adjcode" => $adjcode,
        ":adjdescription" => $adjdescription,
    ];
    $path = "transactions.php";
    // Assuming $app is an object with a 'register' method for database operations
    $app->register($query, $arr, $path);
}

?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $department = $_POST['department'];
    $categoryid = $_POST['categoryid'];
    $packageelement = isset($_POST['packageelement']) ? $_POST['packageelement'] : 0;
    // $currentdate = date("m-d-Y");
// $enddate = date("m-d-Y", strtotime("+1 year", strtotime($currentdate)));
    $packagestartdate = date("Y-m-d"); // Changed date format to Y-m-d for database consistency
    $packageenddate = date("Y-m-d", strtotime("+1 year", strtotime($packagestartdate))); // Changed date format to Y-m-d
// $packagestartdate = $_POST['packagestartdate'];
// $packageenddate = $_POST['packageenddate'];
    $beopackagelement = isset($_POST['beopackagelement']) ? $_POST['beopackagelement'] : 0;
    $seniordiscount = isset($_POST['seniordiscount']) ? $_POST['seniordiscount'] : 0;
    $rebate = isset($_POST['rebate']) ? $_POST['rebate'] : 0;
    $ratecode = isset($_POST['ratecode']) ? $_POST['ratecode'] : 0;
    $disabletrans = isset($_POST['disabletrans']) ? $_POST['disabletrans'] : 0;
    $cancelrestrans = isset($_POST['cancelrestrans']) ? $_POST['cancelrestrans'] : 0;
    $noshowtrans = isset($_POST['noshowtrans']) ? $_POST['noshowtrans'] : 0;
    $splitcharge = isset($_POST['splitcharge']) ? $_POST['splitcharge'] : 0;
    $splitcode = $_POST['splitcode'];
    $amount = $_POST['amount'];
    $mealbf = isset($_POST['mealbf']) ? $_POST['mealbf'] : 0;
    // isset($_POST['mealbf']) ? $_POST['mealbf'] : 0;
    $meall = isset($_POST['meall']) ? $_POST['meall'] : 0;
    $meald = isset($_POST['meald']) ? $_POST['meald'] : 0;
    $mealpax = $_POST['mealpax'];
    $vatperscent = $_POST['vatperscent'];
    $vatperscentdescription = $_POST['vatperscentdescription'];
    $vatpercentchartcode = $_POST['vatpercentchartcode'];
    $localperscent = $_POST['localperscent'];
    $localperscentdescription = $_POST['localperscentdescription'];
    $localpercentchartcode = $_POST['localpercentchartcode'];
    $scperscent = $_POST['scperscent'];
    $sclperscentdescription = $_POST['sclperscentdescription'];
    $scpercentchartcode = $_POST['scpercentchartcode'];
    $sccbasecharge = isset($_POST['sccbasecharge']) ? $_POST['sccbasecharge'] : 0;
    $sccgross = isset($_POST['sccgross']) ? $_POST['sccgross'] : 0;
    $sccnotdiscount = isset($_POST['sccnotdiscount']) ? $_POST['sccnotdiscount'] : 0;
    $dcoa = $_POST['dcoa'];
    $dsub1 = $_POST['dsub1'];
    $dsub2 = $_POST['dsub2'];
    $dsub3 = $_POST['dsub3'];
    $dsub4 = $_POST['dsub4'];
    $ccoa = $_POST['ccoa'];
    $csub1 = $_POST['csub1'];
    $csub2 = $_POST['csub2'];
    $csub3 = $_POST['csub3'];
    $csub4 = $_POST['csub4'];
    // $adjcode = $_POST['adjcode'];
    $adjcode = "1";
    $adjdescription = $_POST['adjdescription'];
    $query = "UPDATE hmstransactions 
SET code=:code,
    description=:description,
    price=:price,
    department=:department,
    categoryid=:categoryid,
    packageelement=:packageelement,
    packagestartdate=:packagestartdate,
    packageenddate=:packageenddate,
    beopackagelement=:beopackagelement,
    seniordiscount=:seniordiscount,
    rebate=:rebate,
    ratecode=:ratecode,
    disabletrans=:disabletrans,
    cancelrestrans=:cancelrestrans,
    noshowtrans=:noshowtrans,
    splitcharge=:splitcharge,
    splitcode=:splitcode,
    amount=:amount,
    mealbf=:mealbf,
    meall=:meall,
    meald=:meald,
    mealpax=:mealpax,
    vatperscent=:vatperscent,
    vatperscentdescription=:vatperscentdescription,
    vatpercentchartcode=:vatpercentchartcode,
    localperscent=:localperscent,
    localperscentdescription=:localperscentdescription,
    localpercentchartcode=:localpercentchartcode,
    scperscent=:scperscent,
    sclperscentdescription=:sclperscentdescription,
    scpercentchartcode=:scpercentchartcode,
    sccbasecharge=:sccbasecharge,
    sccgross=:sccgross,
    sccnotdiscount=:sccnotdiscount,
    dcoa=:dcoa,
    dsub1=:dsub1,
    dsub2=:dsub2,
    dsub3=:dsub3,
    dsub4=:dsub4,
    ccoa=:ccoa,
    csub1=:csub1,
    csub2=:csub2,
    csub3=:csub3,
    csub4=:csub4,
    adjcode=:adjcode,
    adjdescription=:adjdescription
WHERE id='$id'";
    $arr = [
        ":code" => $code,
        ":description" => $description,
        ":price" => $price,
        ":department" => $department,
        ":categoryid" => $categoryid,
        ":packageelement" => $packageelement,
        ":packagestartdate" => $packagestartdate,
        ":packageenddate" => $packageenddate,
        ":beopackagelement" => $beopackagelement,
        ":seniordiscount" => $seniordiscount,
        ":rebate" => $rebate,
        ":ratecode" => $ratecode,
        ":disabletrans" => $disabletrans,
        ":cancelrestrans" => $cancelrestrans,
        ":noshowtrans" => $noshowtrans,
        ":splitcharge" => $splitcharge,
        ":splitcode" => $splitcode,
        ":amount" => $amount,
        ":mealbf" => $mealbf,
        ":meall" => $meall,
        ":meald" => $meald,
        ":mealpax" => $mealpax,
        ":vatperscent" => $vatperscent,
        ":vatperscentdescription" => $vatperscentdescription,
        ":vatpercentchartcode" => $vatpercentchartcode,
        ":localperscent" => $localperscent,
        ":localperscentdescription" => $localperscentdescription,
        ":localpercentchartcode" => $localpercentchartcode,
        ":scperscent" => $scperscent,
        ":sclperscentdescription" => $sclperscentdescription,
        ":scpercentchartcode" => $scpercentchartcode,
        ":sccbasecharge" => $sccbasecharge,
        ":sccgross" => $sccgross,
        ":sccnotdiscount" => $sccnotdiscount,
        ":dcoa" => $dcoa,
        ":dsub1" => $dsub1,
        ":dsub2" => $dsub2,
        ":dsub3" => $dsub3,
        ":dsub4" => $dsub4,
        ":ccoa" => $ccoa,
        ":csub1" => $csub1,
        ":csub2" => $csub2,
        ":csub3" => $csub3,
        ":csub4" => $csub4,
        ":adjcode" => $adjcode,
        ":adjdescription" => $adjdescription,
    ];
    $path = "transactions.php?edit='$id'";
    $app->update($query, $arr, $path);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Accounts</h1>
                </div> -->

                <?php require "../navbar.php"; ?><?php require "navbar.php"; ?>
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
                    <h1 class="h5 mb-3"><b>Transactions </h1>
                </div>
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-6 mb-3 ">
                            <div class="col-md-12 ">
                                <h5 class="mb-3 text-primary">List of Transactions
                                </h5>
                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmstransactions ";
                                $app = new App;
                                $transactionss = $app->selectAll($query);
                                ?>
                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <!-- <th>ID</th> -->
                                            <th>Code </th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transactionss as $transactions): ?>

                                        <tr>
                                            <td>
                                                <?php echo $transactions->code ?>
                                            </td>
                                            <td>
                                                <?php echo $transactions->description ?>
                                            </td>
                                            <td>
                                                <?php echo $transactions->price ?>
                                            </td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="transactions.php?edit=<?php echo $transactions->id ?>"
                                                    class=" text-success">
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="transactions.php?delete=<?php echo $transactions->id ?>"
                                                    class=" text-danger">
                                                    <i class="nav-icon fas fa fa-trash"></i>

                                                </a>

                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#history').DataTable({
                                            "pageLength": 10,
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'copy', 'csv', 'excel', 'pdf', 'print'
                                            ]
                                        });
                                    });
                                    $('#history [data-toggle="tooltip"]').tooltip({
                                        animated: 'fade',
                                        placement: 'bottom',
                                        html: true
                                    });
                                    </script>
                                </table>
                            </div>
                        </div>

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmstransactions where id='$id'";
                            $app = new App;
                            $transactions = $app->selectAll($query); ?>

                        <?php require "update-transaction.php"; ?>
                        <?php } else { ?>
                        <div class="col-md-6 mb-3 ">
                            <form method="POST" action="transactions.php">
                                <div class="card mt-3 tab-card" style="min-height: 800px;">
                                    <div class="card-header tab-card-header">
                                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one"
                                                    role="tab" aria-controls="One" aria-selected="true">Transaction</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two"
                                                    role="tab" aria-controls="Two" aria-selected="false">Accounting</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three"
                                                    role="tab" aria-controls="Three" aria-selected="false">Adjusment</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active p-3" id="one" role="tabpanel"
                                            aria-labelledby="one-tab">
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Transactions
                                                        Code</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="colFormLabelSm" name="code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="colFormLabelSm" name="description">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Price</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="price" name="price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Department</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="department">
                                                            <?php
                                                                $query = "SELECT * FROM department";
                                                                $app = new App;
                                                                $departments = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($departments as $department): ?>
                                                            <option value="<?php echo $department->id ?>">
                                                                <?php echo $department->department ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="categoryid">
                                                            <?php
                                                                $query = "SELECT * FROM department";
                                                                $app = new App;
                                                                $departments = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($departments as $department): ?>
                                                            <option value="<?php echo $department->id ?>">
                                                                <?php echo $department->department ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">

                                                    <div class="form-check">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="packageelement" value="1"
                                                                    name="packageelement"><label
                                                                    class="form-check-label">Package Element</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="ratecode" value="1" name="ratecode">
                                                                <label class="form-check-label">Rate Code</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="beopackagelement" value="1"
                                                                    name="beopackagelement"><label
                                                                    class="form-check-label">BEO
                                                                    Package Element</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="disabletrans" value="1" name="disabletrans">
                                                                <label class="form-check-label">Disable
                                                                    Transaction</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="seniordiscount" value="1"
                                                                    name="seniordiscount"><label
                                                                    class="form-check-label">Senior Discount
                                                                    Adjusment</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="cancelrestrans" value="1" name="cancelrestrans">
                                                                <label class="form-check-label">Cancel Resa
                                                                    Transcode</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="rebate" value="1" name="rebate"><label
                                                                    class="form-check-label">Rebate
                                                                    Transcode</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="noshowtrans" value="1" name="noshowtrans">
                                                                <label class="form-check-label">No Show
                                                                    Transcode</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">

                                                    <div class="form-check">
                                                        <div class="row">
                                                            <div class="col-md-8">

                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm"
                                                                        class="col-sm-4 col-form-label col-form-label-sm">Split
                                                                        Charge</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="splitcharge" value="1"
                                                                            name="splitcharge">

                                                                    </div>
                                                                </div>



                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm"
                                                                        class="col-sm-3 col-form-label col-form-label-sm">Split
                                                                        Code</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control form-control-sm"
                                                                            name="splitcode" id="splitcode">
                                                                            <option value="Per Adult">Per Adult</option>
                                                                            <option value="By Item">By Item</option>
                                                                            <option value="By Percentage">By Percentage
                                                                            </option>
                                                                            <option value="By Fixed Amount">By Fixed
                                                                                Amount</option>
                                                                            <option value="By Payment Method">By Payment
                                                                                Method</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm"
                                                                        class="col-sm-3 col-form-label col-form-label-sm">Amount</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            id="amount" name="amount">
                                                                    </div>
                                                                </div>



                                                            </div>

                                                            <div class="col-md-3">


                                                                <label for="colFormLabelSm"
                                                                    class="col-sm-12 col-form-label col-form-label-sm">Meal</label>
                                                                <div class="col-md-12">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="mealbf" value="1" name="mealbf">
                                                                    <label class="form-check-label">Breakfast</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="meall" value="1" name="meall">
                                                                    <label class="form-check-label">Lunch</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="meald" value="1" name="meald">
                                                                    <label class="form-check-label">Dinner</label>
                                                                </div>
                                                                <label for="colFormLabelSm"
                                                                    class="col-sm-12 col-form-label col-form-label-sm">Meal
                                                                    Pax</label>
                                                                <div class="col-md-12">

                                                                    <input type="number"
                                                                        class="form-control form-control-sm"
                                                                        id="mealpax" name="mealpax">



                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">

                                                    <div class="form-check">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h6 class="text-primary">VAT/ LTax / Service Charge</h6>
                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm"
                                                                        class="col-sm-4 col-form-label col-form-label-sm">VAT
                                                                        %</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="number"
                                                                            class="form-control form-control-sm"
                                                                            id="vatperscent" name="vatperscent">

                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <select class="form-control form-control-sm"
                                                                            name="vatperscentdescription"
                                                                            id="vatperscentdescription">
                                                                            <option value="INC">Inclusive</option>
                                                                            <option value="EXC">Exclusive</option>
                                                                        </select>

                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm"
                                                                        class="col-sm-4 col-form-label col-form-label-sm">Local
                                                                        Tax %</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="number"
                                                                            class="form-control form-control-sm"
                                                                            id="localperscent" name="localperscent">

                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <select class="form-control form-control-sm"
                                                                            name="localperscentdescription"
                                                                            id="localperscentdescription">
                                                                            <option value="INC">Inclusive</option>
                                                                            <option value="EXC">Exclusive</option>

                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm"
                                                                        class="col-sm-4 col-form-label col-form-label-sm">SC
                                                                        %</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="number"
                                                                            class="form-control form-control-sm"
                                                                            id="scperscent" name="scperscent">

                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <select class="form-control form-control-sm"
                                                                            name="sclperscentdescription"
                                                                            name="sclperscentdescription">
                                                                            <option value="INC">Inclusive</option>
                                                                            <option value="EXC">Exclusive</option>
                                                                        </select>

                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="col-md-6">
                                                                <h6 class="text-primary">VAT/ LTax / Service Charge-COA
                                                                    Mapping</h6>
                                                                <div class="form-group row">

                                                                    <div class="col-sm-12">
                                                                        <select class="form-control form-control-sm"
                                                                            name="vatpercentchartcode">
                                                                            <option value="">Select</option>
                                                                            <?php
                                                                                $query = "SELECT * FROM hmsrefchart";
                                                                                $app = new App;
                                                                                $charts = $app->selectAll($query);
                                                                                ?>
                                                                            <?php foreach ($charts as $chart): ?>
                                                                            <option
                                                                                value="<?php echo $chart->chartCOde ?>">
                                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                                            </option>
                                                                            <?php endforeach; ?>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">

                                                                    <div class="col-sm-12">
                                                                        <select class="form-control form-control-sm"
                                                                            name="localpercentchartcode">
                                                                            <option value="">Select</option>
                                                                            <?php
                                                                                $query = "SELECT * FROM hmsrefchart";
                                                                                $app = new App;
                                                                                $charts = $app->selectAll($query);
                                                                                ?>
                                                                            <?php foreach ($charts as $chart): ?>
                                                                            <option
                                                                                value="<?php echo $chart->chartCOde ?>">
                                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                                            </option>
                                                                            <?php endforeach; ?>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">


                                                                    <div class="col-sm-12">
                                                                        <select class="form-control form-control-sm"
                                                                            name="scpercentchartcode">
                                                                            <option value="">Select</option>
                                                                            <?php
                                                                                $query = "SELECT * FROM hmsrefchart";
                                                                                $app = new App;
                                                                                $charts = $app->selectAll($query);
                                                                                ?>
                                                                            <?php foreach ($charts as $chart): ?>
                                                                            <option
                                                                                value="<?php echo $chart->chartCOde ?>">
                                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                                            </option>
                                                                            <?php endforeach; ?>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr>


                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">

                                                    <div class="form-check">
                                                        <div class="row">


                                                            <h6 class="text-primary">Service Charge Computation </h6>

                                                            <div class="col-md-4 form-group">
                                                                <input class="" type="radio" id="sccgross" value="1"
                                                                    name="sccgross">

                                                                <label class="form-check-label">SC (BaseCharge x
                                                                    SC%)</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="" type="radio" id="sccgross" value="1"
                                                                    name="sccgross">
                                                                <label class="form-check-label">SC (Gross x
                                                                    SC%)</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="sccnotdiscount" value="1" name="sccnotdiscount">
                                                                <label class="form-check-label">SC Not
                                                                    Discounted</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade p-3" id="two" role="tabpanel"
                                            aria-labelledby="two-tab">
                                            <h5>Debit COA</h5>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Debit
                                                        COA </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="dcoa">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                        1</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="dsub1">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                        2</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="dsub2">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                        3</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="dsub3">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                        4</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="dsub4">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5>Credit COA</h5>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Credit
                                                        COA </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="ccoa">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                        1</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="csub1">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                        2</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="csub2">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                        3</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="csub3">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                        4</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="csub4">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade p-3" id="three" role="tabpanel"
                                            aria-labelledby="three-tab">
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">VAT</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm"
                                                            name="adjdescription">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Local
                                                        Tax</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm"
                                                            name="adjdescription">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Service
                                                        Charge</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm"
                                                            name="adjdescription">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $query = "SELECT * FROM hmsrefchart";
                                                                $app = new App;
                                                                $charts = $app->selectAll($query);
                                                                ?>
                                                            <?php foreach ($charts as $chart): ?>
                                                            <option value="<?php echo $chart->chartCOde ?>">
                                                                <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                            </option>

                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-primary">Update</a>
                                        </div>

                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="save">Save</button>
                                    <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                                </div>

                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>


    </section>
</div>
<!-- /.content-wrapper --><?php require "../../../footer1.php"; ?>