<?php
ini_set('display_errors', 1); // erreurs
include_once('../general/bdd_connect.php'); // lie le script de connection a la bdd

session_start(); // importe le tableau de session

// verifie que l'email existe chez les intervenant
$requete_boolInt = mysqli_query($connexion, 
                                'SELECT EXISTS (
                                    SELECT * 
                                    FROM intervenant
                                    WHERE int_email = \''.$_SESSION['email'].'\')');
$boolInt = mysqli_fetch_array($requete_boolInt);

// verifie que l'email existe chez les organisme
$requete_boolOrg = mysqli_query($connexion,
                                'SELECT EXISTS (
                                    SELECT *
                                    FROM organisme
                                    WHERE org_email = \''.$_SESSION['email'].'\')');
$boolOrg = mysqli_fetch_array($requete_boolOrg);


if ($boolOrg[0]) // si l'utilisateur est un organisme
{
    header('Location: recherche_org.php'); // envoie a la page de recherche pour les organismes
}
elseif ($boolInt[0]) // sinon, si l'utilisateur est un organisme
{
    header('Location: recherche_int.php'); // envoie vers la page de recherche des intervenants
}
else // sinon (si l'email entré est invalide)
{
    header('Location: ../'); // renvoie a la page de connexion
}
?>
