<?php $titleOnglet = "Les températures"; ?>

<?php
if (isset($_GET["idbassin"])) {
    $idBassin = intval($_GET["idbassin"]); //on récupère la valeur en nombre entier.
}
//var_dump($idbassin);
if (isset($_GET["nombassin"])) {
    $nomBassin = urldecode($_GET["nombassin"]); // %20 ou 27% disparaissent de l'url
}
?>

<?php
require './bdd/bddconfig.php';

//$err_msg="";

try {
    $idbassin = intval($_GET["idbassin"]);
    $objBdd = new PDO(
            'mysql:host=' . $config_bdd["server"] . ';dbname=' . $config_bdd["name"] . '; charset=utf8', $config_bdd["login"], $config_bdd["pass"]
    );

    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    $bassins = $objBdd->query("SELECT * FROM temperature WHERE idBassin = $id "); //requète sql
    $temps = $objBdd->prepare("SELECT * FROM temperature  WHERE idBassin = :id");
    $temps->bindParam(':id', $idbassin, PDO::PARAM_INT);
    $temps->execute();
} catch (Exception $prme) {
    $err_msg = "Attention, il y a problème d'accés à la base de donnée";
//    $err_msg ='Erreur : '.$prme->getMessage();
//    echo "$err_msg";
//    die('Erreur : '. $prme->getmessage());
}
?>

<?php ob_start(); ?>
<article>                
    <h1>Les températures du bassin : <?php
        if (isset($_GET["nombassin"])) {
            echo $nomBassin; // %20 ou %27 disparaissent de l'url
        }
        ?> 
    </h1>
    <table>
        <thead>
            <tr>
                <th>Temperatures (°C)</th>
                <th>Date</th> 
            </tr>
        </thead>
        <tbody>
            <?php while ($temp = $temps->fetch()) { ?> 
                <tr>
                    <td><?php echo $temp['temp']; ?></td>
                    <td><?php echo $temp['date']; ?></td> 
                </tr>     
            <?php } $temps->closeCursor(); ?>
        </tbody>
    </table>

</article>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit/template.php'; ?>

<?php $objBdd = null; ?>
