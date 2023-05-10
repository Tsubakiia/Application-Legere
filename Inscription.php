<?php
session_start();
include("information.php");
@$valider = $_POST["Envoi"];
$erreur = "";
if (isset($valider)) {
  if (empty($nom)) $erreur = "Le champ Nom est obligatoire!";
  elseif (empty($prenom)) $erreur = "Le champ Prénom est obligatoire!";
  elseif (empty($Mail)) $erreur = "Le champ Mail est obligatoire!";
  elseif (empty($MDP)) $erreur = "Le champ Mot de passe est obligatoire!";
  else {
    include("conn.php");
    $ins = $pdo->prepare("insert into user (Nom,Prenom,Mail,Pwd) values(?,?,?,?)");
    echo $nom . $prenom . $Mail . $MDP;
    if ($ins->execute(array($nom, $prenom, $Mail, md5($MDP))))
      header("location:Login.php");
  }
}

?>
<!DOCTYPE html>
<html>
<img src="side-wave_background.jpg">

<head>
  <link rel="Stylesheet" href="Inscription.css">
</head>


<body>
  <form method="post" action="Inscription.php">
    <div class="form">

      <div class="title">Bienvenue</div>
      <div class="subtitle">Créez votre compte</div>
      <div class="input-container ic1">
        <input id="firstname" name="Nom" class="input" type="text" placeholder=" " autocomplete="off" required />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Nom</label>
      </div>
      <div class="input-container ic2">
        <input id="lastname" name="Prenom" class="input" type="text" placeholder=" " autocomplete="off" required />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Prenom</label>
      </div>
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