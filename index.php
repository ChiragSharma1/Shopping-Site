<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>
fIrSt_ChOiCe.com
</title>
<!-- <link rel="stylesheet" type="text/css"
href="mystyle.css" /> -->
<style type="text/css">
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
.autocomplete {
  position: absolute;
  display: inline-block;
}

#submitbtn{
  margin-left: 320px;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: Blue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9;
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important;
  color: #ffffff;
}

h2
{
font-family:Tahoma;
color:pink;
border:1px solid black
}
.MagicScroll{
    background-color: <white>;
}
</style>
<link type="text/css" rel="stylesheet" href="magicscroll.css"/>
<script type="text/javascript" src="magicscroll.js"></script>
</head>
<body>
<!-- <script> alert("Welcome <?php echo $_SESSION['username']; ?>!") -->
</script>
<h1 id = "heading" align="center">fIrSt ChOiCe</h1>

<nav>
  <div class= "navbar">
    <div class="navlinks">
      <a href="index.php">Home</a>
    <a href="mycart.php">My Cart</a>
    <a href="customer.php">My Address</a>
    <a href="my_orders.php">My Orders</a>
    </div>
    <div class="navbar_form">
      <form  autocomplete="off" action="submission.php" method="post">
        <div class="autocomplete" style="width:300px;">
          <input id="myInput" type="text" name="search_value" placeholder="Search for Products..">
        </div>
        <input id = "submitbtn"type="submit">
      </form>
    </div>

  </div>
</nav>
<script>
function autocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        currentFocus++;
        addActive(x);
      } else if (e.keyCode == 38) {
        currentFocus--;
        addActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

var products = ["iPhone X","Alexa","Fogg Xtremo Scent","Boat Headphone","Apple MacBook Pro","School bag","ASICS Running Shoes","Lenove Tablet","Trolly Bag","Sony TV","Canon Camera","Watch","Yamaha Guitar"];
autocomplete(document.getElementById("myInput"), products);
</script>

<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
}
</script>
<div class="MagicScroll" bgcolor="white" data-options="autoplay: 1000; step: 1; mode: carousel; height: 275;">
    <img src="images/sale1.jpg" />
    <img src="images/sale2.jpg" />
     <img src="images/sale3.png" />
	 <img src="images/sale4.jpg" />
	 <img src="images/sale5.jpg" />
	 <img src="images/sale6.jpg" />
	 <img src="images/sale7.jpg" />
</div>

<h2 align="center" >ELECTRONICS ITEMS</h2>

<table border="5" allign ="center" width="100%" cellpadding="10px" cellspacing="10px">
<tr align="center">
<td  vallign="top"  style="font-family:Cursive" width=50%>
<img src="Products_1111/tablet/tablet1.jpg" width="500px" height="500px">
<a href='Products_1111/tablet.php'><h3>LENOVO TABLET </h3></a>
<p >18950 <div style="text-decoration:line-through">20,999</div></p>
</td>
<td vallign="top"  style="font-family:Cursive">
<img src="images/img1.jpg">
<a href="Products_1111/iphonex.php"><h3>Apple iphoneX</h3><a>
<p >60,000 <div style="text-decoration:line-through">70,999</div></p>
</td>
<td>
</td>
</tr>
</table>
<h2 align="center">MEN'S ITEMS</h2>
<table border="5" allign ="center" width="100%" cellpadding="10px" cellspacing="10px">
<tr align="center">
<td  vallign="top"  style="font-family:Cursive" width=50%>
<img src="Products_1111/foggscent/foggscent2.jpg" width="500px" height="500px">
<a href='Products_1111/foggscent.php'><h3>FOGG SCENT</h3></a>
<p >99 <div style="text-decoration:line-through">199</div></p>
</td>
<td vallign="top"  style="font-family:Cursive">
<img src="Products_1111/watch/watches1.jpg">
<a href='Products_1111/watch.php'><h3>Automatic Mens Chronograph Watch 116506</h3></a>
<p >3,54,900 <div style="text-decoration:line-through">4,00,000</div></p>
</td>
</tr>
</table>
<h2 align="center">BAGS</h2>
<table border="5" allign ="center" width="100%" cellpadding="10px" cellspacing="10px">
<tr align="center">
<td  vallign="top"  style="font-family:Cursive" width=50%>
<img src="Products_1111/schoolbag/schoolbag3.jpg" width="500px" height="500px">
<a href='Products_1111/schoolbag.php'><h3>School BAG</h3></a>
<p >2450 <div style="text-decoration:line-through">2,999</div></p>
</td>
<td vallign="top"  style="font-family:Cursive">
<img src="Products_1111/trollybag/trollybag2.jpg" width="500px" height="500px">
<a href='Products_1111/trollybag.php'><h3>TROLLY BAG</h3></a>
<p >5000 <div style="text-decoration:line-through">4,999</div></p>
</td>
</tr>

</table>
<div style="font-size:25px;background-color:#FE9A2E">
<p><a href="dashboard.php" style="color:white;font-family:cursive">Dashboard</a></p>
<a href="logout.php" style="color:white;font-family:cursive">Logout</a></br>
<a href="user_address.php" style="color:white;font-family:cursive">Add address</a>
</div>
</body>
</html>
