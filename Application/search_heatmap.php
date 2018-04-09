<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Heatmaps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        background-color: #fff;
        border: 1px solid #999;
        left: 25%;
        padding: 5px;
        position: absolute;
        top: 10px;
        z-index: 5;
      }
    </style>
  </head>

  <body>
    <?php include('navbar.php'); 
  $input = $_POST['heatmaptag'];
  ?>
    <div id="floating-panel">
      <button onclick="toggleHeatmap()">Toggle Heatmap</button>
      <button onclick="changeGradient()">Change gradient</button>
      <button onclick="changeRadius()">Change radius</button>
      <button onclick="changeOpacity()">Change opacity</button>
    </div>
    <div id="map"></div>
    <script>

      // This example requires the Visualization library. Include the libraries=visualization
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">

      var map, heatmap;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 40.706, lng: -73.9969},
          mapTypeId: 'satellite'
        });

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: getPoints(),
          map: map
        });
      }

      function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      }

      function changeGradient() {
        var gradient = [
          'rgba(0, 255, 255, 0)',
          'rgba(0, 255, 255, 1)',
          'rgba(0, 191, 255, 1)',
          'rgba(0, 127, 255, 1)',
          'rgba(0, 63, 255, 1)',
          'rgba(0, 0, 255, 1)',
          'rgba(0, 0, 223, 1)',
          'rgba(0, 0, 191, 1)',
          'rgba(0, 0, 159, 1)',
          'rgba(0, 0, 127, 1)',
          'rgba(63, 0, 91, 1)',
          'rgba(127, 0, 63, 1)',
          'rgba(191, 0, 31, 1)',
          'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
      }

      function changeRadius() {
        heatmap.set('radius', heatmap.get('radius') ? null : 100);
      }

      function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : .5);
      }

      // Heatmap data: 500 Points
      function getPoints() {
        return [
          <?php
      if($input == 1){
        $file1 = fopen("cabs_7.csv","r");
        while ((($data = fgetcsv($file1)) !== FALSE)) {
        echo "new google.maps.LatLng(".$data[0].",".$data[1]."),";
        
      }
        $file2 = fopen("cabs_8.csv","r");
        while ((($data = fgetcsv($file2)) !== FALSE)) {
        echo "new google.maps.LatLng(".$data[0].",".$data[1]."),";
        }
      
        $file3 = fopen("cabs_9.csv","r");
        while ((($data = fgetcsv($file3)) !== FALSE)) {
        echo "new google.maps.LatLng(".$data[0].",".$data[1]."),";
        }
      
       
        $file4 = fopen("cabs_10.csv","r");
        while ((($data = fgetcsv($file4)) !== FALSE)) {
        echo "new google.maps.LatLng(".$data[0].",".$data[1]."),";
        }

        $file5 = fopen("cabs_11.csv","r");
        while ((($data = fgetcsv($file5)) !== FALSE)) {
        echo "new google.maps.LatLng(".$data[0].",".$data[1]."),";
        }
      }
      
      ?>
        ];
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-nsMPz4dIJ4lHSr8GB3pwK2KlUt51VVE&libraries=visualization&callback=initMap">
    </script>
  </body>
</html>