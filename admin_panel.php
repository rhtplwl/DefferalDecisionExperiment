<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

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
<div class="row">
	<div class="center cyan-text" style="-webkit-text-stroke: 1px white;"><h3><b>Admin Panel</b></h3></div>
	<div class="row" style="margin-left: 5%; margin-right:5%;">
<?php
if(isset($_POST['submit']))
{
		$adminId = $_POST['adminId'];
		$password = $_POST['pass'];
		if($adminId == '1234' && $password =='1234')
		{
			$query= "SELECT users.user_id FROM users ";
        		$result= mysql_query($query) or die(mysql_error());
        		if(mysql_num_rows($result)>0)
          { echo'
          <h3 class="header center cyan-text z-depth-2" style="-webkit-text-stroke: 1px white;">Experimental Data</h3>
          <div class="card">
      <br>
        <table class="striped bordered centered">
      <thead>
         <tr><th>Users</th><th>Category</th><th>#Hotels Per Page</th><th>Total Time</th><th> Time Per Page (Category:NOHPP:PageNumber:Time)</th><th>Selected Hotel</th><th> #Skipped Hotels</th><th>Price Range Change</th><th>#Hotels Per Page Change</th></tr>
      </thead>
      <tbody>';
              $query = "SELECT * FROM users";
              $query_run = mysql_query($query);

              while($row= mysql_fetch_assoc($query_run))
                {
                	              
                echo'<tr><td>'.$row['name'].'</td><td>'.$row['category'].'</td><td>'.$row['nohpp'].'</td><td>'.$row['total_exp_time'].'</td><td>'.$row['time_each_page'].'</td><td>'.$row['selected_hotel_id'].'</td><td>'.$row['hotel_count'].'</td><td>'.$row['price_range_change'].'</td><td>'.$row['nohpp_change'].'</td>';
              }
                          echo'</tbody>
                </table>
                </div>
                <div class="row center">
                <form action="#" method="post">
                  <button name="logout" class="col s3 btn-large waves-effect waves-light cyan" style="margin-right:50%">Log Out</button>
                  <button name="reset" class="col s3 offset-sm-4 btn-large waves-effect waves-light cyan" id="reset" onclick="return makesure()">Reset</button>
                  </form>
                </div>
                </div>';
          }
          else{
            echo'<br><br><br><div class="container"><h4 class="header center red-text z-depth-3" style="-webkit-text-stroke: 1px white;">No Experimental Data</h4></div>
            ';
          }
      }
      else
      	echo '<div class="red-text">Invalid Admin Id or Password.</div>
         <form class="col s4" action="#" method="post">
      <div class="row">
        <div class="input-field col s12 ">
          <input id="Name" name="adminId" placeholder="Admin Id" type="text" class="active validate" required>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 ">
          <input id="Name" name="pass" placeholder="Password" type="password" class="active validate" required>
        </div>
      </div>
  
      <div class="row">
        <div class="input-field col s6">
          <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="submit">Log In</button>
        </div>
      </div>
    </form>';

}
else
{echo'   <form class="col s4" action="#" method="post">
      <div class="row container">
        <div class="input-field col s12 "><b>Admin Id :</b>
          <input id="Name" name="adminId" placeholder="Enter Here" type="text" class="active validate" required>
        </div>
      </div>
      <div class="row container">
        <div class="input-field col s12 "><b>Password :</b>
          <input id="Name" name="pass" placeholder="Enter Here" type="password" class="active validate" required>
        </div>
      </div>
  
      <div class="row container">
        <div class="input-field col s6">
          <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="submit">Log In</button>
        </div>
      </div>
    </form>';}
if(isset($_POST['logout']))    
{
	echo '<div class="green-text">Logged out Successfully</div>';
}

if(isset($_POST['reset']))
{
$query = "DELETE from users";;
$query_run = mysql_query($query);
}

?>
        </div>
</div>
<script type="text/javascript">
  function makesure() {
  if (confirm('This data will be permanantly delete. Press OK to Delete the data???')) {
     dosomething();
    //or return true;
  }
  else {
    return false;
  }
}
</script>
</body>
</html>