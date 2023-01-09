<?php
require_once("entity/cours.php");
require_once("entity/user.php");
require_once("entity/chapitre.php");


// Ouvrir une session
session_start();
// Vérifier que l'utilisateur connecté a saisi ses codes correctement
if( !isset($_SESSION['code']) ) // Accès non authentifié !
{

    // Afficher un message d'erreur
    echo "Veuillez vous connecter !";
    // Arrêter l'exécution de ce script
    header("location:index.php");
}

    
//cours 
    if(isset($_POST['save'])){
       
        $v_cours_id = $_POST['id_cours'];
           
            
            $cours = new Cours();
            $stmt=$cours->supprimer($v_cours_id);
            echo $stmt;
           header("location:enseginant.php");
           // echo $v_cours." ".$v_clef." ".$v_image." ".$v_desc." ".$v_cours." ";
        
          
    }

?>
