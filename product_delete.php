
<?php
session_start();
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}
include_once('connect.php');
$code=$_GET['id'];
$qry= "Delete from tblproducts where prodcode = '$code'";
$result=mysqli_query($con,$qry);
echo "<script>alert('Deleted successfully');</script>";
echo "<script>window.location.href = 'Seller.php'</script>";
?>