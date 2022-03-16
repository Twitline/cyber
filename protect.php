
<?php



function protect($login,$mdp){
    $link = mysqli_connect("localhost", "root", "", "injection");
    /* Vérification de la connexion */
    if (mysqli_connect_errno()) {
        printf("Échec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }
    if ($stmt = mysqli_prepare($link, "SELECT COUNT(*) FROM utilisateur WHERE login=? AND mdp=?")) {

        /* Lecture des marqueurs */
        mysqli_stmt_bind_param($stmt, "ss", $login, $mdp);

        /* Exécution de la requête */
        mysqli_stmt_execute($stmt);

        /* Lecture des variables résultantes */
        mysqli_stmt_bind_result($stmt, $nb);

        /* Récupération des valeurs */
        mysqli_stmt_fetch($stmt);

        return $nb==1;
    }
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
/* Crée une requête préparée */
echo protect($_POST["login"], $_POST["mdp"]) ? "Authentifié" : "Nike ta mere sale espion";

?>
