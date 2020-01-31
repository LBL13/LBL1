<?php

require_once    'C:\xampp\htdocs\lbl1\Modele\Modele1.php';




$Info=Annonce($NumAnnonce);
$Info->setFetchMode(PDO::FETCH_ASSOC);
$ligne=$Info->fetch();


?>

<h2><?php echo $ligne['NOM'] ; echo ' ' ; echo $ligne['PRIX_JOUR'];
echo '€/J';?></h2>




<?php


$file = 1;


echo '<br>';
echo 'Prix Initiale :';
echo $ligne['PRIX_D_ACHAT'];
echo '€';
echo '<br>';
echo $ligne['DESCRIPTION'];
echo '<br>';

echo '<br>';
echo $ligne['PRIX_JOUR'];
echo '€/jour';
echo '<br>';
echo $ligne['VILLE'];



?>
