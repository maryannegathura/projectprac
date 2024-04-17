<!DOCTYPE html>
<html>
<head>
  <title>Account Registration</title>
</head>
<body>
  <h1>Account Registration</h1>
  <form method="post" action="sign_up.html">
    <label for="username">Username:</label>
    <input type="text" name="username" placeholder="Enter Your Full Name" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="Enter Your Email" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Enter Password" required><br>
    <button type="submit" name="send">send</button><br>
  </form>
</body>
</html>

<?php
// Include the database connection file
require_once 'dbconnect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Prepare SQL query to insert data into 'form' table
        $sql = "INSERT INTO form (username, email, password) VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters and execute the statement
        $stmt->execute([$username, $email, $password]);

        // Display success message
        echo "Registration successful!";

    } catch (PDOException $e) {
        // Display error message
        echo "Registration failed: " . $e->getMessage();
    }
}
?>


