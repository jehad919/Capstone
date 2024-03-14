<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/main.css">
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

        .main {
            background-color: #fff;
            border-radius: 8px;
            padding: 85px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #forgotPasswordBtn {
            color: #4285f4;
            text-decoration: none;
            margin: 10px 0;
            display: block;
        }

        #forgotPasswordBtn:hover {
            text-decoration: underline;
        }

        #submit {
            background-color: #4285f4;
            color: #fff;
            cursor: pointer;
        }

        #submit:hover {
            background-color: #3b79c1;
        }

        #joinAsGuestBtn {
            background-color: #34a853;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 4px;
            margin-top: 10px;
        }

        #joinAsGuestBtn:hover {
            background-color: #2d8c4e;
        }

        h2 {
            margin: 15px 0;
            color: #777;
        }

        #register {
            color: #4285f4;
            text-decoration: none;
        }

        #register:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="main">

        <h1>Login</h1>

        <form action="login.php" method="post">

            <input type="text" name="email" id="email" placeholder="Email"><br>
            <?php if (isset($email_error)) {
                echo $email_error;
            } ?>
            <input type="password" name="password" id="password" placeholder="Password"><br>
            <?php if (isset($pass_error)) {
                echo $pass_error;
            } ?>

            <a href="#" id="forgotPasswordBtn">Forgot Password</a>

            <input type="submit" name="submit" id="submit" value="Log in"><br>

            <button type="button" id="joinAsGuestBtn">Join as Guest</button>

        </form>

        <h2>or</h2>

        <a id="register" href="register.php">Register</a>

    </div>
    <script>
        // Add this code inside your <script> tag
            document.addEventListener("DOMContentLoaded", function () {
            const forgotPasswordBtn = document.getElementById("forgotPasswordBtn");
            const joinAsGuestBtn = document.getElementById("joinAsGuestBtn");

            // Add event listener to handle "Forgot Password" button click
            forgotPasswordBtn.addEventListener("click", function () {
                // Assume you have a function to send a verification email (you need to implement this)
                sendVerificationEmail();

                // Show the message
                alert("I've sent you a verification email.");
            });

            // Event listener for "Join as Guest" button click
            joinAsGuestBtn.addEventListener("click", function () {
                alert("Joining as a guest...");
                window.location.href = './HomePage/HomePage.php';
            });
            // Function to send a verification email (you need to implement this)
            function sendVerificationEmail() {
                console.log("Sending verification email...");
            }
        });
    </script>
</body>

</html>
