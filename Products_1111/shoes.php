
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
<body>
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
      <img src="shoes/shoes1.jpg" class="d-block w-100" alt="First slide" height="500px" width="300px">
    </div>
    <div class="carousel-item">
      <img src="shoes/shoes2.jpg" class="d-block w-100" alt="Second slide" height="500px" width="300px">
    </div>
    <div class="carousel-item">
      <img src="shoes/shoes3.jpg" class="d-block w-100" alt="Third slide"height="500px" width="300px">
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
			 <h2>ASICS Men's Gel-Venture 7 Trail Running Shoes</h2>
			 <p>Product Code:ISTC2020</p>
			 <img src="star.png" class="stars">
			 <p class="price"> Rs3,459</p>
			 <p><b>Availability:</b> In Stock</p>
			 <p><b>Condition:</b> New</p>
			 <p><b>Brand:</b> ASICS Company</p>
			  <form class="form" action="order_placing.php" method="post">
			 <label>Quantity:</label><input type="text"  style="width:30px;height:33px" name="quantity">
			 <input type="text" name="product_id" value="7" style="width:0%;height:0%" readonly>
			<input type="submit" name="submit" value="BUYNOW" class="login-button" style="width:150px"/></form>
			 <form class="form" action="IATC.php" method="post">
			<input type="text" name="input" value="7" style="width:0%;height:0%;font-size:0%" readonly>
			<input type="submit" name="submit" value="ADD TO CART" class="login-button" style="width:150px"/></form>
	     </div>
	     </div>
		 </div>
</body>
</html>
