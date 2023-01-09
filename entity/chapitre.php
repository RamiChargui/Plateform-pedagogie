<?php
require_once( $_SERVER["DOCUMENT_ROOT"]."/Edutim/connexion.php");  
class Chapitre extends cnn {
        private $id;
        private $titre;
        private $cours_id;
        private $fichier;
        

        public function getId(){
            return $this->id;

        }

        public function getTitre(){
            return $this->titre;
            
        }
        public function setTitre($t){
            $this->titre=$t;
            
           
       }

        public function getCoursId (){
            return $this->cours_id ;
            
        }
        public function SetCoursId($p){
            $this->cours_id =$p;
            
        }

        public function getFichier(){
            return $this->fichier;
            
        }
        public function setFichier($ch){
            $this->fichier=$ch;
            
       }

       
       

        public function ajouter(){
            if(!isset($this->titre) || !isset($this->cours_id) || !isset($this->fichier))
                return false;
            $q = "INSERT INTO chapitre (titre, cours_id, fichier)
            VALUES
            ('$this->titre', '$this->cours_id','$this->fichier')";
           
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }
        public function editAll($id_cours){
            $res=$this->connexion()->query("SELECT * from chapitre WHERE cours_id = $id_cours");
            //Extraire (fech) toutes les lignes 
            $les_chapitre= $res->fetchAll();
            return $les_chapitre;

        }
        
        public function supprimer($id){
            $q="DELETE FROM chapitre WHERE id = $id";
            $stmt= $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec de suppression'.$this->connexion()->errorInfo());
            else 
            return $stmt;
        }
        public function editBy($id){
            $res = $this->connexion()->query("SELECT * from chapitre where id=$id");
            $le_chapitre=$res->fetch();
            return $le_chapitre;
        }
       
        
       
        
      
       
        
    }
?>