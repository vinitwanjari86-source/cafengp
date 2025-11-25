<?php
session_start();

// Database Connection
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "nagpur_cafe"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // Message to show success/error

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $feedback = htmlspecialchars($_POST["message"]);

    // Insert into database
    $sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $feedback);

    if ($stmt->execute()) {
        $message = "<p style='color: green;'>Feedback submitted successfully!</p>";
    } else {
        $message = "<p style='color: red;'>Error: " . $stmt->error . "</p>";
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
    <title>Feedback Form</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <div class="container">
        <h2>Give Your Feedback</h2>

        <?php echo $message; ?> <!-- Show success/error message -->

        <form method="POST">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Your Feedback</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>

        <!-- Back Button -->
        <div style="text-align: center; margin-top: 20px;">
            <button onclick="goBack()" style="padding: 10px 20px; font-size: 20px; cursor: pointer;">Back</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = "home.php";
        }
    </script>
</body>
</html>
