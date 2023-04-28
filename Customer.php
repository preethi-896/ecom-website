<?php
session_start();
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}
include "connect.php";
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
background-color:#127eb0;
}
nav a{
  color:yellow;
}
nav ol li{
display:inline-block;
width:170px;
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
  border:2px solid silver;
  margin-left:10px;
  padding:5px;
  background-color:#127eb0;
  margin-top:10px;
  color:yellow;
  font-style:italic;
}
#addnew{
  text-align:center;
  text-decoration:underline;
  background-color:white;
  font-style:italic;
}
#Contact{
  text-align:center;
  text-decoration:underline;
  background-color:white;
  font-style:italic;
}
#about{
  background-image:url('deposit.jpg');
  background-size:100% 100%;
  background-repeat:no-repeat;
  color:silver;
  height:250px;
}
#about h1{
  margin-left:840px;
  color:silver;
}
#user{
  color:yellow;
}


  </style>

</head>
<body>
<nav>
		<ol>
		    <li><a href="#home">Home</a></li>
			<li><a href="#addnew">Products</a></li>
			<li><a href='displaycart.php'>View Cart</a></li>
      <li><a href='#about'>Contact</a></li>
      <li id="user">User:<?php echo $_SESSION['user'] ;?></li>
      <li><a href='logout.php'>Logout</a></li>
		</ol>
	</nav>
  <img width="100%" height="400px" src="welcome.jpg"></img>
<hr>

  <h1 id="addnew">Products</h1>
<?php
$q="select prodcode,prodname,catname,prodprice,image from tblproducts inner join tblcategories on prodcatcode=catcode";
$result=mysqli_query($con,$q);
//$products = mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($products);
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
                <td> <button><a href="addtocart.php?ch=addcart&pc=<?php echo $row['prodcode']; ?>">Add To Cart</a> </button></td>

                </section>
	<?php
	}
	?>
  <h1 id="Contact">Contact</h1>
  <section id="about">
  
<h1>Noor online store</h1>
<h1>Email:Noor@gmail.com</h1>
<h1>Phone:9876234567</h1>

 </section>
	
    </body>
    </html>