<html>
<head>
<title>
   remove page
</title>
</head>
<body style="text-align:center">
<?php
require('db.php');
include("auth.php");
include('navbar.php');
if($_POST['cancel']=='remove')
{
	$p_id=$_POST['product_id'];
	$query2="DELETE FROM cart WHERE product_id='$p_id'";
	$result2=mysqli_query($con,$query2);
	if($result2)
	{
		echo "<h3 align='center'>item is deleted succesfully</h3>";
		
	}
}
if($_POST['cancel']=='buy')
{
	$username=$_SESSION['username'];

$product_id=$_POST['product_id'];
$querym="SELECT quantity FROM cart where username='$username' AND product_id='$product_id'";
$resultm=mysqli_query($con,$querym);
$rowm=mysqli_fetch_array($resultm);
$quantity=$rowm['quantity'];
$query="SELECT product_name,product_description,product_image,price FROM products WHERE product_id='$product_id'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$price=$row['price'];

echo "<table border='1' align='center' width='100%'>";


echo "<tr>";
	$product_image=$row['product_image'];
        echo "<td style='width:300px;length:300px'><img src='Products_1111/$product_image' width='300px',height='300px'></td>";
		echo "<td>".$row['product_name']."</td>";
		echo "<td>".$row['product_description']."</td>";
		echo "<td> quantity=".$quantity."</td>";
		echo "<td>".$price."</td>";
echo "</tr> </table>";



$total=0;
$total=$total+$quantity*$row['price'];
echo"<p  align='right' style='font-size:30px'>TOTAL IS".$total."</p>";
echo "<h1 align='center'>FILL THE BELOW FORM TO PLACE ORDER</h1></br>";
$addresses=array();
echo "<form class='form' action='o_p_f_c.php' method='post' >";
echo "<input type='text' name='name' placeholder='name' align='center' style='width:300px;height:43px' required/></br>";
$query2 ="SELECT * FROM user_address WHERE username='$username' ";
$result2 = mysqli_query($con, $query2);
$i=0;

 echo "SELECT ADDRESS  <input type='text' name='product_id' value='$product_id' style='width:0%;height:0%' readonly><input type='text' name='price' value='$total' style='width:0%;height:0%' readonly><input type='text' name='quantity' value='$quantity' style='width:0%;height:0%' readonly><br/>";
while ($row2 = mysqli_fetch_array($result2)) 
	{	
        $addresses[$i]=$row2['address'].",".$row2['city'].",".$row2['state'].",".$row2['country'].",".$row2['pincode'].", phone number:-".$row2['phone'];	
		echo "<input type='radio' value='$addresses[$i]' name='addresses' required/ align='center'>".$addresses[$i]."</br>";
		$i=$i+1;
		
    }
	echo "<p align='center'>SELECT PAYMENT METHOD</p>";
 echo "<input type='radio' name='payment_method' value='COD' align='center' required/> COD <input type='radio' name='payment_method' value='G-pay' align='center' required  /> UPI</br>";
echo "<input type='submit' name='submit' value='PLACE ORDER' align='center' style='width:120px;height:43px'/>";
echo "</from>";

	
}
?>
<p align='center'><a href='mycart.php'>redirect to my cart</a></p>

</body>
</html>