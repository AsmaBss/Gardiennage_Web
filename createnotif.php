<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection,'gardiennage');

if (isset ($_POST['insertdatanotif'])) {
    $id_signale = $_POST['id_signale'];
    $type_notif = $_POST['type_notif'];
    $email = $_POST['email'];
    $coordonnees = $_POST['coordonnees'];
    
    $query = "INSERT INTO  notification_a_envoyer (`id_signale`, `type_notif`, `email`, `coordonnees`) VALUES ('$id_signale','$type_notif' ,'$email' ,'$coordonnees' )";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        header("Location:index.php");
    }
}
?>
