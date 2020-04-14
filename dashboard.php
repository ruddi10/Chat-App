<?php
session_start();
require 'connection.php';
$method=$_SESSION['method'];
    $username=$_SESSION['username'];
  
    $query;
    $query2;
if(!($_SESSION["username"]==true)||$_SESSION['method']==="signup"||!($_SESSION['profile']==="complete"))
{
    header("location:login.php");
}
    $query="select * from ruddi_user where username='$username'";
    $query2="select * from ruddi_profile where username='$username'";
    $query_run=$conn->query($query);
    $query_run2=$conn->query($query2);
    $row=$query_run->fetch_assoc();
    $row2=$query_run2->fetch_assoc();
    $email=$row['email'];
    $sex=$row['sex'];
    $dob=$row['dob'];
    $phone=$row2['phonenumber'];
    $address=$row2['address'];
    $about=$row2['about'];
    $profile=$row2['profile'];
    $occupation=$row2['occupation'];
    $institute=$row2['institute'];

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dashboardcss.css">
    <title>HOME</title>
</head>
<body>
    <div class="main">
<div class="top">
    <div class="link">
    <a href="dashboard.php" style="color: rgb(63, 187, 228);">
            About Me</a>
        <a href="chat.php">
            Messages</a>
</div>
         <div class="btn">   <a href="logout.php"><input class="backbutton" type="button" value="Log Out"/></a></div>
        </div>

    <div class="write">
<div class="imgcont">
    <img class="image" src="<?php echo $profile; ?>"/>
    <div class="about">
        <div class="headin">About</div>
    <p><?php echo $about; ?></p>
</div>
</div>
<div class="info">
<div class="name" >
<div class="user"><?php echo $username; ?></div>
<div class="sub"><?php echo $occupation; ?></div>
<div class="sub"><?php echo $institute; ?></div>

</div>
    <div class="about">
      <div class="contact">  <div class="headin" style="border-bottom:none;margin-bottom:1.7rem">Contact Information</div>
    <div class="y">   <span class="subhead">Phone:</span> <div style="flex:1;"><?php echo $phone; ?></div></div>
    <div class="y">    <span class="subhead">Address:</span><div  style="flex:1;"> <?php echo $address; ?></div></div>
    <div class="y">   <span class="subhead">Email:</span> <div  style="flex:1;"><?php echo $email; ?></div></div>
</div>
<div class="basic">
    <div class="headin" style="margin-bottom:1.7rem;border-bottom:none;">Basic Information</div>
    <div class="y">   <span class="subhead">Birthday:</span> <div style="flex:1;"><?php echo $dob; ?></div></div>
    <div class="y">    <span class="subhead">Gender:</span><div  style="flex:1;"><?php echo $sex; ?></div></div>
</div>
</div>
</div>
<div class="edit">
<div><a href="edit.php"><input class="editbutton" type="button" value="Edit Profile"/></a></div>
</div>


</div>

</div>
<script src="dashjs.js"></script>
</body>
</html>