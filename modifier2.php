<?php
/*action du action="modifier.php"*/
$pdo = new PDO('mysql:host=mysql;dbname=basdetest;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

if (isset($_POST["click"])) {
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $birthday = $_POST["dateDeNaissance"];
    $adresse = $_POST["adresse"];
    $mail = $_POST["mail"];

    
$query = $pdo->prepare("UPDATE user SET nom = '$nom', prenom = '$prenom', dateDeNaissance = '$birthday', adresse = '$adresse', mail = '$mail' WHERE id = '$id'");
$query -> execute();
include ("affichage-bdd.php");
}

?>