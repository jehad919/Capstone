<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstone');

// Check if the service_id parameter is set in the URL
if (isset($_GET['service_id'])) {
    $serviceId = mysqli_real_escape_string($conn, $_GET['service_id']);

    // Fetch details for the specified service
    $sql = "SELECT * FROM services WHERE id = '$serviceId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $serviceDetails = mysqli_fetch_assoc($result);
    } else {
        $serviceDetails = null;
    }
} else {
    // Redirect to the home page if service_id is not provided
    header('location: /Capstone/HomePage/HomePage.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Details</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e6ffe6;
            margin: 0;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
    font-size: larger;
    background-color: #4CAF50;
    padding: 100px;
    border-radius: 38px;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    text-align: center;
    color: white;
        }

        h2 {
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
        }

        hr {
            border: 1px solid #fff;
            margin: 20px 0;
        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        .button {
            background-color: #45a049;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin: 0 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <?php if ($serviceDetails): ?>
        <div class="container">
            <h2><?php echo $serviceDetails['Title']; ?> Details</h2>
            <p>Event: <?php echo $serviceDetails['Event']; ?></p>
            <p>Title: <?php echo $serviceDetails['Title']; ?></p>
            <p>Phone: <?php echo $serviceDetails['phone']; ?></p>
            <p>Number of Male Photographers: <?php echo $serviceDetails['Male']; ?></p>
            <p>Number of Female Photographers: <?php echo $serviceDetails['Female']; ?></p>
            <p>Start Date: <?php echo $serviceDetails['start']; ?></p>
            <p>End Date: <?php echo $serviceDetails['end']; ?></p>
            <p>Location: <?php echo $serviceDetails['location']; ?></p>
            <p>Price: <?php echo $serviceDetails['price']; ?></p>
            <hr>

            <!-- Button Container -->
            <div class="button-container">
                <button class="button" onclick="window.location.href='mylist.php'">Back to Home</button>
                <!-- <button class="button" onclick="addToWishlist()">Add to my wish list</button>
                <button class="button" onclick="window.location.href='./SubmitForm.php?service_id=it</button> -->
            </div>
        </div>

        <script>
            function redirectToWishlistSubmission() {
        // Redirect to the wishlist submission form page with the service_id parameter
        window.location.href = './SubmitForm.php?service_id=<?php echo $service['ID']; ?>';
    }
        </script>
    <?php else: ?>
        <p>No details available for the specified service.</p>
    <?php endif; ?>

</body>

</html>
