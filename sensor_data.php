<!DOCTYPE html>
<html><body>
<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "iot_parking";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "luq123";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, lot, level, isAvailable FROM parking ORDER BY id ASC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>Lot</td> 
        <td>Level</td> 
        <td>Availability</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_lot = $row["lot"];
        $row_level = $row["level"];
        $row_isavailable = $row["isAvailable"];
		
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_lot . '</td> 
                <td>' . $row_level . '</td> 
                <td>' . $row_isavailable . '</td>
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>