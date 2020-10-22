
    <?php
    $base=mysqli_connect("127.0.0.1", "root", "","basdetest");

    if ($base) {
        $sql="DELETE FROM user";
        $resultat=mysqli_query($base, $sql);
        if ($resultat == FALSE) {
            echo "Echec de l'execution de la requête.<br />";

        }
        else {
            echo "bdd supprimée.<br />";
        }
        if (mysqli_close($base)) {
            echo "déco réussie.<br />";
        }
        else {
            echo "echec déco bdd.<br />";
        }
    }
    else {
        printf('Erreur %d : %s.<br/>',mysqli_connect_errno(),mysqli_connect_error()); 
} 
    
    
    ?>
 