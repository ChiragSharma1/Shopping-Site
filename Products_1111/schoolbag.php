
<html>
<head>
<title>Product Details Page Design</title>
<link href="../style.css" rel="stylesheet">
    <link rel="stylesheet"
	href="../style2.css" >

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
</head>
<body style="text-align:center">
    <h1 align="center" style="font-family:Cursive;color:white;background-color:#FE980F;font-size:50px">
	    fIrSt ChOiCe
	</h1>
	<?php
		require('../db.php');
		include("../auth.php");

	?>
     <div class="container">

	   <div class="row">
	     <div class="col-md-5">
		 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="schoolbag/schoolbag1.jpg" class="d-block w-100" alt="First slide" height="500px" width="300px">
    </div>
    <div class="carousel-item">
      <img src="schoolbag/schoolbag2.jpg" class="d-block w-100" alt="Second slide" height="500px" width="300px">
    </div>
    <div class="carousel-item">
      <img src="schoolbag/schoolbag3.jpg" class="d-block w-100" alt="Third slide"height="500px" width="300px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	     </div>
		 <div class="col-md-7">
		     <p class="newarrival text-center">NEW</p>
			 <h2>Travel Backpack ,School Backpack </h2>
			 <p>Product Code:ISRC2020</p>
			 <img src="star.png" class="stars">
			 <p class="price"> Rs2,450</p>
			 <p><b>Availability:</b> In Stock</p>
			 <p><b>Condition:</b> New</p>
			 <p><b>Brand:</b> Matein Company</p>
			  <form class="form" action="order_placing.php" method="post">
			 <label>Quantity:</label><input type="text"  style="width:30px;height:33px" name="quantity">
			 <input type="text" name="product_id" value="6" style="width:0%;height:0%" readonly>
			<input type="submit" name="submit" value="BUYNOW" class="login-button" style="width:150px"/></form>
			 <form class="form" action="IATC.php" method="post">
			<input type="text" name="input" value="6" style="width:0%;height:0%;font-size:0%" readonly>
			<input type="submit" name="submit" value="ADD TO CART" class="login-button" style="width:150px"/></form>
	     </div>
	     </div>
		 </div>
		  <form class='form' action='' method="post">
		    <label>Type your reviews:</label></br><input type="text"  style="width:400px;height:33px" name="comments">
			<input type="submit" name="post" value="post"  style="width:150px"/>
		 </form>
		 <?php
	        $username=$_SESSION['username'];
			$product_id=6;
		 if(isset($_REQUEST['post']))
		{
			$comments=$_REQUEST['comments'];

			$query="SELECT quantity FROM orders WHERE username='$username' AND product_id='$product_id'";
			$result=mysqli_query($con,$query);
			$query3="SELECT comments FROM comments WHERE username='$username' AND product_id='$product_id'";
			$result3=mysqli_query($con,$query3);
			if($row=mysqli_fetch_array($result) && !$row3=mysqli_fetch_array($result3))
			{
				$query1="INSERT INTO comments (product_id,username,comments) VALUES ('$product_id','$username','$comments') ";
				$result1=mysqli_query($con,$query1);
			}
			else
			{
				echo"you have not yet ordered this item or you have already commented</br>";
			}
		}
		$query2="SELECT username,comments FROM comments WHERE product_id='$product_id'";
		$result2=mysqli_query($con,$query2);
		while($row2=mysqli_fetch_array($result2))
		{
			echo $row2['username']."</br>";
			echo $row2['comments']."</br>";
		}
		 ?>
</body>
</html>
