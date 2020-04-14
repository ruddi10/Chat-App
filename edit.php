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
    $password=$row['password'];
    $address=$row2['address'];
    $about=$row2['about'];
    $profile=$row2['profile'];
    $occupation=$row2['occupation'];
    $institute=$row2['institute'];



?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="editstyle.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
<div class="wrap">
	<div class="editinfo">EDIT INFORMATION</div>
     <form class="myform" action="editprocess.php" method="POST" enctype="multipart/form-data">
     

     <div class="pp">
        <img src="<?php echo $profile ?>" id="img">
      <div class="filebtn">  
      <input type="file" name="myFile" id="file" class="inputfile" />
<label for="file" id="change">Choose a File</label>
      </div>

    </div>

    <div>
    <div class="headin" style="margin-bottom:1.7rem;border-bottom:none;">ACCOUNT INFORMATION</div>
   <div class="inputflex"> <label for="mail">E-mail</label>
  <input class="inputvalue" id="mail" type="email" name="email" placeholder="Email" value="<?php echo $email ?>"required/></div>
  <div class="inputflex"><label for="phone">Mobile Number</label>
  <input class="inputvalue" type="text" id="phone" name="mobile" placeholder="Mobile Number" value="<?php echo $phone ?>" required/></div>
  <div class="inputflex"><label for="address">Address</label>
  <input class="inputvalue" id="address" type="text" name="address" placeholder="Address" value="<?php echo $address ?>"required/></div>
  <div class="inputflex"><label for="occupation">Occupation</label>
  <input class="inputvalue" id="occupation" type="text" name="occupation" placeholder="Occupation" value="<?php echo $occupation ?>" required/></div>
  <div class="inputflex"><label for="institution">Institution</label>
  <input class="inputvalue" id="institution" type="text" name="institute" placeholder="Institution" value="<?php echo $institute ?>" required/></div>
  <div class="inputflex"><label for="dob">Date of Birth</label>
  <input class="inputvalue" id="dob" type="text" name="dob" placeholder="Date of Birth" value="<?php echo $dob ?>" required/></div>
  <div class="inputflex"><label for="sex">Gender</label>
  <input class="inputvalue" id="sex" type="text" name="sex" placeholder="Gender" value="<?php echo $sex ?>" required/></div>
  <textarea name="about" id="textarea" placeholder="Tell something about you....." required><?php echo $about ?></textarea>
</div>

<div>
    <div class="headin" style="margin-bottom:1.7rem;border-bottom:none;">CHANGE PASSWORD</div>
  <div class="inputflex"><label for="npass">New Password</label>
  <input class="inputvalue" type="password" id="password" name="npass" placeholder="New Password" /></div>
  <div class="inputflex"><label for="cpass">Confirm Password</label>
  <input class="inputvalue" id="cpass" type="password" name="cpass" placeholder="Confirm Password"/></div>
  
</div>
<div>
    <div class="headin" style="margin-bottom:1.7rem;border-bottom:none;">VERIFICATION</div>
   <div class="inputflex" style="flex-flow:row-reverse;align-items:flex-start;"> <label for="pass" style="color:red;margin-left:0.4rem;">*You need to fill your current password to make changes</label>
  <input class="inputvalue" id="pass" type="password" name="pass" placeholder="Current Password" required/></div>
 
  
</div>



  <input name="submit" class="submitbutton" type="submit" value="Change Information" /><br>
  <a href="dashboard.php"><input class="backbutton" type="button" value="Back to Dashboard"/></a><br>

	</form>
</div>

<script src="editjs.js"></script>
</body>
</html>

