<?php

session_start();    

include('inc/connections.php');

if ((isset($_POST['email'])) && (isset($_POST['password']))) {
    $email = stripcslashes($_POST['email']);
    $password = stripcslashes($_POST['password']);
    $md5_pass = md5($_POST['password']);
    $email = filter_input(INPUT_POST, 'email');
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));   
}

if (empty($email)) {   
    $email_error = '<p id= "error"> Please enter your email </p>';
    $err_s = 1;
} elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/", $email)) {
    $email_error = '<p id= "error"> Please enter a valid Email</p> ';
    $err_s = 1;
}

if (empty($password)) { 
    $pass_error = '<p id= "error"> Please enter your password </p>';
    $err_s = 1;
}

if (!isset($err_s)) {
    $sql = "SELECT id, email, md5_pass, password, username FROM users WHERE email='$email' AND md5_pass='$md5_pass' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        if (($row['email'] === $email) && ($row['md5_pass'] === $md5_pass)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            header("location:HomePage/HomePage.php?username=" . urlencode($row['username']));
            exit();
        } elseif ($row['email'] === $email) {
            echo 'user is right';
            exit();
        }
    } else {
        $pass_error = '<p id= "error"> The User or Password is not correct </p>';
        print_r($row);
        $err_s = 1;
    }
}

include('index.php');
?>
