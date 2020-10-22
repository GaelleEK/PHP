
<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dateDeNaissance = $_POST['dateDeNaissance'];
$adresse = $_POST['adresse'];
$mail = $_POST['mail'];


$pdo = new PDO('mysql:host=mysql;dbname=basdetest;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);


$sql="INSERT INTO user (nom, prenom, dateDeNaissance, adresse, mail) VALUES ('$nom', '$prenom', '$dateDeNaissance', '$adresse', '$mail')";

$pdo -> exec($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-bootstrap.css">
    <title>Vous êtes enregistré !</title>
</head>
<body>
<div class="alert alert-dark" role="alert">
 <?php echo 'Vous êtes bien enregistré !'?><a href="#" class="alert-link">Retour à l'accueil</a>
</div> 
</body>
</html>