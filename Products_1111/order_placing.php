<html>
<head>
<title>
Buy_PAGE</title>
</head>
<body style="text-align:center">
<?php
require('../db.php');
include("../auth.php");
include('navbar.php');
$username=$_SESSION['username'];

$p_id=$_POST['product_id'];
$p_qty=$_POST['quantity'];
$querym1="SELECT quantity FROM products WHERE product_id='$p_id'";
		$resultm1=mysqli_query($con,$querym1);
		$rowm1=mysqli_fetch_array($resultm1);
		$quantitym1=$rowm1['quantity'];
if($quantitym1>=$p_qty)
{	
$query="SELECT * FROM products WHERE product_id='$p_id'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$p_price=$row['price'];
if(!$p_qty){
	$p_qty = 1;
}
$p_name = $row['product_name'];
$p_desc = $row['product_description'];
$p_link = $row['product_link'];
$product_image = $row['product_image'];
echo '<br><br>';
echo "<div>
		<a href='$p_link' style='text-decoration:none'><img src='$product_image' style='float:left; height:200px;width:270px; padding-left:100px;'></a>
		<h3 style='padding-left:420px;'>$p_name<h3><h3 style = 'margin-right:200px; float:right;'>Quantity $p_qty</h3>
		<h5 style='padding-left:420px;'>$p_desc<h5>
		<h3 style='padding-left:420px;'> ₹ $p_price</h3>
  </div><br><br><br><br><hr>";
$total = $p_price*$p_qty;
echo "<center><h3>TOTAL IS</br>".$total."</h3></center><br><br><br><hr>";


$query2 ="SELECT * FROM user_address WHERE username='$username' ";
$result2 = mysqli_query($con, $query2);
$i=0;
$row2 = mysqli_fetch_array($result2);
 if(!$row2) echo "<br><br><br><h2>You Have not added any address yet , <a href='../user_address.php' text-decoration='none'> Please add address first!!</a></h2>";
 else {
echo "<h1 align='center'>FILL THE BELOW FORM TO PLACE ORDER</h1></br>";
$addresses=array();
echo "<center><form class='form' action='order.php' method='post' >";
echo "<input type='text' name='name' placeholder='name' align='center' style='width:300px;height:43px' required/></br>";

 echo "SELECT ADDRESS  <input type='text' name='product_id' value='$p_id' style='width:0%;height:0%;display:none' readonly><input type='text' name='price' value='$total' style='width:0%;height:0%;display:none' readonly><input type='text' name='quantity' value='$p_qty' style='width:0%;height:0%;display:none' readonly><br/>";
$result2 = mysqli_query($con,$query2);
while ($row2 = mysqli_fetch_array($result2))
	{
		$flag = true;
        $addresses[$i]=$row2['address'].",".$row2['city'].",".$row2['state'].",".$row2['country'].",".$row2['pincode'].", phone number:-".$row2['phone'];
		echo "<input type='radio' value='$addresses[$i]' name='addresses' required/ align='center'>".$addresses[$i]."</br>";
		$i=$i+1;

	}
	echo "<p align='center'>SELECT PAYMENT METHOD</p>";
 echo "<input type='radio' name='payment_method' value='COD' align='center' required/> COD <input type='radio' name='payment_method' value='G-pay' align='center' required  /> UPI</br>";
echo "<input type='submit' name='submit' value='PLACE ORDER' align='center' style='width:120px;height:43px'/>";
echo "</from></center>";}
}
else
{
	echo"<h1>SELECTED QUANTITY IS NOT AVAILABLE IN STOCK</h1></br>
	Please select a lower quantity";
	
}
?>
</body>
</html>
