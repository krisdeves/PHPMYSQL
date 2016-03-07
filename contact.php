<?php ini_set('display_errors', 1); ?>

<!DOCTYPE html>

<html>
    
    <head>
        <title>Accueil</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="general/style_general.css"/>
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
            <br/>

            <form method="post" action="">
                <p>
                    Si vous avez rencontré le moindre problème avec ce site,
                    <br/>que vous avez des signalements a faire,
                    <br/>ou que vous souhaitez simplement nous faire passer un message,
                    <br/>exprimez vous dans la section suivante :
                </p>
                <br/>
                Objet : <input type="text" name="sujet"/>
                <br/>
                <br/>
                <p>Votre message :</p>
                <textarea name="message" rows="5" cols="60"></textarea>
                <br/>
                <input type="submit"/>
            </form>
            <br/>
            
            <?php
            if (isset($_POST['sujet']) and isset($_POST['message']))
            {
                $destinataire = 'tristan.pinaudeau@epsi.fr';
                if (mail($destinataire, $_POST['sujet'], $_POST['message']))
                {
                    print('<p>Le message bien envoyé !</p>');
                }
                else
                {
                    print('<p>Une erreur s\'est produite, veuillez bien remplir les deux champs.</p>');
                }
            }
            ?>
            
            <br/>
        </div>

        <footer>
            <a href="index.php">@CompFundation</a>
            <a href="#">Mention légales</a>
        </footer>

    </body>
    
</html>