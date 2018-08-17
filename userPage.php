<?php
session_start();
require 'connect.php';
$exp_start_time = time();
$_SESSION['exp_start_time'] = $exp_start_time;
$query_del = mysql_query("TRUNCATE TABLE change_filter_table");
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Info</title>

     <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

    <!-- Navigation -->
       <nav class="cyan lighten-1" role="navigation" style="padding-top: 2px;">
    <div class="navbar-header" >
        <h3 class="headline" style="margin-top: 5px; margin-left: 50px;text-shadow: 2px 2px 4px white;"><a href="index.html">BackPackers</a></h3>
    </div>
</nav>
<!-- End Navigation -->
<div class="row">
<div class="container col s6 ">
    <form class="col s12" action="hotel_list.php" method="post" style="
    margin-left: 100px;">
      <div class="row">
        <div class="input-field col s5 ">
          <input id="Name" name="name" placeholder="Username" type="text" class="active validate" required>
        </div>
      </div>
  <div class="row">
        <div class="input-field col s5">
        <h6><b>Price Range:   (700 - 4600)</b></h6>
     <input id="slider1" name="price_range" type="range" value="1" min="1" max="3" onchange="updateSlider1Val(this.value);" />
        </div>
        <div class="input-field col s2 col-offset-s4">
        <b><u><div  style="margin-top:30px;" class="slider1Text" id="slider1Val">700 - 1600</div></u></b>
        </div>
      </div>
        <div class="row">
        <div class="input-field col s5">
        <h6><b>Number Of Hotels Per Page:    (3 - 14)</b></h6>
     <input id="slider1" name="nohpp" type="range" min="3" max="14" value="3" onchange="updateSlider2Val(this.value);" />
        </div>
        <div class="input-field col s2 col-offset-s4">
        <b><u><div  style="margin-top:30px;" class="slider2Text" id="slider2Val">3</div></u></b>
        </div>
      </div>
  
      <div class="row">
        <div class="input-field col s6">
          <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="list_my_hotels">List My Hotels</button>
        </div>
      </div>
    </form>
  </div>
  <div class="container col s6">
      <h4> Instructions : </h4>

      <ol>
        <li>Please enter your name.</li>
        <li>Select price range as per your choice.</li>
        <li>Select option range per page as per your choice</li>
      </ol>  

</div>
  <div id="footer" class="cyan">

       &copy; All rights reserved to Dr. Ankita Sharma. Designed By : <a target="_blank" href="http://home.iitj.ac.in/~paliwal.1" class="black-text">Rohit Paliwal</a>

</div>

  
     

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

   
<script type="text/javascript">
function updateSlider1Val(val1) {
         var p1 = document.getElementById('slider1Val');
         if (val1==1 || val1 == 0) {
          val = 700;
          val1 = 1800;
         }else if (val1 == 2) {
          val = 1800;
          val1 = 3700;
         }else if (val1==3) {
          val = 3700;
          val1 = 4600;
         }
p1.textContent = val +' - ' + val1;
        }
function updateSlider2Val(val2) {
         var p2 = document.getElementById('slider2Val');
p2.textContent = val2;
        }

</script>

</body>

</html>

