<!-- Button trigger modal -->

<button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#lookupmodal">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
        viewBox="0 0 16 16">
        <path
            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
    </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="lookupmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">lookup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">


                    <?php
                    $query = "SELECT * FROM t_customerinfo";
                    $app = new App;
                    $profiles = $app->selectAll($query);
                    ?>

                    <div class="card-body ">
                        <div class="col-sm-6 text-right">
                            <a href="create-profile.php" class="btn btn-primary">Add New Profile</a>
                        </div>
                        <table class="table table-striped " style="width:100%" id="profile">
                            <thead>
                                <tr>
                                    <th>Type of Guest</th>
                                    <th>ID</th>

                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($profiles as $profile): ?>
                                <tr>
                                    <td>
                                        <?php
                                            if ($profile->ismember == '1') {
                                                echo ' <span class="badge bg-primary ">Member</span>';
                                            } else {
                                                echo ' <span class="badge bg-success ">Guest</span>';
                                            }
                                            ?>
                                    </td>
                                    <td><?php echo $profile->customerid ?></td>
                                    <td><?php echo $profile->firstname ?></td>
                                    <td><?php echo $profile->middlename ?></td>
                                    <td><?php echo $profile->lastname ?></td>
                                    <td><?php echo $profile->email1 ?></td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('#profile').DataTable({
                                    "pageLength": 10,
                                    dom: 'Bfrtip',
                                    buttons: [
                                        'copy', 'csv', 'excel', 'pdf', 'print'
                                    ]
                                });
                            });
                            $('#profile [data-toggle="tooltip"]').tooltip({
                                animated: 'fade',
                                placement: 'bottom',
                                html: true
                            });
                            </script>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" name="submit">Save</button>
            </div>
        </div>
    </div>
</div>