<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstone');
$username = $_SESSION['username'];

// Fetch services based on the creator's username with status equal to 'Requested'
$sql = "SELECT * FROM services WHERE creator = '$username' AND status = 'requested'";
$result = mysqli_query($conn, $sql);

// Check if there are any services
if ($result) {
    // Fetch the data from the result set
    $numRows = mysqli_num_rows($result);
    $serviceData = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $numRows = 0;
    $serviceData = array(); // If there are no services, initialize an empty array
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My List </title>
  <link rel="stylesheet" href="style.css">
  <!-- Google Fonts Links For Icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-GLhlTQ8iNl7l5iDRY3Of1P4QK/D5TPi5FvZ/fY5u73T4" crossorigin="anonymous">

</head>
<body>
  <header>
    <nav class="navbar">
      <a class="logo" href="#">Camera<span>.</span></a>
      <ul class="menu-links">
        <span id="close-menu-btn" class="material-symbols-outlined">close</span>
        <li><a href="#">My List</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Chats</a></li>
        <li><a href="../HomePage/HomePage.php">Home</a></li>
        <li><a href="../login.php">Logout</a></li>
      </ul>
    <div class="user-info">
     <i class="fas fa-user"></i>
     <span><?php echo htmlspecialchars($username); ?></span>

    </div>

      <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
    </nav>
  </header>

  <section class="hero-section">
    <div class="list-header">
      <h2>My List</h2>
    </div>

    <div class="button-container">
    <button class="list-button active" onclick="window.location.href='requested_services.php'">Requested Services</button>
    <button class="list-button" onclick="window.location.href='ActiveServices/mylist.php'">Active Services</button>
    <button class="list-button" onclick="window.location.href='SubmittedServices/mylist.php'">Submitted</button>
    <button class="list-button" onclick="window.location.href='in_progress_services.php'">In Progress</button>
    <button class="list-button" onclick="window.location.href='history_services.php'">History</button>
    <button class="list-button" onclick="window.location.href='complaint_list.php'">Complaint List</button>
</div>

   


  

    <div class="card-container">
    <?php foreach ($serviceData as $service): ?>
      <!-- service_details.php?service_id= -->
      <a href="Review_Request_Services.php?service_id=<?php echo $service['ID']; ?>" class="card-link">
            <div class="card active-service">
                <img src="https://via.placeholder.com/300/200?text=<?php echo urlencode($service['Title']); ?>" alt="Service Image">
                <div class="card-content">
                    <h3><?php echo $service['Title']; ?></h3>
                    <div class="card-rate">
                        <img src="Star_icon_stylized.svg" alt="Star Icon">
                    </div>
                    <p>Price: $<?php echo $service['price']; ?></p>
                    <div class="button-group">
                        <!-- <button class="edit-button">Edit</button> -->
                        <button class="delete-button">Delete</button>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
<div class="button-container">
    <a href="Review_all_Requests.php" class="view-all-button">View All Services</a>
</div>
  </section>

  <script>
    // Add this code after your existing script
const responsiveMenu = document.getElementById("responsive-menu");

// Toggle mobile menu on hamburger button click
hamburgerBtn.addEventListener("click", () => {
  header.classList.toggle("show-mobile-menu");
  responsiveMenu.style.display = "block";
});

// Close mobile menu on close button click
closeMenuBtn.addEventListener("click", () => {
  hamburgerBtn.click();
  responsiveMenu.style.display = "none";
});

    const header = document.querySelector("header");
    const hamburgerBtn = document.querySelector("#hamburger-btn");
    const closeMenuBtn = document.querySelector("#close-menu-btn");
    const buttons = document.querySelectorAll(".list-button");

    // Toggle mobile menu on hamburger button click
    hamburgerBtn.addEventListener("click", () => header.classList.toggle("show-mobile-menu"));

    // Close mobile menu on close button click
    closeMenuBtn.addEventListener("click", () => hamburgerBtn.click());

    // Add click event listeners to the buttons
    buttons.forEach(button => {
      button.addEventListener("click", () => {
        // Remove 'active' class from all buttons
        buttons.forEach(btn => btn.classList.remove("active"));

        // Add 'active' class to the clicked button
        button.classList.add("active");

        // You can add additional logic here based on the clicked button
        // For example, you can show different content or perform specific actions
      });
    });
  </script>
</body>
</html>
