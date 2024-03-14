<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstone');
$username = $_SESSION['username']; // this session for some reason takes example_username 

if (isset($_POST['submit'])) {
    // Retrieve other form data
    $Title = stripcslashes(strtolower($_POST['Title']));
    $Event = stripcslashes(strtolower($_POST['Event']));
    $Male = stripcslashes(strtolower($_POST['Male']));
    $female = stripcslashes(strtolower($_POST['female']));
    $startdate = stripcslashes(strtolower($_POST['startdate']));
    $enddate = stripcslashes(strtolower($_POST['enddate']));
    $location = stripcslashes(strtolower($_POST['location']));

    // Retrieve the username from the hidden input field
// Retrieve the username from the hidden input field
// $username = $_SESSION['username'];
}

$Title = htmlentities(mysqli_real_escape_string($conn, $_POST['Title']));
$Event = htmlentities(mysqli_real_escape_string($conn, $_POST['Event']));
$Male = htmlentities(mysqli_real_escape_string($conn, $_POST['Male']));
$female = htmlentities(mysqli_real_escape_string($conn, $_POST['female']));
$startdate = htmlentities(mysqli_real_escape_string($conn, $_POST['startdate']));
$enddate = htmlentities(mysqli_real_escape_string($conn, $_POST['enddate']));
$location = htmlentities(mysqli_real_escape_string($conn, $_POST['location']));

if (empty($Title)) {  
    $Title_error = '<p id= "error"> Please enter Title </p>';
    $err_s = 1;
} else {
    // Always start the session here to make sure it's started in all cases
    // Set the status as requested and the username as the creator
    // session_start();

    $sql = "INSERT INTO services (Title, Event, Male, Female, start, end, location, creator, status) 
            VALUES ('$Title','$Event','$Male','$female','$startdate','$enddate','$location','$username','requested')";

    mysqli_query($conn, $sql);
    header('location:/Capstone/My List/mylist.php?username=' . (isset($_SESSION['username']) ? urlencode($_SESSION['username']) : ''));
    exit(); // Always exit after a header redirect
}

include('request_service_form.php');
?>