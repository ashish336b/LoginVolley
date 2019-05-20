<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$conn = new mysqli($servername, $username, $password, $dbname);

$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST['password'] : "";
// $password = "123";
$sql = "SELECT * FROM users_table WHERE email= '$email' ";
$response = mysqli_query($conn, $sql);
$result = array();
$result["login"] = array();
// var_dump($response);
if (mysqli_num_rows($response) === 1) {
    $row = mysqli_fetch_assoc($response);
    if ($password == $row["password"]) {
        $index['name'] = $row['name'];
        $index['email'] = $row['email'];
        array_push($result["login"], $index);
        $result["success"] = "1";
        $result["message"] = "success";
        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result["success"] = "0";
        $result["message"] = "error";
        mysqli_close($conn);
    }
}
