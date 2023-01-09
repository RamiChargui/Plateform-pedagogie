<?php
    require_once( $_SERVER["DOCUMENT_ROOT"]."/Edutim/connexion.php"); 
   class Cours extends cnn {
        private $id;
        private $nom;
        private $proprietaire;
        private $image;
        private $categorie;
        private $description;
        private $clef;
        

        public function getId(){
            return $this->id;

        }

        public function getNom(){
            return $this->nom;
            
        }
        public function setNom($t){
            $this->nom=$t;
           
       }

       public function getCategorie(){
        return $this->categorie;
        
    }
    public function setCategorie($t){
        $this->categorie=$t;
       
   }

       public function getClef(){
        return $this->clef;
        
        }
        public function setClef($t){
            $this->clef=$t;    
        }

        public function getProprietaire (){
            return $this->proprietaire ;
            
        }
        public function setProprietaire($p){
            $this->proprietaire =$p;
            
        }

        public function getDescrition(){
            return $this->description;
            
        }
        public function setDescription($t){
            $this->description=$t;
           
       }

        public function getImage(){
            return $this->image;
            
        }
        public function setImage($ch){
            $this->image=$ch;
            
       }

     
       
       

        public function ajouter(){
            if(!isset($this->nom) || !isset($this->image) ||  !isset($this->clef) || !isset($this->proprietaire) )
                return false;
            $q = "INSERT INTO cours (nom, proprietaire, image,  description,clef)
            VALUES
            ('$this->nom', '$this->proprietaire','$this->image','$this->description','$this->clef')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }
        public function editAll($id_ens){
            $res=$this->connexion()->query("SELECT id,nom, proprietaire, image,  description,clef from cours WHERE proprietaire = $id_ens");
           
            $les_cours= $res->fetchAll();
            return $les_cours;

        }

        public function editBy($id){
            $res = $this->connexion()->query("SELECT * from cours where id=$id");
            $le_cours=$res->fetch();
            return $le_cours;
        }
        
        public function supprimer($id){
            $q="UPDATE cours SET proprietaire= null WHERE id=$id";
            $stmt= $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec de suppression'.$this->connexion()->errorInfo());
            else 
            return $stmt;
        }


        public function editByNom($id_p,$nom,$desc,$clef){
            $res = $this->connexion()->query("SELECT * from cours where proprietaire=$id_p and nom like '$nom' and description like '$desc' and clef like '$clef'");
            $le_cours=$res->fetch();
            return $le_cours;
        }
   
        
       
        
      
       
        
    }
?>