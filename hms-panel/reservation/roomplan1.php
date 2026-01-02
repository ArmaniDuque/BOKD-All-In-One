<div class="tab-pane fade" id="custom-content-below-6" role="tabpanel" aria-labelledby="custom-content-below-6-tab">
    <div class="card-body ">
        <div class="col-sm-6 text-right">
            <h3>Room Plan</h3>
        </div>

        <table class="table table-striped " style="width:100%" id="waitinglist">

            <thead>
                <tr>
                    <th>nm</th>
                    <?php
                    // Array of month names
                    $months = array(
                        "1"
                        // ,
                        // "2",
                        // "3",
                        // "4",
                        // "5",
                        // "6",
                        // "7",
                        // "8",
                        // "9",
                        // "10",
                        // "11",
                        // "12"
                    );

                    // Current year
                    $currentYear = date('Y');
                    echo "1";
                    // Loop through each month
                    foreach ($months as $month) {
                        // Get the month number (1-12)
                        $monthNumber = array_search($month, $months) + 1;

                        // Get the number of days in the month
                        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $currentYear);

                        // Print the month name and its days
                        for ($day = 1; $day <= $daysInMonth; $day++) {
                            echo "<th>";
                            echo " " . $month . "-" . $day . "-" . $currentYear . " ";
                            echo "</th>";
                        }

                    }

                    ?>


                </tr>

            </thead>
            <tbody>

                <tr>
                    <td>Name:</td>
                    <?php
                    // Array of month names
                    $months = array(
                        "1"
                        // ,
                        // "2",
                        // "3",
                        // "4",
                        // "5",
                        // "6",
                        // "7",
                        // "8",
                        // "9",
                        // "10",
                        // "11",
                        // "12"
                    );

                    // Current year
                    $currentYear = date('Y');

                    // Loop through each month
                    foreach ($months as $month) {
                        // Get the month number (1-12)
                        $monthNumber = array_search($month, $months) + 1;

                        // Get the number of days in the month
                        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $currentYear);

                        // Print the month name and its days
                        for ($day = 1; $day <= $daysInMonth; $day++) {
                            echo "<td>";
                            echo " " . $month . "-" . $day . "-" . $currentYear . " ";
                            echo "</td>";
                        }

                    }

                    ?>


                </tr>
                <tr>
                    <td>Name:</td>
                    <?php
                    // Array of month names
                    $months = array(
                        "1"
                        // ,
                        // "2",
                        // "3",
                        // "4",
                        // "5",
                        // "6",
                        // "7",
                        // "8",
                        // "9",
                        // "10",
                        // "11",
                        // "12"
                    );

                    // Current year
                    $currentYear = date('Y');

                    // Loop through each month
                    foreach ($months as $month) {
                        // Get the month number (1-12)
                        $monthNumber = array_search($month, $months) + 1;

                        // Get the number of days in the month
                        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $currentYear);

                        // Print the month name and its days
                        for ($day = 1; $day <= $daysInMonth; $day++) {
                            echo "<td>";
                            echo " " . $month . "-" . $day . "-" . $currentYear . " ";
                            echo "</td>";
                        }

                    }

                    ?>


                </tr>
                <tr>
                    <td>Name:</td>
                    <?php
                    // Array of month names
                    $months = array(
                        "1"
                        // ,
                        // "2",
                        // "3",
                        // "4",
                        // "5",
                        // "6",
                        // "7",
                        // "8",
                        // "9",
                        // "10",
                        // "11",
                        // "12"
                    );

                    // Current year
                    $currentYear = date('Y');

                    // Loop through each month
                    foreach ($months as $month) {
                        // Get the month number (1-12)
                        $monthNumber = array_search($month, $months) + 1;

                        // Get the number of days in the month
                        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $currentYear);

                        // Print the month name and its days
                        for ($day = 1; $day <= $daysInMonth; $day++) {
                            echo "<td>";
                            echo " " . $month . "-" . $day . "-" . $currentYear . " ";
                            echo "</td>";
                        }

                    }

                    ?>


                </tr>


            </tbody>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#waitinglist').DataTable({
                        "pageLength": 1,
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]



                    });



                });


                $('#waitinglist [data-toggle="tooltip"]').tooltip({

                    animated: 'fade',
                    placement: 'bottom',
                    html: true
                });
            </script>
        </table>
    </div>
</div>