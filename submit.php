<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "gayathri@29";
$dbname = "barber_shop";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Collect POST data safely
$name = mysqli_real_escape_string($conn, $_POST['name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$service = mysqli_real_escape_string($conn, $_POST['service']);
$preferred_date = mysqli_real_escape_string($conn, $_POST['preferred_date']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// SQL query to insert data into the table
$sql = "INSERT INTO contact_form (name, phone, service, preferred_date, message)
        VALUES ('$name', '$phone', '$service', '$preferred_date', '$message')";

// Execute the query and provide feedback
if ($conn->query($sql) === TRUE) {
  echo "<h2 style='text-align:center; color:green;'>Your message has been sent successfully!</h2>";
} else {
  echo "<h2 style='text-align:center; color:red;'>Error: " . $conn->error . "</h2>";
}

// Close the database connection
$conn->close();
?>
