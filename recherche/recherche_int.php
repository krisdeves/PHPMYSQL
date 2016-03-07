<?php
ini_set('display_errors', 1);
include_once('../general/bdd_connect.php');
?>

<!DOCTYPE html>

<html>

    <head>
        <title>Annonces d'organismes</title>
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
            <!-- tableau des annonces triés par dates -->
            <table>
                <tr>
                    <th>Domaine</th>
                    <th>Details</th>
                    <th>Lieu</th>
                    <th>Date</th>
                    <th>Organisme</th>
                </tr>

                <?php

                $requete_annoncesOrg =
                    'SELECT dom_libelle AS domaine, rec_description AS details, rec_ville AS lieu, rec_date AS date, org_nom AS organisme
                    FROM recherche
                    INNER JOIN organisme
                        ON rec_idorganisme = org_id
                    INNER JOIN concerne
                        ON conc_idrecherche = rec_id
                    INNER JOIN domaine
                        ON conc_iddomaine = dom_id
                    ORDER BY date';
                $tableau_annonces = mysqli_query($connexion, $requete_annoncesOrg);

                if (isset($_POST['export']))
                {$fp = fopen('../tmp/export.csv', 'w');} 
                
                while ($row = mysqli_fetch_assoc($tableau_annonces))
                {

                    print(
                        '<tr>
                            <td>'.$row['domaine'].'</td>
                            <td>'.$row['details'].'</td>
                            <td>'.$row['lieu'].'</td>
                            <td>'.$row['date'].'</td>
                            <td>'.$row['organisme'].'</td>
                        </tr>');

                    if (isset($_POST['export']))
                    {
                        $liste = array($row);

                        foreach ($liste as $elements)
                        {
                            fputcsv($fp, $elements);
                        }
                    }
                }
                
                if (isset($_POST['export']))
                {
                    fclose($fp);
                    header('Location: ../tmp/export.csv');
                }
                
                ?>

            </table>
            <br/>
            
            <form method="post" action="">
                <input type="submit" name="export" value="Exporter" />
            </form>
            
        </div>

        <footer>
            <a href="..">@CompFundation</a>
            <a href="#">Mention légales</a>
        </footer>
        
    </body>
</html>