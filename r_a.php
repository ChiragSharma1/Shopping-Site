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
$username=$_SESSION['username'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$queryn3 ="DELETE FROM user_address WHERE username='$username' AND address='$address' AND phone='$phone'";
$resultn3 = mysqli_query($con, $queryn3);
if($resultn3)
{
	echo" Address removed successfully<br/>";
}
?>
<a href='customer.php'>redirect to my address</a>
</body>
</html>
