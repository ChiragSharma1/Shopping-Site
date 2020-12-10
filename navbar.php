<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
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
  <center><h1 id = "heading">fIrSt ChOiCe</h1></center>
  <nav>
    <div class= "navbar">
      <div class="navlinks">
        <a href="index.php">Home</a>
      <a href="mycart.php">My Cart</a>
      <a href="customer.php">My Address</a>
      <a href="my_orders.php">My Orders</a>
      </div>
    </div>
  </nav>

</body>
</html>
