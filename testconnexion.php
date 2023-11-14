<?php
require './bdd/bddconfig.php';
$objBdd = new PDO(
        'mysql:host='.$config_bdd["server"].';dbname='. $config_bdd["name"].'; charset=utf8', 
        $config_bdd["login"], 
        $config_bdd["pass"]
        );
$objBdd = null;

