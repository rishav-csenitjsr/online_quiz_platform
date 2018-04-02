<?php
session_start();
include("../config.php");
 if(isset($_SESSION['ausername']))
 {
   session_destroy();
   header("location: indexadmin.php?logoutsuccessfuly");
 }


 ?>