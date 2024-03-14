<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstone');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('location: /Capstone/login.php');
    exit();
}

// Retrieve username from the session
$username = $_SESSION['username'];

// Fetch all services related to the user
$sql = "SELECT * FROM services WHERE creator = '$username' and status = 'requested'";
$result = mysqli_query($conn, $sql);

// Check if there are any services
if (mysqli_num_rows($result) > 0) {
    // Fetch and display the services
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<h2>Service Details</h2>';
        echo '<p>Title: ' . htmlspecialchars($row['Title']) . '</p>';
        echo '<p>Event: ' . htmlspecialchars($row['Event']) . '</p>';
        echo '<p>Number of Male Photographers: ' . htmlspecialchars($row['Male']) . '</p>';
        echo '<p>Number of Female Photographers: ' . htmlspecialchars($row['Female']) . '</p>';
        echo '<p>Start Date: ' . htmlspecialchars($row['start']) . '</p>';
        echo '<p>End Date: ' . htmlspecialchars($row['end']) . '</p>';
        echo '<p>Location: ' . htmlspecialchars($row['location']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($row['price']) . '</p>';
        echo '<p>Phone: ' . htmlspecialchars($row['phone']) . '</p>';
        echo '<hr>';
    }
} else {
    echo '<p>No services found.</p>';
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Data</title>
    <style>
    body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .service-details {
            margin-bottom: 20px;
        }

        .service-details p {
            margin: 10px 0;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }

        /* Add any additional styling as needed */
    </style>
    <!-- Add your additional styling or scripts here -->
</head>
<body>
    <!-- Add any additional content or styling here -->
</body>
</html>
