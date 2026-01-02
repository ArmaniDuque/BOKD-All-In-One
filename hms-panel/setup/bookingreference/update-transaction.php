<div class="col-md-6 mb-3 ">
    <form method="POST" action="transactions.php">
        <?php foreach ($transactions as $transaction): ?>
        <div class="card mt-3 tab-card" style="min-height: 800px;">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One"
                            aria-selected="true">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two"
                            aria-selected="false">Accounting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab"
                            aria-controls="Three" aria-selected="false">Adjusment</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Transactions
                                Code</label>
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm" name="id"
                                    value="<?php echo $transaction->id ?>">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="code"
                                    value="<?php echo $transaction->code ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="description" value="<?php echo $transaction->description ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="price"
                                    value="<?php echo $transaction->price ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm"
                                class="col-sm-3 col-form-label col-form-label-sm">Department</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="department">

                                    <option value="<?php echo $transaction->department ?>">
                                        <?php echo $transaction->department ?></option>

                                    <?php
                                    $query = "SELECT * FROM hmsdepartment";
                                    $app = new App;
                                    $departments = $app->selectAll($query);
                                    ?>
                                    <?php foreach ($departments as $department): ?>
                                    <option value="<?php echo $department->id ?>">
                                        <?php echo $department->department ?>
                                    </option>
                                    <?php endforeach;
         ?>
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

                                    <option value="<?php echo $transaction->categoryid ?>">
                                        <?php echo $transaction->categoryid ?>
                                    </option>
                                    <?php
                                        $query = "SELECT * FROM hmsdepartment";
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
                                        <input class="form-check-input" type="checkbox" name="packageelement"
                                            id="packageelement" value="1" <?php if ($transaction->packageelement == "1") {
                                                    echo "checked";
                                                } else {
                                                } ?>>
                                        <label class="form-check-label">Package
                                            Element</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" <?php if ($transaction->ratecode == "1") {
                                                echo "checked";
                                            } else {
                                            } ?> id="ratecode" value="1" name="ratecode">
                                        <label class="form-check-label">Rate Code</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" <?php if ($transaction->beopackagelement == "1") {
                                                echo "checked";
                                            } else {
                                            } ?> id="beopackagelement" value="1" name="beopackagelement"><label
                                            class="form-check-label">BEO
                                            Package Element</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" <?php if ($transaction->disabletrans == "1") {
                                                echo "checked";
                                            } else {
                                            } ?> id="disabletrans" value="1" name="disabletrans">
                                        <label class="form-check-label">Disable
                                            Transaction</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" <?php if ($transaction->seniordiscount == "1") {
                                                echo "checked";
                                            } else {
                                            } ?> id="seniordiscount" value="1" name="seniordiscount"><label
                                            class="form-check-label">Senior Discount
                                            Adjusment</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" <?php if ($transaction->cancelrestrans == "1") {
                                                echo "checked";
                                            } else {
                                            } ?> id="cancelrestrans" value="1" name="cancelrestrans">
                                        <label class="form-check-label">Cancel Resa
                                            Transcode</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" <?php if ($transaction->rebate == "1") {
                                                echo "checked";
                                            } else {
                                            } ?> id="rebate" value="1" name="rebate"><label
                                            class="form-check-label">Rebate
                                            Transcode</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" <?php if ($transaction->noshowtrans == "1") {
                                                echo "checked";
                                            } else {
                                            } ?> id="noshowtrans" value="1" name="noshowtrans">
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
                                                <input class="form-check-input" type="checkbox" <?php if ($transaction->splitcharge == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?> id="splitcharge" value="1" name="splitcharge">

                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Split
                                                Code</label>
                                            <div class="col-sm-8">
                                                <select class="form-control form-control-sm" name="splitcode"
                                                    id="splitcode">
                                                    <option value="<?php echo $transaction->splitcode ?>">
                                                        <?php echo $transaction->splitcode ?>
                                                    </option>
                                                    <option value=" Per Adult">Per
                                                        Adult</option>
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
                                                <input type="text" class="form-control form-control-sm" id="amount"
                                                    name="amount" value="<?php echo $transaction->amount ?>">
                                            </div>
                                        </div>



                                    </div>

                                    <div class="col-md-3">


                                        <label for="colFormLabelSm"
                                            class="col-sm-12 col-form-label col-form-label-sm">Meal</label>
                                        <div class="col-md-12">
                                            <input class="form-check-input" type="checkbox" <?php if ($transaction->mealbf == "1") {
                                                    echo "checked";
                                                } else {
                                                } ?> id="mealbf" value="1" name="mealbf">
                                            <label class="form-check-label">Breakfast</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="form-check-input" type="checkbox" <?php if ($transaction->meall == "1") {
                                                    echo "checked";
                                                } else {
                                                } ?> id="meall" value="1" name="meall">
                                            <label class="form-check-label">Lunch</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="form-check-input" type="checkbox" <?php if ($transaction->meald == "1") {
                                                    echo "checked";
                                                } else {
                                                } ?> id="meald" value="1" name="meald">
                                            <label class="form-check-label">Dinner</label>
                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-12 col-form-label col-form-label-sm">Meal
                                            Pax</label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-sm" id="mealpax"
                                                name="mealpax" value="<?php echo $transaction->mealpax ?>">
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
                                                <input type="number" class="form-control form-control-sm"
                                                    id="vatperscent" name="vatperscent"
                                                    value="<?php echo $transaction->vatperscent ?>">

                                            </div>
                                            <div class="col-sm-5">
                                                <select class="form-control form-control-sm"
                                                    name="vatperscentdescription" id="vatperscentdescription">
                                                    <option value="<?php echo $transaction->vatperscentdescription ?>">
                                                        <?php echo $transaction->vatperscentdescription ?> </option>
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
                                                <input type="number" class="form-control form-control-sm"
                                                    id="localperscent" name="localperscent"
                                                    value="<?php echo $transaction->localperscent ?>">

                                            </div>
                                            <div class="col-sm-5">
                                                <select class="form-control form-control-sm"
                                                    name="localperscentdescription" id="localperscentdescription">
                                                    <option
                                                        value="<?php echo $transaction->localperscentdescription ?>">
                                                        <?php echo $transaction->localperscentdescription ?>
                                                    </option>
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
                                                <input type="number" class="form-control form-control-sm"
                                                    id="scperscent" name="scperscent"
                                                    value="<?php echo $transaction->scperscent ?>">

                                            </div>
                                            <div class="col-sm-5">
                                                <select class="form-control form-control-sm"
                                                    name="sclperscentdescription" name="sclperscentdescription">
                                                    <option value="<?php echo $transaction->sclperscentdescription ?>">
                                                        <?php echo $transaction->sclperscentdescription ?>
                                                    </option>
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
                                                <select class="form-control form-control-sm" name="vatpercentchartcode">
                                                    <?php if ($transaction->vatpercentchartcode != null) {
                                                            $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->vatpercentchartcode'";
                                                            $app = new App;
                                                            $chart1s = $app->selectAll($query);
                                                            ?>
                                                    <?php foreach ($chart1s as $chart1): ?>
                                                    <option value="<?php echo $chart1->chartCOde ?>">
                                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                                    </option>
                                                    <?php endforeach; ?>

                                                    <?php
                                                   $query = "SELECT * FROM hmsrefchart";
                                                   $app = new App;
                                                   $charts = $app->selectAll($query);
                                                   ?>
                                                    <?php foreach ($charts as $chart): ?>
                                                    <option value="<?php echo $chart->chartCOde ?>">
                                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                    </option>
                                                    <?php endforeach;
                                                      ?>
                                                    <?php  } else { ?>
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
                                                    <?php endforeach;
                                                      }?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <select class="form-control form-control-sm"
                                                    name="localpercentchartcode">
                                                    <?php if ($transaction->localpercentchartcode != null) {
                                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->localpercentchartcode'";
                                                        $app = new App;
                                                        $chart1s = $app->selectAll($query);
                                                        ?>
                                                    <?php foreach ($chart1s as $chart1): ?>
                                                    <option value="<?php echo $chart1->chartCOde ?>">
                                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                                    </option>
                                                    <?php endforeach; ?>

                                                    <?php
                                                        $query = "SELECT * FROM hmsrefchart";
                                                        $app = new App;
                                                        $charts = $app->selectAll($query);
                                                        ?>
                                                    <?php foreach ($charts as $chart): ?>
                                                    <option value="<?php echo $chart->chartCOde ?>">
                                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                    </option>
                                                    <?php endforeach;
                                                        ?>
                                                    <?php } else { ?>
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
                                                    <?php endforeach;
                                                    } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row">


                                            <div class="col-sm-12">
                                                <select class="form-control form-control-sm" name="scpercentchartcode">

                                                    <?php if ($transaction->scpercentchartcode != null) {
                                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->scpercentchartcode'";
                                                        $app = new App;
                                                        $chart1s = $app->selectAll($query);
                                                        ?>
                                                    <?php foreach ($chart1s as $chart1): ?>
                                                    <option value="<?php echo $chart1->chartCOde ?>">
                                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                                    </option>
                                                    <?php endforeach; ?>

                                                    <?php
                                                        $query = "SELECT * FROM hmsrefchart";
                                                        $app = new App;
                                                        $charts = $app->selectAll($query);
                                                        ?>
                                                    <?php foreach ($charts as $chart): ?>
                                                    <option value="<?php echo $chart->chartCOde ?>">
                                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                                    </option>
                                                    <?php endforeach;
                                                        ?>
                                                    <?php } else { ?>
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
                                                    <?php endforeach;
                                                    } ?>
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
                                        <input class="" type="radio" id="sccbasecharge" value="1" name="sccbasecharge" <?php if ($transaction->sccbasecharge == "1") {
                                            echo "checked";
                                        } else {
                                        } ?>>

                                        <label class="form-check-label">SC (BaseCharge x
                                            SC%)</label>
                                    </div>

                                    <div class="col-md-4">
                                        <input class="" type="radio" id="sccgross" value="1" name="sccgross" <?php if ($transaction->sccgross == "1") {
                                            echo "checked";
                                        } else {
                                        } ?>>
                                        <label class="form-check-label">SC (Gross x
                                            SC%)</label>
                                    </div>

                                    <div class="col-md-4">
                                        <input class="form-check-input" type="checkbox" id="sccnotdiscount" value="1" <?php if ($transaction->sccnotdiscount == "1") {
                                            echo "checked";
                                        } else {
                                        } ?> name="sccnotdiscount">
                                        <label class="form-check-label">SC Not
                                            Discounted</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                    <h5>Debit COA</h5>
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Debit
                                COA </label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="dcoa">
                                    <?php if ($transaction->dcoa != null) {
                                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->dcoa'";
                                                        $app = new App;
                                                        $chart1s = $app->selectAll($query);
                                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                                        $query = "SELECT * FROM hmsrefchart";
                                                        $app = new App;
                                                        $charts = $app->selectAll($query);
                                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                1</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="dsub1">
                                    <?php if ($transaction->dsub1 != null) {
                                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->dsub1'";
                                                        $app = new App;
                                                        $chart1s = $app->selectAll($query);
                                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                                        $query = "SELECT * FROM hmsrefchart";
                                                        $app = new App;
                                                        $charts = $app->selectAll($query);
                                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                2</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="dsub2">

                                    <?php if ($transaction->dsub2 != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->dsub2'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                3</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="dsub3">

                                    <?php if ($transaction->dsub3 != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->dsub3'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>

                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                4</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="dsub4">
                                    <?php if ($transaction->dsub4 != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->dsub4'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h5>Credit COA</h5>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Credit
                                COA </label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="ccoa">
                                    <?php if ($transaction->ccoa != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->ccoa'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                1</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="csub1">
                                    <?php if ($transaction->csub1 != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->csub1'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>
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
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                2</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="csub2">
                                    <?php if ($transaction->csub2 != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->csub2'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                3</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="csub3">
                                    <?php if ($transaction->csub3 != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->csub3'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                4</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="csub4">
                                    <?php if ($transaction->csub4 != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->csub4'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">VAT</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="adjdescription">
                                    <?php if ($transaction->dsub1 != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->dsub1'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Local
                                Tax</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="adjdescription">
                                    <?php if ($transaction->adjdescription != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->adjdescription'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Service
                                Charge</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" name="adjdescription">
                                    <?php if ($transaction->adjdescription != null) {
                                        $query = "SELECT * FROM hmsrefchart where chartCOde='$transaction->adjdescription'";
                                        $app = new App;
                                        $chart1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($chart1s as $chart1): ?>
                                    <option value="<?php echo $chart1->chartCOde ?>">
                                        <?php echo $chart1->chartCOde . '-' . $chart1->chartName; ?>
                                    </option>
                                    <?php endforeach; ?>

                                    <?php
                                        $query = "SELECT * FROM hmsrefchart";
                                        $app = new App;
                                        $charts = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($charts as $chart): ?>
                                    <option value="<?php echo $chart->chartCOde ?>">
                                        <?php echo $chart->chartCOde . '-' . $chart->chartName; ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                    <?php } else { ?>
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
                                    <?php endforeach;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-primary">Update</a>
                </div>

            </div>
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary" type="submit" name="update">Update</button>
            <a href="transactions.php" class="btn btn-outline-dark ml-3">Close</a>

        </div>
        <?php endforeach; ?>
    </form>
</div>