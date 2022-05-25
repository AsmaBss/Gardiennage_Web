<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection,'gardiennage');

if (isset ($_POST['insertdata'])) {
    $id_signal = $_POST['id_signal'];
    $name = $_POST['name'];
    $type = $_POST['type'];

    $query = "INSERT INTO  signale (`id_signal`, `name`, `type`) VALUES ('$id_signal', '$name', '$type')";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        header("Location:index.php");
    }
}
?>
