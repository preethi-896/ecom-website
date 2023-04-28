<!doctype html>
<html>
<title>ECOM</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
	<style>
		body{
			background-image:url(pngtree-3d-render.jpg);
			background-size:cover;
		}
		table{
			margin-top:180px;
			border:2px solid silver;
			background-color:#70164c;
			color:white;
		}
		label{
			font-size:32px;
			font-style:italic;
		}
		a{
			color:white;
		}
		</style>
</head>
<body>
	<h1 style="font-style:italic;color:white;">Online Shopping..</h1>
    <form method="post">
            <table border=1 align="center">
                <tr>
                    <td><label>UserName</label></td>
                    <td><input type="text" name="username" autofocus autocomplete="off" Required></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" autocomplete="off" name="pass"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit"></td>
                    <td><a href="register.php">Register Now</a></td>
                </tr>
            </table>
        </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    ini_set("display_errors",false);
	session_start();
	$name=$_POST['username'];
	$pass=$_POST['pass'];

	$q="select * from tblusers where username='$name' and password='$pass'";
	include "connect.php";
	$res=mysqli_query($con,$q);
	$count=mysqli_num_rows($res); //returns numbers selected in select query
	if($count==1)
	{
		$userinfo = mysqli_fetch_assoc($res);
		$_SESSION['userid']=$userinfo['userid'];
		$_SESSION['user']=$name;
		$_SESSION['role']=$role=$userinfo['role'];
		if($role=='seller'){
		header("Location:Seller.php");
		}
        elseif($role=='Customer'){
		header("Location:Customer.php");
        }
	}
	else
	{
		echo "<p style='text-align:center;background-color:red;width:28%;margin-left:455px;'>Invalid login!!</p>";
	}
}
?>