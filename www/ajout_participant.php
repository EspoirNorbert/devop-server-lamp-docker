<?php
//Appel du fichier de connexion
require_once('connexion_db/conn_db.php');
//Récupération des données par post
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$sexe=$_POST['sexe'];
$email=$_POST['email'];
$id_societe=$_POST['id_societe'];

//Définition de la requête d'insertion
$sql_ajout="insert into participant values(null,'$nom',
        '$prenom','$sexe','$email','$id_societe')";
//Exécution de la requête
$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));
echo"<h2>Merci $nom! Votre inscription a bien &eacute;t&eacute; prise en compte</h2>
    <a href='form_inscription.php'>Nouvelle inscription</a>";
?>