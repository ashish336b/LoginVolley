<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$name = isset($_POST["name"])?$_POST["name"]:"Hari";
$email = isset($_POST["email"])?$_POST["email"]:"h@gmail.com";
$password = isset($_POST["password"])?$_POST["password"]:"123";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users_table (name, email, password)
VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('success'=>"1"));
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>