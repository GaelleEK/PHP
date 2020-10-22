<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-bootstrap.css">
    <title>Modification d'utilisateur</title>
</head>
<body>

<?php
$pdo = new PDO('mysql:host=mysql;dbname=basdetest;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
   
$query = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$id=$_GET['id'];
$id = intval($id);
$query -> bindParam(':id', $id, PDO::PARAM_INT);
$query -> execute();
$fetch = $query ->fetch();



?>
<container class="container-fluid">
<h1 class="text-center text-uppercase p-5">Modification d'utilisateur</h1>
        <form action="modifier2.php" method="post">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Adresse</th>
                    <th>Adresse mail</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tr>
                    <input type="hidden" name=id value="<?=$id?>">
                    <td><input type="text" name="nom" value="<?php echo  $fetch["nom"] ?>"></input></td>
                    <td><input type="text" name="prenom" value="<?php echo  $fetch["prenom"] ?>"></input></td>
                    <td><input type="text" name="dateDeNaissance" value="<?php echo  $fetch["dateDeNaissance"] ?>"></input></td>
                    <td><input type="text" name="adresse" value="<?php echo  $fetch["adresse"] ?>"></input></td>
                    <td><input type="text" name="mail" value="<?php echo  $fetch["mail"] ?>"></input></td>
                    <td><input type="submit" name="click" value="modifier"></input></td>
                </tr>
          </table>  
        </form>
</container>
</body>
</html>

