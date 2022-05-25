<?php
$connection = mysqli_connect("localhost","root","","gardiennage");

$id_signal = $_POST["id_signal"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];

$sql = "INSERT INTO heartbeat (id, id_signal, latitude, longitude, timestamp) VALUES (NULL, '$id_signal', '$latitude', '$longitude', current_timestamp())";

$result = mysqli_query($connection,$sql);

if($result) {
    echo "insertion";
}else {
    echo "erreur";
}
?>
