<?php
session_start();
// var_dump($_SESSION); // This should be before any HTML output

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'creator';
// echo htmlspecialchars($username);
// echo '<br>'; // Line break or echo ' '; to separate lines
// echo htmlspecialchars('helloworld');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuEwM7vA4X5xS0xesUc14zBV-64mUHlpQ&libraries=places" async defer></script>
</head>
<body>
    <section class="container">
        <header>Request Service Form</header>
        <form action="connect.php" method="post" class="form">
            <!-- Add a hidden input field to store the username -->


            <div class="input-box">
                <label>Title of the Event (What kind of event is it?)</label>
                <input type="text" placeholder="Wedding, photo shots, ex..." required name="Title" id="Title" />
            </div>

            <div class="input-box">
                <label>Details of the event</label>
                <input type="text" placeholder="Small description of what the event is" required name="Event" id="Event" />
            </div>

            <div class="input-box photographers-label">
                <label>Number of Photographers</label>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Male</label>
                    <input type="number" required name="Male" id="Male" />
                </div>
                <div class="input-box">
                    <label>Female</label>
                    <input type="number" required name="female" id="female" />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Start Date</label>
                    <input type="date" placeholder="" required name="startdate" id="startdate" />
                </div>
                <div class="input-box">
                    <label>End Date</label>
                    <input type="date" placeholder="" required name="enddate" id="enddate" />
                </div>
            </div>

            <div class="input-box">
                <label>Select Event Location</label>
                <input type="text" id="locationSearch" placeholder="Search for a location" required name="location" id="location">
                <br></br>
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>

            <!-- Add new input fields for price and phone number -->
            <div class="input-box">
                <label>Price</label>
                <input type="text" placeholder="Enter price" required name="price" id="price" />
            </div>

            <div class="input-box">
                <label>Phone Number</label>
                <input type="tel" placeholder="Enter phone number" required name="phone" id="phone" />
            </div>

            <div class="button-container">
                <button onclick="window.location.href='../HomePage/HomePage.html'" class="cancel-button">Cancel</button>
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </form>
    </section>

    <script src="script.js"> </script>
</body>

</html>