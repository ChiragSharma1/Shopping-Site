<html>
	<head>
		<title>
			item added to cart
		</title>
		<link href="style.css" rel="stylesheet"/>
		<link rel="stylesheet" href="style2.css" />
	</head>
<body>
	 <?php
		require('../db.php');
		include("../auth.php");
		include('navbar.php');
			$quantity=1;
			$username=$_SESSION['username'];
			$product_id=$_POST['input'];
			$query    = "INSERT INTO `cart` (username, product_id,quantity)
                     VALUES ('$username','$product_id','$quantity')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3 align='center'>Your item is added to cart</h3><br/>
                  <p class='link' align='center'>Click here to view your cart <a href='../mycart.php'>redirect to My Cart</a></p>
                  </div>";
		    echo'<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
				<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
				<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
		    </svg>';}
	?>
</body>
</html>
