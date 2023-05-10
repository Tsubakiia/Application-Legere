<?php
include('conn.php');
include('information.php');
session_start();
if ($_SESSION["connecter"] != "yes") {
header("location:Login.php");
exit();
}
if (date("H") < 18)
$bienvenue = "Bonjour et bienvenue "  .
$_SESSION["Prenom"]." ".$_SESSION["Nom"];
else
$bienvenue = "Bonsoir et bienvenue "  .
$_SESSION["Prenom"]." ".$_SESSION["Nom"];
?>

<!DOCTYPE html>
<html>
<img src="side-wave_background.jpg">

<head>
    <link rel="Stylesheet" href="Accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta charset="UTF-8">
    <p><?php echo $bienvenue ?></p>
    <nav>
        <ul>
            <li><a href="Accueil.php">Accueil</a></li>
            <!--<li><a href="Catalogue.php">Catalogue</a></li>-->
            <li></li>
            <li></li>
            <li>
                <div id="Con"><a href="Login.php">Connexion</a></div>
            </li>
            <li>
                <div id="Reg"><a href="Inscription.php">Inscription</a></div>
            </li>
            <?php if ($_SESSION["connecter"] == "yes")
            echo(' <li>
            <div id="sav"><a href="Saved.php">Sauvegardes</a></div>
        </li>');?>
        </ul>
    </nav>
    <div class="scroll-downs">
        <div class="mousey">
            <div class="scroller"></div>
        </div>
    </div>
    <?php
    $select=$pdo->prepare("SELECT Saved FROM user WHERE Mail='".$_SESSION['Mail']."' AND Pwd='".$_SESSION['Pwd']."'");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $select->execute();
    $tab = $select->fetchAll(); 
    //print_r($tab[0]);
    echo  str_replace("display:block","display:none",$tab[0]['Saved']);
    ?>
</head>
</html>