<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>user address</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php include('navbar.php'); ?>
<br><br>
<div class="form">
<form name="user_address" action="add_address.php" method="post">
<input type="text" name="address" placeholder="address" required />
<input type="text" name="city" placeholder="city" required />
<input type="text" name="state" placeholder="state" required />
<input type="text" name="country" placeholder="country" required />
<input type="number"   max="999999" min="100000" name="pincode" placeholder="pincode" required />
<input type="number"   max="9999999999" min="1000000000" name="phone" placeholder="phone" required />
<input type="submit" name="submit" value="ADD address" />
</form>
</div>

</body>
</html>
