<?php
//database connection
$db_host = "localhost";
$db_user = "ganymede";
$db_password = "ganyMede20!9";
$db_name = "ganymede_budget_app";


$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (!$conn){
    echo ("database not connected". mysqli_error($conn));
}else{
    //echo(" database connected");
}

?>
