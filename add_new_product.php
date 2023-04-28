<?php
  session_start();
  if(isset($_SESSION['user'])==false)
  {
      header("Location:index.php");
  }
include("connect.php");

ini_set("display_errors",false);


//$res=mysqli_query($con,$cat);

if(isset($_POST['submit'])) {
$code=$_POST['code'];
$pname=$_POST['pname'];
$category=$_POST['category'];
$price=$_POST['price'];
$errName="";

if(empty($code)&&empty($pname) && empty($category) && empty($price) && empty($image)) {
    echo "Enter All details";
 }
    
    elseif(empty($pname)) {
       $errpname="You didn't enter the product name.";
     }   
    elseif(empty($category)) {   
      $errcat="You didn't enter the category.";
    }    
    elseif(empty($price)){   
      $errprice="You didn't enter the pice";
    }  
    
   else{
    $filename = $_FILES["pic"]["name"];
    $tempname = $_FILES["pic"]["tmp_name"];
    $newfilename=$filename;
    $move=move_uploaded_file($tempname,"./image/".$newfilename);
    if(isset($move)) {
        echo "The file ". basename($filename). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $qry="insert into tblproducts(prodcode,prodname,prodcatcode,prodprice,image) values('$code','$pname','$category','$price','$filename')";
    $res=mysqli_query($con,$qry);
    echo "<script>alert('Added successfully');</script>";
    echo "<script>window.location.href = 'Seller.php'</script>";
    exit();
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
                    margin-top:200px;
                    margin-left:450px;
                    background-color:white;
                }
                span{
                    color:red;
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
        
    <form method="post" action="" enctype="multipart/form-data" >
            
            <table  border='1'>
                <tr>
                    <td><label>Product Name:</label></td>
                    <td><input type="text" name="pname"></td>
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
                    <td><input type="text" name="price" ></td>
                    <td><span class="error"><?php echo $errprice; ?></span></td> 
                </tr>
                <tr>
                <td><label >Product image</label></td>
                <td><input type="file" class="form-control-file" name="pic" required ></td>
                </tr>
                  
                <tr>
                    <td><button><input type="submit" name="submit" value="Add Product"></button></td>
                </tr>
                </table>
            </form>
            <button id="back"><a href="Seller.php">Go back</a></button>
        </body>
        </html>
