<?php
// Database connection details
$servername = "sql11.freemysqlhosting.net"; // MySQL server hostname (typically "localhost")
$username = "sql11688415"; // Your MySQL database username
$password = "9yWde9aY4S"; // Your MySQL database password
$database = "sql11688415"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if username and password are provided via POST request
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Receive user data from Unity application
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user input
    // (You can add more validation here as needed)

    // Hash and salt the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Username and password not provided";
}

// Close database connection
$conn->close();
?>
