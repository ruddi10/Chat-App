<?php
session_start();
require 'connection.php';
if(!($_SESSION["username"]==true)||$_SESSION['method']==="signup"||!($_SESSION['profile']==="complete"))
{
    header("location:login.php");
}
$method=$_SESSION['method'];
    $username=$_SESSION['username'];
    $query="select username,profile from ruddi_profile where not username ='$username'";
    $query_run=$conn->query($query);


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="chatstyle.css">
        <title>Chat</title>
    </head>
    <body>
        <div class="wrap">
            <div class="users">
            <div class="link">
    
        <a href="chat.php">
            My Chats</a>
            <a href="dashboard.php">
           Go to About Me</a>
</div>
                <?php 
                while($row=$query_run->fetch_assoc())
                { 
                    ?>
                <div class="userwrap">
                    <img class="userimage" src="<?php echo $row['profile']?>">
                    <div class="username" ><?php echo $row['username']?></div>
                </div>    
                <?php } ?>  
                
            </div>
            
            <div class="area">
               <div class="no"> NO CHAT SELECTED</div>
               <div class="head"> </div>   
               <div class="mainarea"> </div>
               <form class="myform" id="myform" method="POST" action="#">
                   <input class="messa" type="text" name="message" placeholder="Enter the Message">
                   <input class="btn" type="submit" name="submit" value="Send">
                </form>

            </div>

</div>
<script src="chatjs.js"></script>
    </body>
    </html>