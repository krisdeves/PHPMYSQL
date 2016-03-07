<?php
ini_set('display_errors', 1);
include_once('bdd_annonceOrg.php')
?>

<!DOCTYPE html>

<html>
    
    <head>
        <title>Recherche</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../general/style_general.css"/>
    </head>
    
    <body>

        <article id="Bandeau_titre">
            <a href=".."><img id="logo" src="../general/logo.jpg"/></a>
            <h1>CompFundation</h1>
            <h2>L'entreprise des services numériques</h2>
        </article>

        <nav>
            <ul id="Bandeau_menu">

                <li class="menu">
                    <a href="..">ACCUEIL</a>
                </li>
                
                <li class="menu">
                    <a href="#">INSCRIPTION</a>
                    
                    <ul id="sous-menu">
                        <li>
                            <a href="../inscription/inscription_int.php">Intervenant</a>
                        </li>
                        <li>
                            <a href="../inscription/inscription_org.php">Organisme</a>
                        </li>
                    </ul>
                </li>

                <li class="menu">
                    <a href=".">RECHERCHE</a>
                </li>
                
                <li class="menu">
                    <a href="../contact.php">CONTACT</a>
                </li>
            </ul>
        </nav>

        <div id="corp">
            
            <br/>
            
            --Recherche--
            <form method="post" action="">

                <?php print('<p>Placez une annonce en tant que '.$nomOrg[0].'<p>'); ?>

                <p>Code postal :</p>
                <input name="codepost" type="text"/>

                <p>Ville :</p>
                <input name="ville" type="text"/>

                <p>Description :</p>
                <textarea name="desc" rows="4" cols="50">Décrivez le post en quelques lignes...</textarea>

                <p>Domaine :</p>
                <select name="domaine">
                    <option selected></option>
                    <option value="informatique">informatique</option>
                    <option value="hotelerie">hotelerie</option>
                    <option value="santé">santé</option>
                    <option value="spectacle">spectacle</option>
                    <option value="industrie">industrie</option>
                    <option value="finance">finance</option>
                </select>

                <p>Date limite de l'annonce :</p>
                <select name="jour">
                    <?php
                        for ($i=1; $i<=31; $i++)
                        {
                            print('<option>'.$i.'</option>');
                        }
                    ?>                
                </select>
                /
                <select name="mois">
                    <?php
                        for ($i=1; $i<=12; $i++)
                        {
                            print('<option>'.$i.'</option>');
                        }
                    ?>
                </select>
                /
                <select name="annee">
                    <?php
                        for ($i=date(Y); $i<=3000; $i++)
                        {
                            print('<option>'.$i.'</option>');
                        }
                    ?>
                </select>

                <p>Durée d'intervention : (en nombre de jours)</p>
                <input name="duree" type="text"/>

                <input type="submit" name="recherche"/>

            </form>

            <br/>

        </div>

        <footer>
            <a href="..">@CompFundation</a>
            <a href="#">Mention légales</a>
        </footer>

    </body>
</html>
