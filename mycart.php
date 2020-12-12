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
$ary = mysqli_fetch_array($result);
if($ary)
{
$result = mysqli_query($con, $query);
echo "<h1 align='CENTER'>YOUR ADDED PRODUCTS TO CART ARE</h1>";
$total=0;
echo "<hr>";
while($rown1=mysqli_fetch_array($result))
{ $product_id=$rown1['product_id'];
	$query2="SELECT product_name,product_image,product_link,product_description,price FROM products WHERE product_id='$product_id'";
		$result2 = mysqli_query($con, $query2);
		while($rown2 = mysqli_fetch_array($result2))
	{	
		$product_image=$rown2['product_image'];
		$p_name = $rown2['product_name'];
		$p_desc = $rown2['product_description'];
		$p_qty = $rown1['quantity'];
		$p_price = $rown2['price'];
		$p_link = $rown2['product_link'];
		echo "<div>
		<a href='./Products_1111/$p_link' style='text-decoration:none'><img src='Products_1111/$product_image' style='float:left; height:200px;width:270px; padding-left:100px;'></a>
		<h3 style='padding-left:420px;'>$p_name<h3>
		<h5 style='padding-left:420px;'>$p_desc<h5></a>
		<h3 style='padding-left:420px;'> ₹ $p_price</h3>
		<form style='padding-left:420px;' action='add_dec.php' method='post'>
		<input name='product_id' value='$product_id' style='float:right;visibility:hidden'>
		<input type='submit' name='btn' value='-'class='login-button' style='width:50px; float:left;padding:1px;font-weigth:bold'/>
		<h3 style='width:15px; float:left; margin:0px 6px;'>$p_qty</h3>
		<input type='submit' name='btn' value='+'class='login-button' style='width:50px; float:left;padding:1px;font-weight:bold'/>
		<input type='submit' name = 'btn' value='Remove' style='width:80px;padding:1px; float:right;margin-right:100px;'/>
		<input type = 'submit' name = 'btn' value = 'Buy' style = 'width:40px;padding:1px; float:right;margin-right:50px;'/>

		</form>
      </div><br><br><br><br><hr>";
		$total=$total+$rown1['quantity']*$rown2['price'];
}}
echo "</table>";
echo "<center><h3>TOTAL IS</br>".$total."</h3>
<form action='add_dec.php' method='post'>
<input name='product_id' value='$product_id' style='visibility:hidden '><br>
 <input type='submit' name ='btn' value ='Buy All'>
</form></center>";
}
else
{
	echo"<h3 align='center'>no item available in the cart</h3>";
}
?>
<!-- <h2 align='center'><a  href="c_g.php" >captcha</a></h2> -->
</body>
</html>
