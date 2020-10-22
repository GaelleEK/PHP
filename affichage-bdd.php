<?php

/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=basdetest;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

/* si on récupère id par le get alors on l'assigne à une variable que l'on convertis en entier puis on prépare la requete et l'exécute */
if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $id=intval($id);
    $query=$pdo->prepare("DELETE FROM user WHERE id = $id");
    $query->execute();
}

$query = $pdo->query("SELECT * FROM user");
$user = $query->fetchAll();

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Utilisateurs enregistrés</title>
  <link rel="stylesheet" href="style-bootstrap.css">
</head>
<body>
    <div class="container-fluid"> 
        
        <h1 class="text-center text-uppercase p-5">Liste des utilisateurs enregistrés</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Adresse mail</th>
                    <th>Action</th>
                </tr>
            </thead>
        <?php foreach ($user as $item): ?>
            <tr>
                <td><?php echo  $item["nom"] ?></td>
                <td><?php echo  $item["prenom"] ?></td>
                <td><?php echo  $item["dateDeNaissance"] ?></td>
                <td><?php echo  $item["mail"] ?></td>
                <td><a href="modifier.php?id=<?=$item["id"]?>" class="btn btn-primary">Modifier</a></td>
            </tr>
            <?php endforeach ?>
        </table>
    
    <!--affichage d'une liste déroulante avec données bdd -->
        <form class="form-group d-flex justify-content-center p-5" method="GET" action="affichage-bdd.php">
            <select class="custom-select form-control col-md-2" name="id">
                <?php foreach ($user as $item): ?>
                <option value="<?= $item["id"] ?>"><?= $item["nom"]?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Supprimer"></input>
        </form>
    


        <!--Suppression de la bdd complete 
        <a href="suppression-value-bdd.php">suppression totale</a> -->
    </div>
</body>
</html>