<?php
ini_set('display_errors', 1);
include_once('../general/bdd_connect.php')
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

            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                </tr>

                <?php

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
                    WHERE dom_libelle = \''.$_GET['domaine'].'\'
                    GROUP BY int_id
                    ORDER BY int_nom'; // requete qui va rechercher les intervenants corresondant au domaine voulu

                $tableau_intervenants = mysqli_query($connexion, $requete_shearchResult); // effectue la requete

                if (isset($_POST['export']))
                {$fp = fopen('../tmp/export.csv', 'w');} 

                while ($row = mysqli_fetch_assoc($tableau_intervenants)) // stoque les resultats dans une matrice
                {
                    print(
                        '<tr>
                            <td>'.$row['nom'].'</td>
                            <td>'.$row['prenom'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['telephone'].'</td>
                        </tr>'); // affiche  les resultats sous forme d'un tableau

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
            
            <form method="post" action="">
                <input type="submit" name="export" value="Exporter" />
            </form>

            <br/>
        </div>

        <footer>
            <a href="..">@CompFundation</a>
            <a href="#">Mention légales</a>
        </footer>

    </body>
</html>
