<?php

session_start();
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}

  
include("connect.php");

ini_set("display_errors",false);
$prodcode=$_GET['id'];

$result = mysqli_query($con, "Select * from tblproducts where prodcode='$prodcode'");
$res = mysqli_fetch_assoc($result);
$code=$res['prodcode'];
$pname=$res['prodname'];
$category=$res['prodcatcode'];
$price=$res['prodprice'];
$img=$res['image'];
$errName="";

if(isset($_POST['update'])) { 
    $code=$_POST['code'];
    $pname=$_POST['pname'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    if(empty($code)&&empty($pname) && empty($category) && empty($price)) {
       echo "Enter All details";
    }  
       elseif(empty($pname)) {
        $errpname= "You didn't enter the product name";
        }   
       elseif(empty($category)) {   
         $errcat= "You didn't Select the category.";
       }    
       elseif(empty($price)){   
         $errprice = "You didn't Select the category.";
        
       }  
      else{
       $qry = "UPDATE tblproducts  SET prodname='$pname',prodcatcode='$category',prodprice='$price' WHERE prodcode='$code'";
       $res=mysqli_query($con,$qry);
       echo "<script>alert('updated successfully');</script>";
       echo "<script>window.location.href = 'Seller.php'</script>";
   }
   }
       
   
?>
<!Doctype html>
    <html>
        <head>
            <style>
                body{
                    background-color:silver;
                    background-image:url('login.jpg');
                    background-size:cover;
                }
                table{
                margin-top:50px;
                background-color:white;
                color:#127eb0;
               }
               label{
                font-size:24px;
               }
               #back{
                background-color:red;
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
        
    <form method="post"  action="" enctype="multipart/form-data" >
            <table align="center">

            <tr>
                    <td><label>Product code:</label></td>
                    <td><input type="text" name="code" value='<?php echo $code;?>'></td>
                 
                </tr>
                
              
                <tr>
                    <td><label>Product Name:</label></td>
                    <td><input type="text" name="pname" value='<?php echo $pname;?>'></td>
                    <td><span class="error"><?php echo $errpname; ?></span></td> 
                </tr>
                <tr>
                    <td><label>Product Category:</label></td>
                    <td><select name="category">
                      <option value='1'>Accessories</option>
                      <option value='2'>Mobile</option>
                      <option value='3'>Home Appliances</option>
                      <option value='4'>Perfume</option>
                      <option value='5'>Books</option>
                      <option value='6'>Clothing</option>
                     </select>
                   </td>
                   <td><span class="error"><?php echo $errcat; ?></span></td>
                  
                </tr>
                <tr>
                    <td><label>Product Price:</label></td>
                    <td><input type="text" name="price" value='<?php echo $price;?>' ></td>
                    <td><span class="error"><?php echo $errprice; ?></span></td>
                </tr>
                <tr>
               
                <td><label >Product image</label></td>
                <td><img src="image/<?php echo $res['image']?>" style="width:100px;height:100"></td>
                <td><a href="change-productimage.php?code=<?php echo $res['prodcode'];?>">Change Image</a><td>
                </tr>
                <tr>
                
            </tr>
                  
                <tr>
                    <td><input type="submit" name="update" value="update"></td>
                </tr>
                </table>
            </form>
            <button id="back"><a href="Seller.php">Go back</a></button>
        </body>
        </html>

