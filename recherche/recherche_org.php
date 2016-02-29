<?php
ini_set('display_errors', 1);
include_once('bdd_rechercheOrg.php');
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

            <?php
            if (isset($enregistrement_accomplie)) // si une recherche a déja été réalisée
            {
                print('
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                        </tr>'); // affiche les entetes du tableau

                $requete_shearchResult = 
                    'SELECT int_nom AS nom, int_prenom AS prenom, int_email AS email, int_telephone AS telephone
                    FROM intervenant
                    INNER JOIN estcompetent
                        ON comp_idintervenant = int_id
                    INNER JOIN domaine
                        ON comp_iddomaine = dom_id
                    INNER JOIN concerne
                        ON conc_iddomaine = dom_id
                    INNER JOIN recherche
                        ON conc_idrecherche = rec_id
                    WHERE dom_libelle = \''.$_POST['domaine'].'\'
                    GROUP BY int_id
                    ORDER BY int_nom'; // requete qui va rechercher les intervenants corresondant au domaine voulu

                $tableau_intervenants = mysqli_query($connexion, $requete_shearchResult); // effectue la requete
                while ($row = mysqli_fetch_assoc($tableau_intervenants)) // stoque les resultats dans une matrice
                {
                    print(
                        '<tr>
                            <td>'.$row['nom'].'</td>
                            <td>'.$row['prenom'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['telephone'].'</td>
                        </tr>'); // affiche  les resultats sous forme d'un tableau
                }

                print('</table>');
            }

            else // sinon (si aucune recherche n'a encore été éfféctuée pour cette session)

            {?>
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
            <?php
            }
            ?>
            
            <br/>
        </div>

        <footer>
            <a href="..">@CompFundation</a>
            <a href="#">Mention légales</a>
        </footer>

    </body>
</html>
