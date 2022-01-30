<?php

 require 'connect.php';
 
 $connect = mysqli_connect($host, $username, $password, $dbname); 
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:home.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["fullname"]) || empty($_POST["phone_num"]) || empty($_POST["password"]) || empty($_POST["cpassword"]))  
      {  
           echo '<script>alert("All fields are required")</script>';  
      }
	  elseif($_POST['password'] != $_POST['cpassword'])
	  {
		   echo '<script>alert("Password doesn\'t match")</script>';
	  }
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);
		   $email = mysqli_real_escape_string($connect, $_POST["email"]);
		   $fullname = mysqli_real_escape_string($connect, $_POST["fullname"]);
		   $phone_num = mysqli_real_escape_string($connect, $_POST["phone_num"]);		   
           $password = mysqli_real_escape_string($connect, $_POST["password"]);		   
           $password = md5($password);	   
           $query = "INSERT INTO user (username, password, email, fullname, phone_num) VALUES('$username', '$password', '$email', '$fullname', '$phone_num')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
      }  
 }  
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                header("location:home.php");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }
 
 
 ?>  
 <!DOCTYPE html>  
 <html>
      <head>  
           <title>IoT Smart Parking System - Index</title>
		   <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		   <link rel="manifest" href="manifest.json" />
		   <!-- iOS support -->
		   <link rel="apple-touch-icon" href="images/icons/72.png" />
		   <link rel="apple-touch-icon" href="images/icons/96.png" />
		   <link rel="apple-touch-icon" href="images/icons/128.png" />
		   <link rel="apple-touch-icon" href="images/icons/144.png" />
		   <link rel="apple-touch-icon" href="images/icons/152.png" />
		   <link rel="apple-touch-icon" href="images/icons/192.png" />
		   <link rel="apple-touch-icon" href="images/icons/384.png" />
		   <link rel="apple-touch-icon" href="images/icons/512.png" />
      </head>  
      <body>
		   <script src="/js/app.js"></script>
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">IoT Smart Parking System</h3>  
                <br />  
                <?php  
                if(isset($_GET["action"]) == "register")  
                {  
                ?>  
                <h3 align="center">Register</h3>  
                <br />  
                <form method="post">  
                     <label>Username</label>  
						<input type="text" name="username" class="form-control" required>  
                     <br />
					 <label>Email</label>  
						<input type="email" name="email" class="form-control" required>  
                     <br />
					 <label>Full Name</label>  
						<input type="text" name="fullname" class="form-control" required>  
                     <br />
					 <label>Phone Number</label>  
						<input type="number" name="phone_num" class="form-control" required>  
                     <br />					 
                     <label>Password</label>  
						<input type="password" name="password" class="form-control" required>  
                     <br />
                     <label>Confirm Password</label>  
						<input type="password" name="cpassword" class="form-control" required>  
                     <br />  					 
					<input type="submit" name="register" value="Register" class="btn btn-primary" />
					 <input type="reset" name="reset" value="Reset" class="btn btn-secondary" />  					 
                     <br />  
                     <p align="center"><a href="index.php">Login</a></p>
                </form>                 
                <?php       
                }  
                else  
                {  
                ?>  
                <h3 align="center">Login</h3>  
                <br />  
				<form method="post">  
                     <label>Username</label>  
						<input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
						<input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-primary" />
					 <input type="reset" name="reset" value="Reset" class="btn btn-secondary" /> 					 
                     <br />  

                     <p align="center"><a href="index.php?action=register">Register</a></p>					 
                </form>				
                <?php  
                }  
                ?>  
           </div>  
      </body>  
 </html>