<?php

require_once("entity/cours.php");
require_once("entity/user.php");
require_once("entity/chapitre.php");
// Ouvrir une session
session_start();
if(isset($_POST['save'])){
    if(empty($_POST['nom']) || empty($_POST['clef']) || empty($_FILES['image']) || empty($_POST['description']) || empty($_POST['titre']) || empty($_FILES['file'])  ){
       
       
       var_dump($_POST['titre']);
       echo "  /////  ";
       var_dump($_FILES['file']);
       echo "  /////  ";
       var_dump($_FILES['image']);
        echo" veuillez remplir touts les champs !";
        //header("location:ajouter_cours.php?retour=$message");
    }
    else{
        if( ($_FILES['image']['type'] == "image/jpeg") || ($_FILES['image']['type'] == "image/jpg") || ($_FILES['image']['type'] == "image/png")  ){
           
                
                $v_user_id= $_SESSION['code'];
                $nom_cours = $_POST['nom'];
                $v_clef = $_POST['clef'];
                $v_description = $_POST['description'];
                //
                $image=$_FILES['image']['name'];
                //

                
                //definir nom temporaire
                
                $temp_image=$_FILES['image']['tmp_name'];
                //deplacer le fichier dans un dossier
                //$deplacer_file=move_uploaded_file($temp_image,'C:\xampp\htdocs\Edutim\images\\'.$image);
                

                $cours = new Cours();
                    
                    $cours->setNom($nom_cours);
                    $cours->setClef($v_clef);
                    $cours->setImage($image);
                    $cours->setProprietaire($v_user_id);
                    $cours->setDescription($v_description);
                   $stmt = $cours->ajouter();

                   $id_courss=$cours->editByNom($v_user_id,$nom_cours,$v_description,$v_clef);
                //recuperer le nom du ficher
                $file_count = count($_FILES['file']['name']);
                for ($i=0; $i<$file_count; $i++) {
                    $nom_file=$_FILES['file']['name'][$i];
                    $temp_nom=$_FILES['file']['tmp_name'][$i];
                   $deplacer_file=move_uploaded_file($temp_nom,'C:\xampp\htdocs\Edutim\files_db\\'.$nom_file);
                    $titre=$_POST['titre'][$i];
                    echo $nom_file;
                    echo $titre;
                    echo "//id cour:".$id_courss['id'];

                    $chapitre = new Chapitre();
                    
                    $chapitre->setTitre($titre);
                    $chapitre->setFichier($nom_file);
                    $chapitre->SetCoursId($id_courss['id']);
                    $stmt1= $chapitre->ajouter();

                    
         
                }

                if ($stmt>0 && $stmt1>0){ // Les codes sont corrects

                    
                    // Redirection vers le tableau de bord "home.php"
                    header("location:enseginant.php");
                    }
                    else{ // Les codes sont faux
                        
                    }

                
                
                
             
            
            
               
            
        }
        else{
           
           echo" il faut ajouter un image  !";
           // header("location:ajouter_cours.php?retour=$message");
            
           // echo $v_cours." ".$v_clef." ".$v_image." ".$v_desc." ".$v_cours." ";
        }
       
        
       // echo $v_cours." ".$v_clef." ".$v_image." ".$v_desc." ".$v_cours." ";
    }
    
      
}

// if(isset($_POST['save'])){

//     $vnom=$_POST['test'];
//     var_dump( $vnom);

// }
?>