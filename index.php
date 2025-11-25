<?php
session_start();

// Database Connection
$servername = "localhost";
$username = "root"; // Update if needed
$password = ""; // Update if needed
$dbname = "nagpur_cafe"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch user from DB
    $sql = "SELECT id, password FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            // Login successful - Start session
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            header("Location: home.php"); // Redirect to home page
            exit();
        } else {
            $message = "<p style='color:red;'>Incorrect password!</p>";
        }
    } else {
        $message = "<p style='color:red;'>User not found!</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nagpur's Cafe</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body style="background-image:url('http://localhost/project%201234/project/photos/index_img.jpg')">
    <div class="container">
        <div class="form-container">
            <h1>Welcome to Nagpur's Cafe</h1>
            <p>Login to experience the best coffee in Nagpur!</p>

            <?php echo $message; ?> <!-- Show success/error messages -->

            <form method="POST"> 
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit">Login</button>
            </form>
            
            <p>Don't have an account? <a href="sign_up.php">Sign Up</a></p> 

        </div>
    </div>
</body>
</html>
