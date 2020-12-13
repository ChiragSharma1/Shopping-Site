<html>
<head>
<title>
my orders</title>
</head>
<body>
<?php
require('db.php');
include("auth.php");
include('navbar.php');
$username=$_SESSION['username'];
$query="SELECT * FROM orders WHERE username='$username'";
$result=mysqli_query($con,$query);
$resultm=mysqli_query($con,$query);
if($rowm=mysqli_fetch_array($resultm))
{
while($row=mysqli_fetch_array($result))
{
	$product_id=$row['product_id'];
	$address=$row['address'];
	$query1="SELECT product_image,product_name,product_description,product_link FROM products WHERE product_id='$product_id'";
	$result1=mysqli_query($con,$query1);
	$row1=mysqli_fetch_array($result1);
	$order_id=$row['order_id'];
	$name = $row['name'];
	$p_name = $row1['product_name'];
	$p_desc = $row1['product_description'];
	$p_qty = $row['quantity'];
	$p_price = $row['price'];
	$product_image=$row1['product_image'];
	$p_link=$row1['product_link'];
	echo "<div>
		<a href='./Products_1111/$p_link' style='text-decoration:none'><img src='Products_1111/$product_image' style='float:left; height:200px;width:270px; padding-left:100px;'></a>
		<h3 style='margin-right:450px;float:right;margin-top:10px'>$name</h3><h3 style='padding-left:420px;margin-top:20px'>$p_name</h3>
		<h4 style='margin-right:300px;float:right'>$address</h4><h5 style='padding-left:420px;'>$p_desc<h5></a>
		<h3 style='padding-left:420px;'> ₹ $p_price</h3>
		<form class='form' action='c_o.php' method='post'>
		<input value='$order_id' name = 'order_id' style='visibility:hidden'/>
		<input type='submit' value = 'Cancel' name = 'Cancel' style='float:right;margin-right:20px;'/>
		</form>
      </div><br><br><br><br><hr>";

}

}
else
{
	echo "<h1 align='center'> You have not ordered any item yet</h1>";
}
?>

</body>
</html>
