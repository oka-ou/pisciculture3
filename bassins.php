<?php $titleOnglet = "Les bassins"; ?>

<?php require './bdd/bddconfig.php'; 

//$err_msg="";

try{
    $objBdd = new PDO(
        'mysql:host='.$config_bdd["server"].';dbname='. $config_bdd["name"].'; charset=utf8', 
        $config_bdd["login"], 
        $config_bdd["pass"]
        );
    
    $objBdd->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
    
    $bassins = $objBdd->query("SELECT * FROM bassin"); //requète sql
    
} catch (Exception $prme) {
    $err_msg = "Attention, il y a problème d'accés à la base de donnée";
//    $err_msg ='Erreur : '.$prme->getMessage();
//    echo "$err_msg";
//    die('Erreur : '. $prme->getmessage());
}
?>

<?php ob_start(); ?>
                <article>                
                    <h1>Les bassins</h1>
                    
                    <?php
//                    if (isset($err_msg)){
//                        echo"<p>".$err_msg."</p>";
//                    }else{
//                          //  
//                    }
                    ?>
                                                        
                    <?php while ($bassin = $bassins->fetch()) { ?> 
 
                    <h2><?php echo $bassin['nom']; ?></h2> 
                    
                    <p><?php echo $bassin['description']; ?></p>
                    
                    <img src="<?php echo "images/".$bassin['photo']; ?>" /> <br>
                    
                    <a href="temperatures.php?idbassin=<?php echo $bassin['idBassin'] ?>&nombassin=<?php echo $bassin['nom'] ?>"> Voir les températures </a> 
 
                    <?php } 
                    $bassins->closeCursor();//fin du while  //libère les ressources de la bdd 
                    ?> 
                    
<!--                  <p>Hello world</p>-->
            <?php // if($err_msg!=""){echo $err_msg ;} ?>
                </article>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit/template.php'; ?>

<?php $objBdd = null; ?>

