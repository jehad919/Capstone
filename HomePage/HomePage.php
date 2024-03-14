<?php
session_start();
// include('Service_Request/connect.php');
$conn = mysqli_connect('localhost', 'root', '', 'capstone');

// Assuming you have a user ID in the session
$userID = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Fetch the username from the database based on the user ID
if ($userID) {
    $sql = "SELECT username FROM users WHERE id = $userID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Store the username in the session variable
    $_SESSION['username'] = $row['username'];
}

// Now you can use $_SESSION['username'] in your form
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Add your head content here -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="HomePage.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
</head>

<body>
  <header>
    <nav class="navbar">
      <a class="logo" href="#">Camera<span>.</span></a>
      <ul class="menu-links">
        <span id="close-menu-btn" class="material-symbols-outlined">close</span>
        <li><a href="../login.php">Logout</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Join Us</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About</a></li>
        <!-- Display username here -->
        <li id="username-container"></li>
      </ul>
      <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
    </nav>
  </header>

  <section class="hero-section">
    <div class="content">
      <h2>Book your personal photographer right now</h2>
      <p>
        Coffee is a popular and beloved beverage enjoyed by
        people around the world. Awaken your senses with a steaming cup of liquid motivation.
      </p>
      <!-- <form id="requestServiceForm" action="../Service_Request/request_service_form.php" method="post"> -->
        <!-- Add your form fields here -->
        <form id="requestServiceForm" action="../Service_Request/request_service_form.php?username=<?php echo isset($_SESSION['username']) ? urlencode($_SESSION['username']) : ''; ?>" method="post">

        <button type="submit" class="cancel-button">Request Service Now</button>
      </form>
      <button onclick="window.location.href='../My List/mylist.php'" class="cancel-button">My List</button>
    </div>
  </section>

  <script>
    const header = document.querySelector("header");
    const hamburgerBtn = document.querySelector("#hamburger-btn");
    const closeMenuBtn = document.querySelector("#close-menu-btn");

    // Toggle mobile menu on hamburger button click
    hamburgerBtn.addEventListener("click", () => header.classList.toggle("show-mobile-menu"));

    // Close mobile menu on close button click
    closeMenuBtn.addEventListener("click", () => hamburgerBtn.click());

    // Function to extract URL parameters
    function getUrlParameter(name) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(name);
    }

    // Get the username from the URL
    const username = getUrlParameter("username");

    // Display the username in the username-container
    const usernameContainer = document.getElementById("username-container");
    if (username) {
      usernameContainer.textContent = `Welcome, ${username}!`;
    }

    // Add an event listener to submit the form when the button is clicked
    // document.getElementById("requestServiceForm").addEventListener("submit", function () {
    //   // Add a hidden input field to include the username in the form data
    //   const hiddenInput = document.createElement("input");
    //   hiddenInput.type = "hidden";
    //   hiddenInput.name = "username";
    //   hiddenInput.value = username;
    //   this.appendChild(hiddenInput);
    // });
  </script>
</body>

</html>
