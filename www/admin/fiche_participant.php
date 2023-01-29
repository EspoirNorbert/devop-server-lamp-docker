<?php
session_start();
if(!isset($_SESSION['login'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}
//Appel du fichier de connexion
require_once('../connexion_db/conn_db.php');
//Définition de la requête
$sql_soc="select * from societe";
//Exécution de la requête
$query_soc=mysqli_query($conn,$sql_soc) or die(mysqli_error($conn));
//Récupération de l'id par GET
$id=$_GET['id'];
//Définition  et exécution de la requête de sélection
$sql_fiche="select * from participant where id='$id'";
$query_fiche=mysqli_query($conn,$sql_fiche) or die(mysqli_error($conn));
//Extraction de l'enregistrement
$fiche=mysqli_fetch_array($query_fiche);
extract($fiche);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="../styleform.css">
</head>
<body>
<form method="post" action="modif_participant.php">
    <h2>Formulaire d'inscription</h2>
    <div class="field">
        <label>Prénoms</label>
        <input type="text" name="prenom" value="<?php echo $prenom ?>">
    </div>
    <div class="field">
        <label>NOM</label>
        <input type="text" name="nom" value="<?= $nom ?>">
    </div>
    <div class="field">
        <label>Sexe</label>
        <input type="radio" name="sexe" value="F"
        <?php if($sexe=="F") echo"checked" ?>
        >F
        <input type="radio" name="sexe" value="M"
        <?php echo ($sexe=='M')?"checked":"" ?>
        >M
    </div>
    <div class="field">
        <label>E-mail</label>
        <input type="email" name="email" value="<?= $email ?>">
    </div>
    <div class="field">
        <label>Société</label>
        <select name="id_societe">
            <option>Sélectionnez</option>
            <?php
            while($soc=mysqli_fetch_row($query_soc)){
                echo"<option value='$soc[0]' ";
                echo ($id_societe==$soc[0])?"selected":"";
                echo">$soc[1]</option>";
            }
            ?>
        </select>
    </div>
    <div class="field">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input id="bouton" type="submit" name="bModif" value="Modifier">
    </div>
</form>
</body>
</html>
