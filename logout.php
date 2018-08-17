<?php
session_start();
require 'connect.php';
if(!isset($_POST['select']))
{  header('Location: userpage.php'); }
$time_stamp = time();
$result = mysql_query("SELECT MAX(time_curr_php) FROM change_filter_table");
$row = mysql_fetch_array($result);
$time_curr_php = $row[0];
$last_page_time = $time_stamp - $time_curr_php;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>BackPackers</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style type="text/css">
     body {
   background: url("images/pic3.jpg") no-repeat center center fixed;
   background-size: 100% 100%;
   height: 100%;
   position: absolute;
   width: 100%;
 }
  </style>
</head>
<body>
   <!-- Navigation -->
       <nav class="cyan lighten-1" role="navigation" style="padding-top: 2px;">
    <div class="navbar-header" >
        <h3 class="headline" style="margin-top: 5px; margin-left: 50px;text-shadow: 2px 2px 4px white;"><a href="index.html">BackPackers</a></h3>
    </div>
</nav>
<!-- End Navigation -->
  <?php
$userId = $_SESSION['userId'];
$name = $_SESSION['name'];
$exp_start_time = $_SESSION['exp_start_time'];
if(isset($_POST['logout']))
{


  $exp_end_time  = time();
  $total_exp_time = $exp_end_time - $exp_start_time;
  $total_exp_time_min = strval(intval($total_exp_time/60));
  $total_exp_time_sec = strval($total_exp_time%60);
  $total_exp_time = $total_exp_time_min.':'.$total_exp_time_sec;
  $query = "UPDATE users SET `total_exp_time`='$total_exp_time' where `user_id`='$userId'";
  $query_run = mysql_query($query);
    if($query_run)
         { 
        session_destroy(); // Destroy session
        session_unset(); // Delete all variables in $_SESSION
        setcookie( session_name(), '', time()-1 );
        header('Location: index.html');
          }
    else
      {echo"Unexpected ERROR!!!";}

}

?>

<?php
if(isset($_POST['select']))
  {
    $time_new = time();

    $query0 = "INSERT into change_filter_table(time_new) values('$time_new')";
    $qeury0_run = mysql_query($query0) or die(mysql_error());


    $query ="SELECT time_each_page from change_filter_table Where `time_new` <'$time_new' ORDER BY time_new DESC LIMIT 1";
    $query_run = mysql_query($query);


    if(mysql_num_rows($query_run)>0)
    {
        $String =  mysql_result($query_run, 0);

        $one=explode(",",$String);
        $array = array();
        foreach ($one as $item){
            $array[] = explode(":",$item);
        }
        for($i = 0 ; $i < sizeof($array); $i++)
        {
          if($i == sizeof($array)-1)
          {
            $query_time = "SELECT time_curr_php from change_filter_table Where `time_new` < '$time_new' ORDER BY time_new DESC LIMIT 1";
            $query_time_run = mysql_query($query_time);
            $time_pre = intval(mysql_result($query_time_run, 0));
            $last_page_time = $time_new - $time_pre;
            $array[$i][3] = $last_page_time;
            break;
          }
          $array[$i][3] = $array[$i+1][3];
        }
    
      $tmpArr = array();
      foreach ($array as $sub) {
        $tmpArr[] = implode(':', $sub);
      }
      $result = implode(',', $tmpArr);


      $query_run = mysql_query("UPDATE change_filter_table SET `time_each_page` = '$result' WHERE `time_new` < '$time_new' ORDER BY time_new DESC LIMIT 1");
    }


    $category = $_SESSION['final_price_range'];//final category 
    $nohpp = $_SESSION['nohpp']; //final number of hotels per pages
    $selected_hotel_id = $_POST['select'];
    $time_each_page_res = $_SESSION['time_each_page']; 
    $res = mysql_query("SELECT time_new FROM change_filter_table");
    $change_count = mysql_num_rows($res)-1;

    $res1 ="SELECT SUM(hotel_count) AS total_hotel_count from change_filter_table";
    $sum = mysql_query($res1);

    $hotel_count  = mysql_result($sum, 0);



    $res2="SELECT * FROM change_filter_table";
    $res2_run = mysql_query($res2);
   
    $result_arr = array();
    $price_range_arr = array();
    $nohpp_arr = array();
    while($row = mysql_fetch_assoc($res2_run))
    {
        $result_arr[] = $row['time_each_page'];
        $price_range_arr[] = $row['price_range'];
        $nohpp_arr[] = $row['nohpp'];
    }
    $time_each_page = implode(",", $result_arr);
    $price_range_change = count_change($price_range_arr);
    $price_range_change = $price_range_change -1;
    $nohpp_change = count_change($nohpp_arr);
    $nohpp_change = $nohpp_change -1;



    // $time_each_page_res = implode(',', $time_each_page);//list of each hotel per page
    $query1 = "INSERT into users(user_id, name, nohpp,time_each_page, selected_hotel_id,category,price_range_change,nohpp_change,hotel_count) values('$userId','$name', '$nohpp', '$time_each_page','$selected_hotel_id','$category','$price_range_change','$nohpp_change','$hotel_count')";
  $query_run=mysql_query($query1);
  if($query_run)
      { 
      echo'<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br><br>
      <div class="row center">
        <h5 class="header col s12 light"><b>Thank You for Selecting The Hotel</b></h5>
      </div>
      <form action="#" method="post">
      <div class="row center">
        <div class="input-field col s12 center">
          <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="logout">Log Out</button>
        </div>
      </div>
      </form>
      <br><br>

    </div>
  </div>';

        }
  else
    {echo"Unexpected ERROR!!!";}
  }

  function count_change($array)
{
    $count = 0;
    for($i = 0; $i< sizeof($array)-1; $i++)
    {
        if($array[$i] != $array[$i+1])
        {
            $count++;
        }

    }

    return $count;
}

?>

  
  <div id="footer" class="cyan">

       &copy; All rights reserved to Dr. Ankita Sharma. Designed By : <a target="_blank" href="http://home.iitj.ac.in/~paliwal.1" class="black-text">Rohit Paliwal</a>

</div>

 


  <!--  Scripts-->
  <script src="jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
