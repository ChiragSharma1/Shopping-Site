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

$product_id=$_POST['product_id'];
$quantity=$_POST['quantity'];
$query="SELECT product_name,product_description,product_image,price FROM products WHERE product_id='$product_id'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$price=$row['price'];
if(!$quantity){
	$quantity = 1;
}
echo "<table border='1' align='center' width='100%'>";


echo "<tr>";
	$product_image=$row['product_image'];
        echo "<td style='width:300px;length:300px'><img src='$product_image' width='300px',height='300px'></td>";
		echo "<td>".$row['product_name']."</td>";
		echo "<td>".$row['product_description']."</td>";
		echo "<td> quantity".$quantity."</td>";
		echo "<td>".$price."</td>";
echo "</tr> </table>";


$query2 ="SELECT * FROM user_address WHERE username='$username' ";
$result2 = mysqli_query($con, $query2);
$i=0;
$row2 = mysqli_fetch_array($result2);
 if(!$row2) echo "<br><br><br><h2>You Have not added any address yet , <a href='../user_address.php' text-decoration='none'> Please add address first!!</a></h2>";
 else {
$total=0;
$total=$total+$quantity*$row['price'];
echo"<p  align='right' style='font-size:30px'>TOTAL IS ".$total."</p>";
echo "<h1 align='center'>FILL THE BELOW FORM TO PLACE ORDER</h1></br>";
$addresses=array();
echo "<form class='form' action='order.php' method='post' >";
echo "<input type='text' name='name' placeholder='name' align='center' style='width:300px;height:43px' required/></br>";

 echo "SELECT ADDRESS  <input type='text' name='product_id' value='$product_id' style='width:0%;height:0%' readonly><input type='text' name='price' value='$total' style='width:0%;height:0%' readonly><input type='text' name='quantity' value='$quantity' style='width:0%;height:0%' readonly><br/>";
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
echo "</from>";}

?>
</body>
</html>
