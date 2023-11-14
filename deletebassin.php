
<?php

require './bdd/bddconfig.php';

$idbassin = $_POST['idbassin'];


try {

    $objBdd = new PDO(
            'mysql:host=' . $config_bdd["server"] . ';dbname=' . $config_bdd["name"] . '; charset=utf8', $config_bdd["login"], $config_bdd["pass"]
    );

    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    $bassins = $objBdd->query("SELECT * FROM temperature WHERE idBassin = $id "); //requète sql
    $temps = $objBdd->prepare("DELETE FROM temperature WHERE idBassin=:idbassin");
    $temps->bindParam(':idbassin', $idbassin, PDO::PARAM_INT);
    $temps->execute();
    $temps = $objBdd->prepare("DELETE FROM bassin WHERE bassin.idBassin=:idbassin");
    $temps->bindParam(':idbassin', $idbassin, PDO::PARAM_INT);
    $temps->execute();
    header('Location: bassins.php');
} catch (Exception $prme) {
    $err_msg = "Attention, il y a problème d'accés à la base de donnée";
}
?>