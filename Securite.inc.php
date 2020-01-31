<?php 
require_once 'Modele\Modele1.php';
 session_start();
 
function  fermeSessionUtilisateur(){
 session_destroy();
 unset($_SESSION['EMAIL']);
}

function estSessionUtilisateurOuverte($o) 
{   
    if (isset($o))
    {
    return $SessionActive = true ;
    }
}

function ouvreSessionUtilisateur($id)
        {
          
            $_SESSION['EMAIL'] = $id ; 
            
        
        }
            
            
      
   
        
        
        
function existeCompteVisiteur($id) {
    $connexion = SGBDConnect();
    $sql = $connexion->query('SELECT MOTDEPASSE FROM UTILISATEUR WHERE EMAIL = "'.$id.'"');
    return $sql->rowCount(); 
}

function valideInfosCompteUtilisateur($existeCompte,$id,$mdpEmpreinte)
{

 if ($existeCompte==1)
     {   
    $connexion = SGBDConnect();  

    $sql = $connexion->query('SELECT * FROM UTILISATEUR WHERE EMAIL = \''.$id.'\' and MOTDEPASSE = \''.$mdpEmpreinte.'\'');

    return($sql->rowCount()==1);

}
}

//     {
//     $verification = true ;
//     } else {
//      $verification = false ;
//     }
//     return $verification;