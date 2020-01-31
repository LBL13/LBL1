<?php

include  ' Modele/Modele1.php';


if (!isset($_REQUEST['inscription'])) {
    $_REQUEST['inscription'] = 1;
}
switch ($_REQUEST['inscription']) {
    case 1;
        echo '<form id="frmIdentification" method="post" action="VueInscription.php?inscription=2">';
        if (isset($Erreur)) {
            echo $Erreur;
        }
        echo '<br>';
        echo '<legend>Inscrivez-vous</legend>' . "\n";
        echo '<br>';
        echo formInputText('Adresse Email : ', 'txtMail', 'txtMail', '', 10, true, 30, 30);
        echo '<br>';
        echo formInputText('Nom : ', 'txtNom', 'txtNom', '', 20, true, 30, 30);
        echo '<br>';
        echo formInputText('Prenom : ', 'txtPrenom', 'txtPrenom', '', 30, true, 30, 30);
        echo '<br>';
        echo formInputText('Date de Naissance : ', 'txtDN', 'txtDN', '', 40, true, 30, 30);
        echo '<br>';
        echo formNumTel('Numero de telephone : ', 'txtTel', 'txtTel', '', 45);
        echo '<br>';
        echo '<br>';
        echo formInputText('Ville : ', 'txtVille', 'txtVille', '', 50, true, 30, 30);
        echo '<br>';
        echo formInputText('Code Postal : ', 'txtCP', 'txtCP', '', 60, true, 30, 30);
        echo '<br>';
        echo formInputPassword('Mot de passe : ', 'Password1', 'Password1', '', 70, true, 30, 30);
        echo '<br>';
        echo formInputPassword('Confirmer le mot de passe : ', 'Password2', 'Password2', '', 80, true, 30, 30);
        echo '<br>';
        echo formBoutonSubmit("btnIdentif", "btnIdentif", "Valider", 90);
        echo '<br>';
        echo '</form>';
        break;

    case 2;

        $mail = $_REQUEST['txtMail'];
        if (preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $mail)) {
            $verifMail = true;
        }

        echo $verifNom = verif_alpha($_REQUEST['txtNom']);
        echo $verifPrenom = verif_alpha($_REQUEST['txtPrenom']);
        echo $verifVille = verif_alpha($_REQUEST['txtVille']);
        $cp = $_REQUEST['txtCP'];
        if (preg_match(' /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/ ', $cp)) {
            $cpBon = true;
        }
        if ($_REQUEST['Password1'] == $_REQUEST['Password2']) {
            $mdpCorrespond = true;
        }

        if (AdresseMail($mail) == 0) {
            if (($mdpCorrespond == true) && ($cpBon == true) && ($verifNom == true) && ($verifPrenom == true) && ($verifVille == true) && ($verifMail == true)) {
                //echo NouvelUtilisateurVendeur(NumNouvelUtilisteur(),$_REQUEST['txtNom'],$_REQUEST['txtPrenom'],$_REQUEST['txtDN'],$_REQUEST['txtVille'],$_REQUEST['txtCP'],$_REQUEST['txtTel'],$_REQUEST['txtMail'],CryptageMdp($_REQUEST['Password1']));
                header('Location:/LBL/Vue/VueInscription.php?inscription=10');
            } else if ($mdpCorrespond != true) {
                
                 $Erreur = 'Mot de passe non correspondant.';
                 header('Location:/LBL/Vue/VueInscription.php?inscription=1');
               
            } else {
                      $Erreur = 'Erreur Constaté.';
                header('Location:/LBL/Vue/VueInscription.php?inscription=1');
          
            }
        } else {
                  $Erreur = 'adresse mail déja utilisé.';
            header('Location:/LBL/Vue/VueInscription.php?inscription=3');
      
        }


        break;
    case 10;

        echo 'blabla';
        break;
}