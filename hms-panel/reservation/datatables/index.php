<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

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
                <?php require "../navbar.php"; ?>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="guestreservationinfo2.php" method="post">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>New Reservation</h1>
                    </div>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <!-- /.Personal Details -->
                            <div class="col-md-12 mb-3 ">
                                <div class="col-sm-6 text-right">
                                    <a href="../profile/create-profile.php" class="btn btn-primary">Add New
                                        Profile</a>
                                </div>
                                <div class="col-md-12 ">
                                    <h4 class="mb-3 text-primary">Guest and Member Information

                                    </h4>

                                    <?php
                                    $query = "SELECT * FROM hmst_customerinfo";
                                    $app = new App;
                                    $profiles = $app->selectAll($query);

                                    ?>
                                    <style>
                                    th,
                                    td {
                                        white-space: nowrap;
                                    }

                                    div.dataTables_wrapper {
                                        margin: 0 auto;
                                    }
                                    </style>

                                    <table cellpadding="3" cellspacing="0" border="0"
                                        style="width: 67%; margin: 0 auto 2em auto;">
                                        <thead>
                                            <tr>
                                                <th>Target</th>
                                                <th>Search text</th>
                                                <th>Treat as regex</th>
                                                <th>Use smart search</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="filter_global">
                                                <td>Global search</td>
                                                <td align="center"><input type="text" class="global_filter"
                                                        id="global_filter"></td>
                                                <td align="center"><input type="checkbox" class="global_filter"
                                                        id="global_regex"></td>
                                                <td align="center"><input type="checkbox" class="global_filter"
                                                        id="global_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col1" data-column="0">
                                                <td>Column - 0</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col0_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col0_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col0_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col2" data-column="1">
                                                <td>Column - 1</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col1_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col1_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col1_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col3" data-column="2">
                                                <td>Column - 2</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col2_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col2_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col2_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col4" data-column="3">
                                                <td>Column - 3</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col3_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col3_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col3_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col5" data-column="4">
                                                <td>Column - 4</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col4_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col4_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col4_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col6" data-column="5">
                                                <td>Column - 5</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col5_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col5_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col5_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col7" data-column="6">
                                                <td>Column - 6</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col6_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col6_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col6_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col8" data-column="7">
                                                <td>Column - 7</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col7_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col7_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col7_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col9" data-column="8">
                                                <td>Column - 8</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col8_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col8_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col8_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col10" data-column="9">
                                                <td>Column - 9</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col9_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col9_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col9_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col11" data-column="10">
                                                <td>Column - 10</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col10_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col10_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col10_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col12" data-column="11">
                                                <td>Column - 11</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col11_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col11_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col11_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col13" data-column="12">
                                                <td>Column - 12</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col12_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col12_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col12_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col14" data-column="13">
                                                <td>Column - 13</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col13_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col13_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col13_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col15" data-column="14">
                                                <td>Column - 14</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col14_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col14_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col14_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col16" data-column="15">
                                                <td>Column - 15</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col15_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col15_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col15_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col17" data-column="16">
                                                <td>Column - 16</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col16_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col16_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col16_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col18" data-column="17">
                                                <td>Column - 17</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col17_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col17_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col17_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col19" data-column="18">
                                                <td>Column - 18</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col18_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col18_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col18_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col20" data-column="19">
                                                <td>Column - 19</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col19_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col19_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col19_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col21" data-column="20">
                                                <td>Column - 20</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col20_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col20_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col20_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col22" data-column="21">
                                                <td>Column - 21</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col21_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col21_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col21_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col23" data-column="22">
                                                <td>Column - 22</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col22_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col22_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col22_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col24" data-column="23">
                                                <td>Column - 23</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col23_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col23_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col23_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col25" data-column="24">
                                                <td>Column - 24</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col24_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col24_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col24_smart" checked="checked"></td>
                                            </tr>
                                            <tr id="filter_col26" data-column="25">
                                                <td>Column - 25</td>
                                                <td align="center"><input type="text" class="column_filter"
                                                        id="col25_filter"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col25_regex"></td>
                                                <td align="center"><input type="checkbox" class="column_filter"
                                                        id="col25_smart" checked="checked"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table id="history" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Actions</th>



                                                <th>customerid</th>
                                                <th>sequenceid</th>
                                                <th>firstname</th>
                                                <th>lastname</th>
                                                <th>middlename</th>
                                                <th>birthday</th>
                                                <th>companyid</th>
                                                <th>groupid</th>
                                                <th>address</th>
                                                <th>tittle</th>
                                                <th>nickname</th>
                                                <th>religion</th>
                                                <th>number1</th>
                                                <th>number2</th>
                                                <th>email1</th>
                                                <th>email2</th>
                                                <th>nationality</th>
                                                <th>status</th>
                                                <th>typeprofile</th>
                                                <th>viptype</th>
                                                <th>language</th>
                                                <th>city</th>
                                                <th>province</th>
                                                <th>region</th>
                                                <th>country</th>
                                                <th>gender</th>
                                                <th>membersid</th>
                                                <th>ismember</th>
                                                <th>issenior</th>
                                                <th>seniorid</th>
                                                <th>ispwd</th>
                                                <th>pwdid</th>
                                                <th>passportid</th>

                                            </tr>
                                        </thead>
                                    </table>

                                    <script type="text/javascript">
                                    // let table = new DataTable('#history');
                                    $(document).ready(function() {
                                        $('#history').DataTable({
                                            serverSide: true,
                                            deferRender: true,
                                            ajax: 'get_customerinfo.php',
                                            columns: [{

                                                    render: function(data, type, row) {
                                                        // return '<a style="text-decoration:none;" href="index.php?select=' +
                                                        return '<a style="text-decoration:none;" href="guestreservationinfo2.php?select=' +
                                                            row.customerid +
                                                            '" class="text-success">&nbsp;&nbsp;<i class="nav-icon fas fa-caret-square-right"> Reserve</i></a>';
                                                    }
                                                },
                                                {
                                                    data: 'customerid'
                                                },
                                                {
                                                    data: 'sequenceid'
                                                },
                                                {
                                                    data: 'firstname'
                                                },
                                                {
                                                    data: 'lastname'
                                                },
                                                {
                                                    data: 'middlename'
                                                },
                                                {
                                                    data: 'birthday'
                                                },
                                                {
                                                    data: 'companyid'
                                                },
                                                {
                                                    data: 'groupid'
                                                },
                                                {
                                                    data: 'address'
                                                },
                                                {
                                                    data: 'tittle'
                                                },
                                                {
                                                    data: 'nickname'
                                                },
                                                {
                                                    data: 'religion'
                                                },
                                                {
                                                    data: 'number1'
                                                },
                                                {
                                                    data: 'number2'
                                                },
                                                {
                                                    data: 'email1'
                                                },
                                                {
                                                    data: 'email2'
                                                },
                                                {
                                                    data: 'nationality'
                                                },
                                                {
                                                    data: 'status'
                                                },
                                                {
                                                    data: 'typeprofile'
                                                },
                                                {
                                                    data: 'viptype'
                                                },
                                                {
                                                    data: 'language'
                                                },
                                                {
                                                    data: 'city'
                                                },
                                                {
                                                    data: 'province'
                                                },
                                                {
                                                    data: 'region'
                                                },
                                                {
                                                    data: 'country'
                                                },
                                                {
                                                    data: 'gender'
                                                },
                                                {
                                                    data: 'membersid'
                                                },
                                                {
                                                    data: 'ismember'
                                                },
                                                {
                                                    data: 'issenior'
                                                },
                                                {
                                                    data: 'seniorid'
                                                },
                                                {
                                                    data: 'ispwd'
                                                },
                                                {
                                                    data: 'pwdid'
                                                },
                                                {
                                                    data: 'passportid'
                                                }

                                            ],
                                            fixedColumns: true,

                                            scrollCollapse: true,
                                            scrollX: true,
                                            scrollY: 500,
                                            autoWidth: true,
                                            scrollX: true,
                                            "pageLength": 10,
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'copy', 'csv', 'excel', 'pdf', 'print'
                                            ]
                                        });

                                        function filterGlobal(table) {
                                            let filter = document.querySelector('#global_filter');
                                            let regex = document.querySelector('#global_regex');
                                            let smart = document.querySelector('#global_smart');

                                            table.search(filter.value, regex.checked, smart.checked).draw();
                                        }

                                        function filterColumn(table, i) {
                                            let filter = document.querySelector('#col' + i + '_filter');
                                            let regex = document.querySelector('#col' + i + '_regex');
                                            let smart = document.querySelector('#col' + i + '_smart');

                                            table.column(i).search(filter.value, regex.checked, smart.checked)
                                                .draw();
                                        }

                                        let table = new DataTable('#history');

                                        document.querySelectorAll('input.global_filter').forEach((el) => {
                                            el.addEventListener(el.type === 'text' ? 'keyup' : 'change',
                                                () =>
                                                filterGlobal(table)
                                            );
                                        });

                                        document.querySelectorAll('input.column_filter').forEach((el) => {
                                            let tr = el.closest('tr');
                                            let columnIndex = tr.getAttribute('data-column');

                                            el.addEventListener(el.type === 'text' ? 'keyup' : 'change',
                                                () =>
                                                filterColumn(table, columnIndex)
                                            );
                                        });
                                    });
                                    </script>

                                    <!-- <script>
                                    function filterGlobal(table) {
                                        let filter = document.querySelector('#global_filter');
                                        let regex = document.querySelector('#global_regex');
                                        let smart = document.querySelector('#global_smart');

                                        table.search(filter.value, regex.checked, smart.checked).draw();
                                    }

                                    function filterColumn(table, i) {
                                        let filter = document.querySelector('#col' + i + '_filter');
                                        let regex = document.querySelector('#col' + i + '_regex');
                                        let smart = document.querySelector('#col' + i + '_smart');

                                        table.column(i).search(filter.value, regex.checked, smart.checked).draw();
                                    }

                                    let table = new DataTable('#history');

                                    document.querySelectorAll('input.global_filter').forEach((el) => {
                                        el.addEventListener(el.type === 'text' ? 'keyup' : 'change', () =>
                                            filterGlobal(table)
                                        );
                                    });

                                    document.querySelectorAll('input.column_filter').forEach((el) => {
                                        let tr = el.closest('tr');
                                        let columnIndex = tr.getAttribute('data-column');

                                        el.addEventListener(el.type === 'text' ? 'keyup' : 'change', () =>
                                            filterColumn(table, columnIndex)
                                        );
                                    });
                                    </script> -->

                                </div>



                            </div>

                        </div>

                    </div>

                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit" name="submit">Reserve</button>
                    <a href="index.php" class="btn btn-outline-dark ml-3">Clear</a>

                </div>
                <!-- /.card -->
            </div>

            <!-- /.container-fluid -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<?php require "../../../footer1.php"; ?>