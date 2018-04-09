<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <title>Taxi Demand Predictor: Upcoming Events</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>
  <?php include('navbar.php'); 
  $input = $_POST['locationtag'];
  ?>
  <div align="center"class="container">
    <p align="center">UPCOMING EVENTS TAXI PREDICTION</p>
    <div align="center"id="googleMap" style="width:90%;height:600px;"></div>
    <script type="text/javascript" >
    function myMap() {
      var gmarkers = [];
      var map = new google.maps.Map(document.getElementById('googleMap'), {
        center: new google.maps.LatLng(40.706, -73.9969),
        zoom: 12
        });
      var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
      <?php

        $file = fopen("pred.csv","r");
        echo ' var locations = [ ';
        while ((($data = fgetcsv($file)) !== FALSE)) {
          if($data[0] == $input){
        echo "[". $data[1].",".$data[2].",".$data[3]."],";
          }
        }
        echo '];';
      ?>
      
      // var infomarker, i
      for (var i =0; i < locations.length; i++) {
        var lat = locations[i][0];
        var longitude = locations[i][1];
        var hour = locations[i][2];
        latlngset = new google.maps.LatLng(lat, longitude);

        var infomarker = new google.maps.Marker({  
          map: map, 
          title: "loan", 
          icon: "http://maps.google.com/mapfiles/kml/paddle/ylw-circle-lv.png",
          position: latlngset 
          });
        
        var content = "<u>Time: </u>" + hour + ":00";
        var infowindow = new google.maps.InfoWindow()
        google.maps.event.addListener(infomarker,'click', (function(infomarker,content,infowindow){ 
          return function() {
            infowindow.setContent(content);
            infowindow.open(map,infomarker);
          };
        })(infomarker,content,infowindow)); 
      }
      

}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-nsMPz4dIJ4lHSr8GB3pwK2KlUt51VVE&callback=myMap&libraries=geometry"></script>
    <div id="latlong">
      <p align="center">Latitude: <input size="20" type="text" id="latbox" name="lat"> Longitude: <input size="20" type="text" id="lngbox" name="lng" ></p>
  </div>
</div>
</body>
</html>