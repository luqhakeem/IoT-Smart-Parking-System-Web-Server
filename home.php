<?php

 require 'connect.php';
   
 $connect = mysqli_connect($host, $username, $password, $dbname);   
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 }

 $result = mysqli_query($connect,"SELECT * FROM parking WHERE isAvailable ='1'");
 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>IoT Smart Parking System - Home</title>
		   <meta name="viewport" content="width=device-width, initial-scale=1.0">		   
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />
		   <center>
           <div class="container" style="margin:auto;">  
                <h3 align="center">IoT Smart Parking System</h3>  
                <br />  
                <?php  
                echo '<h2 align="center">Welcome, '.$_SESSION["username"].'</h2>';  
                echo '<label><a href="logout.php">Logout</a></label>';  
                ?>  
           </div>
		   <br />
		   <div class="container" style="margin:auto;">
				<p style="font-weight: bold;">Available parking</p>
				<br />
				<?php
				echo '<table border="1" style="width: 200px; text-align: center;">';
				echo '<tr>';
				echo '<th align="center">Lot</th>';
				echo '<th align="center">Level</th>';
				echo '</tr>';
				
				while($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $row['lot'] . "</td>";
					echo "<td>" . $row['level'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
				
				mysqli_close($connect);
				?>
			</center>
      </body>  
 </html>  