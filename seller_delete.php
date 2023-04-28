<?php
session_start();
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}
include_once('connect.php');
$userid=$_GET['id'];
$qry= "Delete from tblusers where userid = '$userid'";
$result=mysqli_query($con,$qry);
echo "<script>alert('Deleted successfully');</script>";
echo "<script>window.location.href = 'seller_user.php'</script>";
?>