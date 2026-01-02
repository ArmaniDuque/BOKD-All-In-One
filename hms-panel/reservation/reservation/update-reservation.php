<?php require "../../../headerscrolldatatables.php"; ?>
<?php require "../../sidebar.php"; ?>
<style>
/* Main card container that wraps everything */



/* Right column for filters and table */
.right-column {
    flex-grow: 1;
    /* Takes up remaining space */
}

.badge {
    padding: 0.4rem 0.8rem;
    border-radius: 9999px;
    /* Fully rounded */
    font-weight: 600;
    font-size: 0.875rem;
    /* text-sm */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
}

/* Custom badge colors */
.bg-primary {
    background-color: #007bff;
    color: #fff;
}

/* Checkout */
.bg-warning {
    background-color: #ffc107;
    color: #212529;
}

/* Tentative */
.bg-success {
    background-color: #28a745;
    color: #fff;
}

/* Arrival / Inhouse */
.bg-info {
    background-color: #17a2b8;
    color: #fff;
}

/* Reserved */
.bg-danger {
    background-color: #dc3545;
    color: #fff;
}

/* No Show */
.bg-dark {
    background-color: #343a40;
    color: #fff;
}

/* Due Out */
.bg-secondary {
    background-color: #6c757d;
    color: #fff;
}

/* Unknown Status */

/* DataTables specific styles adjustments for Tailwind compatibility */
#hmsReservationsTable_wrapper {
    margin-top: 1.5rem;
}

#hmsReservationsTable_filter {
    display: none;
    /* Hide default DataTables filter as we have custom ones */
}

.filter-form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    /* Responsive grid for filters */
    gap: 1rem;
    /* margin-bottom: 2rem; */
    padding: 1.5rem;
    background-color: #f7fafc;
    border-radius: 0.75rem;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.06);
}

.filter-form-grid label {
    font-weight: 600;
    color: #4a5568;
    margin-bottom: 0.5rem;
    display: block;
    font-size: 0.9rem;
}


.filter-form-grid input:focus,
.filter-form-grid select:focus {
    border-color: #63b3ed;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
}





/* New style for selected row */
.selected-row {
    background-color: #b3e0ff !important;
    /* A more pronounced light blue for selected row */
    border: 1px solid #66b3ff !important;
    /* A slightly darker blue border */
}

/* Loading overlay for ID generation */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 1.5rem;
    z-index: 1000;
    display: none;
    /* Hidden by default */
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Accounts</h1>
                </div> -->

                <?php require "../navbar.php"; ?>
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
                    <h1 class="h5 mb-3"><b>Update Registration </h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-3 ">
                            <div class="side-buttons">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Actions</h2>
                                <p id="selectedReservationIdDisplay" class="text-sm font-semibold text-blue-700 mb-4">
                                    Selected ID: <span class="text-gray-500">None</span>
                                </p>
                                <button class="btn btn-block btn-success btn-sm" id="newReservationBtn">New
                                    Reservation</button>
                                <button class="btn btn-block btn-success btn-sm" id="updateReservationBtn"
                                    disabled>Update Reservation</button>
                                <button class="btn btn-block btn-primary btn-sm" id="cancelReservationBtn"
                                    disabled>Cancel Reservation</button>
                                <button class="btn btn-block btn-primary btn-sm" id="splitBtn" disabled>Split : <span
                                        id="selectedReservationRoomsDisplay">N/A</span></button>
                                <button class="btn btn-block btn-primary btn-sm" id="reinstateBtn"
                                    disabled>Reinstate</button>
                                <button class="btn btn-block btn-success btn-sm" id="registrationCardBtn"
                                    disabled>Registration Card</button>
                                <button class="btn btn-block btn-success btn-sm" id="billingFolioBtn" disabled>Billing
                                    Folio</button>
                            </div>


                        </div>
                        <div class=" col-md-10 mb-3 ">
                            <!-- Filtering Form -->
                            <form action="" method="GET" class="filter-form-grid">
                                <div>
                                    <label for="room_no_filter">Room No.</label>
                                    <input type="text" id="room_no_filter" name="room_no"
                                        class="form-control form-control-sm"
                                        value="<?php echo htmlspecialchars($_GET['room_no'] ?? ''); ?>">
                                </div>
                                <div>
                                    <label for="last_name_filter">Last Name</label>
                                    <input type="text" id="last_name_filter" name="last_name"
                                        class="form-control form-control-sm"
                                        value="<?php echo htmlspecialchars($_GET['last_name'] ?? ''); ?>">
                                </div>
                                <div>
                                    <label for="first_name_filter">First Name</label>
                                    <input type="text" id="first_name_filter" name="first_name"
                                        class="form-control form-control-sm"
                                        value="<?php echo htmlspecialchars($_GET['first_name'] ?? ''); ?>">
                                </div>
                                <div>
                                    <label for="reservation_status_filter">Reservation Status</label>
                                    <select id="reservation_status_filter" name="reservation_status"
                                        class="form-control form-control-sm">
                                        <option value="">All</option>
                                        <option value="Checkout"
                                            <?php echo (($_GET['reservation_status'] ?? '') == 'Checkout') ? 'selected' : ''; ?>>
                                            Checkout</option>
                                        <option value="Blocked"
                                            <?php echo (($_GET['reservation_status'] ?? '') == 'Blocked') ? 'selected' : ''; ?>>
                                            Blocked
                                        </option>
                                        <option value="Confirmed"
                                            <?php echo (($_GET['reservation_status'] ?? '') == 'Confirmed') ? 'selected' : ''; ?>>
                                            Confirmed</option>
                                        <option value="Checked-In"
                                            <?php echo (($_GET['reservation_status'] ?? '') == 'Checked-In') ? 'selected' : ''; ?>>
                                            Checked-In</option>
                                        <option value="Pending"
                                            <?php echo (($_GET['reservation_status'] ?? '') == 'Pending') ? 'selected' : ''; ?>>
                                            Pending
                                            (Unknown)</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="checkin_date_from">Check-in Date (From)</label>
                                    <input type="date" id="checkin_date_from" name="checkin_date_from"
                                        class="form-control form-control-sm"
                                        value="<?php echo htmlspecialchars($_GET['checkin_date_from'] ?? ''); ?>">
                                </div>
                                <div>
                                    <label for="checkin_date_to">Check-in Date (To)</label>
                                    <input type="date" id="checkin_date_to" name="checkin_date_to"
                                        class="form-control form-control-sm"
                                        value="<?php echo htmlspecialchars($_GET['checkin_date_to'] ?? ''); ?>">
                                </div>
                                <div class="filter-buttons">
                                    <button type="submit" class="btn btn-primary" class="search-btn">Search</button>
                                    <button type="button" class="btn btn-outline-dark ml-3"
                                        onclick="window.location.href='<?php echo basename($_SERVER['PHP_SELF']); ?>'">Clear</button>
                                </div>
                            </form>

                            <?php
                            // PHP function to get the status badge
                            function getReservationStatusBadge($roomstatus, $checkindate = null, $checkoutdate = null, $currentDate = null)
                            {
                                if ($currentDate === null) {
                                    $currentDateTime = new DateTime();
                                } else {
                                    $currentDateTime = new DateTime($currentDate);
                                }
                                $currentDateTime->setTime(0, 0, 0);

                                $checkinDateTime = $checkindate ? new DateTime($checkindate) : null;
                                if ($checkinDateTime) {
                                    $checkinDateTime->setTime(0, 0, 0);
                                }

                                $checkoutDateTime = $checkoutdate ? new DateTime($checkoutdate) : null;
                                if ($checkoutDateTime) {
                                    $checkoutDateTime->setTime(0, 0, 0);
                                }

                                $statusHtml = "";

                                if ($roomstatus === "Checkout") {
                                    $statusHtml = "<span class='badge bg-primary' name='status'>Checkout</span>";
                                } elseif ($roomstatus === "Blocked") {
                                    $statusHtml = "<span class='badge bg-warning' name='status'>Tentative</span>";
                                } elseif ($roomstatus === "Confirmed") {
                                    if ($checkinDateTime && $checkinDateTime == $currentDateTime) {
                                        $statusHtml = "<span class='badge bg-success' name='status'>Arrival</span>";
                                    } elseif ($checkinDateTime && $checkinDateTime < $currentDateTime) {
                                        $statusHtml = "<span class='badge bg-danger' name='status'>No Show</span>";
                                    } else {
                                        $statusHtml = "<span class='badge bg-info' name='status'>Reserved</span>";
                                    }
                                } elseif ($roomstatus === "Checked-In") {
                                    if ($checkoutDateTime && $checkoutDateTime == $currentDateTime) {
                                        $statusHtml = "<span class='badge bg-dark' name='status'>Due Out</span>";
                                    } else {
                                        $statusHtml = "<span class='badge bg-success' name='status'>Inhouse</span>";
                                    }
                                } else {
                                    $statusHtml = "<span class='badge bg-secondary' name='status'>Unknown Status</span>";
                                }

                                return $statusHtml;
                            }

                            // Set the current date for the examples
                            $today = date("Y-m-d");
                            
                            ; // This can be changed to date('Y-m-d') for dynamic current date
                            
                            // Database Connection Details
                            $servername = "localhost";
                            $username = "root"; // Your database username, often 'root' for local setups
                            $password = "";     // Your database password, often empty for local setups
                            $dbname = "allinonedb"; // Your database name
                            
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("<div class='text-red-500 text-center text-lg mt-8'>Connection failed: " . $conn->connect_error . "</div>");
                            }

                            // --- Unique Reservation ID Generation Logic (for AJAX call) ---
                            if (isset($_GET['action']) && $_GET['action'] === 'generate_unique_id') {
                                header('Content-Type: application/json'); // Set header for JSON response
                            
                                $conn_ajax = new mysqli($servername, $username, $password, $dbname);
                                if ($conn_ajax->connect_error) {
                                    echo json_encode(['error' => 'Database connection failed: ' . $conn_ajax->connect_error]);
                                    exit();
                                }

                                $is_unique = false;
                                $new_reservation_id = '';
                                $max_attempts = 100; // Prevent infinite loop in case of extreme collision
                                $attempt = 0;

                                while (!$is_unique && $attempt < $max_attempts) {
                                    // Generate a random ID, e.g., "RES" + 5 random digits
                                    $new_reservation_id = 'RES' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

                                    // Check if this ID already exists in the database
                                    $check_sql = "SELECT COUNT(*) AS count FROM `hmsreservations` WHERE `reservationid` = ?";
                                    $stmt = $conn_ajax->prepare($check_sql);
                                    $stmt->bind_param("s", $new_reservation_id);
                                    $stmt->execute();
                                    $check_result = $stmt->get_result();
                                    $row = $check_result->fetch_assoc();

                                    if ($row['count'] == 0) {
                                        $is_unique = true;
                                    }
                                    $attempt++;
                                }

                                $conn_ajax->close();

                                if ($is_unique) {
                                    echo json_encode(['reservation_id' => $new_reservation_id]);
                                } else {
                                    echo json_encode(['error' => 'Failed to generate a unique ID after multiple attempts.']);
                                }
                                exit(); // Stop script execution after sending JSON response
                            }


                            // --- Construct SQL Query with Filters ---
                            // Select all columns from hmsreservation and specific customer columns
                            $sql = "SELECT
                        h.reservationid, h.folioid, h.customerid, h.checkindate, h.checkoutdate,
                        h.roomtypeid, h.roomnumber, h.noofnights, h.noofrooms, h.adults, h.kids,
                        h.noofsenior, h.ratecodeid, h.roomstatus, h.rate, h.blockecodeid,
                        h.companyid, h.groupid, h.currencyid, h.eta, h.etd, h.accompany,
                        h.otherdetails, h.reservationtype, h.marketid, h.sourceid, h.agentid,
                        h.originid, h.paymenttypeid, h.cardnumber, h.cardtype, h.expdate,
                        h.discount, h.optiondate, h.badult, h.bkids, h.ladult, h.lkids,
                        h.dadult, h.dkids, h.status, h.remarks, h.created,
                        c.firstname, c.lastname, rt.code, hb.blocked, hc.company, hg.groups, hcu.currency, hrst.reservationtype,
                        hm.market , hs.source ,ha.agent ,ho.origin , hpt.description, hpt.payments
                    FROM `hmsreservations` h
                    LEFT JOIN `hmst_customerinfo` c ON h.customerid = c.customerid
                    LEFT JOIN `hmsratecode` rt ON h.ratecodeid = rt.id
                    LEFT JOIN `hmsblocked` hb ON h.blockecodeid = hb.id
                    LEFT JOIN `hmscompany` hc ON h.companyid = hc.id
                    LEFT JOIN `hmsgroups` hg ON h.groupid = hg.id
                    LEFT JOIN `hmscurrency` hcu ON h.currencyid = hcu.id
                    LEFT JOIN `hmsreservationtype` hrst ON h.reservationtype = hrst.id
                    LEFT JOIN `hmsmarket` hm ON h.marketid = hm.id
                    LEFT JOIN `hmssource` hs ON h.sourceid = hs.id
                    LEFT JOIN `hmsagent` ha ON h.agentid = ha.id
                    LEFT JOIN `hmsorigin` ho ON h.originid = ho.id
                    LEFT JOIN `hmspayments` hpt ON h.paymenttypeid = hpt.id
                    WHERE 1=1"; // Start with a true condition to easily append AND clauses
                            
                            // Apply filters from $_GET
                            if (!empty($_GET['room_no'])) {
                                $room_no = $conn->real_escape_string($_GET['room_no']);
                                $sql .= " AND h.roomnumber LIKE '%$room_no%'";
                            }
                            if (!empty($_GET['last_name'])) {
                                $last_name = $conn->real_escape_string($_GET['last_name']);
                                $sql .= " AND c.lastname LIKE '%$last_name%'";
                            }
                            if (!empty($_GET['first_name'])) {
                                $first_name = $conn->real_escape_string($_GET['first_name']);
                                $sql .= " AND c.firstname LIKE '%$first_name%'";
                            }
                            if (!empty($_GET['reservation_status'])) {
                                $reservation_status = $conn->real_escape_string($_GET['reservation_status']);
                                $sql .= " AND h.roomstatus = '$reservation_status'";
                            }
                            if (!empty($_GET['checkin_date_from'])) {
                                $checkin_date_from = $conn->real_escape_string($_GET['checkin_date_from']);
                                $sql .= " AND h.checkindate >= '$checkin_date_from'";
                            }
                            if (!empty($_GET['checkin_date_to'])) {
                                $checkin_date_to = $conn->real_escape_string($_GET['checkin_date_to']);
                                $sql .= " AND h.checkindate <= '$checkin_date_to'";
                            }
                            $sql .= " ORDER BY h.created DESC"; // Order by creation date to see newest first
                            
                            $result = $conn->query($sql);

                            // Check if query returned any rows
                            if ($result->num_rows > 0) {
                                    ?>
                            <div class="overflow-hidden">
                                <!-- DataTables will manage overflow -->
                                <!-- class="display min-w-full bg-white table table-sm"  -->
                                <table id="hmsReservationsTable" class="table-striped table-head-fixed text-nowrap"
                                    style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <!-- Explicitly list all headers based on your table columns + customer name + calculated status -->
                                            <th>Reservation ID</th>
                                            <th>Folio ID</th>
                                            <!--<th>Customer ID</th> Added back Customer ID from hmsreservation -->
                                            <th>Customer Name</th>
                                            <th>Check-in Date</th>
                                            <th>Check-out Date</th>
                                            <th>Room Type ID</th>
                                            <th>Room Number</th>
                                            <th>No. of Nights</th>
                                            <th>No. of Rooms</th>
                                            <th>Adults</th>
                                            <th>Kids</th>
                                            <th>No. of Senior</th>
                                            <th>Rate Code ID</th>
                                            <th>Room Status (DB)</th>
                                            <th>Calculated Status</th> <!-- Always the last column -->
                                            <th>Rate</th>
                                            <th>Block Code ID</th>
                                            <th>Company ID</th>
                                            <th>Group ID</th>
                                            <th>Currency ID</th>
                                            <th>ETA</th>
                                            <th>ETD</th>
                                            <th>Accompany</th>
                                            <th>Other Details</th>
                                            <th>Reservation Type</th>
                                            <th>Market ID</th>
                                            <th>Source ID</th>
                                            <th>Agent ID</th>
                                            <th>Origin ID</th>
                                            <th>Payment Type ID</th>
                                            <th>Card Number</th>
                                            <th>Card Type</th>
                                            <th>Exp Date</th>
                                            <th>Discount</th>
                                            <th>Option Date</th>
                                            <th>BAdult</th>
                                            <th>BKids</th>
                                            <th>LAdult</th>
                                            <th>LKids</th>
                                            <th>DAdult</th>
                                            <th>DKids</th>
                                            <th>Status (DB)</th> <!-- Changed to clarify it's the DB 'status' column -->
                                            <th>Remarks</th>
                                            <th>Created</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // Output data of each row with data-reservation-id attribute
                                            while ($row = $result->fetch_assoc()) {
                                                        ?>
                                        <tr
                                            data-reservation-id="<?php echo htmlspecialchars($row['reservationid']); ?>">
                                            <!-- Output data for each column based on the explicit SELECT statement -->
                                            <td><?php echo htmlspecialchars($row['reservationid']); ?></td>
                                            <td><?php echo htmlspecialchars($row['folioid'] ?? 'N/A'); ?></td>
                                            <!-- <td><?php echo htmlspecialchars($row['customerid'] ?? 'N/A'); ?></td> -->
                                            <!-- Displaying customerid from hmsreservation -->
                                            <td><?php echo htmlspecialchars(($row['firstname'] ?? '') . ' ' . ($row['lastname'] ?? '')) ?: 'N/A'; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($row['checkindate'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['checkoutdate'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['roomtypeid'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['roomnumber'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['noofnights'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['noofrooms'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['adults'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['kids'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['noofsenior'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['code'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['roomstatus']); ?></td>
                                            <td>
                                                <?php
                                                        echo getReservationStatusBadge(
                                                            $row['roomstatus'],
                                                            $row['checkindate'],
                                                            $row['checkoutdate'],
                                                            $today
                                                        );
                                                                ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($row['rate'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['blocked'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['company'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['groups'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['currency'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['eta'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['etd'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['accompany'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['otherdetails'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['reservationtype'] ?? 'N/A'); ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($row['market'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['source'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['agent'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['origin'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['payments'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['cardnumber'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['cardtype'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['expdate'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['discount'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['optiondate'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['badult'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['bkids'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['ladult'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['lkids'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['dadult'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['dkids'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['status'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['remarks'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['created'] ?? 'N/A'); ?></td>

                                        </tr>
                                        <?php
                                            }
                                                ?>
                                    <tbody>

                                </table>

                            </div>
                            <?php
                            } else {
                                echo "<p class='text-center text-gray-600 mt-8'>No reservations found matching your criteria.</p>";
                            }

                            $conn->close(); // Close the database connection
                            ?>
                            <hr>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay">
    Generating unique Reservation ID...
</div>

<!-- jQuery (required by DataTables) -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#hmsReservationsTable').DataTable({
        // Enable horizontal scrolling
        scrollX: true,
        // Enable vertical scrolling and set fixed height for table body
        scrollY: '400px', // Adjust height as needed
        // Optionally disable pagination if scrollY is used to show all data
        paging: false,
        // Enable filtering (search box) and control DOM elements
        dom: 'irt', // Only show info, table, and row count/processing
        // Make the table column widths flexible to content if no explicit width is set
        autoWidth: false,
        // Adjust scrollCollapse to true if you want table to collapse its height
        scrollCollapse: true
    });

    // Initialize selectedReservationId and disable buttons
    var selectedReservationId = null;

    function updateButtonStates() {
        // All buttons except 'New Reservation' depend on a selected ID
        $('.side-buttons button:not(#newReservationBtn)').prop('disabled', selectedReservationId === null);

        if (selectedReservationId) {
            $('#selectedReservationIdDisplay span').text(selectedReservationId);
        } else {
            $('#selectedReservationIdDisplay span').text('None');
        }
    }
    updateButtonStates(); // Set initial state

    // Handle row click
    $('#hmsReservationsTable tbody').on('click', 'tr', function() {
        // Check if the clicked row is already selected
        if ($(this).hasClass('selected-row')) {
            // If already selected, deselect it
            $(this).removeClass('selected-row');
            selectedReservationId = null;
        } else {
            // Remove 'selected-row' class from all rows
            $('#hmsReservationsTable tbody tr').removeClass('selected-row');
            // Add 'selected-row' class to the clicked row
            $(this).addClass('selected-row');
            // Get the reservation ID from the data-reservation-id attribute
            selectedReservationId = $(this).data('reservation-id');
        }

        // Update button states and display
        updateButtonStates();

        console.log('Selected Reservation ID:', selectedReservationId);
    });

    // Add click event listeners for the side buttons
    $('#newReservationBtn').on('click', function() {
        window.location.href = 'index.php';
    });

    $('#updateReservationBtn').on('click', function() {
        if (selectedReservationId) {
            window.location.href = 'update-guestreservationinfo2.php?reservationid=' +
                selectedReservationId;
        }
    });

    $('#cancelReservationBtn').on('click', function() {
        if (selectedReservationId) {
            window.location.href = 'cancelreservation.php?reservationid=' + selectedReservationId;
        }
    });

    $('#splitBtn').on('click', function() {
        if (selectedReservationId) {
            window.location.href = 'split.php?reservationid=' + selectedReservationId;
        }
    });

    $('#reinstateBtn').on('click', function() {
        if (selectedReservationId) {
            window.location.href = 'reinstate.php?reservationid=' + selectedReservationId;
        }
    });

    $('#registrationCardBtn').on('click', function() {
        if (selectedReservationId) {
            window.location.href = 'regscard-print.php?reservationid=' + selectedReservationId;
        }
    });

    $('#billingFolioBtn').on('click', function() {
        if (selectedReservationId) {
            window.location.href = 'guestbilling.php?reservationid=' + selectedReservationId;
        }
    });
});
</script>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>