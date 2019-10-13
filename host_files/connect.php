<?php
//database connection
$db_host = "34.230.41.202";
$db_user = "ubuntu";
$db_password = "6yt5^YT%";
$db_name = "ganymede_budget_app";


$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (!$conn){
    echo ("database not connected". mysqli_error($conn));
}else{
    //echo(" database connected");
}

?>
