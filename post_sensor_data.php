<?php

$servername = "localhost";
$dbname = "iot_parking";
$username = "root";
$password = "luq123";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $lot = $level = $isavailable = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_GET["api_key"]);
    if($api_key == $api_key_value) {
        $lot = test_input($_GET["lot"]);
        $level = test_input($_GET["level"]);
        $isavailable = test_input($_GET["isavailable"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "UPDATE parking SET isAvailable = '" . $isavailable . "' WHERE level = '" . $level . "' AND lot = '" . $lot . "'";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record updated successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP GET.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}