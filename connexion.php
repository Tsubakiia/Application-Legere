<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=appleg","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>