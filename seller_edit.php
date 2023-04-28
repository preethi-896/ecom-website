<?php
session_start();
if(isset($_SESSION['user'])==false)
{
	header("Location:index.php");
}

include('connect.php');
$userid=$_GET['id'];
$result = mysqli_query($con, "Select * from tblusers where userid='$userid'");
$res = mysqli_fetch_assoc($result);
$userid = $res['userid'];
$username= $res['username'];
$password = $res['password'];
$email = $res['email'];
$number = $res ['mobile'];
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
     <form method="post" action="update.php" >
            <table  align="center">
            <tr>
                    <td><label>Userid:</label></td>
                    <td><input type="text" name="userid" required value = "<?php echo $userid?>"></td>
                </tr>
                <tr>
                    <td><label>User Name:</label></td>
                    <td><input type="text" name="username" required value = "<?php echo $username?>"></td>
                </tr>
                <tr>
                    <td><label>password:</label></td>
                    <td><input type="password" name="password" required value = "<?php echo $password ?> "></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="email" name="email" required value = "<?php echo $email ?> "></td>
                </tr>
                <tr>
                    <td><label>Mobile Number:</label></td>
                    <td><input type="number" name="mob"  required value="<?php echo $number?>"></td>
                </tr>                
                <tr>
                <td><input type="submit" name="submit" value="update"></td>
                </tr>
                </table>
            </form>
            <button id="back"><a href="seller_user.php">Go back</a></button>
        </body>
        </html>
