<?php

    function db_connect($login, $mdp){
        $cnx=mysqli_connect("localhost", "root", "", "injection");
        $sql='SELECT COUNT(*) FROM utilisateur WHERE login="'.$login.'" AND mdp ="'.$mdp.'"';
        echo "<h1>".$sql."</h1>";
        $res=mysqli_query($cnx,$sql);
        $nb=mysqli_fetch_array($res)[0];
        return $nb==1;
    }
?>

<form method="post">
    <label for="login">Login</label>
    <input type="text" name="login" id="login"><br>
    <br>
    <label for="mdp">Mot de passe</label>
    <input type="password" name="mdp" id="mdp"><br>
    <input type="submit" value="Valider">
</form>

<?php
    echo db_connect($_POST["login"], $_POST["mdp"]) ? "Authentifié" : "Nike ta mere sale espion";
?>

