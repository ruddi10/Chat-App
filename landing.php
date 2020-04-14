<?php
session_start();
if(!($_SESSION["username"]==true))
{
    header("location:login.php");
}
else{
    $method=$_SESSION['method'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="landstyle.css">
    <title>
        <?php
        if($method==="login"||$method==="signup")
        echo "Landing Page";
        else
        echo "ERROR";
        ?>
    </title>
</head>
<body>
    <div class="content">
        <h1>YOUR PROFILE ADDED SUCCESSFULLY!!</h1>
        <div class="text">
        <?php
        if($method==="login")
        echo "Your account is active click on the button below to visit your account --->";
        else  if($method==="signup")
        echo "To visit your acount you need to login , Kindly click the button below to go to Login Page --->";
        ?>

</div>
<a href="<?php 
 if($method==="login")
 {
 $_SESSION['profile']="complete";
 echo "dashboard.php";
 }
 else  if($method==="signup")
 echo "login.php";
 ?>
 "><input class="backbutton" type="button" value="<?php
  if($method==="login")
  echo "Go to Dashboard";
  else  if($method==="signup")
  { echo "Go to Login page";
    session_unset();
  }
  ?>
  "/></a>
</div>
    
</body>
</html>