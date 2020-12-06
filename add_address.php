<?php
require('db.php');
include("auth.php");
// If form submitted, insert values into the database.
if (isset($_SESSION['username'])){
        // removes backslashes
 $username = $_SESSION['username'];
 $address = $_POST['address'];
 $city = $_POST['city'];
 $state = $_POST['state'];
 $country = $_POST['country'];
 $pincode = $_POST['pincode'];
 $phone = $_POST['phone'];
        $query = "INSERT into `user_address` (username, address, city, state,country,pincode,phone)
VALUES ('$username', '$address', '$city', '$state','$country','$pincode','$phone')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
			
			
<h3>You address is added successfully.</h3><br/>
<a href='user_address.php'>ADD ANOTHER ADDRESS</a></div>
<br/>Click here to <a href='index.php'>homepage</a></div>";
        }
    }else{}
?>