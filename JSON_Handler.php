<?php
session_start();
$time_new =$_SESSION['time_new'];
$time_curr_php = time();

require 'connect.php';
$str_json = file_get_contents('php://input');
$hotel_count = substr($str_json, 1, strpos($str_json, "*"));
$hotel_count = trim($hotel_count, "*");
$hotel_count = intval($hotel_count);
$str_json = strstr($str_json, "*");
$str_json  = str_replace("*", "",$str_json);
$str_json  = str_replace("\"", "",$str_json);




// $query1 = "INSERT into change_filter_table(time_each_page, hotel_count) values('$str_json','$hotel_count')";
$query ="SELECT hotel_count from change_filter_table Where `time_new` = '$time_new'";
$query_run = mysql_query($query);

if($query_run)
{
    $row = mysql_fetch_array($query_run);
    $hotel_count_prev = intval($row['hotel_count']);

}
$hotel_count = $hotel_count_prev + $hotel_count;
$query1 = mysql_query("UPDATE change_filter_table SET `time_each_page`='$str_json',`hotel_count`='$hotel_count',`time_curr_php` = '$time_curr_php' WHERE `time_new` = '$time_new'");
?>