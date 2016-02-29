<?php

ini_set('display_errors', 1);

session_start();
if (isset($_POST['email'])) // si l'utilisateur a cliqué sur le bouton
{
    $_SESSION['email'] = $_POST['email']; // stock l'email entré dans le tableau $_SESSION
    header('Location: recherche/'); // envoie vers le dossier recherche
}
?>

<!DOCTYPE html>

<html>
    
    <head>
        <title>Accueil</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="general/style_general.css"/>
        <link rel="stylesheet" href="style_accueil.css"/>
    </head>
    
    <body>

        <article id="Bandeau_titre">
            <a href="index.php"><img id="logo" src="general/logo.jpg"/></a>
            <h1>CompFundation</h1>
            <h2>L'entreprise des services numériques</h2>
        </article>

        <nav>
            <ul id="Bandeau_menu">

                <li class="menu">
                    <a href="index.php">ACCUEIL</a>
                </li>
                
                <li class="menu">
                    <a href="#">INSCRIPTION</a>
                    
                    <ul id="sous-menu">
                        <li>
                            <a href="inscription/inscription_int.php">Intervenant</a>
                        </li>
                        <li>
                            <a href="inscription/inscription_org.php">Organisme</a>
                        </li>
                    </ul>
                </li>

                <li class="menu">
                    <a href="recherche/">RECHERCHE</a>
                </li>
                
                <li class="menu">
                    <a href="contact.php">CONTACT</a>
                </li>

            </ul>
        </nav>

        <div id="corp">

            <form action="" method="post">
                <fieldset>
                    <p>Connectez vous</p>
                    <br/>
                    <input name="email" type="text" placeholder="email" />
                    <input type="submit"/>
                </fieldset>
            </form>

            <br/>
            <p>Ou inscrivez vous dans la rubrique "Inscription"</p>
            <br/>
            
        </div>

        <footer>
            <a href="index.php">@CompFundation</a>
            <a href="#">Mention légales</a>
        </footer>

    </body>

</html>
