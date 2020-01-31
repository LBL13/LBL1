<?php
 
require_once  'Include/Bilbiotheque01.inc.php';
require_once 'Include/Securite.inc.php';
 require_once 'Include/entete2.inc.php'; 

 if (isset($_SESSION['UtilId'])) {
    echo fermeSessionUtilisateur();
}
   

if(!isset($_REQUEST['session']))
    {
    $_REQUEST['session'] = 1; 


    
    }

    
switch ($_REQUEST['session']){
  
    case 1;
 
        echo '<form id="frmIdentification" method="post" action="Index.php?action=1&session=5">' ;
        echo '<fieldset>'
        . '<legend>Identifiez-vous</legend>'."\n";
        echo formInputText('Nom d\'utilisateur : ', 'txtNom', 'txtNom','', 40, 30, 10,false);
        echo '<br>';
        echo formInputPassword('Mot de passe : ', 'Password', 'Password', '', 40, 30, 10,false);
        echo '<br>';
        echo '<br>';
        echo formBoutonSubmit("btnIdentif", "btnIdentif", "Valider", 25);
        echo '<br>';
        echo '</fieldset>';  
        echo '</form>';
        echo '</body>';
        break;

    case 5; //demande validation des infos
                        
        $mdp =$_REQUEST['Password'];
        $mdpEmpreinte = md5($mdp);
        $id = $_REQUEST['txtNom'];
        
        $compteValide = valideInfosCompteUtilisateur(existeCompteVisiteur($id),$id,$mdpEmpreinte);
       
        if ($compteValide==1)
        {ouvreSessionUtilisateur($id);
         
        header("location: index.php?action=5"); 
      
        } else {
        
        require_once 'Include/entete2.inc.php';
        echo '<form id="frmIdentification" method="post" action="Index.php?action=1&session=5">' ;
        echo '<fieldset>'
        . '<legend>Identifiez-vous</legend>'."\n";
        ?> 
        <p class = "erreur"> Nom d'utilisateur ou mot de passe incorrect.</p><?php
        echo formInputText('Nom d\'utilisateur : ', 'txtNom', 'txtNom',$_REQUEST['txtNom'], 40, 30, 10,'required');
        echo formInputPassword('Mot de passe : ', 'Password', 'Password', '', 40, 30, 10,'required');
        echo '<br/>';
        echo formBoutonSubmit("btnIdentif", "btnIdentif", "Connexion", 25);  
        echo '</fieldset>';  
        ?>
        <?php  
        echo '</form>';
        
 
        }
        
        
         
        break;
    
    case 20; 
        
       

        break;
}
?>

