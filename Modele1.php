 <?php

function SGBDConnect() {
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "No connection: " . $e->getMessage();
        exit;
    }
    return $connexion;
}

function NouvelleAnnonce($NumAnnonce, $nom, $description, $ville, $codePostale, $prixAchat, $prixLoc) {
    $connexion = SGBDConnect();
    $sql = 'INSERT INTO `ANNONCE` (NUMUTILISATEUR,NOM,NUMANNONCE,NUMSOUSCATEGORIE,VILLE,CATEGORIE,CODEPOSTAL,DESCRIPTION,PRIX_D_ACHAT,PRIX_JOUR) VALUES'
            . '("3","' . $nom . '","' . $NumAnnonce . '","1","' . $ville . '","1","' . $codePostale . '","' . $description . '","' . $prixAchat . '","' . $prixLoc . '");';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;
}

function NumNouvelUtilisteur() {
    $connexion = SGBDConnect();
    $sql = 'SELECT MAX(NUMUTILISATEUR) FROM `utilisateur`';
    $resultat = $connexion->query($sql);
    $ligne=$resultat->fetch();
    return $ligne['MAX(NUMUTILISATEUR)']+1;
    
}

function CryptageMdp($mdp)
{
 $mdpCrypter = md5($mdp);
 return $mdpCrypter;
}

function NouvelUtilisateurVendeur($Num,$Nom,$Prenom,$DateNaiss,$Ville,$CP,$tel,$email,$mdp) {
    $connexion = SGBDConnect();
    $sql = 'INSERT INTO utilisateur(NUMUTILISATEUR,NOM,PRENOM,DATENAISSANCE,VILLE,CODEPOSTAL,TELEPHONE,EMAIL,MOTDEPASSE) VALUES '
          .'("'.$Num.'","'.$Nom.'","'.$Prenom.'","'.$DateNaiss.'","'.$Ville.'","'.$CP.'","'.$tel.'","'.$email.'","'.$mdp.'"); '
          .'INSERT INTO VENDEUR(NUMUTILISATEUR,NOM,PRENOM,DATENAISSANCE,VILLE,CODEPOSTAL,TELEPHONE,EMAIL,MOTDEPASSE,NOMBREANNONCE,NOMBREOBJETLOUE) VALUES '
          .'("'.$Num.'","'.$Nom.'","'.$Prenom.'","'.$DateNaiss.'","'.$Ville.'","'.$CP.'","'.$tel.'","'.$email.'","'.$mdp.'","0","0"); ';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;



    return;
}

function NouvelleEtat($NumAnnonce, $NumEtat) 
{
    $connexion = SGBDConnect();
    $sql = 'INSERT INTO `ETAT` (NUMETAT,NUMANNONCE,NUMUTILISATEUR,EtatDATE) VALUES'
            . '("' . $NumEtat . '","' . $NumAnnonce . '","3","17-01-2020");';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;
}
    

function AdresseMail($mail) {
    $connexion = SGBDConnect();
    $sql = 'SELECT EMAIL FROM utilisateur WHERE EMAIL = "'.$mail.'" ';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;
}

function NumNouvelleAnnonce() {
    $connexion = SGBDConnect();
    $sql = 'SELECT MAX(NUMANNONCE)'
            . 'FROM ANNONCE ';
    $resultat = $connexion->query($sql);
    $resultat++;
    return $resultat;
}



function formBoutonSubmit($name, $id, $value, $tabindex) {
    $codeHtml = '<input type="submit" name="' . $name . '" id="' . $id
            . '" value="' . $value . '" tabindex="' . $tabindex . '">' . "\n";
    return $codeHtml;
}

function formNumTel($label, $name, $id, $value, $tabindex) {

    $codehtml = '<label for="' . $name . '">' . $label . '</label><input type="tel" name="' . $name . '" id="' . $id . '" value="' . $value . '" tabindex="' . $tabindex . '"pattern="^\+?\s*(\d+\s?){8,}$" required="required" />';
    return $codehtml;
}

function formInputPassword($label, $name, $id, $value, $tabindex, $required, $max, $size) {

    $codeHTML = '<label for="' . $name . '">' . $label . '</label>' . "\n"
            . '<input type="password" value="' . $value . '" size="' . $size . '" maxlength="'
            . $max . '" name="' . $name . '" id="' . $id . '" tabindex="' . $tabindex . '" required="' . $required . '"><br>';
    return $codeHTML;
}

function BoutonChangementPage($name, $action, $value) {
    $codeHtml = '<form name="' . $name . '" action="' . $action . '" method="post">'
            . '<input type="submit" value="' . $value . '"></form>';
    return $codeHtml;
}

function formInputText($label, $name, $id, $value, $tabindex, $required, $max, $size) {

    $codeHTML = '<label for="' . $name . '">' . $label . '</label>' . "\n"
            . '<input type="text" value="' . $value . '" size="' . $size . '" maxlength="'
            . $max . '" name="' . $name . '" id="' . $id . '" tabindex="' . $tabindex . '" required="' . $required . '"><br>';
    return $codeHTML;
}

function BoutonRadio($name, $id, $value, $label, $required) {
    $codeHtml = '<input type= "radio" name="' . $name . '" id="' . $id . '" value="' . $value . '"  required="' . $required . '">' . $label;
    return $codeHtml;
}

function formInputText1($label, $name, $id, $value, $size, $max, $tabindex, $required) {

    $codeHTML = '<label for="' . $name . '">' . $label . '</label>' . "\n"
            . '<input type="text" value="' . $value . '" size="' . $size . '" maxlength="'
            . $max . '" name="' . $name . '" id="' . $id . '" tabindex="' . $tabindex . '" required="' . $required . '"><br>';
    return $codeHTML;
}


function formInputHidden($name, $id, $hiddenvalue) {

    $codeHtml = '<input id="' . $name . '" name="' . $id . '" type="hidden" value="' . $hiddenvalue . '">';
    return $codeHtml;
}

function verif_alpha($str) {
    preg_match("/([^A-Za-z\s])/", $str, $result);

    if (!empty($result)) {
        return false;
    }
    return true;
}

function Annonce($NumAnnonce) {
    $connexion = SGBDConnect();
    $sql = "SELECT * FROM `annonce` WHERE NumAnnonce = $NumAnnonce";
    $resultat = $connexion->query($sql);
    return $resultat;
}

function getCategorie() {
    $connexion = SGBDConnect();
    $sql = "SELECT  `NOMCATEGORIE`, s.NUMCATEGORIE, `NOMSOUSCATEGORIE`, `NUMSC`,`NUMSOUSCATEGORIE` FROM souscategorie s inner join categorie c on s.NUMCATEGORIE = c.NUMCATEGORIE ORDER BY `NUMSOUSCATEGORIE` ";
    $resultat = $connexion->query($sql);
    return $resultat;
}

function AffAnnonce() {
    $connexion = SGBDConnect();
    $sql = "SELECT NUMANNONCE, NUMUTILISATEUR, NOM, PRIX_D_ACHAT FROM annonce";
    $resultat = $connexion->query($sql);
    return $resultat;
}
 

function formSelectDepuisRecordset($label, $nom, $id, $recordset) {

    $codeHTML = '<label for="' . $id . '" >' . $label . '</label>'
            . '<select name="' . $nom . '" id="' . $id . '">';
    $recordset->setFetchMode(PDO::FETCH_NUM);
    $ligne = $recordset->fetch();

    while ($ligne == true) {
        $codeHTML .= '<option value="' . $ligne[0] . '">' . $ligne[1] . ' </option>';
        $ligne = $recordset->fetch();
    }
    $codeHTML .= '</select>';

    $recordset->setFetchMode(PDO::FETCH_NUM);
    $ligne = $recordset->fetch();

    while   ($ligne == true) {
//     for ($ligne[1] = 1 ; $ligne[1] < 2 ; $ligne[1] ++ ){


        $CodeHTML .= '<optgroup label="' . $ligne[0] . '">';
        $CodeHTML .= '<option value="' . $ligne[3] . '">' . $ligne[2] . '</option>';
        $CodeHTML .= '</optgroup>';
    }
    $CodeHTML .= '</select>';
    $CodeHTML .= '</label>';
    return $CodeHTML;
}


function Image($file){
    $connexion = SGBDConnect();
    $sql = "INSERT INTO images (id, nom_fichier) VALUES (4," . $file . ")";
    $resultat = $connexion->query($sql);
    return $resultat;
    
}

function formImageDepuisRecordset ($type, $id, $name, $recordset){
    
    $CodeHTML = '<input>' .$type;
    $CodeHTML .= 'input id = "' . $id . '"name = "' . $name . '">';
    $recordset->setFetchMode(PDO::FETCH_NUM);
    $ligne = $recordset->fetch();

    while ($ligne == true) {
        $CodeHTML .= '<option value="' . $ligne[0] . '">' . $ligne[1] . ' </option>';
        $ligne = $recordset->fetch();
    }
}


//<input type="file" id="file" name="file" multiple>
function formCategoriesDepuisRecordset($label, $name, $size, $recordset) {

    $CodeHTML = '<label>' . $label;
    $CodeHTML .= '<select name = "' . $name . '" multiple size="' . $size . '">';
    $recordset->setFetchMode(PDO::FETCH_NUM);
    $ligne = $recordset->fetch();


    while ($ligne == true) {
        if (isset($numcategorie)) {
            $numcategorie1 = $numcategorie;
        } else {
            $numcategorie1 = 0;
        }
        $numcategorie = $ligne[1];
        if (($numcategorie1 != $numcategorie) && ($numcategorie1 != 0)) {

            $CodeHTML .= '</optgroup>';
        }
        if ($numcategorie1 != $numcategorie) {

            $CodeHTML .= '<optgroup label="' . $ligne[0] . '">';
            $CodeHTML .= '<option value="' . $ligne[4] . '">' . $ligne[2] . '</option>';
        } else {
            $CodeHTML .= '<option value="' . $ligne[4] . '">' . $ligne[2] . '</option>';
        }
        $ligne = $recordset->fetch();
    } $CodeHTML .= '</select>';
    $CodeHTML .= '</label>';
    return $CodeHTML;
}

//    while ($ligne == true) {
//    $codeHTML.= '<label="'.$ligne[0].'">'.$ligne[1].'</label>';
//    
//    
//    $ligne = $recordset->fetch();
//    }
//    $codeHTML .= '</select>';
//


?>
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