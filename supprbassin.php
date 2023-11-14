<?php $titleOnglet = "Les bassins"; ?>

<?php
require './bdd/bddconfig.php';

//$err_msg="";

try {
    $objBdd = new PDO(
            'mysql:host=' . $config_bdd["server"] . ';dbname=' . $config_bdd["name"] . '; charset=utf8', $config_bdd["login"], $config_bdd["pass"]
    );

    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $bassins = $objBdd->query("SELECT * FROM bassin"); //requète sql
} catch (Exception $prme) {
    $err_msg = "Attention, il y a problème d'accés à la base de donnée";
}
?>

<?php ob_start(); ?>
<article>                
    <h1>Suppression d'un bassins</h1>

    <table><thead><tr><th>Nom Bassin</th><th>Déscription</th><th>Suprimer</th></tr></thead>

        <?php while ($bassin = $bassins->fetch()) { ?> 


            <tr>
                <td><?php echo $bassin['nom']; ?></td> 

                <td><?php echo $bassin['description']; ?></td>

                <td>
                    <form action="deletebassin.php"  method="POST">
                        <input type="hidden" name="idbassin" value="<?php echo $bassin['idBassin']; ?>">
                        <input type="submit" value="suprimer">
                    </form>
                </td>
            </tr>


            <?php
        }
        $bassins->closeCursor(); //fin du while  //libère les ressources de la bdd 
        ?> 
    </table>

<!--                  <p>Hello world</p>-->
    <?php // if($err_msg!=""){echo $err_msg ;}  ?>
</article>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit/template.php'; ?>

<?php $objBdd = null; ?>