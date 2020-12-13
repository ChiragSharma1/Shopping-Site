<html>
<head>
<title>
   remove page
</title>
</head>
<body>
<?php
require('db.php');
include("auth.php");
include('navbar.php');
if($_POST['Cancel']&&$_POST['order_id'])
{
	$o_id=$_POST['order_id'];
	$query2="DELETE FROM orders WHERE order_id='$o_id'";
	$result2=mysqli_query($con,$query2);
	if($result2)
	{
		echo "<h3 align='center'>item is deleted succesfully</h3>";

	}
}
?>

</body>
</html>
