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
<h1 align="center"style="font-size:50px;background-color:#FE9A2E;color:white">fIrSt ChOiCe</h1>
<div class="form">
<form name="user_address" action="add_address.php" method="post">
<input type="text" name="address" placeholder="address" required />
<input type="text" name="city" placeholder="city" required />
<input type="text" name="state" placeholder="state" required />
<input type="text" name="country" placeholder="country" required />
<input type="number_format" name="pincode" placeholder="pincode" required />
<input type="number_format" name="phone" placeholder="phone" required />
<input type="submit" name="submit" value="ADD address" />
</form>
</div>

</body>
</html>