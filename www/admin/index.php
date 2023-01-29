<?php
session_start();
if(isset($_SESSION['login'])){//Si la variable session a ŽtŽ crŽee
    header("location:liste_participants.php");
    exit();
}
if(isset($_POST['Bconnexion'])){//SI on clique sur le bouton connexion
    //Appel du fichier de connexion ˆ la bd
    require_once('../connexion_db/conn_db.php');
    //RŽcupŽration des donnŽes par la mŽthode POST
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
    $mdpHash=sha1($mdp);
    //DŽfinition de la requte de selection
    $sql_auth="select count(*) nbl from admin where login='$login' and mdp='$mdpHash'";
    $query_auth=mysqli_query($conn,$sql_auth) or die(mysqli_error($conn));
    $auth=mysqli_fetch_object($query_auth);
    if($auth->nbl==1){//Si l'authentification est correcte
        //CrŽation d'une variable session
        $_SESSION['login']=$login;
        header("location:liste_participants.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Authentification</title>
    <link rel="stylesheet" href="../styleform.css">
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<h2>Authentification</h2>
<div class="field">
    <label>Login</label>
    <input type="text" name="login">
</div>
<div class="field">
    <label>Mot de passe</label>
    <input type="password" name="mdp">
</div>
<div class="field">
    <input id="bouton" type="submit" name="Bconnexion" value="Connexion">
</div>
</form>

</body>
</html>