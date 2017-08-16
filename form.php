<?php

define('_DB_HOST', 'localhost');
define('_DB_NAME', 'dt');
define('_DB_USER', 'dt');
define('_DB_PASS', 'JyH04HTguaTeWXGj');

// Connect to database
$connection = mysql_connect(_DB_HOST, _DB_USER, _DB_PASS) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
$db = mysql_select_db(_DB_NAME, $connection) or die ('request "Unable to select database."');

$data = array(
    'email' => "'".$_POST['email']."'",
    'date_subscribe' => 'NOW()',
    'type' => "'".$_POST['type']."'",
);

$sql = "REPLACE INTO subscription_form (`".implode("`, `", array_keys($data))."`) VALUES(".implode(", ", array_values($data)).")";


if (!empty($sql)){
        $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
    header("Location: thankyou.php");
}else{
    echo json_encode(array('code' => 'failed'));
}