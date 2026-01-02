<?php
$query = "SELECT COUNT(*) AS count_title FROM  hmstitle ";
$app = new App;
$count_title = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_dept FROM  hmsdepartment ";
$app = new App;
$count_dept = $app->selectOne($query);


$query = "SELECT COUNT(*) AS count_country FROM  hmscountry ";
$app = new App;
$count_country = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_country FROM  hmscountry ";
$app = new App;
$count_country = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_nationality FROM  hmsnationality ";
$app = new App;
$count_nationality = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_vip FROM  hmsvip ";
$app = new App;
$count_vip = $app->selectOne($query);


$query = "SELECT COUNT(*) AS count_agent FROM  hmsagent ";
$app = new App;
$count_agent = $app->selectOne($query);



$query = "SELECT COUNT(*) AS count_company FROM  hmscompany ";
$app = new App;
$count_company = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_groups FROM  hmsgroups ";
$app = new App;
$count_groups = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_source FROM  hmssource ";
$app = new App;
$count_source = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_blocked FROM  hmsblocked ";
$app = new App;
$count_blocked = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_packages FROM  hmspackages ";
$app = new App;
$count_packages = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_currency FROM  hmscurrency ";
$app = new App;
$count_currency = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_reservation FROM  hmsreservation ";
$app = new App;
$count_reservation = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_market FROM  hmsmarket ";
$app = new App;
$count_market = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_origin FROM  hmsorigin ";
$app = new App;
$count_origin = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_payments FROM  hmspayments ";
$app = new App;
$count_payments = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_requireds FROM  hmsrequireds ";
$app = new App;
$count_requireds = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_transactions FROM  hmstransactions ";
$app = new App;
$count_transactions = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_alert FROM  hmsalert ";
$app = new App;
$count_alert = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_comments FROM  hmscomments ";
$app = new App;
$count_comments = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_note FROM  hmsnote ";
$app = new App;
$count_note = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_messages FROM  hmsmessages ";
$app = new App;
$count_messages = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_accounts FROM  hmsaccounts ";
$app = new App;
$count_accounts = $app->selectOne($query);








?>