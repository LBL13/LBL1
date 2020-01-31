<?php
require_once  'Modele/Modele1.php';

$AffAnnonce = AffAnnonce();

$AffAnnonce->setFetchMode(PDO::FETCH_NUM);
$ligne = $AffAnnonce->fetch();

    while ($ligne == true) {
        echo '<br>';
        
?>
     
       <div id="annonce" onclick="location.href='index.php?Gestion=3&NumAnnonce=<?php echo $ligne[0];?>';" style="cursor: pointer;">
           <?php


        print $ligne[0];   
        echo '<br>';
       echo $ligne[2] ;
       
       echo '<br>';
        echo $ligne[3] . '€' ;
        echo '<br>';
       
        
       echo'</div>';
       echo '<br>';
       $ligne = $AffAnnonce->fetch();
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

