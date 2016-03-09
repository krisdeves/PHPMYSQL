<?php
ini_set('display_errors', 1); // erreurs
include_once('../general/bdd_connect.php'); // lie le script de connection a la bdd

session_start(); // importe le tableau de session

if (isset($_SESSION['email'])) // si l'utilisateur est connecté
{
    /*

            E N R E G I S T R E M E N T   R E C H E R C H E

    */
    
    if (isset($_POST['recherche'])) // si l'annonce a été envoyée
    {
        // récupération des valeurs du formulaire
        $email_organisme = $_SESSION['email'];
        $codepostal = addslashes($_POST['codepost']);
        $ville = addslashes($_POST['ville']);
        $description = addslashes($_POST['desc']);
        $domaine = addslashes($_POST['domaine']);
        $jour = addslashes($_POST['jour']);
        $mois = addslashes($_POST['mois']);
        $anne = addslashes($_POST['annee']);
        $duree = addslashes($_POST['duree']);

        // on extrait l'id de l'organisme a partir de son email
        $requete_idOrg = mysqli_query($connexion, 
            'SELECT org_id 
                FROM organisme 
                WHERE org_email = \''.$email_organisme.'\'');
        $idOrg = mysqli_fetch_array($requete_idOrg);


        // on extrait l'id du contact de cet organisme a partir de l'id de l'org
        $requete_idCont = mysqli_query($connexion, 
            'SELECT ctc_id
                FROM contact
                INNER JOIN organisme
                    ON ctc_idorganisme = org_id
                WHERE org_id = \''.$idOrg[0].'\'');
        $idCont = mysqli_fetch_array($requete_idCont);


        // on extrait l'id du dommaine a partir de son nom
        $requete_idDom = mysqli_query($connexion,
            'SELECT dom_id
                FROM domaine
                WHERE dom_libelle = \''.$domaine.'\'');
        $idDom = mysqli_fetch_array($requete_idDom);


        // on remplis la table recherche avec les donnés récupérés
        mysqli_query($connexion,
                'INSERT INTO recherche(rec_date, rec_heure, rec_codepostal, rec_ville, rec_description, rec_active, rec_datelimiteintervention, rec_nombrejoursintervention, rec_idorganisme, rec_idctcorigine)
                VALUES (CURDATE(), CURTIME(), \''.$codepostal.'\', \''.$ville.'\', \''.$description.'\', \''.'1'.'\', \''.$anne.'-'.$mois.'-'.$jour.'\', \''.$duree.'\', \''.$idOrg[0].'\', \''.$idCont[0].'\')');

        
        // on extrait l'id de la table crée a l'instant
        $requete_idRecherche = mysqli_query($connexion,
            'SELECT rec_id
                FROM recherche
                WHERE rec_description = \''.$description.'\' AND rec_idorganisme = \''.$idOrg[0].'\'');
        $idRecherche = mysqli_fetch_array($requete_idRecherche);


        // on remplis la table concerne avec ces infos
        mysqli_query($connexion,
            'INSERT INTO concerne(conc_iddomaine, conc_idrecherche)
                 VALUES (\''.$idDom[0].'\', \''.$idRecherche[0].'\')');

        mysqli_free_result($requete_idOrg);
        mysqli_free_result($requete_idCont);
        mysqli_free_result($requete_idDom);
        mysqli_free_result($requete_idRecherche);

        header('Location: recherche_org.php?domaine='.$_POST['domaine']);
    }
    else // sinon, si l'annonce n'est pas envoyée
    {
        // on extrait l'id de l'organisme a partir de son email
        $requete_nomOrg = mysqli_query($connexion, 
            'SELECT org_nom
                FROM organisme 
                WHERE org_email = \''.$_SESSION['email'].'\'');
        $nomOrg = mysqli_fetch_array($requete_nomOrg);
    }
}
else // sinon, si l'utilisateur n'est pas connecté
{
    header('Location: ../'); // envoie l'utilisateur sur la page de connection
}

?>