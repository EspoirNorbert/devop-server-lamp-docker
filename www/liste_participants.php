<?php
//Appel du fichier de connexion à la bd
require_once('connexion_db/conn_db.php');
//Définition de la requête de sélection
$sql_part="select * from participant natural join societe";
//Exécution
$query_part=mysqli_query($conn,$sql_part) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des participants</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styletable.css">
    
</head>
<body>
    <?php include "menu.php"; ?>
<table>
    <caption>Liste des participants</caption>
    <tr>
        <th>ID</th>
        <th>NOM</th>
        <th>Prénoms</th>
        <th>E-mail</th>
        <th>Sexe</th>
        <th>Société</th>
    </tr>
    <?php
    while($part=mysqli_fetch_array($query_part)){//Tant qu'on extrait des lignes sous forme de tableau associatif
        extract($part);
        echo"<tr>
                <td>$id</td>
                <td>$nom</td>
                <td>$prenom</td>
                <td>$email</td>
                <td>$sexe</td>
                <td>$nom_societe</td>
            </tr>";
    }
    ?>
</table>


</body>
</html>
