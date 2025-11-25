<?php
// Database Connection
$servername = "localhost"; // Change if needed
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "nagpur_cafe"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // For displaying success/error messages

// Form Handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $contact_no = $_POST["Contact_No"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    // Password Match Validation
    if ($password !== $confirm_password) {
        $message = "<p style='color:red;'>Passwords do not match!</p>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

        // Insert Query
        $sql = "INSERT INTO users (username, email, contact_no, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $contact_no, $hashed_password);

        if ($stmt->execute()) {
            $message = "<p style='color:green;'>Registration successful!</p>";
        } else {
            $message = "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }
}

// Close DB Connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Nagpur's Cafe</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container">
    <div class="form-container">
        <h1>Create Your Account</h1>
        <p>Sign up to enjoy the best coffee in Nagpur!</p>
        <style>
    body {
        background-image: url('http://localhost/project%201234/project/photos/index_img.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh; /* Full screen height */
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
        <?php echo $message; ?> <!-- Display success/error messages -->

        <form method="POST">
            <input type="text" placeholder="Username" name="username" required>
            <input type="email" placeholder="Email" name="email" required>
            <input type="text" placeholder="Contact-No." name="Contact_No" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="password" placeholder="Confirm Password" name="confirm-password" required>
            <button type="submit">Sign Up</button>
        </form>

        <p>Already have an account? <a href="index.php">Login</a></p> 
    </div>
</div>

</body>
</html>
