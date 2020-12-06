<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

		 $query1 ="SELECT username FROM `users` WHERE username='$username'";

		  $result1= mysqli_query($con,$query1);
		  $row1 = mysqli_fetch_array($result1);

		  if($row1)
		 {
				echo"<div class='form'>
				<h3>Username  already exist</h3>
				<br/>Please register again <br/><a href='registration.php'>register</a></div>";
				exit();
		 }
		 $query2 ="SELECT email FROM `users` WHERE email='$email'";

		 $result2= mysqli_query($con,$query2);
		 $row2 = mysqli_fetch_array($result2);

		  if($row2)
		 {
				echo"<div class='form'>
				<h3>email already exist</h3>
				<br/>Please register again <br/><a href='registration.php'>register</a></div>";
				exit();
		 }

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT INTO `users` (username, email,password,trn_date)
                     VALUES ('$username', '$email', '" . md5($password) . "' ,'$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        }
		}
		else
		{
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
		}
?>
</body>
</html>
