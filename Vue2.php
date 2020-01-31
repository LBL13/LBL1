<?php

require_once   'Modele\Modele1.php';

echo '<form id="form" method="post" action="Verification_Form.php">';

echo 'cree une nouvelle annonce.';
echo '<br>';
echo formInputText('Nom d\'annonce :', 'frmNomAnnonce', 'frmNomAnnonce', '', 10, true, 32, 10);
echo '<br>';
echo formInputText('Description :', 'frmDescription', 'frmDescription', '', 20, true, 500, 50);
echo '<br>';
echo formInputText('Ville :', 'frmVille', 'frmVille', '', 30, true, 30, 10);
echo '<br>';
echo formInputText('Code Postal :', 'frmCP', 'frmCP', '', 40, true, 5, 10);
echo '<br>';
echo formInputText('Prix d\'achat :', 'frmPrixAchat', 'frmPrixAchat', '', 50, true, 4, 10);
echo '<br>';
echo formInputText('Prix de location par jour :', 'frmPrixLoc', 'frmPrixLoc', '', 60, true, 3, 10);
echo '<br>';
echo BoutonRadio('BRetat',1,1,'Mauvaise Etat',true);
echo BoutonRadio('BRetat',2,2,'Moyen',true);
echo BoutonRadio('BRetat',3,3,'Correct',true);
echo BoutonRadio('BRetat',4,4,'Bon Etat',true);
echo BoutonRadio('BRetat',5,5,'Neuf',true);
echo '<br>'; 

echo '<br>';

echo formImageDepuisRecordset('choisir', 'image', 'image', getImage());

echo formCategoriesDepuisRecordset('Choisissez une Categorie:' , 'lstCat', 10, getCategorie());
echo '<br>';
echo '<br>';
?>
<label for="file">Sélectionner le fichier à poster</label>
   <input type="file" id="file" name="file" multiple>
   

<!--<label>Veuillez choisir un ou plusieurs animaux :
  <select name="pets" multiple size="4">
    <optgroup label="Animaux à 4-jambes">
      <option value="Chien">Chien</option>
      <option value="chat">Chat</option>
      <option value="hamster" disabled>Hamster</option>
    </optgroup>
    <optgroup label="Animaux volants">
      <option value="perroquet">Perroquet</option>
      <option value="macaw">Macaw</option>
      <option value="albatros">Albatros</option>
    </optgroup>
  </select>
</label>-->
    
<?php
echo '<br>';
echo '<br>';
echo  formBoutonSubmit('BtnFormDUA', 'BtnFormDUA','Envoyer', 70);



echo '</form>';


?>

