<!DOCTYPE HTML>
<?php
include('conn.php');
include('information.php');
//include('connexion.php');
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
</head>

<body>

    <h1 class="animate__animated animate__fadeInUp">Bases de la programmation</h1>
    <?php $cp1 =('<span class="Embedcp">
        <p class="Desc">H1 est une balise définissant un titre, <br/> en l occurrence ici c est le titre le plus important <br/>
        <p class="codepen" data-height="300" data-default-tab="html,result" data-slug-hash="yLRaVLe" data-user="Tsubakiia" >
  <span>See the Pen <a href="https://codepen.io/Tsubakiia/pen/yLRaVLe">
  Untitled</a> by Tsubaki (<a href="https://codepen.io/Tsubakiia">@Tsubakiia</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>
        <form method="post" action="">').('
        <input type="submit" Style="display:block" class="save" name="sa" value="Sauvegarder pour plus tard"></input></form></p>');
        echo $cp1 ;
        if(isset($_POST["sa"])){
            $insert = $pdo->prepare("UPDATE user SET Saved = '".$cp1."' WHERE Nom='".$_SESSION["Nom"]."' AND Prenom='".$_SESSION["Prenom"]."'");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                        $insert->execute();
        }
        
        ?>
    

</span>
</body>

</html>