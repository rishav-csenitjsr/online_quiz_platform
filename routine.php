  <?php
  session_start();
  include("config.php");
    if(is_null($_SESSION['username']))
   {
     session_destroy();
     header("location: index.php?logoutsuccessfuly");
   }
  ?>

  <!DOCTYPE HTML>
  <html lang="en">
  <head>  
    <title> Subjects </title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
   <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 60%;
    margin-top: 110px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

 tr {
    background-color: #dddddd;
}


</style>
       <style>

    .navbara {
    overflow: hidden;
    background-color: #5f5f5f;
    top: 0;
    width: 100%;
    
  }

  .navbara a {
    float: left;
    /*display: block;*/
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 16px;
  }

  .navbara a:hover{
  background-color:#000000 !important;
  color:#ffffff !important;
  }
  .navbara a.active {
  background-color:#4CAF50;
  color:#ffffff;
  }
  .main {
    padding: 16px;
    margin-top: 30px;
    height: 1500px; /* Used in this example to enable scrolling */
  }
  </style>

  </head>
  <body>
   



     <nav class="navbar navbar-default navbar-fixed-top" style="background: #ffffff">
         <div class="container-fluid" style=" box-shadow: 10px 10px 2px #d3d3d3;">
         <div class="row grid-divider" >
         <div class="col-sm-9"> <h1 style="color:#d2d2d2"> SHOW YOUR CREATIVITY .. !!  </h1>
         </div>
        <div class="col-sm-3" > 
          <div class="row grid-divider" >
          <div class="col-sm-6">  
          </div>
          <div class="col-sm-6" style="margin-top: 20px"> 
             <a href="logout.php"> <button type="submit" name="submit" class="btn btn-success"  >  LOG OUT</button> </a> 
          </div>
         </div>
         </div>
         </div> 
        </div>
    </nav>
         <div class="navbara" style="margin-top: 80px;">
    <a href="welcome.php">HOME</a>
    <a href="subject.php">SUBJECTS</a>
    <a href="routine.php">TIME TABLE</a>
    <a href="sch.php">EXAM SCHEDULE</a>
    <a href="exami.php">EXAM PORTAL</a>
    <a href="#">RESULTS</a>
    <a href="#">MORE</a>

  </div>
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
         
      <?php
        include ("config.php");
         $hi=$_SESSION['username'];
         echo "<table>";
         echo " <tr style= \"background-color: #ffffff \"> <th>Day</th> <th>Period1</th> <th>Period2</th> <th>Period3</th> <th>Period4</th> <th>Period5</th>  </tr> ";
         $hello="SELECT DISTINCT r.rsub,r.rper FROM student t,routine r WHERE t.strm=r.rbranch AND t.username='$hi'AND r.rday='Monday' order by r.rper ";
         $res = mysqli_query($db,$hello);   
     echo "<tr> <td> Monday </td>";
      while ($row=mysqli_fetch_row($res)) {
       echo "  <td> $row[0]    </td>";

      }
       echo "</tr>";
      $hello="SELECT r.rsub,r.rper FROM student t,routine r WHERE t.strm=r.rbranch AND t.username='$hi'AND r.rday='Tuesday' order by r.rper ";
         $res = mysqli_query($db,$hello);   
     echo "<tr>  <td> Tuesday </td>";
      while ($row=mysqli_fetch_row($res)) {
       echo "  <td> $row[0]    </td>";

      }
       echo "</tr>";
      $hello="SELECT r.rsub,r.rper FROM student t,routine r WHERE t.strm=r.rbranch AND t.username='$hi'AND r.rday='Wednesday' order by r.rper ";
         $res = mysqli_query($db,$hello);   
     echo "<tr>  <td> Wednesday </td>";
      while ($row=mysqli_fetch_row($res)) {
       echo "  <td> $row[0]    </td>";

      }
       echo "</tr>";
      $hello="SELECT r.rsub,r.rper FROM student t,routine r WHERE t.strm=r.rbranch AND t.username='$hi'AND r.rday='Thursday' order by r.rper ";
         $res = mysqli_query($db,$hello);   
     echo "<tr> <td> Thursday </td>";
      while ($row=mysqli_fetch_row($res)) {
       echo "  <td> $row[0]    </td>";

      }
       echo "</tr>";
      $hello="SELECT r.rsub,r.rper FROM student t,routine r WHERE t.strm=r.rbranch AND t.username='$hi'AND r.rday='Friday' order by r.rper ";
         $res = mysqli_query($db,$hello);   
     echo "<tr> <td> Friday </td>";
      while ($row=mysqli_fetch_row($res)) {
       echo "  <td> $row[0]    </td>";

      }
       echo "</tr>";
      $hello="SELECT r.rsub,r.rper FROM student t,routine r WHERE t.strm=r.rbranch AND t.username='$hi'AND r.rday='Saturday' order by r.rper ";
         $res = mysqli_query($db,$hello);   
      echo "<tr> <td> Saturday </td>";
      while ($row=mysqli_fetch_row($res)) {
       echo "  <td> $row[0]    </td>";

      }
       echo "</tr>";
      ?>
     
     </div>
        <div class="col-sm-2">
        </div>

    
  </body>
  </html>
