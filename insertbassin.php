<?php

require './bdd/bddconfig.php';

$nombasin = $_POST['newbassin'];
$desbassin = $_POST['description'];

try {

    $objBdd = new PDO(
            'mysql:host=' . $config_bdd["server"] . ';dbname=' . $config_bdd["name"] . '; charset=utf8', $config_bdd["login"], $config_bdd["pass"]
    );

    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    $bassins = $objBdd->query("SELECT * FROM temperature WHERE idBassin = $id "); //requète sql
    $temps = $objBdd->prepare("INSERT INTO bassin(nom, description) VALUES (:newbassin,:description)");
    $temps->bindParam(':newbassin', $nombasin, PDO::PARAM_STR);
    $temps->bindParam(':description', $desbassin, PDO::PARAM_STR);
    $temps->execute();
    header('Location: bassins.php');
} catch (Exception $prme) {
    $err_msg = "Attention, il y a problème d'accés à la base de donnée";
}
?>
