<?php 
session_start();

?>



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
<form action= "map.php" method="POST">
    <textarea id="txtAddress" rows="3" cols="25"></textarea>
    <br />
	<input type= "text" hidden id="lat" name="lat">
		<input type= "text" hidden id="long" name="long">

    <input type="button" onclick="GetLocation()" value="Get Location" />
	<input type="submit" value="submit">
	</form>
	<?php  //echo $_POST['lat'];    
	?>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAKAptIgIHps-YAQqyxKyNc2jqhL2upJjQ"></script>
    <script type="text/javascript">
    <!--
	var latitude;
	var longitude;
        function GetLocation() {
            var geocoder = new google.maps.Geocoder();
			
            var address = document.getElementById("txtAddress").value;
			//document.write(address);
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                     latitude = results[0].geometry.location.lat();
                     longitude = results[0].geometry.location.lng();
					 saveData(latitude,longitude);
					 document.getElementById("lat").value= latitude;
					 document.getElementById("long").value= longitude;
                    alert("Latitude: " + latitude + "\nLongitude: " + longitude);
                } else {
                    alert("Request failed.")
                }
				//document.write(latitude);

            });
        };
		
		function saveData(lat, longi) {
			//document.write(longi);
   var account = {
     latt: lat,
     longit: longi
   };
   //document.write(account.latt);
   //converts to JSON string the Object
   account = JSON.stringify(account);
   //creates a base-64 encoded ASCII string
   account = btoa(account);
   //save the encoded accout to web storage
   localStorage.setItem('_account', account);
}

//window.location= "testing.php";
        //-->
    </script>
	<?php //header('Location: testing.php') ?>
</body>
</html>