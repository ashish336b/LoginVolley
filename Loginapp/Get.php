<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users_table";
$result = $conn->query($sql);
$array = array();
$array["records"] = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        extract($row);
        $row1 = array(
            'id'=>$id,
            'name'=>$name,
            'password'=>$password
        );
        array_push($array["records"],$row1);
    }
    echo json_encode($array);
} else {
    echo "0 results";
}
$conn->close();
?>