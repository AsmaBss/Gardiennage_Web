<?php
require 'db.php';
$id_notif = $_GET['id_notif'];
$sql = 'SELECT * FROM notification_a_envoyer WHERE id_notif=:id_notif';
$statement = $connection->prepare($sql);
$statement->execute([':id_notif' => $id_notif ]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['updatedata'])) {
    $id_notif = $_POST['update_id_notif'];
    $id_signale= $_POST['id_signale'];
    $type_notif = $_POST['type_notif'];
    $email = $_POST['email'];
    $coordonnees = $_POST['coordonnees'];
    $sql = 'UPDATE notification_a_envoyer SET id_signale=:id_signale, type_notif=:type_notif , email=:email , coordonnees=:coordonnees WHERE id_notif=:id_notif';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':id_signale' => $id_signale, ':type_notif' => $type_notif,  ':email' => $email,':coordonnees' => $coordonnees, ':id_notif' => $id_notif])) {
        header("Location:index.php");
    }

}
?>



















