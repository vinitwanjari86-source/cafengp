<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$comment = $_POST['comment'];
}
// Function to open a database connection
function openconnection() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = ""; // Replace with your actual DB password
    $db = "nagpur_cafe";
    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $db) or die("Connection Failed: " . $conn->error);
    return $conn;
}

function closeconnection($conn) {
    $conn->close();
}

$conn = openconnection();

// Use prepared statements to prevent SQL injection
$sql = $conn->prepare("INSERT INTO `contact_dabo`(`Your Name`, `Your Email`, `Your Phone Number`, `Your Message`) VALUES ('$name','$email','$phone','$comment')");

//$sql->bind_param( $name, $email, $phone, $adress, $comment);

if ($sql->execute()) {
    echo "";
} else {
    echo "" . $conn->error;
}

closeconnection($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Thank You!</h2>
        <p>Your data has been submitted successfully.</p>
        <a href="http://localhost/project%201234/project/home.php" class="btn">Back to Home</a>
    </div>

</body>
</html>