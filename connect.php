
<?php
$server="localhost";
$mysqluser = "root";
$mysqlpass="";
$db="ecom";
$con = mysqli_connect($server,$mysqluser,$mysqlpass,$db);
if($con==false)
{
    
    echo "<p>Not Connected</p>";
    $err = mysqli_connect_error($con);
    echo "<p>$err</p>";
    exit(); //die()
}
?>
