<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titleOnglet; ?></title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="shortcut icon" href="css/img/logo.jpg" />
    </head>

    <body>
        <div id="conteneur">
            <header>
                <div class="login">
                    <form action="login.php" method="POST">
                        <fieldset>
                            <legend>Connectez-vous</legend>
                            login:<br>
                            <input type="text" name="login" placeholder="Login" required="">
                            <br>
                            password:<br>
                            <input type="password" name="password" placeholder="Password" required="">
                            <br><br>
                            <input type="submit" value="Valider">
                        </fieldset>
                    </form> 

                </div>
                <h1>la pisciculture de TPCDI</h1>
                
            </header>

            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="bassins.php">Les bassins</a></li>
                    <li><a href="arcenciel.php">La truite arc-en-ciel</a></li>
                    <li><a href="newbassin.php">New Bassin</a></li>
                    <li><a href="supprbassin.php">Delete Bassin</a></li>
                </ul>
            </nav>
            <section>
                <?php echo $contenu; ?>
            </section>

            <footer>
                <p>Copyright TPCDI - Tous droits réservés - 
                    <a href="#">Contact</a></p>
            </footer>
        </div>    
    </body>
</html>