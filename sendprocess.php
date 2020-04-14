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
 {  
$method=$_SESSION['method'];
$username=$_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message=$_POST['message'];
    $receiver=$_POST['receiver'];
    if($message)
   { $query="insert into ruddi_chat(sender,receiver,message) values('$username','$receiver','$message')";
    $query_run=$conn->query($query);
    echo "success";
   }
   else
   exit();
}
 }
?>