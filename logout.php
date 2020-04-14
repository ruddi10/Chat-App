<?php
session_start();
if(!($_SESSION["username"]==true)||$_SESSION["method"]==="signup")
{
    header("location:login.php");
}
else{
    session_unset();
    setcookie('id','', time() - 3600);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="landstyle.css">
    <title>
        Log Out
    </title>
</head>
<body>
    <div class="content">
        <h1>LOGGED OUT SUCCESSFULLY!!</h1>
        <div class="text">
        If you wish to login again click on the button below else close this page .

</div>
<a href="login.php
 "><input class="backbutton" type="button" value="Go to Login Page
  "/></a>
</div>
    
</body>
</html>