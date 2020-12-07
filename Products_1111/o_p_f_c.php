<html>
<head>
<title>
Buy_PAGE</title>
</head>
<body style="text-align:center">
<h1 align="center"style="font-size:50px;background-color:#FE9A2E;color:white">fIrSt ChOiCe</h1>
<?php
require('db.php');
include("auth.php");
    $username=$_SESSION['username'];
	$product_id=$_POST['product_id'];
	$quantity=$_POST['quantity'];
   $name=$_POST['name'];
	$address=$_POST['addresses'];
	$payment=$_POST['payment_method'];
	$total1=$_POST['price'];
	$query1 = "INSERT INTO orders (username, product_id, name,quantity,price,address,payment_method)
VALUES ('$username', '$product_id', '$name', '$quantity','$total1','$address','$payment')";
$result1=mysqli_query($con,$query1);
if($result1)
{
	$query3="DELETE FROM cart WHERE username='$username' AND product_id='$product_id'";
		$result3=mysqli_query($con,$query3);
	echo "order placed successfully</br>";
	echo"<a href='index.php'>redirect to homepage</a>";
}
?>
</body>
</html>