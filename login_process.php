<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to your database (replace with your database connection code)
    $conn = mysqli_connect("localhost", "root", "", "reg");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to check if the user's credentials are valid
    $sql = "SELECT * FROM user WHERE name = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password']; // Assuming the password is stored as plain text

        if ($password == $storedPassword) {
            // Passwords match; log the user in
            $_SESSION['username'] = $username;
            header("Location: index.html"); // Redirect to a welcome page
        } else {
            echo "Incorrect username or password";
        }
    } else {
        echo "User not found";
    }

    mysqli_close($conn);
}
?>
