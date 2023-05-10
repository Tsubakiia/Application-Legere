<?php
 
@$nom = $_POST["Nom"];
@$prenom = $_POST["Prenom"];
@$Mail = $_POST["Mail"];
@$MDP = $_POST["Pwd"];
@$passwordConf = $_POST["passconf"];
@$pass_crypt = md5($_POST["Pwd"]);

 
?>