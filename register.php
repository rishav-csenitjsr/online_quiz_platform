<?php

if(isset($_POST['submit']))
{
		include_once 'config.php';
        $firstname  = mysqli_real_escape_string($db,$_POST['frstname']);
        $lastname  = mysqli_real_escape_string($db,$_POST['lstname']);
        $email  = mysqli_real_escape_string($db,$_POST['usrname']);
        $password   = mysqli_real_escape_string($db,$_POST['psw']);
        $password=md5($password);
         $stream  = mysqli_real_escape_string($db,$_POST['stream']);

        $query = "SELECT * FROM student WHERE username='$email'";
        $result = mysqli_query($db,$query);
        $numResults = mysqli_num_rows($result);
       
        if($numResults>0)
        {
            header("Location: index.php?email_already_exists");
            exit();
        }
        else
        {
        	$hello="INSERT INTO student (username,first,last,pwd,strm) VALUES ('$email','$firstname','$lastname','$password','$stream');"; //".md5($password)."
            mysqli_query($db,$hello);
            session_start();
            $_SESSION['username']=$email;
            header("Location: welcome.php?signupsuccess");
            exit();
        }
 }     
 else
 {
 	header("Location: index.php");
 	exit();
 }  
?>
