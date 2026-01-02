<?php require "../../../header.php"; ?>
<?php require "../../../sidebar.php"; ?>

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
                <div class="col-md-12">
                    <div class="card">
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
                                    <div class="card-counter success">
                                        <i class="fa fa-database"></i>
                                        <span class="count-numbers"><?php
                                        $query = "SELECT COUNT(*) AS count_title FROM title ";
                                        $app = new App;
                                        $count_title = $app->selectOne($query);
                                        echo $count_title->count_title;
                                        ?></span>
                                        <span class="count-name">Data: Title</span>
                                    </div>
                                </div>

                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Title</h2>
                                            <h4>
                                                <?php
                                                $query = "SELECT COUNT(*) AS count_title FROM title ";
                                                $app = new App;
                                                $count_title = $app->selectOne($query);
                                                echo $count_title->count_title;
                                                ?>
                                            </h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Department</h2>
                                            <h4>
                                                <?php
                                                $query = "SELECT COUNT(*) AS count_dept FROM department ";
                                                $app = new App;
                                                $count_dept = $app->selectOne($query);
                                                echo $count_dept->count_dept;
                                                ?>
                                            </h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Country</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_country FROM country ";
                                            $app = new App;
                                            $count_country = $app->selectOne($query);
                                            echo $count_country->count_country;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Nationality</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_nationality FROM nationality ";
                                            $app = new App;
                                            $count_nationality = $app->selectOne($query);
                                            echo $count_nationality->count_nationality;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>VIP</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_vip FROM vip ";
                                            $app = new App;
                                            $count_vip = $app->selectOne($query);
                                            echo $count_vip->count_vip;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Agent</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_agent FROM agent ";
                                            $app = new App;
                                            $count_agent = $app->selectOne($query);
                                            echo $count_agent->count_agent;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Company</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_company FROM company ";
                                            $app = new App;
                                            $count_company = $app->selectOne($query);
                                            echo $count_company->count_company;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Group</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_groups FROM groups ";
                                            $app = new App;
                                            $count_groups = $app->selectOne($query);
                                            echo $count_groups->count_groups;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Source</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_source FROM source ";
                                            $app = new App;
                                            $count_source = $app->selectOne($query);
                                            echo $count_source->count_source;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Blocked</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_blocked FROM blocked ";
                                            $app = new App;
                                            $count_blocked = $app->selectOne($query);
                                            echo $count_blocked->count_blocked;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Packages</h2>
                                            <h4>44</h4>
                                        </div>
                                        <div class="icon"><i class="fa fa-info-circle"></i></div>
                                        <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Currency</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_currency FROM currency ";
                                            $app = new App;
                                            $count_currency = $app->selectOne($query);
                                            echo $count_currency->count_currency;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Reservation</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_reservation FROM reservation ";
                                            $app = new App;
                                            $count_reservation = $app->selectOne($query);
                                            echo $count_reservation->count_reservation;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Market</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_market FROM market ";
                                            $app = new App;
                                            $count_market = $app->selectOne($query);
                                            echo $count_market->count_market;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Origin</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_origin FROM origin ";
                                            $app = new App;
                                            $count_origin = $app->selectOne($query);
                                            echo $count_origin->count_origin;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Payment</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_payments FROM payments ";
                                            $app = new App;
                                            $count_payments = $app->selectOne($query);
                                            echo $count_payments->count_payments;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Required</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_requireds FROM requireds ";
                                            $app = new App;
                                            $count_requireds = $app->selectOne($query);
                                            echo $count_requireds->count_requireds;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Transaction</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_transactions FROM transactions ";
                                            $app = new App;
                                            $count_transactions = $app->selectOne($query);
                                            echo $count_transactions->count_transactions;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Alerts</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_alert FROM alert ";
                                            $app = new App;
                                            $count_alert = $app->selectOne($query);
                                            echo $count_alert->count_alert;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->


                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Comment</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_comments FROM comments ";
                                            $app = new App;
                                            $count_comments = $app->selectOne($query);
                                            echo $count_comments->count_comments;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Note</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_note FROM note ";
                                            $app = new App;
                                            $count_note = $app->selectOne($query);
                                            echo $count_note->count_note;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Message</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_messages FROM messages ";
                                            $app = new App;
                                            $count_messages = $app->selectOne($query);
                                            echo $count_messages->count_messages;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-2 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Accounts</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_accounts FROM accounts ";
                                            $app = new App;
                                            $count_accounts = $app->selectOne($query);
                                            echo $count_accounts->count_accounts;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->





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