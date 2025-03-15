<?php

include('../includes/database.php');

$first_name = 'Admin';
$last_name = 'User';
$email = 'admin@gmail.com';
$phone = '1234567890';
$password = 'admin'; 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, last_name, email, phone, password) 
        VALUES ('$first_name', '$last_name', '$email', '$phone', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New admin user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
