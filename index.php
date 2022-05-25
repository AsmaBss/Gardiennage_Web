<?php require 'header.php'; ?>

<div class="container">
    <!--Profil de signal-->
    <div id="container-left">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Profils de signaux</h2>
            </div>
            <div class="card-body">
                <?php
                require 'db.php';
                $sql = 'SELECT * FROM signale';
                $statement = $connection->prepare($sql);

                $statement->execute();
                $signal = $statement->fetchAll(PDO::FETCH_OBJ);
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Identifiant</th>
                        <th>Identifiant du signal</th>
                        <th>Nom du signal</th>
                        <th>Type</th>
                        <th>Choix</th>
                    </tr>
                    <?php foreach($signal as $person):?>
                    <tr>
                        <td><?= $person->s_id; ?></td>
                        <td><?= $person->id_signal; ?></td>
                        <td><?= $person->name; ?></td>
                        <td><?= $person->type; ?></td>
                        <td>
                            <button type="button" class="btn btn-success  editbtn">Modifier</button>
                            <button type="button" class="btn btn-danger   deletebtn">Supprimer</button>
                            <!--<a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?s_id=<?= $person->s_id ?>" class='btn btn-danger'>supprimer</a>-->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Ajouter
                </button>
            </div>
        </div>
    </div>
    <!--Notification à envoyer-->
    <div id="container-right">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Notifications à envoyer</h2>
            </div>
            <div class="card-body">
                <?php
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection,'gardiennage');

                $query = "SELECT * FROM notification_a_envoyer";
                $query_run = mysqli_query($connection , $query);
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Identifiant de notification</th>
                        <th>Identifiant du signal</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>Coordonnées</th>
                        <th>Choix</th>
                    </tr>
                    <?php
                    if ($query_run) {
                        foreach ($query_run as $row) {
                            ?>
                    <tr>
                        <td><?php echo $row['id_notif']; ?></td>
                        <td><?php echo $row['id_signale']; ?></td>
                        <td><?php echo $row['type_notif']; ?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['coordonnees']; ?></td>
                        <td>
                            <button type="button" class="btn btn-success editbtnn ">Modifier</button>
                            <button type="button" class="btn btn-danger   deletebtnn">Supprimer</button>
                        </td>
                    </tr>
                            <?php
                        }
                    }
                    else {
                        echo "not found";
                    }
                    ?>
                </table>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModaln">
                    Ajouter
                </button>
            </div>
        </div>
    </div>
    <!--Notifications déjà envoyées-->
    <div id="container-left">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Notification déja envoyées</h2>
            </div>
            <div class="card-body">
                <?php
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection,'gardiennage');

                $query = "SELECT * FROM notification_envoyee";
                $query_run = mysqli_query($connection , $query);
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Identifiant notification envoyée</th>
                        <th>Identifiant notification à envoyer</th>
                        <th>type notification</th>
                        <th>Timestamp</th>
                    </tr>
                    <?php
                    if ($query_run) {
                        foreach ($query_run as $row) {
                            ?>
                    <tr>
                        <td><?php echo $row['id_notif_envoyee']; ?></td>
                        <td><?php echo $row['id_notif']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['timestamp']; ?></td>
                    </tr>
                            <?php
                        }
                    }
                    else {
                        echo "not found";
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Ajouter signal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajouter un signal</h4>
            </div>
            <form action="create.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputage">Identifiant du signal</label>
                        <input type="number" name="id_signal" class="form-control" id="exampleInputage" placeholder="Ex: numéro de téléphone, matricule de voiture ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputname">Nom</label>
                        <input type="text"  name="name" class="form-control" id="exampleInputname" placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputtype">Type</label>
                        <input type="text" name="type" class="form-control" id="exampleInputtype" placeholder="Ex: écolier, voiture, chat, malade, ...">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" name="insertdata">Ajouter</button>

                </div>
            </form>
        </div>
    </div>
</div>

<!--Modifier signal-->
<div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modifier un signal</h4>
            </div>
            <form action="edit.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="update_id_signal" id="update_id_signal">
                    <div class="form-group">
                        <label for="exampleInputage">Identifiant du signal</label>
                        <input type="text" name="id_signal" class="form-control" id="id_signal" placeholder="Identifiant du signal">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputname">Nom</label>
                        <input type="text"  name="name" class="form-control" id="name" placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputtype">Type</label>
                        <input type="text" name="type" class="form-control" id="type" placeholder="Ex: écolier, voiture, chat, malade, ...">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" name="update">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Ajouter notification-->
<div class="modal fade" id="myModaln" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajouter une notification</h4>
            </div>
            <form action="createnotif.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputname">Identifiant du signal</label>
                        <input type="number"  name="id_signale" class="form-control"  placeholder="Ex: numéro de téléphone, matricule de voiture ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputage">Type notification</label>
                        <input type="text" name="type_notif" class="form-control"  placeholder="Ex: entree, sortie, rencontre ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputtype">Email</label>
                        <input type="email" name="email" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputtype">Coordonnées</label>
                        <input type="text" name="coordonnees" class="form-control"  placeholder="Deux coordonnées de la zone.Ex: x1,y1,x2,y2, ">
                    </div>
                </div>
                <div id="map" style="height: 300px;width: 500px;">
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCak8R9nz7I9lSzb81MERORA1EpWrX049c&callback=initMap">
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" name="insertdatanotif">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modifier notification-->
<div class="modal fade" id="editmodelnotif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modifier une notification</h4>
            </div>
            <form action="editn.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="update_id_notif" id="update_id_notif">
                    <div class="form-group">
                        <label for="exampleInputname">Identifiant du signal</label>
                        <input type="text"  name="id_signale"  id="id_signale" class="form-control"  placeholder="Identifiant du signal">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputage">Type notification</label>
                        <input type="text" name="type_notif" id="type_notif" class="form-control"  placeholder="Ex: entree, sortie, rencontre ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputtype">Email</label>
                        <input type="email" name="email" id="email" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputtype">Coordonnées</label>
                        <input type="text" name="coordonnees" id="coordonnees" class="form-control"  placeholder="Deux coordonnées de la zone.Ex: x1,y1,x2,y2, ">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" name="updatedata">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Supprimer notification-->
<div class="modal fade" id="deletemodalnotif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Supprimer une notification</h4>
            </div>
            <form action="deletenotif.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="delete_id_notif" id="delete_id_notif">
                    <h4>Voulez-vous vraiment supprimer cette notification ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                    <button type="submit" name="deletedatanotif" class="btn btn-primary">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Supprimer signal-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Supprimer un signal</h4>
            </div>
            <form action="delete.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <h4>Voulez-vous vraiment supprimer ce signal ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                    <button type="submit" name="deletedata" class="btn btn-primary">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function initMap() {
        var myLatlng = {lat: 36.59, lng: 10.49};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: myLatlng
        });

        // Create the initial InfoWindow.
        var infoWindow = new google.maps.InfoWindow(
        {content: 'Cliquez sur le map pour obtenir Lat/Lng!', position: myLatlng});
        infoWindow.open(map);

        // Configure the click listener.
        map.addListener('click', function(mapsMouseEvent) {
            // Close the current InfoWindow.
            infoWindow.close();

            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
            infoWindow.setContent(mapsMouseEvent.latLng.toString());
            infoWindow.open(map);
        });
    }
</script>

<?php require 'footer.php'; ?>
