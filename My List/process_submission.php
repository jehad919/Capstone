<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstone');

    // Check if all required fields are set
    if (isset($_POST['suggestedPrice'], $_POST['notes'], $_POST['service_id'])) {
        $suggestedPrice = mysqli_real_escape_string($conn, $_POST['suggestedPrice']);
        $notes = mysqli_real_escape_string($conn, $_POST['notes']);
        $serviceId = mysqli_real_escape_string($conn, $_POST['service_id']);

        // Update the services table with the new data
        $updateSql = "UPDATE services SET suggested_price = '$suggestedPrice', note = '$notes', status = 'submited' WHERE ID = '$serviceId'";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            // Update successful
            header('location: mylist.php');
            exit();
        } else {
            // Update failed
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // Missing required fields
        echo "Missing required fields.";
    }

?>
