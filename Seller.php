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
   margin:auto;
   width:90%;
   border:1px solid black;
}

nav{
width:100%;
height:40px;
border-bottom:1px solid pink;
background-color:white;
}
nav ol li{
display:inline-block;
width:200px;
text-align:Center;
padding-top:12px;
padding-bottom:12px;
font-weight:bold;
}
nav ol li:hover{
background-color:#797778;
border-radius:20px;
}
.product {
	display: flex;
	padding: 40px 0;
}
.product > div {
	padding-left: 15px;
}
.product h1 {
	font-size: 34px;
	font-weight: normal;
	margin: 0;
	padding: 20px 0 10px 0;
}
.product .price {
	display: block;
	font-size: 22px;
	color: #999999;
}
#sec2{
  display:inline-block;
  border:1px solid black;
  margin-left:10px;
  padding:5px;
  background-color:#127eb0;
  margin-top:10px;
}
#addnew{
  text-align:center;
  text-decoration:underline;
  background-color:white;
}


  </style>

</head>
<body>
  <nav>
		<ol>
			<li>Home</li>
      <li><a href="#addnew">Products</a></li>
			<li><a href="seller_user.php">User Details</a></li>
			<li><a href="add_new_product.php">Add new product</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ol>
	</nav>
  <img width="100%" height="400px" src="online.jpg"></img>
  <section>
  <h1 id="addnew">My Products</h1>
<?php
$q="select prodcode,prodname,catname,prodprice,image from tblproducts inner join tblcategories on prodcatcode=catcode";
$result=mysqli_query($con,$q);
?>
<?php

while ($row = mysqli_fetch_assoc($result)) {
	?>
  <section id="sec2">
            <h3 class="name" style='text-align:center;'><?=$row['prodname']?></h3>
            <?php
            echo "<img src='./image./" . $row['image'] . "' alt='Product image' width='200' height='100'>";
            ?>
            <p class="price">
                <?php if ($row['prodprice'] > 0): ?>
                <h3 style='text-align:center;'><?=$row['prodprice']?>Rs</span>
                <?php endif; ?>
                </h3>
            <?php
                echo "<td><button><a href=\"product_edit.php?id=$row[prodcode]\">Edit</a></button> <button><a href=\"product_delete.php?id=$row[prodcode]\" onClick=\"return confirm('do you want to delete?')\">Delete</a></button></td>" ;
                ?>

  </section>
	<?php
	}
	?>
    </body>
    </html>