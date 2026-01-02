<?php
if (isset($_GET['openpaymentModal']) && $_GET['openpaymentModal'] == 1) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("paymentmodal"));
            myModal.show();
        });
    </script>';
}
?>

<!-- Modal -->
<div class="modal fade" id="paymentmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form name="savealert" action="executemodal.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Payment <?php echo $reservationid; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Guest Name:</th>
                                <th>Armani Duqeu</th>

                                <th>Arrival:</th>
                                <th>03/27/2025</th>
                                <th>Rate:</th>
                                <th>123456</th>

                            </tr>
                            <tr>
                                <th>Room Number:</th>
                                <th>101</th>
                                <th>Departure:</th>
                                <th>03/31/2025</th>

                                <th>TR No:</th>
                                <th><?php echo $reservationid; ?></th>

                            </tr>
                        </thead>

                    </table>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Qty</th>
                                <th>Win</th>
                                <th>Check No</th>
                                <th>Supplement</th>
                                <th>Reference</th>
                                <th>Chit No</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <select class="form-control form-control-sm" style="width: 130px;" id="code"
                                        name="code">
                                        <?php
                                        $query = "SELECT * FROM transactions";
                                        $app = new App; // Assuming 'App' is your class for database interaction
                                        $transs = $app->selectAll($query);
                                        ?>
                                        <?php foreach ($transs as $trans): ?>
                                        <option value="<?php echo $trans->id ?>">
                                            <?php echo $trans->code ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </th>

                                <th>
                                    <select class="form-control form-control-sm" style="width: 150px;" id="description"
                                        name="description">
                                        <option value="">Description</option>
                                    </select>
                                </th>

                                <script>
                                const codeSelect = document.getElementById('code');
                                const descriptionSelect = document.getElementById('description');

                                codeSelect.addEventListener('change', function() {
                                    const selectedCodeId = this.value;

                                    // Fetch descriptions based on the selected code ID
                                    fetch(`get_transaction_data.php?code_id=${selectedCodeId}`)
                                        .then(response => response.json())
                                        .then(descriptions => {
                                            // Clear existing options
                                            descriptionSelect.innerHTML =
                                                '<option value="">Description</option>';

                                            // Populate description select with new options
                                            descriptions.forEach(description => {
                                                const option = document.createElement('option');
                                                option.value = description;
                                                option.textContent = description;
                                                descriptionSelect.appendChild(option);
                                            });
                                        })
                                        .catch(error => console.error("Error fetching descriptions:", error));
                                });
                                </script>
                                <th><input type="text" name="" class="form-control form-control-sm"
                                        style="width: 130px;"></th>
                                <th><input type="text" name="" class="form-control form-control-sm"
                                        style="width: 80px;"></th>
                                <th>
                                    <select style="width: 80px;" class="form-control form-control-sm">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                    </select>
                                </th>
                                <th><input type="text" name="" class="form-control form-control-sm"
                                        style="width: 130px;"></th>
                                <th><input type="text" name="" class="form-control form-control-sm"
                                        style="width: 130px;"></th>
                                <th><input type="text" name="" class="form-control form-control-sm"
                                        style="width: 130px;"></th>
                                <th><input type="text" name="" class="form-control form-control-sm"
                                        style="width: 130px;"></th>
                            </tr>
                        </tbody>


                    </table>
                </div>

                <hr>

                <div class="col-md-12 ">
                    <table class="table table-striped " id="wraptable">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Qty</th>
                                <th>Win</th>
                                <th>Check No</th>
                                <th>Supplement</th>
                                <th>Reference</th>
                                <th>Chit No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Code</td>

                                <td>Description</td>
                                <td>Amount</td>
                                <td>Qty</td>
                                <td>Win</td>
                                <td>Check No</td>
                                <td>Supplement</td>
                                <td>Reference</td>
                                <td>Chit No</td>
                                <td>Action</td>
                            </tr>

                        </tbody>
                        </script>
                    </table>
                </div>
                <hr>

        </form>
    </div>
</div>
</div>
<script src="removehtmlcode.js"></script>
<script>

</script>