<?php
session_start();
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}
include('connect.php');
?>
<!doctype html>
<html>
<head>
  <style>
  body{
   Background-color:silver;
   font-style:italic;
  }
  tr:nth-child(even){
    background-color:#127eb0;
    color:yellow;
  }
  tr:nth-child(even) a{
    color:yellow;
  }
  #back{
  background-color:#127eb0;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  margin-left:1105px;

  }
  #back a{
color:yellow;
}

  </style>
</head>
<body>
<h1>User Details</h1>
<table style="width:80%" border="1" >
                <tr>
                    <th>UserId</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>operation</th>
                </tr>
                
<?php $result = mysqli_query($con, "SELECT * FROM tblusers");

while($res = mysqli_fetch_array($result)) {


    echo "<tr>";

    echo "<td>".$res['userid']."</td>";

    echo "<td>".$res['username']."</td>";
    
    echo "<td>".$res['email']."</td>";
      
    echo "<td>".$res['mobile']."</td>";

    echo "<td><a href=\"seller_edit.php?id=$res[userid]\">Edit</a> | <a href=\"seller_delete.php?id=$res[userid]\" onClick=\"return confirm('do you want to delete?')\">Delete</a></td>" ;

    echo "</tr>";
   
}
    ?>
  </table>
  <button id="back"><a href="Seller.php">Go back</a></button>
    </body>
    </html>
