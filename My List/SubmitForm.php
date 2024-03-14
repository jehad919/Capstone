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
    <title>Wishlist Submission Form</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #4CAF50;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: white;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #2E8B57;
            border-radius: 4px;
            background-color: #f8f8f8;
        }

        label {
            color: #fff;
            font-weight: bold;
        }

        button {
            background-color: #2E8B57;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #006400;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Wishlist Submission Form</h2>

        <!-- Form for Suggested Price and Notes -->
        <form action="process_submission.php" method="post">
            <label for="suggestedPrice">Suggested Price:</label>
            <input type="number" id="suggestedPrice" name="suggestedPrice" required>

            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes" rows="4"></textarea>

            <!-- Hidden input to pass service_id to the server -->
            <input type="hidden" name="service_id" value="<?php echo $serviceDetails['ID']; ?>">

            <!-- Back button to return to the previous page -->
            <button class="button" onclick="window.location.href='mylist.php'">Back</button>

            <!-- Submit button to submit the form -->
            <button type="submit">Submit</button>
        </form>
    </div>

</body>

</html>

