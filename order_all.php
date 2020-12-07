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
$query="SELECT product_id,quantity FROM cart WHERE username='$username'";
$result= mysqli_query($con,$query);
$name=$_POST['name'];
$address=$_POST['addresses'];
$payment=$_POST['payment_method'];
while($row=mysqli_fetch_array($result))
{
	$product_id=$row['product_id'];
	$quantity=$row['quantity'];
	$query2="SELECT price FROM products WHERE product_id='$product_id'";
	$result2= mysqli_query($con,$query2);
	$row2=mysqli_fetch_array($result2);
    $price=$row2['price'];
	$total1=$price*$quantity;
	$query1 = "INSERT INTO orders(username, product_id, name,quantity,price,address,payment_method)
	VALUES ('$username', '$product_id', '$name', '$quantity','$total1','$address','$payment')";
	$result1=mysqli_query($con,$query1);
	if($result1)
	{
		$query3="DELETE FROM cart WHERE username='$username' AND product_id='$product_id'";
		$result3=mysqli_query($con,$query3);
		
	}
}
?>
your orders are palced<br/>
<a href='index.php'>redirect to homepage</a>
</body>
</html>