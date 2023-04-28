<h1>Product Display</h1>
<?php

session_start();
include('connect.php');
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}
$q="select prodcode,prodname,catname,prodprice,image from tblproducts inner join tblcategories on prodcatcode=catcode";
$result=mysqli_query($con,$q);
//$products = mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($products);
?>

<style>
    #sec2{
  display:inline-block;
  border:1px solid black;
  margin-left:10px;
  padding:5px;
  background-color:#fc6603;
  margin-top:10px;
}
    </style>

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
				<td> <a href="addtocart.php?ch=addcart&pc=<?php echo $row['prodcode']; ?>">Add To Cart</a> </td>
                </section>
	<?php
	}
	?>	
		</tr>	
	


