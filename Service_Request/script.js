function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8
    });

    var input = document.getElementById('locationSearch');
    var searchBox = new google.maps.places.SearchBox(input);

    map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
    });

    var marker = new google.maps.Marker({
        map: map,
        draggable: true
    });

    searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length === 0) {
            return;
        }

        // Set the marker position and map center
        marker.setPosition(places[0].geometry.location);
        map.setCenter(places[0].geometry.location);

        // Update the input field with the selected location
        document.getElementById("location").value = "Latitude: " + places[0].geometry.location.lat() + ", Longitude: " + places[0].geometry.location.lng();
    });

    // Allow the user to drag the marker and update the input field
    google.maps.event.addListener(marker, 'dragend', function (event) {
        document.getElementById("location").value = "Latitude: " + event.latLng.lat() + ", Longitude: " + event.latLng.lng();
    });
}

// Call initMap when the page is loaded
initMap();




document.addEventListener('DOMContentLoaded', function () {
   const maleIcons = document.querySelectorAll('.male span');
   const femaleIcons = document.querySelectorAll('.female span');
   const counterDisplay = document.querySelector('.counter-display');

   let maleCounter = 0;
   let femaleCounter = 0;

   function updateCounter() {
     const totalCounter = maleCounter + femaleCounter;
     counterDisplay.textContent = totalCounter;
   }

   function handleClick(icon, isMale) {
     const rating = parseInt(icon.getAttribute('data-rating'));
     if (isMale) {
       maleCounter = rating;
     } else {
       femaleCounter = rating;
     }
     updateCounter();
   }

   maleIcons.forEach(function (icon) {
     icon.addEventListener('click', function () {
       handleClick(icon, true);
     });
   });

   femaleIcons.forEach(function (icon) {
     icon.addEventListener('click', function () {
       handleClick(icon, false);
     });
   });
 });




 