<?php
$connection = mysqli_connect('localhost','root','');
$db = mysqli_select_db($connection, 'gardiennage');

if (isset($_POST['deletedatanotif'])) {
    $id =$_POST['delete_id_notif'];

    $query="DELETE FROM notification_a_envoyer WHERE id_notif='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        //echo '<script> alert("Data Deleted"); </script>';
        header("Location:index.php");
    }
    else {
        //echo '<script> alert("Data not Deleted"); </script>';
    }
}
?>


