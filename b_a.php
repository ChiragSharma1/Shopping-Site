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
echo "<h1 align='center'>FILL THE BELOW FORM TO PLACE ORDER</h1></br>";
$addresses=array();
$username=$_SESSION['username'];
echo "<form class='form' action='order_all.php' method='post' >";
echo "<input type='text' name='name' placeholder='name' align='center' style='width:300px;height:43px' required/></br>";
$query2 ="SELECT * FROM user_address WHERE username='$username' ";
$result2 = mysqli_query($con, $query2);
$i=0;

 echo "SELECT ADDRESS  </br>";
while ($row2 = mysqli_fetch_array($result2)) 
	{	
        $addresses[$i]=$row2['address'].",".$row2['city'].",".$row2['state'].",".$row2['country'].",".$row2['pincode'].", phone number:-".$row2['phone'];	
		echo "<input type='radio' value='$addresses[$i]' name='addresses' required/ align='center'>".$addresses[$i]."</br>";
		$i=$i+1;
		
    }
	echo "<p align='center'>SELECT PAYMENT METHOD</p>";
 echo "<input type='radio' name='payment_method' value='COD' align='center' required/> COD <input type='radio' name='payment_method' value='G-pay' align='center' required  /> UPI</br>";
echo "<input type='submit' name='submit' value='PLACE ORDER' align='center' style='width:120px;height:43px'/>";
echo "</from></br>";
?>
<a href='index.php'>redirect to homepage
</a>
</body>
</html>