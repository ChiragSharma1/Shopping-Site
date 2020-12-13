<html>
<head>
<title>
my cart</title>
</head>
<body>
<?php
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
$total=0;
echo "<hr>";
while($rown1=mysqli_fetch_array($result))
{ $product_id=$rown1['product_id'];
	$query2="SELECT product_name,product_image,product_link,product_description,price FROM products WHERE product_id='$product_id'";
	$querym1="SELECT quantity FROM products WHERE product_id='$product_id'";
		$resultm1=mysqli_query($con,$querym1);
		$rowm1=mysqli_fetch_array($resultm1);
		$quantitym1=$rowm1['quantity'];
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
		<h3 style='padding-left:420px;'>$p_name<h3><h3 style = 'margin-right:200px; float:right;'>Quantity $p_qty</h3>
		<h5 style='padding-left:420px;'>$p_desc<h5>
		<h3 style='padding-left:420px;'> ₹ $p_price</h3>";
		if($quantitym1<$p_qty){echo"OUT of stock for selected quantity";}
     echo" </div><br><br><br><br><hr>";
		$total=$total+$rown1['quantity']*$rown2['price'];
}}
echo "</table>";
echo "<center><h3>TOTAL IS</br>".$total."</h3></center><br><br><br><hr>";

 ///***     Form to fill  ***///
$query2 ="SELECT * FROM user_address WHERE username='$username' ";
$result2 = mysqli_query($con, $query2);
$i=0;
$row2 = mysqli_fetch_array($result2);
 if(!$row2) echo "<br><br><br><h2>You Have not added any address yet , <a href='user_address.php' text-decoration='none'> Please add address first!!</a></h2>";
 else {
echo "<h1 align='center'>FILL THE BELOW FORM TO PLACE ORDER</h1></br>";
$addresses=array();
echo "<center><form class='form' action='order_all.php' method='post' >";
echo "<input type='text' name='name' placeholder='name' align='center' style='width:300px;height:43px' required/></br>";

//  echo "SELECT ADDRESS  <input type='text' name='product_id' value='$product_id' style='width:0%;height:0%' readonly><input type='text' name='price' value='$total' style='width:0%;height:0%' readonly><input type='text' name='quantity' value='$quantity' style='width:0%;height:0%' readonly><br/>";
echo "Select Address<br>";
$result2 = mysqli_query($con,$query2);
while ($row2 = mysqli_fetch_array($result2))
	{
		$flag = true;
        $addresses[$i]=$row2['address'].",".$row2['city'].",".$row2['state'].",".$row2['country'].",".$row2['pincode'].", phone number:-".$row2['phone'];
		echo "<input type='radio' value='$addresses[$i]' name='addresses' required/ align='center'>".$addresses[$i]."<br>";
		$i=$i+1;

	}
	echo "<p align='center'>SELECT PAYMENT METHOD</p>";
 echo "<input type='radio' name='payment_method' value='COD' align='center' required/> COD <input type='radio' name='payment_method' value='G-pay' align='center' required  /> UPI</br>";
echo "<input type='submit' name='submit' value='PLACE ORDER' align='center' style='width:120px;height:43px'/>";
echo "</from></center>";}}

?>
<!-- <h2 align='center'><a  href="c_g.php" >captcha</a></h2> -->
</body>
</html>
