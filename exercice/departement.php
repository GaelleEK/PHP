<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style-bootstrap.css">
    <title>BDD Departement</title>
</head>

<?php
/* connexion à la bdd */
    $pdo = new PDO('mysql:host=mysql;dbname=basdetest;host=127.0.0.1', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

    $query = $pdo->query('SELECT * FROM departement');
    $departement = $query->fetchAll();
?>

<body>
    <h1>Quel est ce departement.com</h1>
    <p>Vous en avez marre de jamais reconnaître les numéros des départements ?<br>
        Ce site est fais pour vous !</p>
    
        <a tabindex="0" class="btn" role="button" data-toggle="popover" data-trigger="focus" title="En savoir plus ..." data-content="Il vous suffit de sélectionner le numéro que vous souhaitez connaître dans la liste déroulante ci-dessous">En savoir plus</a>
        <script>Popper.Defaults.modifiers.computeStyle.gpuAcceleration = !(window.devicePixelRatio < 1.5 && /Win/.test(navigator.platform))</script>
        
    <p>Sélectionnez le code du departement pour connaitre son nom :</p>
    <form method="GET" action="departement.php">
        <select name="departement_nom">
            <?php foreach ($departement as $item): ?>
                <option value="<?= $item["departement_nom"]?>"><?=$item["departement_code"]?></option>
            <?php endforeach ?>
        </select>
        <input type="submit"></input>
    </form>

<?php 
/* action du input type submit : affichage du nom coresspondant à celui selectionné dans liste deroulante */
if (isset($_GET["departement_nom"])) {
    $nameDep = $_REQUEST["departement_nom"];

    $query = $pdo->prepare("SELECT departement_nom FROM departement WHERE departement_nom = :nameDep");
    $query->bindParam(':nameDep', $nameDep);
    $query->execute();

    echo "il s'agit du departement : $nameDep";
}
?>

</body>
</html>
