<?php
include("connect.php");
$code=$_GET['code'];
session_start();
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}
// $result = mysqli_query($con, "Select * from tblproducts where prodcode='$code'");
// $res = mysqli_fetch_assoc($result);
if(isset($_POST['update'])){
   $filename = $_FILES["upload"]["name"];
   $tempname = $_FILES["upload"]["tmp_name"];
   $newfilename=$filename;
   $move=move_uploaded_file($tempname,"./image/".$newfilename);
   if(isset($move)) {
    echo "The file ". basename($filename). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
   $qry = "UPDATE tblproducts  SET image='$filename' WHERE prodcode='$code'";
   print_r($qry);
   $res=mysqli_query($con,$qry);
   echo "<script>alert('Image updated successfully');</script>";
   echo "<script>window.location.href = 'Seller.php'</script>";
   exit();
}
?>
<!Doctype html>
<head>
<style>
  body{
   Background-color:silver;
   font-style:italic;
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
  <body>

                <form action="" method="post"  enctype="multipart/form-data">
                <tr>
                <td><label >Product image</label></td>
                <td><input type="file"  name="upload" required ></td>
                </tr>
                <tr>
                    <td><input type="submit" name="update" value="update"></td>
                </tr>
</form>
<button id="back"><a href="product_edit.php">Go back</a></button>
</body>