<?php
$connection = mysqli_connect('localhost','root','');
$db = mysqli_select_db($connection, 'gardiennage');

if (isset($_POST['deletedata'])) {
    $s_id =$_POST['delete_id'];

    $query="DELETE FROM signale WHERE s_id='$s_id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        header("Location:index.php");
    }
}
?>
