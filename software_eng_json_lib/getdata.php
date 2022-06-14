<?php
//get data from json and distribute for pagination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$url ='https://prosentient.intersearch.com.au/cgi-bin/koha/svc/report?id=1&annotated=1';
// $json = file_get_contents("lib.json");
$json = file_get_contents($url);
$obj = json_decode($json, true);
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page; 
$total_row = count($obj);
$total_pages = ceil($total_row / $no_of_records_per_page);
?>