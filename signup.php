<?php
session_start();
require 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
<div class="wrap">
	<div>Sign Up</div>
 	<form class="myform" action="signup.php" method="POST" enctype="multipart/form-data">
  <input class="inputvalue" id="mail" type="email" name="email" placeholder="Email" required/><br>
  <input class="inputvalue" type="email" id="cmail" name="cmail" placeholder="Confirm email" required/><br>
  <input class="inputvalue" type="password" name="pass" placeholder="Password" required/><br>
  <input class="inputvalue" id="user" type="text" name="user" placeholder="What should we call you?" required/><br>

<div style="font-size:16px; padding: 20px;

font-weight: normal">
 Date of birth:<br>		
<div id="dateof">

 <select class="inputvalue" name="month" required style="width:35%">
     <option value=''>--Select Month--</option>
    <option selected value='1'>Janaury</option>
    <option value='2'>February</option>
    <option value='3'>March</option>
    <option value='4'>April</option>
    <option value='5'>May</option>
    <option value='6'>June</option>
    <option value='7'>July</option>
    <option value='8'>August</option>
    <option value='9'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
  </select>

  <input class="inputvalue" id="in" type="number" name="day" min="1" max="31" placeholder="Day" required/><br>
  <input class="inputvalue" id="in" type="number" name="year" min="1920" max="2002" placeholder="Year" required/><br>
</div>
</div>
  <input type="radio" id="male" name="gender" value="male" required>
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label><br>
<center>  <input name="submit" class="submitbutton" type="submit" value="SIGN UP" /></center><br>
  <center><a href="login.php"><input class="backbutton" type="button" value="Back to Login"/></a></center><br>
	</form>
</div>
<script src="signup_js.js"></script>
<?php

if(isset($_POST['submit']))
{
  if(empty($_POST['email'])||empty($_POST['cmail'])||empty($_POST['pass'])||empty($_POST['user'])||empty($_POST['year'])||empty($_POST['month'])||empty($_POST['day'])||empty($_POST['gender']))
  echo "<script>alert('Some input missing!!')</script>";
  else{
  $email= $_POST['email'];
  $cmail=$_POST['cmail'];
  $password=$_POST['pass'];
  $user=$_POST['user'];
$dob=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
$gender=$_POST['gender'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<script>alert('Email entered Invalid')</script>";
}
else if($email!==$cmail)
{
  echo "<script>alert('Check your Confirm Email')</script>";
}
else 
{
  $method="signup";
  $hash=password_hash($password,PASSWORD_DEFAULT);
  $query="insert into ruddi_user (username,email,sex,password,dob) values('$user','$email','$gender','$hash','$dob')";
  $query_run=$conn->query($query);
  $_SESSION['username']=$user;
  $_SESSION['method']=$method;
  $_SESSION['profile']="incomplete";
 if( $query_run)
  header("location:profile.php");
 
 else
  echo "<script>alert('Try Again Later')</script>";
}
  
}
}



?>
</body>
</html>
