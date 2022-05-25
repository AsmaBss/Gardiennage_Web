<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css"/>
        <title>S'inscrire</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <meta charset="utf-8">
        <style>
            body{
                background-color:#66CCCC;
            }
            h1{
                font-size: 4em;
                margin-bottom: 15px;
            }
            #container-right{
                width: 600px;
                background-color: rgba(0, 0, 0, 0.1);
                float: right;
                padding: 10px;
                margin-top : 10px;
            }
            #container-left{
                width: 700px;
                padding: 10px;
                margin-top : 60px;
            }
            input[type=text], input[type=password]{
                width: 60%;
                margin-left: 20%;
                margin-bottom: 17px;
            }
            button, input[type=submit]{
                width: 60%;
                margin-left: 20%;
                margin-top: 10px;
            }
        </style>
    </head>

    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="connexion.php">V-SmartGuard</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> S'INSCRIRE</a></li>
                    <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> SE CONNECTER</a></li>
                    <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> SIGNAUX</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <body>
    <section class="content">
        <div id="container-left">
            <h1>V-SmartGuard</h1>
            <h3 align="center">
                V-SmartGuard est une application de contrôle familial<br>
                qui vous permet de savoir où est votre enfant, voiture,<br>
                animal.. et de surveiller ses déplacements en précisant<br>
                une zone géographique virtuelle.
            </h3>
        </div>
        <?php
        if(!empty($_POST["enregistrer"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $mysql = new PDO('mysql:host=localhost;dbname=gardiennage', "root","");

            $st = $mysql->prepare('INSERT INTO `user` (`id_user`, `name`, `email`, `password`) VALUES (NULL, ?, ?, ?);');
            //$st->execute(array($name,$email,$password));
            if($st->execute(array($name,$email,$password))) {
                $db_msg = "Succés.";
            }else {
                $db_msg = "Erreur.";
            }
        }
        ?>
        <div id="container-right">
            <form method="POST">
                <h1>S'inscrire</h1>

                <input type="text" placeholder="Entrez votre nom *" name="name" id="name" required>

                <input type="text" placeholder="Entrez votre e-mail *" name="email" id="email" required>

                <input type="password" placeholder="Entrez le mot de passe *" name="password" id="password" required>
                <br>

                <!--<input type="submit" id="enregistrer" name="enregistrer" value="Enregistrer">-->
                <input type="submit" id="enregistrer" name="enregistrer" class="btn btn-primary btn-lg" value="Enregistrer"style="color: #fff;background-color: #337ab7;border-color: #2e6da4;"/>
                <br>

                <!--<a href="connexion.php" ><input type="button" id="annuler" value="Annuler"></a>-->
                <a href="connexion.php">
                    <button type="button" id="annuler" class="btn btn-primary btn-lg">
                        Annuler
                    </button>
                </a>

                <div>
                    <?php if (! empty($db_msg)) { ?>
                    <p><?php echo $db_msg; ?></p>
                        <?php } ?>
                </div>
            </form>
        </div>
    </section>
</body>
<footer>
    <div class="footer">
        <p class="footer-made">© 2020. All Rights Reversed. ASMA</p>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/style.js"></script>

</html>