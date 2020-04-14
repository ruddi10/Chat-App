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
$receiver=$_GET['receiver'];
$rows=array();
$query= "select * from ruddi_chat where sender in('$username','$receiver') and receiver in('$username','$receiver') order by time desc";
$query_run=$conn->query($query);
while($row=$query_run->fetch_assoc())
{
    $rows[]=$row;
}
echo json_encode($rows);
 }
?>