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
    <title> Examination </title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
     
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
 

<div style="margin-top: 110px">
 <?php
include("config.php");
extract($_POST);
extract($_GET);
extract($_SESSION);

$query="select * from question";
$tid=$_SESSION['mytestid'];
$rs=mysqli_query($db,"select * from question where testid=$tid");
if(!isset($_SESSION['qn']))
{
  $_SESSION['qn']=0;
  mysqli_query($db,"delete from userans where sess_id='" . session_id() ."'");
  $_SESSION['trueans']=0;
  
}
else
{ 
    if($submit=='Next Question' && isset($ans))
    {
        mysqli_data_seek($rs,$_SESSION['qn']);
        $row= mysqli_fetch_row($rs); 
        mysqli_query($db,"insert into userans(sess_id, testid, que_des, ans1,ans2,ans3,ans4,curans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')");
        if($ans==$row[7])
        {
              $_SESSION['trueans']=$_SESSION['trueans']+1;
        }
        $_SESSION['qn']=$_SESSION['qn']+1;
    }
    else if($submit=='Get Result' && isset($ans))
    {
        mysqli_data_seek($rs,$_SESSION['qn']);
        $row= mysqli_fetch_row($rs); 
        mysqli_query($db,"insert into userans(sess_id, testid, que_des, ans1,ans2,ans3,ans4,curans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')");
        if($ans==$row[7])
        {
              $_SESSION['trueans']=$_SESSION['trueans']+1;
        }
        echo "<h1 class=head1> Result</h1>";
        $_SESSION['qn']=$_SESSION['qn']+1;
        echo "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn] ";
        echo "<tr class=tans><td>True Answer<td>".$_SESSION['trueans'];
        $w=$_SESSION['qn']-$_SESSION['trueans'];
        echo "<tr class=fans><td>Wrong Answer<td> ". $w;
        echo "</table>";
        mysqli_query($db,"insert into result(login,testid,test_date,score) values('$login','$tid','".date("d/m/Y")."','$_SESSION[trueans]')") ;
        echo "<h1 align=center><a href=review.php> Review Question</a> </h1>";
        unset($_SESSION['qn']);
        unset($_SESSION['sid']);
        unset($_SESSION['tid']);
        unset($_SESSION['trueans']);
        exit();
    }
}
$rs=mysqli_query($db,"select * from question where testid='$tid' ");
if($_SESSION['qn']>(mysqli_num_rows($rs)-1))
{
unset($_SESSION['qn']);
echo "<h1 class=head1>Some Error  Occured</h1>";
//session_destroy();
echo "Please <a href=welcome.php> Start Again</a>";

exit;
}
mysqli_data_seek($rs,$_SESSION['qn']);
$row= mysqli_fetch_row($rs);
echo "<form name=myfm method=post action=\"startexam.php\" >";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION['qn']+1;
echo "<tR><td><span class=style2>Que ".  $n .": $row[2]</style>";
echo "<tr><td class=style8><input type=radio name=ans value=1>$row[3]";
echo "<tr><td class=style8> <input type=radio name=ans value=2>$row[4]";
echo "<tr><td class=style8><input type=radio name=ans value=3>$row[5]";
echo "<tr><td class=style8><input type=radio name=ans value=4>$row[6]";

if($_SESSION['qn']<mysqli_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Next Question'></form>";
else
echo "<tr><td><input type=submit name=submit value='Get Result'></form>";
echo "</table></table>";
?>
 </div>   
  </body>
  </html>
