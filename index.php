<?php

require_once './src/SimpleConvert.php';

$con = new mysqli("localhost", "root", "", "test");

$query = "SELECT * FROM mytable";

$response = $con->query($query);

$query = "SHOW COLUMNS FROM mytable;";

$header = $con->query($query);
$header = $header->fetch_all();
foreach ($header as $head){
  $data[] = $head[0];
}

$header = $data;
$convert = new \SimpleConvert\SimpleConvert((object)[
  "header" => $header,
  "result" => $response,
]);

print_r($convert->xls('fd.xls',true));

echo "\n";
