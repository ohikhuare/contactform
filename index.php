<?php
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "contactform";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (fname, lname, email, phone)VALUES ('$firstName', '$lastName', '$email', '$phone')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$data = $firstName.' '.$lastName.' '.$email.' '.$phone;

$file = fopen($firstName.' '.$lastName.'.txt', "w");
fwrite($file, $data);
?>