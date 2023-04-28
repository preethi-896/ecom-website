<?php
session_start();
include('connect.php');
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}
ini_set("display_errors",false);
if(isset($_POST['submit'])) { 
 $userid=$_POST['userid'];
 $username=$_POST['username'];
 $password=$_POST['password'];
 $email=$_POST['email'];
 $number=$_POST['mob'];
 $qry = "UPDATE tblusers  SET username='$username',email='$email',password='$password',mobile='$number' WHERE userid='$userid'";
 $res=mysqli_query($con,$qry);
 echo "<script>alert('Updated successfully');</script>";
 echo "<script>window.location.href = 'seller_user.php'</script>";
}
?>