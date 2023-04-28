<?php
session_start();
include('connect.php');
//remove from cart
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}
if(isset($_GET['ch']) && $_GET['ch']=="removecart")
{
	$q="delete from tblcart where cartid=".$_GET['cc'];
	mysqli_query($con,$q);
}
?>


<style>
	#sec2{
  display:inline-block;
  border:1px solid black;
  margin-left:10px;
  padding:5px;
  background-color:#127eb0;
  margin-top:10px;
  font-style:italic;
  color:yellow;
}
#myshop{
	background-image:url('addcart.jpg');
	background-size:cover;
	width:100%;
	height:200px;
	color:silver;
	font-style:italic;
	text-align:center;
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

<h1 id="myshop">My Shopping Cart..</h1>
<?php

$q="select cartid,cartprodcode,catname,prodname,prodprice,image
    from tblcart inner join tblproducts on cartprodcode=prodcode
    inner join tblcategories on catcode=prodcatcode
    where cartuserid=".$_SESSION['userid'];
$result=mysqli_query($con,$q);
while($products = mysqli_fetch_assoc($result)){


//var_dump($products);
?>

	<?php
	
	?>
		 <section id="sec2">
            <h3 class="name" style='text-align:center;'><?=$products['prodname']?></h3>
            <?php
            echo "<img src='./image./" . $products['image'] . "' alt='Product image' width='200' height='100'>";
            ?>
            <p class="price">
                <?php if ($products['prodprice'] > 0): ?>
                <h3 style='text-align:center;'><?=$products['prodprice']?>Rs</span>
                <?php endif; ?>
                </h3>
               <td><button><a href="?ch=removecart&cc=<?php echo $products['cartid']; ?>">Remove from Cart</a></button> </td>
                </section>
	<?php
	}
	?>
<br>
<br>
<button id="back"><a href="Customer.php">Go back</a></button>

