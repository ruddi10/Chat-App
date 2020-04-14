<?php
session_start();
require 'connection.php';
$ret=$_COOKIE['id'];
if(isset($ret))
{
  $que="select username from ruddi_remember where id='$ret'";
  $que_run=$conn->query($que);
  if($que_run->num_rows >0){
    while($ro=$que_run->fetch_assoc()){
      $_SESSION["username"]=$ro['username'];
      $user=$ro['username'];
      $_SESSION['method']="login";
      $_SESSION['logged_in']=1;
      $query2="select  username from ruddi_profile where username='$user' ";
      $query_run2=$conn->query($query2);
if( $query_run2->num_rows >0)
{  header("location:dashboard.php");
$_SESSION['profile']="complete";
}
else
{
header("location:profile.php");
$_SESSION['profile']="incomplete";
}


    }
  }
}

if(isset($_SESSION['logged_in'])&&$_SESSION['logged_in']==1)
header("location:dashboard.php");


if(isset($_POST['submit']))
{
  if(empty($_POST['user'])||empty($_POST['pass']))
  echo "<script>alert('Some input missing!!')</script>";
  else{
  $user= $_POST['user'];
  $password=$_POST['pass'];
  $query="select  username,password from ruddi_user where username='$user'";
  $query_run=$conn->query($query);
 if( $query_run->num_rows >0)
  { $f=0;
    $method="login";
    while($row= $query_run->fetch_assoc())
    {
        if(password_verify($password,$row['password']))
        {   $f++;
            $_SESSION['username']=$user;
            $_SESSION['method']=$method;
            $_SESSION['logged_in']=1;
            if(!empty($_POST['remember']))
            {
             $id=session_id();
             setcookie("id",$id,time()+(86400*30));
             $queryc="insert into ruddi_remember values ('$user','$id')";
              $conn->query($queryc);
           }
            $query2="select  username from ruddi_profile where username='$user' ";
            $query_run2=$conn->query($query2);
 if( $query_run2->num_rows >0)
 {  header("location:dashboard.php");
  $_SESSION['profile']="complete";
 }
 else
 {
 header("location:profile.php");
 $_SESSION['profile']="incomplete";
 }
        }
    }
    if($f===0)
    echo "<script>alert('Wrong password')</script>";
  }
 
 else
  echo "<script>alert('Username/Email doesnt exist')</script>";
  }
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
<div class="wrap">
	<div>LOGIN</div>
 	<form class="myform" action="login.php" method="POST" enctype="multipart/form-data">
 

     <input class="inputvalue" id="user" type="text" name="user" placeholder="Enter Username" required/><br>
  <input class="inputvalue" type="password" name="pass" placeholder="Password" required/><br>
  <input type="checkbox" id="vehicle1" name="remember" value="remember" style="margin:0.8rem;">
<label for="vehicle1">Remember Me</label><br>

<center>  <input name="submit" class="submitbutton" type="submit" value="Login" /></center><br>
  <center><a href="signup.php"><input class="backbutton" type="button" value="Sign Up"/></a></center><br>
	</form>
</div>
<script src="login.js"></script>

</body>
</html>