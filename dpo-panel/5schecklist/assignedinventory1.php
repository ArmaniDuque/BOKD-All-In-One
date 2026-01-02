<div class="modal" id="myModal">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> Add Data Inventory to
                    <?php echo $id = $_GET['edit']; ?>
                    <?php
                    $query = "SELECT * FROM dpousermasterfile WHERE userid='$id'";
                    $app = new App;
                    $users = $app->selectAll($query);
                    foreach ($users as $user) {
                        echo '' . $user->userfullname . '<br>';
                    }
                    ?>


                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pt-3"></div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped " style="width:100%" id="example1">
                                <thead>
                                    <tr>
                                        <th width="60">ID</th>
                                        <th width="60">Storage</th>
                                        <th>Actual Location</th>
                                        <th>Filwe Description</th>
                                        <th>Category</th>
                                        <th>Security Status</th>
                                        <th>Department</th>
                                        <th>Data Types</th>
                                        <th>Retension Dates</th>
                                        <th>Created</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($countdata->alldata > 0): ?>

                                        <?php foreach ($checkdatas as $checkdata): ?>
                                            <?php
                                            $query = "SELECT * FROM dpousermasterfile WHERE userid='$check->userid'";
                                            $app = new App;
                                            $users = $app->selectAll($query);
                                            foreach ($users as $user) {
                                                $query = "SELECT * FROM dpodatainventory WHERE datadepartment='$user->userdepartment'";
                                                $app = new App;
                                                $checkdatalists = $app->selectAll($query);

                                                foreach ($checkdatalists as $checkdatalist) {
                                                    echo '  <tr> <td>' . $checkdatalist->datainventoryid . '</td>';
                                                    echo '<td>' . $checkdatalist->datastorage . '</td>';
                                                    echo '<td>' . $checkdatalist->datalocation . '</td>';
                                                    echo '<td>' . $checkdatalist->datadescription . '</td>';
                                                    echo '<td>' . $checkdatalist->datacategory . '</td>';
                                                    echo '<td>' . $checkdatalist->datasecuritystatus . '</td>';
                                                    echo '<td>' . $checkdatalist->datadepartment . '</td>';
                                                    echo '<td>' . $checkdatalist->datatypes . '</td>';
                                                    echo '<td>' . $checkdatalist->dataretensiondate . '</td>';
                                                    echo '<td>' . $checkdatalist->created_at . '</td>';
                                                    echo '<td>  <svg class="text-success-500 h-6 w-6 text-success"
                                                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                                    </svg>
                                                                            </td>                                        
                                                                        </tr>';
                                                }
                                            }
                                            ?>
                                        <?php endforeach; ?>

                                    <?php else: ?>



                                        <?php
                                        $query = "SELECT * FROM dpousermasterfile WHERE userid='$check->userid'";
                                        $app = new App;
                                        $users1 = $app->selectAll($query);

                                        foreach ($users1 as $user1) {
                                            // echo $user1->userdepartment;
                                            $query = "SELECT * FROM dpodatainventory WHERE datadepartment='$user1->userdepartment'";
                                            $app = new App;
                                            $checkdatalists1 = $app->selectAll($query);


                                            foreach ($checkdatalists1 as $checkdatalist1) {
                                                // echo $checkdatalist1->datadepartment;
                                                echo '  <tr><td>' . $checkdatalist1->datainventoryid . '</td>';
                                                echo '<td>' . $checkdatalist1->datastorage . '</td>';
                                                echo '<td>' . $checkdatalist1->datalocation . '</td>';
                                                echo '<td>' . $checkdatalist1->datadescription . '</td>';
                                                echo '<td>' . $checkdatalist1->datacategory . '</td>';
                                                echo '<td>' . $checkdatalist1->datasecuritystatus . '</td>';
                                                echo '<td>' . $checkdatalist1->datadepartment . '</td>';
                                                echo '<td>' . $checkdatalist1->datatypes . '</td>';
                                                echo '<td>' . $checkdatalist1->dataretensiondate . '</td>';
                                                echo '<td>' . $checkdatalist1->created_at . '</td>';
                                                echo '<td>  <svg class="text-success-500 h-6 w-6 text-success"
                                                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                                    </svg>
                                                                            </td>                                        
                                                                        </tr>';
                                            }
                                        }
                                        ?>

                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>



<script type="text/javascript">
    // $('#myModal').on('shown.bs.modal', function() {
    //     $('#myInput').trigger('focus')
    // })


    $(document).ready(function () {
        $('#example1').DataTable({
            "pageLength": 8,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });



    });


    $('#example1 [data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'bottom',
        html: true
    });
</script><?php require "../../footer1.php"; ?>