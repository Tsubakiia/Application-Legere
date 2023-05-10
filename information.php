<?php
 
@$nom = $_POST["Nom"];
@$prenom = $_POST["Prenom"];
@$Mail = $_POST["Mail"];
@$MDP = $_POST["Pwd"];
@$pass_crypt = md5($_POST["Pwd"]);

if($Mail!=""){
    @$_SESSION['Mail']= $Mail;
}
if($pass_crypt!=""){
    @$_SESSION['Pwd']= $pass_crypt;
}
?>
