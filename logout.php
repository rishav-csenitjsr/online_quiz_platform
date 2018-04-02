<?php
session_start();
include("config.php");
 if(isset($_SESSION['username']))
 {
   session_destroy();
   header("location: index.php?logoutsuccessfuly");
 }


 ?>