<!-- Test Kitchen View -->
<div class="container-fluid">
    <div class="kitchen-container">
        <h1>Test Kitchen Orders Layouts
        </h1>
        <h6>
            <p>Overall Status : Pending=Order Not Accepted by Kitchen, Preparing=Kitchen Accepted or Preparing the
                Order,Accepeted = Kitchen Accepeted the Order but no Preparing, Done= All Order are Served</p>
        </h6>
        <div id="orders-list">
            <?php
            $curentdate = date("Y-m-d");
            $samplecurentdate = '2025-07-11';
            //All Done Order cant view
            // $query = "SELECT * FROM posorder WHERE date='$curentdate' and overallstatus!='Done' ORDER BY time ASC ";
            // $query = "SELECT * FROM posorder WHERE date='$curentdate' ORDER BY time ASC ";
            // $query = "SELECT * FROM posorder WHERE date='$samplecurentdate' ORDER BY time ASC ";
            $query = "SELECT * FROM posorder WHERE date='$curentdate' ORDER BY time ASC ";
            $app = new App;
            $orders = $app->selectAll($query);
            ?>
            <?php foreach ($orders as $order): ?>
            <?php if ($order->overallstatus == 'Done') { ?>
            <div class="order-card served-order">
                <?php } else { ?>
                <div class="order-card ">
                    <?php } ?>
                    <div class="order-header">
                        <span class="order-id">Order ID: <?php echo $order->orderid ?></span>
                        <span class="order-timestamp"><?php echo $order->date ?> <?php echo $order->time ?></span>
                    </div>
                    <ul class="order-items-list">
                        <?php
                            $query = "SELECT * FROM posorderitems WHERE orderid='$order->orderid' ";
                            $app = new App;
                            $orderitems = $app->selectAll($query);
                            ?>
                        <?php foreach ($orderitems as $orderitem): ?>
                        <?php
                                $query = "SELECT * FROM posmenu WHERE menuid='$orderitem->menuid' ";
                                $app = new App;
                                $menus = $app->selectAll($query);
                                ?>
                        <?php foreach ($menus as $menu): ?>

                        <li class="order-item ">
                            <div class="item-main-details">


                                <span class="item-name-qty"><?php echo $menu->name ?>
                                    <span>x<?php echo $orderitem->quantity ?></span></span>
                                <span class="item-price"><?php $menupricetotal = $orderitem->quantity * $menu->price;
                                            echo number_format($menupricetotal, 2);
                                            ?></span>
                            </div>
                            <p class="item-remarks"><?php echo $orderitem->remarks ?></p>
                            <div class="item-status-actions">
                                <?php if ($orderitem->status == 'Pending') { ?>
                                <?php
                                                // date_default_timezone_set('Asia/Manila'); // Set your timezone
                                
                                                // // Example $orderitem (replace with your actual data)
                                                // $orderitem = (object) ['time' => $orderitem->time]; // 3:00 PM
                                
                                                // $currentTime = new DateTime();
                                                // $orderDateTime = new DateTime($currentTime->format('Y-m-d') . ' ' . $orderitem->time);
                                
                                                // $interval = $orderDateTime->diff($currentTime);
                                                // $totalHours = ($interval->days * 24) + $interval->h + ($interval->i / 60) + ($interval->s / 3600);
                                
                                                // // If orderDateTime is in the past, totalHours will be positive, but invert will be 1
                                                // $displayHours = $interval->invert ? -$totalHours : $totalHours;
                                
                                                // echo "" . number_format($displayHours, 2) . "";
                                                // // Positive means order time is in the future, negative means in the past.
                                
                                                ?>

                                <span
                                    class="item-current-status status-Item_<?php echo $orderitem->status ?>"><?php echo $orderitem->status ?></span>
                                <?php } else if ($orderitem->status == 'Preparing') { ?>
                                <span
                                    class="item-current-status status-Item_<?php echo $orderitem->status ?>"><?php echo $orderitem->status ?></span>
                                <?php } else { ?>
                                <span
                                    class="item-current-status status-Item_<?php echo $orderitem->status ?>"><?php echo $orderitem->status ?></span>
                                <?php } ?>
                                <div class="item-buttons">
                                    <form method="POST" action="index.php">
                                        <input type="hidden" name="orderitemid" id="orderitemid"
                                            value="<?php echo $orderitem->orderitemid ?>">

                                        <?php if ($order->overallstatus == 'Pending') { ?>
                                        <button class="item-action-btn preparing-btn" name="preparingorderitem"
                                            type="submit" disabled>
                                            Preparing</button>
                                        <button class="item-action-btn serving-btn" name="servingorederitem"
                                            type="submit" disabled>
                                            Serving</button>
                                        <?php } else { ?>

                                        <?php if ($orderitem->status == 'Pending') { ?>


                                        <button class="item-action-btn preparing-btn" name="preparingorderitem"
                                            type="submit">
                                            Preparing</button>
                                        <button class="item-action-btn serving-btn" name="servingorederitem"
                                            type="submit">
                                            Serving</button>

                                        <?php } else if ($orderitem->status == 'Preparing') { ?>

                                        <button class="item-action-btn preparing-btn disabled"
                                            disabled>Preparing</button>
                                        <button class="item-action-btn serving-btn" name="servingorederitem"
                                            type="submit">
                                            Serving</button>
                                        <?php } else { ?>

                                        <button class="item-action-btn preparing-btn disabled"
                                            disabled>Preparing</button>
                                        <button class="item-action-btn serving-btn disabled" disabled>Serving</button>
                                        <?php } ?> <?php } ?>

                                </div>
                                </form>
                            </div>
                        </li>

                        <?php
                                    $query = "SELECT pm.name AS item_name, pm.price AS item_price_from_menu, poi.quantity AS item_quantity_in_order,
                                 SUM(pm.price * poi.quantity) AS item_subtotal FROM posorderitems poi JOIN posmenu pm ON poi.menuid = pm.menuid WHERE poi.orderid = '$order->orderid'";
                                    $app = new App;
                                    $item_subtotal = $app->selectOne($query);
                                    // echo $count_table->count_table;
                                    ?>
                        <?php endforeach; ?>
                        <?php endforeach; ?>

                    </ul>
                    <div class="order-total">Total: Php <?php echo number_format($item_subtotal->item_subtotal, 2) ?>
                    </div>
                    <?php
                        $query = "SELECT COUNT(*) AS count_pen FROM posorderitems WHERE orderid='$order->orderid' and status='Pending'";
                        $app = new App;
                        $count_pen = $app->selectOne($query);
                        $count_pen->count_pen;
                        ?>
                    <?php

                        $query = "SELECT COUNT(*) AS count_ser FROM posorderitems WHERE orderid='$order->orderid' and status='Preparing'";
                        $app = new App;
                        $count_ser = $app->selectOne($query);
                        $count_ser->count_ser;
                        ?>
                    <?php

                        $query = "SELECT COUNT(*) AS count_prep FROM posorderitems WHERE orderid='$order->orderid' and status='Preparing'";
                        $app = new App;
                        $count_prep = $app->selectOne($query);
                        $count_prep->count_prep;
                        ?>

                    <?php if ($order->overallstatus == 'Accepted') { ?>
                    <?php if ($count_ser->count_ser == 0 && $count_prep->count_prep == 0 && $count_pen->count_pen == 0) { ?>
                    <div class="order-status status-Done">Done</div>
                    <?php } else if ($count_ser->count_ser > 0 && $count_prep->count_prep > 0 && $count_pen->count_pen > 0) { ?>
                    <div class="order-status status-Preparing">Preparing</div>
                    <?php } else if ($count_ser->count_ser == 0 && $count_prep->count_prep == 0 && $count_pen->count_pen > 0) { ?>
                    <div class="order-status status-Accepted">Accepted</div>
                    <?php } else {

                                } ?>

                    <?php } else if ($order->overallstatus == 'Done') { ?>
                    <div class="order-status status-Done" name="doneorder" type="submit">Done
                    </div>
                    <?php } else { ?>
                    <div class="order-status status-Pending">Pending</div>
                    <?php } ?>
                    <div class="order-actions">
                        <?php if ($order->overallstatus == 'Pending' || $order->overallstatus == '0') { ?>
                        <form method="POST" action="index.php">

                            <input type="hidden" name="orderid" id="orderid" value="<?php echo $order->orderid ?>">
                            <button class="overall-status-btn accept-order-btn " style="width:100%;" name="acceptorder"
                                type="submit">Accept
                                Order</button>
                        </form>
                        <?php } else { ?>
                        <button class="overall-status-btn accept-order-btn disabled" disabled>Accept Order</button>
                        <?php } ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>