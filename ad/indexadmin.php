<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>  



<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../style.css">
 <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      
  }
 .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
</head>
<body>
<!-- header -->
<!-- <nav class="navbar navbar-default navbar-fixed-top" style="background: #ffffff"> -->
  <?php
  include '../config.php';
 if(isset($_POST['submit']))
 {
  
   $email  = mysqli_real_escape_string($db,$_POST['usrname']);
        $password   = $_POST['psw'];
        $password=md5($password);
        $query= mysqli_query($db,"SELECT * FROM admin WHERE id='$email' AND pass='$password' ");
       //  $result = mysqli_query($db,$query);  another way
        $numResults = mysqli_num_rows($query); //here we have to write $result in another way
        if($numResults<1)
        {
          
         header("Location: index.php?Invalidlogin");
         exit();
        }
        else
        {
          $_SESSION['ausername']=$email;
           header("Location: admin.php?loginsuccess");

        }     
 }
 if (isset($_SESSION['ausername']))
{
    header("location: admin.php");
   
    exit();
  
}

  ?>
<nav class="navbar navbar-default navbar-fixed-top" style="background: #ffffff">
   <div class="container-fluid" style=" box-shadow: 10px 10px 2px #d3d3d3;">
  <div class="row grid-divider" >
    <div class="col-sm-9"> <h1 style="color:#d2d2d2"> UNLEASH YOUR THOUGHT .. !!  </h1>
      </div>
  <div class="col-sm-3" > 
    <div class="row grid-divider" style="margin-top:20px">
       <div class="col-sm-6"> 
          <button type="button" class="btn btn-success  pull-right" id="myBtn" data-toggle="model" data-target="#myModal">LOG IN </button>
       <!-- Modal https://www.w3schools.com/bootstrap/bootstrap_modal.asp -->
        
       </div>
        <div class="col-sm-6" > 
           
        
        </div>  
      </div>
    </div>
   </div>
</div>
      </nav>
    <!-- from here login -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
      <!-- Modal content-->
            <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
      
       <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="POST" action="">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" name="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script> 
<!-- singup from here -->
  


    
 <!-- <div class="section white"> -->
<!-- carousal -->
<div >
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
       <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
      
    </ol>
    <div class="carousel-inner"  style="height:500px" >
       <!--<div class="item active">
      <img src="images/bb.jpg" height="100" width="100">
      </div>
      <div class="item">
        <img src="images/cc.jpg" height="100" width="100">
      </div>
      <div class="item">
        <img src="images/dd.jpg" height="100" width="100">
      </div>
      <div class="item">
        <img src="images/ee.jpg" height="100" width="100">
      </div>
      <div class="item">
        <img src="images/ff.jpg" height="100" width="100">
      </div>
    -->
      <div class="item active">
        <img src="../images/kk.jpg" style="width: 100%" >
      </div>
      <div class="item">
        <img src="../images/hh.jpg" style="width: 100%" >
      </div>
      <div class="item">
        <img src="../images/ii.jpg" style="width: 100%" >
      </div>
      <div class="item">
        <img src="../images/jj.jpg" style="width: 100%">
      </div>
      <div class="item">
        <img src="../images/gg.jpg" style="width: 100%" >
      </div>
      <div class="item">
        <img src="../images/ll.jpeg" style="width: 100%">
      </div>
        

    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
       <span class="sr-only">Previous</span>
    </a>
     <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
       <span class="sr-only">Previous</span>
    </a>
 </div>
</div>
</div>


</body>
</html>