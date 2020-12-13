<html>
<head>
<title>
Buy_PAGE</title>
</head>
<body style="text-align:center">
<?php
require('db.php');
include("auth.php");
include('navbar.php');
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
$query3="DELETE FROM cart WHERE username='$username' AND product_id='$product_id'";
$result3=mysqli_query($con,$query3);
if($result1)
{
	$query="UPDATE products SET quantity=quantity-'$quantity' WHERE product_id='$product_id'";
	$result=mysqli_query($con,$query);
  echo "<br><br>";
	echo "<h1>Order placed successfully👍</h1></br>";
	echo"<h2>Thanks for Choosing First Choice , Enjoy Shopping 😊</h2>";
}
?>
</body>
</html>
