<?php 
require 'connect.php';
if (isset($_SESSION['email'])) {
  session_destroy();
  unset($_SESSION['email']);
  
  header("Location: index.html");
}

 ?>