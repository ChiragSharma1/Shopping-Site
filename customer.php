 <!-- this page tells address of user  -->
<html>
<head>
<title>
	CUSTOMER ADDRESS
</title>
</head>
<body style="text-align:center">
<?php
require('db.php');
include("auth.php");
include('navbar.php');
$username=$_SESSION['username'];

$query ="SELECT * FROM user_address,users WHERE user_address.username='$username' AND users.username='$username'";

$result = mysqli_query($con, $query);
$ary = mysqli_fetch_array($result);
if(!$ary){
	echo "<center>";
	echo "<h1>You have not added any address yet !!</h1>";
	
}
else {
	$result = mysqli_query($con,$query);
echo "<h1 align='CENTER'>YOURS ADDRESSES ARE</h1>";
 echo "<table border='1' align='center' width='100%'>

<tr >

<th>username</th>

<th>address</th>

<th>city</th>
<th>state</th>
<th>country</th>
<th>pincode</th>
<th>phone no.</th>

<th>email</th>

</tr>";
$i=0;
    while ($row = mysqli_fetch_array($result))
	{	echo "<tr>";
        echo "<td>".$row['username']."</td>";
		$address=$row['address'];
		echo "<td>".$address."</td>";
		echo "<td>".$row['city']."</td>";
		echo "<td>".$row['state']."</td>";
		echo "<td>".$row['country']."</td>";
		echo "<td>".$row['pincode']."</td>";
		$phone=$row['phone'];
		echo "<td>".$phone."</td>";
        echo "<td>".$row['email']."</td>";
		echo "<form class='form$i' action='r_a.php' method='post' >";
		echo "<td>
		<input type='text' name='phone' value='$phone' style='width:0%;height:0%;display:none' readonly><input type='radio' value='$address' name='address' required/ ></td>";
		echo "<td><input type='submit' value='remove' name='cancel'/></td>";
		echo "</form>";
		echo "</tr>";
		echo "</br>";
		$i=$i+1;
    }
echo "</table>";

}
?>
<a href='user_address.php'>
ADD another Address
</a>
</body>
</html>
