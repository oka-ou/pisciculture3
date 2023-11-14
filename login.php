<?php

require './bdd/bddconfig.php';
$login = $_POST['login'];
$password = $_POST['password'];
$err_msg = NULL;
if (isset($_POST["login"])) {
    $login = htmlspecialchars($_POST["login"], ENT_QUOTES);
}
if (isset($_POST["password"])) {
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES);
}

try {

    $objBdd = new PDO(
            'mysql:host=' . $config_bdd["server"] . ';dbname=' . $config_bdd["name"] . '; charset=utf8', $config_bdd["login"], $config_bdd["pass"]
    );

    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    $bassins = $objBdd->query("SELECT * FROM temperature WHERE idBassin = $id "); //requète sql
    $users = $objBdd->prepare("SELECT id,pseudo FROM users WHERE login= :login AND password = :password");
    $users->bindParam(':login', $login, PDO::PARAM_STR);
    $users->bindParam(':password', $password, PDO::PARAM_STR);
    $users->execute();
    if ($users->fetch() != false) {
        //utilisateur vérifié
        header('Location: bassins.php');
    } else {
        //mouvais login
        die("login ou mot de passe est incorrect");
    }
    header('Location: bassins.php');
} catch (Exception $prme) {
    $err_msg = "Attention, il y a problème d'accés à la base de donnée";
}
?>
