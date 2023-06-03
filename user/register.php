<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
$uname = $_POST['uname'];
$phno=$_POST['phno'];
$email = $_POST['email'];
$password = $_POST['password'];
$aname= 'User';
$sql="insert into user(AdminName,UserName,MobileNumber,Email,Password)values(:aname,:uname,:phno,:email,:password)";
$query=$dbh->prepare($sql);
$query->bindParam(':aname',$aname,PDO::PARAM_STR);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':phno',$phno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   echo"erro1";
   if ($LastInsertId>0) {
    echo '<script>alert("You have Successfully Registered...!! ")</script>';
echo "<script>window.location.href ='login.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

}
?>