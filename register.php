<?php
  
include("connect.php");

ini_set("display_errors",false);


// while ($row = mysqli_fetch_assoc($result)) {
// $emilexit=$row['email'];
// }




if(isset($_POST['submit'])) {

$Username=$_POST['Username'];
$email=$_POST['email'];
$password=$_POST['password'];
$number=$_POST['number'];
$role=$_POST['role'];

$errName="";
$query="select * from tblusers where email='$email'";
$result=mysqli_query($con,$query);
$count=mysqli_num_rows($result);

if(empty($Username)&&empty($email) && empty($password) && empty($number) && empty($role)) {
    echo "Enter All details";
 }
    
    elseif(empty($Username)) {
       $errName = " You didn't enter the Name.";      
    }
    elseif(empty($email)) {
       $erremail="You didn't enter the Email.";
     }   
    elseif(empty($password)) {   
      $errpass="You didn't enter the Password.";
    }    
    elseif(empty($number)){   
      $errnumber="You didn't enter the Number";
    }  
    elseif(empty($role)) {  
      $errrole="You didn't enter the Role.";
    }
    
    elseif( $count > 0 )
    {
        echo "<script>alert('Username and Email Already exits');</script>";
    }//end if

   else{
    $qry="insert into tblusers(username,email,password,mobile,role) values('$Username','$email','$password','$number','$role')";
    $res=mysqli_query($con,$qry);
    echo "<script>alert('Data Added success');</script>";
    echo "<script>window.location.href = 'index.php'</script>";
    
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
                    text-align:center;
                    margin-top:200px;
                    margin-left:450px;
                    border:2px solid silver;
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
           <form method="post" action="">
            <table border='1'>
                
                <tr>
                    <td><label>User Name:</label></td>
                    <td><input type="name" name="Username" autofocus autocomplete="off"></td>
                    <td><span class="error"><?php echo $errName; ?> </span> </td> 
                </tr>
                 <tr>
                    <td><label>Email:</label></td>
                    <td><input type="email" name="email" autocomplete="off"></td>
                    <td><span class="error"><?php echo $erremail; ?></span></td> 
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input type="password" name="password" autocomplete="off"></td>
                    <td><span class="error"><?php echo $errpass; ?></span></td> 
                </tr>
                 <tr>
                    <td><label>Mobile Number:</label></td>
                    <td><input type="text" name="number" maxlength="10" autocomplete="off" pattern="[1-9]{1}[0-9]{9}"></td>
                    <td><span class="error"><?php echo $errnumber; ?></span></td> 
                </tr>
                    <tr> 
                        <td><label>Role:</label></td>
                        <td>
                        <select name="role">
                        <option aria-placeholder="select">Select</option> 
                        <option value="Customer">Customer</option>
                        </select></td>   
                        <td><span class="error"><?php echo $errrole; ?></span></td>               
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="register"></td>
                </tr>
                </table>
            </form>
            <button id="back"><a href="index.php">Go back</a></button>
        </body>
        </html>
