<html>
<head>
<title>
my cart</title>
</head>
<body>
<?php
require('db.php');
include("auth.php");
include('navbar.php');
$queryn1="UPDATE cart C SET quantity=(SELECT SUM(quantity) WHERE product_id=C.product_id AND username=C.username) ";
$resultn1 = mysqli_query($con, $queryn1);

$username=$_SESSION['username'];

$query ="SELECT  product_id,quantity FROM cart WHERE username='$username' ";

$result = mysqli_query($con, $query);

if($result)
{

echo "<h1 align='CENTER'>YOUR ADDED PRODUCTS TO CART ARE</h1>";
 echo "<table border='1' align='center' width='100%'>
<tr >

<th>product_image</th>

<th>product_name</th>

<th>product_description</th>
<th>quantity</th>
<th>price_per_unit</th>
<th>product link</th>

</tr>

";
$total=0;
while($rown1=mysqli_fetch_array($result))
{ $product_id=$rown1['product_id'];
	$query2="SELECT product_name,product_image,product_link,product_description,price FROM products WHERE product_id='$product_id'";
		$result2 = mysqli_query($con, $query2);
		while($rown2 = mysqli_fetch_array($result2))
	{	echo "<tr>";
		$product_image=$rown2['product_image'];
        echo "<td style='width:300px;length:300px'><img src='$product_image' width='300px',height='300px'></td>";
		echo "<td>".$rown2['product_name']."</td>";
		echo "<td>".$rown2['product_description']."</td>";
		echo "<td>".$rown1['quantity']."</td>";
		echo "<td>".$rown2['price']."</td>";
		$product_link=$rown2['product_link'];
		echo "<td><a href='$product_link'>view </a></td>";
		echo "</tr>";
		echo "</br>";
		$total=$total+$rown1['quantity']*$rown2['price'];
}}
echo "</table>";
echo "<h3 align='right' align='right'>TOTAL IS</br>".$total."</h3>";
}
else
{
	echo"<h3 align='center'>no item available in the cart</h3>";
}
?>
<h2 align='center'><a  href="c_g.php" >captcha</a></h2>
</body>
</html>
