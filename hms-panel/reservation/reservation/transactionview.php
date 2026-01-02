<?php if (isset($_GET['viewid'])) {
    if (isset($_GET['openviewModal']) && $_GET['openviewModal'] == 1) {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("viewModal"));
            myModal.show();
        });
    </script>';
    }
    ?>
<!-- Modal -->
<div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Transaction Details
                    <?php
                        $trasactionviewid = $_GET['viewid'];
                        // echo $trasactionviewid = $pay->guestfolio_id;
                        //  MY Prodblem dito pag unang load sa guest billing 0 or null data ang nakukuha kaya wala lumalbas
                        echo $reservationid = $_GET['reservationid'];
                        ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 ">
                    <table class="table table-sm ">
                        <thead>
                            <?php
                                $query = "SELECT * FROM hmsguestfolio where id=$trasactionviewid ";
                                $app = new App;
                                $viewdetails = $app->selectAll($query);
                                ?>
                            <?php foreach ($viewdetails as $viewdetail): ?>
                            <tr>
                                <th>DATE</th>
                                <td><?php echo $viewdetail->date ?></td>
                            </tr>
                            <tr>
                                <th>Code-Description</th>
                                <td><?php
                                        $query = "SELECT * FROM hmstransactions WHERE id=$viewdetail->transactionid";
                                        $app = new App;
                                        $transid = $app->selectAll($query);
                                        foreach ($transid as $transid) {
                                            echo $transid->code . '-' . $transid->description;
                                        }
                                        ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td><?php echo $viewdetail->amount ?></td>
                            </tr>
                            <tr>
                                <th>QTY</th>
                                <td><?php echo $viewdetail->qty ?></td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td><?php echo number_format((float) ($viewdetail->qty * $viewdetail->amount), 2); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Window</th>
                                <td><?php echo $viewdetail->win ?></td>
                            </tr>
                            <tr>
                                <th>Check No.</th>
                                <td><?php echo $viewdetail->checkno ?></td>
                            </tr>
                            <tr>
                                <th>Supplement</th>
                                <td><?php echo $viewdetail->supplement ?></td>
                            </tr>
                            <tr>
                                <th>Reference</th>
                                <td><?php echo $viewdetail->reference ?></td>
                            </tr>
                            <tr>
                                <th>Chit No.</th>
                                <td><?php echo $viewdetail->chitno ?></td>
                            </tr>
                            <tr>
                                <th>Transaction By User</th>
                                <td><?php echo $viewdetail->userid ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </thead>
                    </table>
                </div>
                <hr>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="guestbilling.php?reservationid=<?php echo $reservationid; ?>">
                    Close
                </a>
            </div>
        </div>
    </div>
</div>

</div>
<?php } ?>

<!-- <script src="removehtmlcode.js"></script> -->