<html>
<head>
  <title>fIrSt_ChOiCe.com</title>
  <style media="screen">
  body {
    font: 16px Arial;
    padding: 0px;
    margin: 0px;
     background-color: #F0F8FF

  }
  #heading{
    margin-top: 0px;
    /* background-color: blue; */
    text-shadow: 2px 2px 5px blue;
    font-family:Cursive;
  }
  nav {
    position: sticky;
    top:0;
  }
  nav .navbar{
    overflow: hidden;
    padding:10px 0px;
    background-color: black;
  }
  nav .navlinks{
    float: left;
    margin: 10px 10px;
  }
  nav .navlinks a{
    text-decoration: none;
    padding:20px 10px;

  }
  nav .navlinks a:hover{
    box-shadow: 2px 2px 3px blue;
  }
  nav .navlinks a{
    color:white;

  }
  nav .navbar_form{
    float : right;
    margin:0 10px;
  }
  </style>
</head>
<body>
<h1 id = "heading" align="center">fIrSt ChOiCe</h1>

<nav>
  <div class= "navbar">
    <div class="navlinks">
      <a href="index.php">Home</a>
    <a href="mycart.php">My Cart</a>
    <a href="user_address.php">My Address</a>
    <a href="my_orders.php">My Orders</a>
    </div>
  </div>
</nav>
</body>
</html>
<?php
include('auth.php');
 include('db.php');
  $search = $_POST['search_value'];
  if(!$search){
    header('location:index.php');
    exit;
  }

 $query = "SELECT * FROM products
            WHERE products.product_name = '$search'";
  //echo $query;
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  // $str =  $value['product_link'];
  // echo $search;


  if(!$value){
    echo '<center><h1>This Product is Not available as of Now , But we will try to get it soon on First Choice </h1>
          <hr> <h2> Thanks For visiting our site </h2></center><br><br><br>
          <center><a href="index.php"> Home</a></center>';


  }
  else{

    // header("location:http://localhost/shopping site/$str");
    // echo "<center>Results are...<br><br>";
    // echo "<table width='100%' >
    // <tr><th>product_image</th>
    // <th>product_name</th>
    // <th>product_description</th>
    // ";
    $count=1;
    $result = mysqli_query($con,$query);
    while($row1=mysqli_fetch_array($result)){
      $product_id = $row1['product_id'];
      $query2 = "SELECT * from products where product_id = '$product_id'";
      $result2 = mysqli_query($con,$query2);
      $value2 = mysqli_fetch_array($result2);
    //  echo $value2;
      $p_img = $value2['product_image'];
      $p_name = $value2['product_name'];
      $p_desc = $value2['product_description'];
      $p_link = $value2['product_link'];
      // echo "<tr><a href= '$p_link'>";
      // echo "<td style = 'width:300px length:300px'><img src='$p_img' width='300px',height='300px'></td>";
      // echo "<td>$p_name</td>";
      // echo "<td>$p_desc</td>";
      // echo "</a></tr>";
      // echo "<br>";
      echo "<hr>";
      echo "$count .";
      echo "<div><a href='./Products_1111/$p_link' style='text-decoration:none'>
        <img src='./Products_1111/$p_img' width='300px',height='300px' style='float:left;'>
        <h3 style='padding-left:420px;'>$p_name<h3>
        <h5 style='padding-left:420px;'>$p_desc<h5></a>
      </div><br><br><br><br>";
      echo "<hr>";
 $count = $count+1;
   }


  }
 ?>
