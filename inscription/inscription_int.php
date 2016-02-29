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

        <div id="corp">
            <br/>

            <form action="" method="post">
                <fieldset>

                    <p>Intervenant</p>

                    nom
                    <input type="text" name="nom_int"/>
                    </br>
                    </br>
                    prenom
                    <input type="text" name="prenom_int"/>
                    </br>
                    </br>
                    email
                    <input type="text" name="email_int"/>
                    </br>
                    </br>
                    telephone
                    <input type="text" name="tel_int"/>
                    </br>
                    </br>
                    fax
                    <input type="fax" name="fax_int"/>
                    </br>
                    </br>
                    abonnement
                    <select name="cotisation_int">
                        <option value="free" selected>free</option>
                        <option value="prem">premium</option>
                    </select>
                    </br>
                    </br>
                    domaine
                    <select name="domaine_int">
                        <option selected></option>
                        <option value="informatique">informatique</option>
                        <option value="hotelerie">hotelerie</option>
                        <option value="santé">santé</option>
                        <option value="spectacle">spectacle</option>
                        <option value="industrie">industrie</option>
                        <option value="finance">finance</option>
                    </select>
                    <br/>
                    <br/>
                    niveau
                    <select name="niveau">
                        <option selected></option>
                        <option>bac</option>
                        <option>licence</option>
                        <option>master</option>
                        <option>expert</option>
                        <option>doctorat</option>
                    </select>
                    <br/>
                    <br/>
                    <input type="submit" name="insc_int"/>

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
