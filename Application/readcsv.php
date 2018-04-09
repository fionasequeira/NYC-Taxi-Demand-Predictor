<?php
$file = fopen("LatLngData1.csv","r");

while (($data = fgetcsv($file)) !== FALSE) {
    echo "email address " . $data[0];
    echo "longitude" . $data [1];
}

fclose($file);
?>