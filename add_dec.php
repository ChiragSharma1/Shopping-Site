<?php
include('db.php');
include('auth.php');

$p_id = $_POST['product_id'];
$val = $_POST['btn'];


if($val =='Buy'){
    $username=$_SESSION['username'];
    include('order_placing.php');
    exit();
}
else if($val == 'Buy All'){
     include('order_placing_all.php');
     exit();
}



$qry = "SELECT * from cart where product_id ='$p_id'";
$result = mysqli_query($con,$qry);
$ary = mysqli_fetch_array($result);
if($val=='+'){
    $qty = $ary['quantity']+1; 
}
else if($val=='-') $qty = $ary['quantity']-1;
if($qty ==0||$val == 'Remove'){
    $qry2 = "DELETE from cart where product_id = '$p_id'";
}
else{
    $qry2 = "UPDATE cart SET quantity = '$qty' where product_id = '$p_id'";
}
$result2 = mysqli_query($con,$qry2);
header('location:mycart.php');
exit();


?>