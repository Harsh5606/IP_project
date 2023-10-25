<?php
// Include your database connection information here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

// Create a connection to the database
$conn = new mysqli("localhost", "root", "", "contact");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$address = $_POST["address"];
$message = $_POST["message"];

// Insert the data into the database
$sql = "INSERT INTO form(name, email, number, address, message)
        VALUES ('$name', '$email', '$number', '$address', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Data has been successfully inserted into the database.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
