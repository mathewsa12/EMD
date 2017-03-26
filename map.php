<?php
session_start();
$zip = $_SESSION['zip'];
// $la= $_POST['lat'];
// $lo= $_POST['long'];
//echo $la;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Place searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes">
    <meta charset="utf-8">
    <style>
    /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
    #map {
    height: 100%;
        width: 70%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
    height: 80%;
        width: 80%;
    margin: 0;
    padding: 0;
    }
    </style>
       <script>
    var latitude;
    var longitude;
    function GetLocation() {
    var geocoder = new google.maps.Geocoder();
    var address = zip;
    //document.write(address);
    geocoder.geocode({ 'address': address }, function (results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();
    //saveData(latitude,longitude);
    $('#lat').value= latitude;
    $('#long').value= longitude;
    alert("Latitude: " + latitude + "\nLongitude: " + longitude);
    } else {
    alert("Request failed.")
    }
    //document.write(latitude);
    });
    };
    </script>
    <script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    var map;
    var infowindow;
      var latt;
      var longi;
      /* function loadData() {
    var account = localStorage.getItem('_account');
    if (!account) return false;
    localStorage.removeItem('_account');
    //decodes a string data encoded using base-64
    account = atob(account);
    //parses to Object the JSON string
    account = JSON.parse(account);
    //do what you need with the Object
    fillFields(account.latt, account.longit);
    return true;
    }
    loadData();
    document.write(account.longit);*/
          //document.write("lat");
    var lla= latitude;
    //document.write(lla);
    var llo= longitude;
    var latti= parseFloat(lla);
    var longitt= parseFloat(llo);
    //alert("Latitude: " + latti + "\nLongitude: " + longitt);
    //document.write(longitt);
    function initMap() {
    //loadData();
    //var la= parseFloat(account.latt);
    //var lo= parseFloat(account.longit);
    
   // document.write("hello");
    var pyrmont = {lat: latt, lng: longi};
    // var pyrmont = {lat: -33.23, lng: 151.56};
    map = new google.maps.Map(document.getElementById('map'), {
    center: pyrmont,
    zoom: 12
    });
    infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    service.nearbySearch({
    location: pyrmont,
    radius: 5000,
    type: ['hospital']
    }, callback);
    }
    function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
    createMarker(results[i]);
    }
    }
    }
    function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
    });
    google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
    });
    }
    </script>
  </head>
  <body>
    
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKAptIgIHps-YAQqyxKyNc2jqhL2upJjQ&libraries=places&callback=initMap" async defer></script>
 
  </body>
</html>