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
echo "<form class='form' action='c_o.php' method='post' >";
 echo "<table border='1' align='center' text-align='center' width='100%'>
<tr >
<th>order_id</th>
<th>name</th>
<th>product_image</th>

<th>product_name</th>

<th>product_description</th>
<th>quantity</th>
<th>price</th>
<th>address selected</th>
<th>product link</th>

</tr>

";
while($row=mysqli_fetch_array($result))
{
	$product_id=$row['product_id'];
	$address=$row['address'];
	$query1="SELECT product_image,product_name,product_description,product_link FROM products WHERE product_id='$product_id'";
	$result1=mysqli_query($con,$query1);
	$row1=mysqli_fetch_array($result1);
	echo "<tr>";
	$order_id=$row['order_id'];
	echo "<td >".$order_id."</td>";
	echo "<td >".$row['name']."</td>";
	$product_image=$row1['product_image'];
    echo "<td style='width:300px;length:300px'><img src='Products_1111/$product_image' width='300px',height='300px'></td>";
	echo "<td>".$row1['product_name']."</td>";
	echo "<td>".$row1['product_description']."</td>";
	echo "<td>".$row['quantity']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "<td>".$address."</td>";
	$product_link=$row1['product_link'];
	echo "<td><a href='$product_link'>view </a></td>";
	echo "<td><input type='radio' value='$order_id' name='order_id' required/ ></td>";
	echo "<td><input type='submit' value='cancel' name='cancel'/></td>";
	echo "</tr>";
	echo "</br>";

}
echo "</table>";
echo "</form>";
}
else
{
	echo "<h1 align='center'> you have not ordered any item yet</h1>";
}
?>
<p align='center'><a href='index.php' >redirect to homepage</a></p>

</body>
</html>
