<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "reg";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Data to be inserted
$name =  $_POST['name'];;
$password = $_POST['password']; // Make sure to hash the password
$email = $_POST['email'];
$rpassword =$_POST['rpassword'];

// SQL query to insert data into the table
$sql = "INSERT INTO user (name, email,password, rpassword) VALUES (?, ?, ?, ?)";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind parameters and execute the statement
    $stmt->bind_param("ssss", $name,$email, $password, $rpassword);

    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
