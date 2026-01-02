<?php

$ratecodeid = 2;
$roomtypeid = 2;
$daytodayrate = date("l");
$daytodayrate = date("l");
$daytodayrates = strtolower($daytodayrate);

$query = "SELECT * FROM hmsratecodedetails where ratecodeid=$ratecodeid and roomtypeid=$roomtypeid";
$app = new App;
$dayrates = $app->selectOne($query);
$dayrates->$daytodayrates;

?><input type="text" class="form-control form-control-sm" name="rate" id="rate"
    value="<?php echo $dayrates->$daytodayrates ?>">