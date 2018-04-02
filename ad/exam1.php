  <?php
  session_start();
  include("../config.php");
    if(is_null($_SESSION['ausername']))
   {
     session_destroy();
     header("location: indexadmin.php?logoutsuccessfuly");
   }
  ?>

  <!DOCTYPE HTML>
  <html lang="en">
  <head>  
    <title> Examination </title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
       <style>
    body {margin:0;}
    .navbar {
   /* overflow: hidden;*/
    background-color: #5f5f5f;
    position: fixed;
    top: 0;
    z-index: 9999;
    width: 100%;
  }

  .navbar a {
    float: left;
    /*display: block;*/
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 16px;
  }

  .navbar a:hover{
  background-color:#000000 !important;
  color:#ffffff !important;
  }
  .navbar a.active {
  background-color:#4CAF50;
  color:#ffffff;
  }
  .main {
    padding: 16px;
    margin-top: 30px;
    height: 1500px; /* Used in this example to enable scrolling */
  }
  </style>
 <SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form2.addques.value;
if (mt.length<1) {
alert("Please Enter Question");
document.form2.addque.focus();
return false;
}
a1=document.form2.ans1.value;
if(a1.length<1) {
alert("Please Enter Answer1");
document.form2.ans1.focus();
return false;
}
a2=document.form2.ans2.value;
if(a1.length<1) {
alert("Please Enter Answer2");
document.form2.ans2.focus();
return false;
}
a3=document.form2.ans3.value;
if(a3.length<1) {
alert("Please Enter Answer3");
document.form2.ans3.focus();
return false;
}
a4=document.form2.ans4.value;
if(a4.length<1) {
alert("Please Enter Answer4");
document.form2.ans4.focus();
return false;
}
at=document.form2.cans.value;
if(at.length<1) {
alert("Please Enter True Answer");
document.form2.cans.focus();
return false;
}
return true;
}
</script>
  </head>
  <body>
     <?php
  include ("../config.php");
 if(isset($_POST['submit']))
 {
  
   $tst = mysqli_real_escape_string($db,$_POST['sel1']);
       $ad = mysqli_real_escape_string($db,$_POST['addques']);
       $ans1 = mysqli_real_escape_string($db,$_POST['ans1']);
       $ans2 = mysqli_real_escape_string($db,$_POST['ans2']);
       $ans3 = mysqli_real_escape_string($db,$_POST['ans3']);
       $ans4 = mysqli_real_escape_string($db,$_POST['ans4']);
       $correct = mysqli_real_escape_string($db,$_POST['cans']);
       $chec="SELECT * FROM question WHERE testid='$tst' ";
       $store=mysqli_query($db,$chec);
       $count=mysqli_num_rows($store);
       $cc="SELECT totque FROM test WHERE testid='$tst' ";
       $store1=mysqli_query($db,$cc);
       $rw=mysqli_fetch_row($store1);
       if($count==$rw[0])
       {
         header("Location: exam.php?no_more_question_can_be_added");
            exit();
       }
       else
       {
          $hello="INSERT INTO question (testid,que_desc,ans1,ans2,ans3,ans4,corans) VALUES ('$tst','$ad','$ans1','$ans2','$ans3','$ans4','$correct');"; 
            mysqli_query($db,$hello);
            header("Location: exam1.php?entrysuccess");
            exit();
          }
       }
  ?>



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
         <div class="navbar" style="margin-top: 83px">
    <a href="#">HOME</a>
    <a href="subject.php">SUBJECTS</a>
    <a href="routine.php">TIME TABLE</a>
    <a href="addtest.php">ADD TEST</a>
    <a href="exam.php">ADD QUESTION</a>
    <a href="#">RESULTS</a>
    <a href="#">MORE</a>

  </div>
        <br>
        <br>
          <br>
          <br>
          <br>
        <br>
          <br>
          <br>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <form name="form2" role="form" method="POST" action="" onSubmit="return check()">
     <div class="form-group">
      <label for="sel1">Select Test (select one):</label>
      <select class="form-control" id="sel1" name="sel1">
      <?php
        include ("../config.php");
       $resu=$_SESSION['storingdata'];
       $qu = "SELECT testid,testname FROM test WHERE testsub='$resu' ";
        $re = mysqli_query($db,$qu);
      while ($row=mysqli_fetch_row($re)) {
         echo "<option value='$row[0]'> $row[1]    </option>";
      }
      ?>
      </select>
     </div>
         <div class="form-group">
              <label for="addque">Add Question</label>
              <textarea class="form-control" rows="5" id="addque" name="addques"></textarea>
            </div>
        <div class="form-group">
              <label for="ans1">Answer 1</label>
              <input type="text" class="form-control" id="ans1" name="ans1">
        </div>
        <div class="form-group">
              <label for="ans2">Answer 2</label>
              <input type="text" class="form-control" id="ans2" name="ans2">
        </div>
        <div class="form-group">
              <label for="ans3">Answer 3</label>
              <input type="text" class="form-control" id="ans3" name="ans3">
        </div>
        <div class="form-group">
              <label for="ans4">Answer 4</label>
              <input type="text" class="form-control" id="ans4" name="ans4">
        </div>
        <div class="form-group">
              <label for="cans">Correct Answer</label>
              <input type="text" class="form-control" id="cans" name="cans">
        </div>
        
      
         <button type="submit" name="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> submit</button>
        </form>
     </div>
        <div class="col-sm-4">
        </div>
      


    
  </body>
  </html>