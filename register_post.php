<?php

include('inc/connections.php');

if (isset($_POST['submit'])) {
    $username = stripcslashes(strtolower($_POST['username']));
    $email = stripcslashes(strtolower($_POST['email']));
    $password = stripcslashes($_POST['password']);
    $conpassword = stripcslashes($_POST['conpassword']);
}

$username = htmlentities(mysqli_real_escape_string($conn, $_POST['username']));
$email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
$password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
$conpassword = htmlentities(mysqli_real_escape_string($conn, $_POST['conpassword']));
$md5_pass = md5($password);
$con_pass_md5_pass = md5($conpassword);




if (empty($username) ) {  
    $user_error = '<p id= "error"> Please enter username </p>';
    $err_s = 1;
    //echo '<p>  error (empty($username)) </p> ';
} elseif (strlen($username) < 6) {
    $user_error = '<p id= "error"> Please enter username more than 6 letters </p>';
    $err_s = 1;
    //echo '<p>  error (strlen($username) < 6) </p> <br>';
} elseif (filter_var($username, FILTER_VALIDATE_INT)) {
    $user_error = '<p id= "error"> Please enter a valid user name not a number </p>';
    $err_s = 1;
}

$check_user = "SELECT * FROM users WHERE username='$username'"; /* to check user name if existing ot no*/
$check_result = mysqli_query($conn, $check_user);
$num_rows = mysqli_num_rows($check_result);
if ($num_rows != 0) {
    $user_error= '<p id= "error"> Sorry the username is used, choose other one please </p>';
    $err_s = 1;
}

$check_email = "SELECT * FROM users WHERE email='$email'"; /* to check email if existing ot no*/
$check_result = mysqli_query($conn, $check_email);
$num_rows = mysqli_num_rows($check_result);
if ($num_rows != 0) {
    $email_error= '<p id= "error"> Sorry the Email is used, choose other one please </p>';
    $err_s = 1;
}



if (empty($email)) {   
    $email_error = '<p id= "error"> Please enter email </p>';
    $err_s = 1;
    //echo '<p>  error (empty($email)) </p> <br>';
} elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/", $email)) {
    $email_error = '<p id= "error"> Please enter a valid Email, Do not generate one</p> ';
    $err_s = 1;
    //echo '<p>  error (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/", $email)) </p> <br>';
}

if (empty($password)) { 
    $pass_error = '<p id= "error"> Please enter your password </p>';
    $err_s = 1;
    //echo '<p>  error empty($password) </p> <br>';
}elseif (strlen($password) < 8) {
    $pass_error = '<p id= "error"> password must be equal or more than 8 letters </p>';
    $err_s = 1;
    //echo '<p>  error (strlen($password) < 8) </p> <br>';
}

if ($password != $conpassword) { 
    $pass_error = '<p id= "error">Please enter the same password </p> ';
    $err_s = 1;
    //echo '<p>  error ($password != $conpassword) </p> <br>';
}


if (isset($_POST['gender'])) {
    $gender = ($_POST['gender']);
    $gender = htmlentities(mysqli_real_escape_string($conn, $_POST['gender']));
    if (!in_array(strtolower($gender), ['male','female'])) {
        $gender_error = '<p id= "error"> Please choose gender! </p> ';
        $err_s = 1;
    }
}

if (empty($gender)) { 
    $gender_error = '<p id= "error"> Please enter your gender </p> ';
    $err_s = 1;
    //echo '<p>  error (empty($gender)) </p> <br>';
}

if (isset($_POST['birthday_month']) && isset($_POST['birthday_day']) && isset($_POST['birthday_year'])) {
    $birthday_month = (int) ($_POST['birthday_month']);
    $birthday_day = (int) ($_POST['birthday_day']);
    $birthday_year = (int) ($_POST['birthday_year']);
    $birthday = htmlentities(mysqli_real_escape_string($conn, $birthday_day . '-' . $birthday_month . '-' . $birthday_year));
}


if (empty($birthday)) { 
    $birthday_error = '<p id= "error">  Please enter your birthday completely </p> ';
    $err_s = 1;
    //echo '<p>  error (empty($birthday)) </p> <br>';
}


else {
    if (($err_s== 0 ) && ($num_rows == 0)) {  // Go to Data base inputs
       $sql = "INSERT INTO users (username, email, password, md5_pass, gender, birthday, conpassword, con_pass_md5_pass) 
                          VALUES ('$username','$email','$password','$md5_pass','$gender','$birthday','$conpassword','$con_pass_md5_pass')";
    mysqli_query($conn,$sql);
    header('location:index.php');
    }
    }

    include('register.php');


/*echo $username ;
echo $email ;
echo $password ;
echo $md5_pass ;
echo $gender ;
echo $birthday ;
echo $conpassword ;
echo $con_pass_md5_pass ;*/





    