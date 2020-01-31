<?php


if  (!isset($_REQUEST['Gestion'])) {
    $_REQUEST['Gestion'] = 1;
}
switch ($_REQUEST['Gestion']) {

    case 1;
        require_once 'entete.php';
        require_once 'Vue/VueAffichageAnnonce.php';
        break;

    case 2;
        require_once 'Vue\Vue2.php';
        Break;

     case 3;
         require_once 'entete.php';
         $NumAnnonce = $_REQUEST['NumAnnonce'] ;
        require_once 'Vue\Vue_AnnoncePublier.php';
        break;
    
    case 4;
        require_once '/Vue/VueInscription.php';
        break;
     case 5;
        require_once 'Vue\VueBtnConnection.php';
        break;
 

}
?>

