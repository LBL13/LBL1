<?php

require_once 'Vue\Vue2.php';
require_once 'Modele\Modele1.php';

echo  $_REQUEST['lstCat'];
if ((is_numeric($_REQUEST['frmCP']) == true) && (is_numeric($_REQUEST['frmPrixAchat']) == true) && (is_numeric($_REQUEST['frmPrixLoc']) == true)) {
   // echo NouvelleAnnonce(5,$_REQUEST['frmNomAnnonce'],$_REQUEST['frmDescription'],$_REQUEST['frmVille'],$_REQUEST['frmCP'],$_REQUEST['frmPrixAchat'],$_REQUEST['frmPrixLoc']);
   // echo NouvelleEtat(5,$_REQUEST['BRetat']);
    echo 'L\'annonce est publiee.';
   echo BoutonChangementPage("BtnVoirAnnonce", "index.php?action=1&Gestion=3", "VOIR l\'ANNONCE");

} else {
    header('Location: index.php?action=1&Gestion=2');
}
echo '<br>';





