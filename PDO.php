<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=injection","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
   $ins = $pdo->prepare("SELECT COUNT(*) AS nb FROM utilisateur WHERE login=? AND mdp=?");
   $ins->bindParam(1, $_POST["login"], PDO::PARAM_STR);
   $ins->bindParam(2, $_POST["mdp"], PDO::PARAM_STR);
   $ins->execute();
   $ins->setFetchMode(PDO::FETCH_ASSOC);
   $tab = $ins->fetchAll();
    echo $tab[0]['nb']==1? "Authentifié" : "NON AUTENTIFIE SALE INTRU";    
?>