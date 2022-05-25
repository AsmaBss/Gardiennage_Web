<?php
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'gardiennage';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');

    $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['email']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    if($email !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM user where
              email = '".$email."' and password = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // email et mot de passe correctes
        {
           $_SESSION['email'] = $email;
           header('Location: menu.php');
        }
        else
        {
           header('Location: connexion.php?erreur=1'); // email ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: connexion.php?erreur=2'); // email ou mot de passe vide
    }
}
else
{
   header('Location: connexion.php');
}
mysqli_close($db); // fermer la connexion
?>