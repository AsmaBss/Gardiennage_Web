<?php
require 'db.php';
$id_signal = $_GET['s_id'];
$sql = 'SELECT * FROM signale WHERE s_id=:s_id';
$statement = $connection->prepare($sql);
$statement->execute([':s_id' => $s_id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['update'])) {
    $s_id = $_POST['update_id_signal'];
    $id_signal = $_POST['id_signal'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $sql = 'UPDATE signale SET id_signal=:id_signal,name=:name , type=:type WHERE s_id=:s_id';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':id_signal' => $id_signal, ':name' => $name,  ':type' => $type,':s_id' => $s_id])) {
        header("Location:index.php");
    }
}
?>
