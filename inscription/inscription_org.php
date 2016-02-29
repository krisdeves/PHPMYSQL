<?php
ini_set('display_errors', 1);
include_once('bdd_insc.php');
?>

<!DOCTYPE html>

<html>
    
    <head>
        <title>Inscription intervenant</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../general/style_general.css"/>
    </head>
    
    <body>

        <article class="Bandeau_titre">
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
                            <a href="inscription_int.php">Intervenant</a>
                        </li>
                        <li>
                            <a href="inscription_org.php">Organisme</a>
                        </li>
                    </ul>
                </li>

                <li class="menu">
                    <a href="../recherche/">RECHERCHE</a>
                </li>
                
                <li class="menu">
                    <a href="../contact.php">CONTACT</a>
                </li>

            </ul>
        </nav>

        <div>
            <br/>

            <form action="" method="post">
                <fieldset>

                    <legend>Organisme</legend>

                    Nom :
                    <input type="text" name="nom_org"/>
                    <br/>
                    <br/>
                    Email :
                    <input type="text" name="email_org"/>
                    <br/>
                    <br/>
                    Tel :
                    <input type="text" name="tel_org"/>
                    <br/>
                    <br/>
                    Code postal :
                    <input type="text" name="codepost_org"/>
                    <br/>
                    <br/>
                    Ville :
                    <input type="text" name="ville_org"/>
                    <br/>
                    <br/>

                    <fieldset>
                        <legend>Contact:</legend>
                        Nom :
                        <input type="text" name="nom_cont"/>
                        Prenom :
                        <input type="text" name="prenom_cont"/>
                        email :
                        <input type="text" name="email_cont"/>
                        tel :
                        <input type="text" name="tel_cont"/>
                    </fieldset>
                    
                    <br/>
                    <br/>
                    
                    <input type="submit" name="insc_org"/>

                </fieldset>
            </form>    

            <br/>
        </div>

        <footer>
            <a href="..">@CompFundation</a>
            <a href="#">Mention légales</a>
        </footer>

    </body>
    
</html>
