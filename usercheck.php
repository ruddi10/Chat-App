<?php
require 'connection.php';
if(isset($_POST['name'])){
    $query="select username from ruddi_user";
    $query_run= $conn->query($query);
    if($query_run->num_rows >0){
        while($row= $query_run->fetch_assoc())
        {
            $name=$_POST['name'];
            if($name===$row['username'])
              {echo "true";
              exit();
              }
        }
    }
}