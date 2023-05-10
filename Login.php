<?php
session_start();
include("information.php");
@$valider = $_POST["Envoi"];
$erreur = "";
if (isset($valider)) {
include("conn.php");
$verify = $pdo->prepare("select * from user where Mail=? and Pwd=? limit 1");
$verify->execute(array($Mail , $pass_crypt));
$user = $verify->fetchAll();
if (count($user) > 0) {
$_SESSION["Prenom"] = ucfirst(strtolower($user[0]["Prenom"])) ;
$_SESSION["Nom"] =  strtoupper($user[0]["Nom"]);
$_SESSION["connecter"] = "yes";
header("location:Accueil.php");
} else
$erreur = "Mauvais login ou mot de passe!";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="Stylesheet" href="Log.css">
    <img src="side-wave_background.jpg">
    </head>
    <body>
  <form method="post">
    <div class="form">

      <div class="title">Bienvenue</div>
      <div class="subtitle">Connectez-vous</div>
      <div class="input-container ic2">
        <input id="email" name="Mail" class="input" type="email" placeholder=" " autocomplete="off" required />
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Email</label>
      </div>
      <div class="input-container ic2">
        <input id="Pwd" name="Pwd" class="input" type="password" placeholder=" " autocomplete="off" required />
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Mot de Passe</label>
      </div>
      <input type="submit" name="Envoi" class="submit" value="Envoyer"></input>

    </div>
  </form>
</body>

</html>
</html>