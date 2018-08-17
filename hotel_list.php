<?php
session_start();
require 'connect.php';
if(!isset($_POST['list_my_hotels']))
{  header('Location: userpage.php'); }
$exp_start_time = $_SESSION['exp_start_time'];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Info</title>

     <!-- CSS  --><!-- 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<script type="text/javascript">
  var time = new Date();
  window.start_time = time.getTime();

</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  

<body class="cyan" style="margin-top: -5px;">

    <!-- Navigation -->
       <nav class="cyan lighten-1" role="navigation" style="padding-top: 2px;">
    <div class="navbar-header" >
        <h3 class="headline" style="margin-top: 5px; margin-left: 50px;text-shadow: 2px 2px 4px white;"><a href="index.html">BackPackers</a></h3>
    </div>
</nav><br>
<!-- End Navigation -->
<?php
if(isset($_POST['list_my_hotels'])){
    $price_range = $_POST['price_range'];
    if($price_range == 0)
    {
      $price_range = 1;
    }
    $nohpp = $_POST['nohpp'];


    $time_new = time();

    $query0 = "INSERT into change_filter_table(time_new,price_range,nohpp) values('$time_new','$price_range','$nohpp')";
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
            $array[$i][2] = $last_page_time;
            break;
          }
          $array[$i][2] = $array[$i+1][2];
        }
    
      $tmpArr = array();
      foreach ($array as $sub) {
        $tmpArr[] = implode(':', $sub);
      }
      $result = implode(',', $tmpArr);


      $query_run = mysql_query("UPDATE change_filter_table SET `time_each_page` = '$result' WHERE `time_new` < '$time_new'ORDER BY time_new DESC LIMIT 1");
    }




    $name = $_POST['name'];
    $userId = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

    //Retrieving Hotel Data
    $query2 = " SELECT hotel_data.hotel_name FROM hotel_data WHERE `category`='$price_range'";//query for taking the hotel list from the database
    $result = mysql_query($query2) or die(mysql_error()); 
    $tot = mysql_num_rows($result);
    $pages = ceil($tot/$nohpp);
    $hotel = array();
    $detail = array();
    $time_each_page = array(10);
    // echo $pages;
    If ($tot > 0) {
      $i = 0;
      while ($row = mysql_fetch_array($result)) {
      array_push($hotel, $row['hotel_name']);
      $query3 =" SELECT * FROM `hotel_data` WHERE `hotel_name` = '$hotel[$i]'";
      if($query_run = mysql_query($query3))
        {
        $tmp = array (
        mysql_result($query_run, 0, 'contact_name'),
        mysql_result($query_run,0, 'email'),
        mysql_result($query_run, 0, 'phone'),
        mysql_result($query_run, 0, 'address'),
        mysql_result($query_run, 0, 'price'),
        mysql_result($query_run, 0, 'spotless_linen'),
        mysql_result($query_run, 0, 'washroom'),
        mysql_result($query_run, 0, 'tv'),
        mysql_result($query_run, 0, 'telephone'),
        mysql_result($query_run, 0, 'distance'),
        mysql_result($query_run, 0, 'cooling'),
        mysql_result($query_run, 0, 'room_size'),
        mysql_result($query_run, 0, 'breakfast'),
        mysql_result($query_run, 0, 'extra1'),
        mysql_result($query_run, 0, 'extra2'),
        mysql_result($query_run, 0, 'extra3'),
        mysql_result($query_run, 0, 'extra4'),
        mysql_result($query_run, 0, 'extra5'),
        mysql_result($query_run, 0, 'extra6'),
        mysql_result($query_run, 0, 'extra7'),
        mysql_result($query_run, 0, 'serial_no')
        );
        array_push($detail, $tmp);
      }//Code which iteratively list all the hotels 
      $i++;
    }
  }
}
?>
<div class="row">
<div class="col s3 cyan accent-2" style="border-radius: 15px; border : 2px solid #0066ff">
    <form class="col 12" action="#" method="post">
        <input type="hidden" name="name" value="<?php echo $name; ?>" />
        <div class="input-field row">
          <p class="black-text"><b><?php echo $name ?></b></p>
        </div>
        <div class="input-field row">
        <h6><b>Price Range:<u><div class="slider1Text" id="slider1Val" style="margin-top: -16px; margin-left: 100px;"><?php if($price_range== 0 || $price_range==1) echo '700 - 1800';
        if($price_range== 2) echo '1800 - 3700';
        if($price_range== 3) echo '3700 - 4600'; ?></div></u></b></h6>
     <input id="slider1" name="price_range" type="range" value="<?php echo $price_range ?>" min="0" max="3" onchange="updateSlider1Val(this.value);" />
        </div>
        <div class="input-field row">
        <b></b>
        </div>
        <div class="input-field row">
        <h6><b>Hotels Per Page:<u><div class="slider2Text" id="slider2Val" style="margin-top: -16px;margin-left: 160px;"><?php echo $nohpp; ?></div></u></b></h6>
     <input id="slider1" name="nohpp" type="range" value="<?php echo $nohpp ?>" min="3" max="14" onchange="updateSlider2Val(this.value);" />
        </div>
        <div class="input-field row">
        <b></b>
        </div>  
        <div class="input-field row">
          <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="list_my_hotels">List My Hotels</button>
        </div>
    </form>

</div>

   <div class="col s9 cyan accent-1 " style="border-radius: 15px;border : 2px solid #0066ff;">
<div class="row">
    <form action="logout.php" method="post">
    <div class="row" id="hotelsview"></div>



      <div class="row">
        <div class="input-field col s6">
        
         <ul class="pagination">
           <?php
         for($i = 1; $i <= $pages; $i++){
         echo '<li id="'.$i.'"><a href="#" class="btn btn-primary cyan waves-effect style="margin: 10%">'.$i.'</a></li>';
           }
           ?>
         </ul>
        </div>
      </div>
    </form>
  </div>

</div>
</div>
<?php

 $_SESSION['nohpp'] = $nohpp;
 $_SESSION['final_price_range'] = $price_range;
$time_each_page_res = implode(',', $time_each_page);//list of each hotel per page
$_SESSION['time_each_page'] = $time_each_page_res;
$_SESSION['userId'] = $userId;
$_SESSION['name'] = $name;
$_SESSION['exp_start_time'] = $exp_start_time;
$_SESSION['time_new'] = $time_new;
?>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  function makesure() {
  if (confirm('Submit Your Selected Hotel???')) {
     dosomething();
    //or return true;
  }
  else {
    return false;
  }
}
</script>
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

<script type="text/javascript">
            var hoteljs = [];
            <?php
              $sz = sizeof($hotel);
              for($i=0; $i<$sz; $i++){?>
                hoteljs.push(<?php echo '"'.$hotel[$i].'"'; ?>);
            <?php }
            ?>
            var detailjs = [];
            var tmparr = [];
            <?php
              $sz = sizeof($detail);
              for($i=0; $i<$sz; $i++){
                $sz1 = sizeof($detail[$i]);
                ?>
                tmparr = [];
                <?php
                for($j=0; $j<$sz1; $j++){
                ?>
                tmparr.push(<?php echo '"'.$detail[$i][$j].'"'; ?>);
            <?php } ?>
              detailjs.push(tmparr);
            <?php } ?>
            var nohppjs = <?php echo $nohpp; ?>;
            var totalhotels = <?php echo $tot; ?>;
            <?php $i=0;$j = 0 ;$time = 0;?>
            var page_time;
            var pre_time = 0;
            window.time_each_page = [];
            function myfunc(pageno) {
              
              //*******To calculate time of each page******
              var price_range = <?php echo $price_range; ?>;
              var ctime = new Date();
              var curr_time = ctime.getTime();
              console.log(curr_time);
              page_time = curr_time - start_time - pre_time;
              pre_time = pre_time + page_time;
              page_time_sec = Math.floor(page_time/1000);
              page_time_per_page = price_range+':'+pageno+':'+page_time_sec;
              time_each_page.push(page_time_per_page);
              console.log(time_each_page);


              if(pageno > <?php echo $pages; ?>)
                return;

              var hpp = "";
              var nohpp_count = 0;

              for(var i = 0; i < nohppjs; i++) {

                if((pageno-1)*nohppjs + i >= totalhotels)
                  break;
                nohpp_count++; 
                console.log(nohpp_count);               
                hpp += '<div class="card" style="padding : 10px; border-radius: 25px;">' +
                      '<h5 class="card-header"><span class="glyphicon glyphicon-hand-right"></span><u>'+hoteljs[(pageno-1)*nohppjs + i]+'</u></h5>'+
                      '<div class="card-block"><div class="row"><div class="col s4">';
                if(detailjs[(pageno-1)*nohppjs + i][0] != ''){
                  hpp += '<p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][0]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][1] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo Email : '+detailjs[(pageno-1)*nohppjs + i][1]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][2] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo Contact : '+detailjs[(pageno-1)*nohppjs + i][2]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][3] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo Address : '+detailjs[(pageno-1)*nohppjs + i][3]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][5] != ''){
                  detailjs[(pageno-1)*nohppjs + i][5] = 'Spotless Linen';
                  hpp += ' <div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][5]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][6] != ''){
                  detailjs[(pageno-1)*nohppjs + i][6] = 'Washroom';
                  hpp += ' <div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][6]+'</p></div><div class="clearfix"> </div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][7] != ''){
                  detailjs[(pageno-1)*nohppjs + i][7] = 'TV';
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][7]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][8] != ''){
                  detailjs[(pageno-1)*nohppjs + i][8] = 'Telephone';
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][8]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][9] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo Distance from Railway Station : '+detailjs[(pageno-1)*nohppjs + i][9]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][10] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][10]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][11] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo Room Size : '+detailjs[(pageno-1)*nohppjs + i][11]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][12] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][12]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][13] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][13]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][14] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo Wifi : '+detailjs[(pageno-1)*nohppjs + i][14]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][15] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][15]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][16] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][16]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][17] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][17]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][18] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][18]+'</p></div>';
                }
                if(detailjs[(pageno-1)*nohppjs + i][19] != ''){
                  hpp += '<div class="col s4"><p class="card-text">&raquo '+detailjs[(pageno-1)*nohppjs + i][19]+'</p></div></div>';
                }
                hpp += '<div class="clearfix"></div><div class="input-field row" style="margin-left:70%;">'+
                    '<button class="btn waves-effect waves-light cyan accent-4" type="submit" name="select" onclick="return makesure() addTime()" value="'+detailjs[(pageno-1)*nohppjs + i][20]+'">'+detailjs[(pageno-1)*nohppjs + i][4]+'</button>'+
                  '</div>'+
                '</div>'+
              '</div></div>';
              }
              // console.log(hpp);

              //Sending time Array to JSON_Handler.php
              document.getElementById("hotelsview").innerHTML = hpp;


             var jsonStringVar = nohpp_count+'*'+time_each_page ;
             var jsonString = JSON.stringify(jsonStringVar);

              request = new XMLHttpRequest();
              request.open("POST", "JSON_Handler.php",true);
              request.setRequestHeader("Content-type", "application/json");
              request.send(jsonString);


            //Page highlight start
            var pages = <?php echo $pages; ?>;
            for(var i =1; i<= pages ; i++){
            document.getElementById(i).innerHTML =  '<li id="'+i+'" onclick="myfunc('+i+')"><a href="#" class="btn btn-primary cyan waves-effect" style="margin-right:-25px">'+i+'</a></li>';
            }
             document.getElementById(pageno).innerHTML =  '<li id="'+pageno+'"><a href="#" class="btn btn-primary cyan waves-effect disabled" style="margin-right:-25px">'+pageno+'</a></li>';   
             //Page highlight end   
            }

            myfunc(1);
          </script>

</body>

</html>

