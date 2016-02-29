<?php
include_once('../general/bdd_connect.php');

/*

        E N R E G I S T R E M E N T   O R G A N I S M E

*/


// Envoie des donnés a la base a l'appuis sur "valider"
if (isset($_POST['insc_org']))
{
    // Importation des valeurs entrés dans le formulaire
    $nom_org = $_POST['nom_org'];
    $email_org = $_POST['email_org'];
    $tel_org = $_POST['tel_org'];
    $codepost_org = $_POST['codepost_org'];
    $ville_org = $_POST['ville_org'];

    $nom_cont = $_POST['nom_cont'];
    $prenom_cont = $_POST['prenom_cont'];
    $email_cont = $_POST['email_cont'];
    $tel_cont = $_POST['tel_cont'];

    // verifie que les champs nécessaires ne soit pas vides
    if (($nom_org == '') or ($email_org == '') or ($tel_org == '') or ($codepost_org == '') or ($ville_org == '') or ($nom_cont == '') or ($prenom_cont == '') or ($email_cont == '') or ($tel_cont == ''))
    {
        print('faux');
    }
    else
    {
        // requete pour envoyer les donnée de l'organisation a la bdd
        $requete_org = 'INSERT INTO organisme(org_nom, org_email, org_telephone, org_codepostal, org_ville) VALUES (\''.$nom_org.'\', \''.$email_org.'\',\''.$tel_org.'\', \''.$codepost_org.'\', \''.$ville_org.'\')';
        mysqli_query($connexion,$requete_org);

        // requete pour extraire l'id de l'organisation crée
        $requete_idorg = mysqli_query($connexion, 'SELECT org_id FROM organisme WHERE org_nom = \''.$nom_org.'\'');
        $id_org = mysqli_fetch_array($requete_idorg);
        $id = $id_org[0];

        // requete pour importer les donnés de la table contacte
        $requete_cont = 'INSERT INTO contact(ctc_nom, ctc_prenom, ctc_email, ctc_telephone, ctc_idorganisme) VALUES (\''.$nom_cont.'\', \''.$prenom_cont.'\', \''.$email_cont.'\', \''.$tel_cont.'\', \''.$id.'\')';
        mysqli_query($connexion,$requete_cont);
        
        mysqli_free_result($requete_idorg); // vide les variables de leurs résultats
        
        
        session_start(); // débute une session avec les infos de connexion du client
        $_SESSION['email'] = $email_org; // stock l'email de l'organisme dans le tableau session
        
        header('Location: ../recherche/'); // renvoie vers la page pour les annonces
    }
}



/*

        E N R E G I S T R E M E N T   I N T E R V E N A N T

*/


// Envoie des donnés a la base a l'appuis sur "valider"
if (isset($_POST['insc_int']))
{
    // Importe des valeurs entrés dans le formulaire
    $nom_int = $_POST['nom_int'];
    $prenom_int = $_POST['prenom_int'];
    $email_int = $_POST['email_int'];
    $tel_int = $_POST['tel_int'];
    $fax_int = $_POST['fax_int'];
    $abonnement_int = $_POST['cotisation_int'];
    $domaine_int = $_POST['domaine_int'];
    $niveau_int = $_POST['niveau'];

    // verifie que les champs nécessaires ne soit pas vides
    if (($nom_int == '') or ($prenom_int == '') or ($email_int == '') or ($tel_int == '') or ($fax_int == '') or ($domaine_int == '') or ($niveau_int == ''))
    {
        print('faux');
    }
    else
    {
        // envoye les donnée de l'intervenant a la bdd
        $requete_int = 
            'INSERT INTO intervenant(int_nom, int_prenom, int_email, int_telephone, int_fax, int_statutcotisation) 
            VALUES (\''.$nom_int.'\', \''.$prenom_int.'\', \''.$email_int.'\',\''.$tel_int.'\', \''.$fax_int.'\', \''.$abonnement_int.'\')';
        mysqli_query($connexion, $requete_int);


        // extrait l'id de la table intervenant
        $query_int = mysqli_query($connexion, 'SELECT int_id FROM intervenant WHERE int_nom=\''.$nom_int.'\' and int_prenom=\''.$prenom_int.'\'');
        $id_int = mysqli_fetch_array($query_int);
        $id_int_comp = $id_int[0];

        // extrait l'id de la table niveau
        $query_niv = mysqli_query($connexion, 'SELECT niv_id FROM niveau WHERE niv_libelle=\''.$niveau_int.'\'');
        $id_niv = mysqli_fetch_array($query_niv);
        $id_niv_comp = $id_niv[0];

        // extrait l'id de la table domaine
        $query_dom = mysqli_query($connexion, 'SELECT dom_id FROM domaine WHERE dom_libelle=\''.$domaine_int.'\'');
        $id_dom = mysqli_fetch_array($query_dom);
        $id_dom_comp = $id_dom[0];


        // importe les id dans la table estcompetant
        mysqli_query($connexion, 'INSERT INTO estcompetent(comp_idintervenant, comp_idniveau, comp_iddomaine) VALUES (\''.$id_int_comp.'\', \''.$id_niv_comp.'\', \''.$id_dom_comp.'\')');
        
        // vide toute les variables de leurs résultats
        mysqli_free_result($query_int);
        mysqli_free_result($query_niv);
        mysqli_free_result($query_dom);
        

        session_start(); // débute une session avec les infos de connexion du client
        $_SESSION['email'] = $email_int; // stock l'email de l'intervenant dans le tableau session
        
        header('Location: ../recherche/'); // renvoie vers la page avec les annonces
    }
}
?>
