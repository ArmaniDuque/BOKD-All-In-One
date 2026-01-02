<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>

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
                <?php require "navbar.php"; ?>
                <?php require "count.php"; ?>
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
                    <h1 class="h5 mb-3"><b>Booking Reference </h1>
                </div>


                <div class="card-body">

                    <style>
                    .card-counter {
                        box-shadow: 2px 2px 10px #DADADA;
                        margin: 5px;
                        padding: 20px 10px;
                        background-color: #fff;
                        height: 53px;
                        border-radius: 5px;
                        transition: .3s linear all;
                    }

                    .card-counter:hover {
                        box-shadow: 4px 4px 20px #DADADA;
                        transition: .3s linear all;
                    }

                    .card-counter.primary {
                        background-color: #007bff;
                        color: #FFF;
                    }

                    .card-counter.danger {
                        background-color: #ef5350;
                        color: #FFF;
                    }

                    .card-counter.success {
                        background-color: #66bb6a;
                        color: #FFF;
                    }

                    .card-counter.info {
                        background-color: #26c6da;
                        color: #FFF;
                    }

                    .card-counter i {
                        font-size: 2em;
                        opacity: 0.2;
                    }

                    .card-counter .count-numbers {
                        position: absolute;
                        /* right: 35px; */
                        top: 5px;
                        font-size: 22px;
                        display: block;
                    }

                    .card-counter .count-name {

                        position: absolute;
                        right: 35px;
                        top: 29px;
                        font-style: italic;
                        text-transform: capitalize;
                        opacity: 0.5;
                        display: block;
                        font-size: 18px;
                    }
                    </style>
                    <div class="row">

                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_title->count_title == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers"><?php

                                echo $count_title->count_title;
                                ?></span>
                                <span class="count-name">Data: Title</span>
                            </div>
                        </div>

                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_dept->count_dept == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_dept->count_dept;
                                    ?>
                                </span>
                                <span class="count-name">Data: Department</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_country->count_country == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_country->count_country;
                                    ?>
                                </span>
                                <span class="count-name">Data: Country</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_country->count_country == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_country->count_country;
                                    ?>
                                </span>
                                <span class="count-name">Data: Country</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_nationality->count_nationality == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_nationality->count_nationality;
                                    ?>
                                </span>
                                <span class="count-name">Data: Nationality</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_vip->count_vip == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_vip->count_vip;
                                    ?>
                                </span>
                                <span class="count-name">Data: VIP</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_agent->count_agent == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_agent->count_agent;
                                    ?>
                                </span>
                                <span class="count-name">Data: Agent</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_company->count_company == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_company->count_company;
                                    ?>
                                </span>
                                <span class="count-name">Data: Company</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_groups->count_groups == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_groups->count_groups;
                                    ?>
                                </span>
                                <span class="count-name">Data: Group</span>
                            </div>
                        </div>

                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_source->count_source == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_source->count_source;
                                    ?>
                                </span>
                                <span class="count-name">Data: Source</span>
                            </div>
                        </div>

                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_blocked->count_blocked == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_blocked->count_blocked;
                                    ?>
                                </span>
                                <span class="count-name">Data: Blocked</span>
                            </div>
                        </div>

                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_packages->count_packages == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_packages->count_packages;
                                    ?>
                                </span>
                                <span class="count-name">Data: Packages</span>
                            </div>
                        </div>

                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_currency->count_currency == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_currency->count_currency;
                                    ?>
                                </span>
                                <span class="count-name">Data: Currency</span>
                            </div>
                        </div>

                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_reservation->count_reservation == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_reservation->count_reservation;
                                    ?>
                                </span>
                                <span class="count-name">Data: Reservation</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_market->count_market == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_market->count_market;
                                    ?>
                                </span>
                                <span class="count-name">Data: Market</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_origin->count_origin == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_origin->count_origin;
                                    ?>
                                </span>
                                <span class="count-name">Data: Origin</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_payments->count_payments == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_payments->count_payments;
                                    ?>
                                </span>
                                <span class="count-name">Data: Payment</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_requireds->count_requireds == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_requireds->count_requireds;
                                    ?>
                                </span>
                                <span class="count-name">Data: Required</span>
                            </div>
                        </div>

                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_transactions->count_transactions == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_transactions->count_transactions;
                                    ?>
                                </span>
                                <span class="count-name">Data: Transaction</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_alert->count_alert == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_alert->count_alert;
                                    ?>
                                </span>
                                <span class="count-name">Data: Alert</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_comments->count_comments == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_comments->count_comments;
                                    ?>
                                </span>
                                <span class="count-name">Data: Comments</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_note->count_note == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_note->count_note;
                                    ?>
                                </span>
                                <span class="count-name">Data: Notes</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_messages->count_messages == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php
                                    echo $count_messages->count_messages;
                                    ?>
                                </span>
                                <span class="count-name">Data: Messages</span>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-2 col-6">
                            <div
                                class="card-counter <?php echo ($count_accounts->count_accounts == 0) ? "danger" : "success"; ?>">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                    <?php

                                    echo $count_accounts->count_accounts;
                                    ?>
                                </span>
                                <span class="count-name">Data: Accounts</span>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>