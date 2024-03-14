<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstone');
$username = $_SESSION['username'];

if (isset($_POST['submit'])) {
    $Title = stripcslashes(strtolower($_POST['Title']));
    $Event = stripcslashes(strtolower($_POST['Event']));
    $Male = stripcslashes(strtolower($_POST['Male']));
    $female = stripcslashes(strtolower($_POST['female']));
    $startdate = stripcslashes(strtolower($_POST['startdate']));
    $enddate = stripcslashes(strtolower($_POST['enddate']));
    $location = stripcslashes(strtolower($_POST['location']));
    $price = stripcslashes(strtolower($_POST['price'])); // Added field for price
    $phone = stripcslashes(strtolower($_POST['phone'])); // Added field for phone
}
$Title = htmlentities(mysqli_real_escape_string($conn, $_POST['Title']));
$Event = htmlentities(mysqli_real_escape_string($conn, $_POST['Event']));
$Male = htmlentities(mysqli_real_escape_string($conn, $_POST['Male']));
$female = htmlentities(mysqli_real_escape_string($conn, $_POST['female']));
$startdate = htmlentities(mysqli_real_escape_string($conn, $_POST['startdate']));
$enddate = htmlentities(mysqli_real_escape_string($conn, $_POST['enddate']));
$location = htmlentities(mysqli_real_escape_string($conn, $_POST['location']));
$price = htmlentities(mysqli_real_escape_string($conn, $_POST['price']));
$phone = htmlentities(mysqli_real_escape_string($conn, $_POST['phone']));

    // Perform validation and database insertion
    if (empty($Title)) {
        $Title_error = '<p id="error"> Please enter Title </p>';
        $err_s = 1;
    } else {
        $sql = "INSERT INTO services (Title, Event, Male, Female, start, end, location, creator, status, price, phone) 
                VALUES ('$Title','$Event','$Male','$female','$startdate','$enddate','$location','$username','requested','$price','$phone')";

        mysqli_query($conn, $sql);
        header('location:/Capstone/My List/mylist.php?username=' . (isset($_SESSION['username']) ? urlencode($_SESSION['username']) : ''));
        exit();
    }

include('request_service_form.php');
?>
