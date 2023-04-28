<?php
session_start();
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}
include('connect.php');
$pcode=$_GET['pc'];
$userid =$_SESSION['userid'];
$q="insert into tblcart(cartuserid,cartprodcode) values($userid,$pcode)";
$res=mysqli_query($con,$q);
echo "<script>alert('Add To Cart successfully');</script>";
echo "<script>window.location.href = 'displaycart.php'</script>";
?>