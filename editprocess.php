<?php
session_start();
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require 'connection.php';
if(!($_SESSION["username"]==true)||$_SESSION['method']==="signup"||!($_SESSION['profile']==="complete"))
{
    header("location:login.php");
}
else
 {   if(isset($_POST['submit']))
    {  
      if(empty($_POST['mobile'])||empty($_POST['address'])||empty($_POST['occupation'])||empty($_POST['institute'])||empty($_POST['about'])||empty($_POST['email'])||empty($_POST['pass'])||empty($_POST['sex'])||empty($_POST['dob']))
      echo "<script>alert('Some input missing!!')</script>";
      else
      { 
        $email=$_POST['email'];
    $sex=$_POST['sex'];
    $dob=$_POST['dob'];
    $phone=$_POST['mobile'];
    $password=$_POST['pass'];
    $address=$_POST['address'];
    $about=$_POST['about'];
    $occupation=$_POST['occupation'];
    $institute=$_POST['institute'];
    $method=$_SESSION['method'];
    $username=$_SESSION['username'];
        $query1="select password from ruddi_user where username='$username'";
        $query_run1=$conn->query($query1);
        while($row= $query_run1->fetch_assoc())
          {
              if(password_verify($password,$row['password']))
              {
                 if(empty($_POST['npass'])&&empty($_POST['cpass']))
                {
                  $query="update ruddi_user set email='$email',sex='$sex',dob='$dob' where username='$username'";
                  $query_run=$conn->query($query);
                  if($query_run){
                      if($_FILES['myFile']['size'] == 0 )
                      {
                        $query="update ruddi_profile set phonenumber='$phone',address='$address',about='$about',institute='$institute',occupation='$occupation' where username='$username'";
                        $query_run=$conn->query($query); 
                        if( $query_run)
                       { echo "<script>alert('Updated Successfully')</script>";
                       echo "<script>window.location.href = 'dashboard.php';</script>";
                       }
                        else
                       { echo "<script>alert('Try again later')</script>";
                        echo "<script>window.location.href = 'edit.php';</script>";
                       }

                      }
                      else
                      {
                        $myFile=$_FILES["myFile"];
                        $myFile_name=$_FILES["myFile"]['name'];
	$myFile_type=$_FILES["myFile"]["type"];
	$myFile_temploc=$_FILES["myFile"]["tmp_name"];
	$myFile_stor="profilepics/".time().'_'.$_FILES['myFile']['name'];
	$ext=explode('.', $myFile_name);
    $actualExt=strtolower(end($ext));
    if($actualExt=='jpg'||$actualExt=='jpeg'||$actualExt=='gif'||$actualExt=='png'||$actualExt=='svg')
    {
        move_uploaded_file($myFile_temploc, $myFile_stor);
        $query="update ruddi_profile set phonenumber='$phone',address='$address',about='$about',institute='$institute',occupation='$occupation',profile='$myFile_stor' where username='$username'";
        $query_run=$conn->query($query); 
        if( $query_run)
       { echo "<script>alert('Updated Successfully')</script>";
        echo "<script>window.location.href = 'dashboard.php';</script>";
       }
        else
       { echo "<script>alert('Try again later')</script>";
        echo "<script>window.location.href = 'edit.php';</script>";
      }


    }
    else
    echo "<script>alert('Check Extension of uploaded file')</script>";

                      }
                  }
                  else
                 { echo "<script>alert('Try again later')</script>";
                  echo "<script>window.location.href = 'edit.php';</script>";
                }

                }
                else if(empty($_POST['npass'])||empty($_POST['cpass'])){
                  echo "<script>alert('Your new password or confirm password missing!!')</script>";
                }
                else
                {
                    if($_POST['cpass']===$_POST['npass'])
                    {
                     $hash=password_hash($_POST['cpass'],PASSWORD_DEFAULT);
                     $query="update ruddi_user set email='$email',sex='$sex',dob='$dob',password='$hash' where username='$username'";
                  $query_run=$conn->query($query);
                  if($query_run){
                    if($_FILES['myFile']['size'] == 0)
                    {
                      $query="update ruddi_profile set phonenumber='$phone',address='$address',about='$about',institute='$institute',occupation='$occupation' where username='$username'";
                      $query_run=$conn->query($query); 
                      if( $query_run)
                     { echo "<script>alert('Updated Successfully')</script>";
                      echo "<script>window.location.href = 'dashboard.php';</script>";
                     }
                      else
                     { echo "<script>alert('Try again later')</script>";
                      echo "<script>window.location.href = 'edit.php';</script>";
                    }


                    }
                    else
                    {
                      $myFile=$_FILES["myFile"];
                      $myFile_name=$_FILES["myFile"]['name'];
$myFile_type=$_FILES["myFile"]["type"];
$myFile_temploc=$_FILES["myFile"]["tmp_name"];
$myFile_stor="profilepics/".time().'_'.$_FILES['myFile']['name'];
$ext=explode('.', $myFile_name);
  $actualExt=strtolower(end($ext));
  if($actualExt=='jpg'||$actualExt=='jpeg'||$actualExt=='gif'||$actualExt=='png'||$actualExt=='svg')
  {
      move_uploaded_file($myFile_temploc, $myFile_stor);
      $query="update ruddi_profile set phonenumber='$phone',address='$address',about='$about',institute='$institute',occupation='$occupation',profile='$myFile_stor' where username='$username'";
      $query_run=$conn->query($query); 
      if( $query_run)
     { echo "<script>alert('Updated Successfully')</script>";
      echo "<script>window.location.href = 'dashboard.php';</script>";
     }
      else
     { echo "<script>alert('Try again later')</script>";
      echo "<script>window.location.href = 'edit.php';</script>";
    }


  }
  else
  {echo "<script>alert('Check Extension of uploaded file')</script>";
  echo "<script>window.location.href = 'edit.php';</script>";
}


                    }
                }
                else
               { echo "<script>alert('Try again later')</script>";
                echo "<script>window.location.href = 'edit.php';</script>";
              }

                    }
                    else
                 {   echo "<script>alert('Your new password and confirm not matching')</script>";
                    echo "<script>window.location.href = 'edit.php';</script>";
                  }

                }

              }
              else
             { echo "<script>alert('Check Your Password')</script>";
              echo "<script>window.location.href = 'edit.php';</script>";
            }

            }
      }

  }
  else
  echo "Invalid Request";
}
  ?>