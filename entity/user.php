<?php
    
    require_once( $_SERVER["DOCUMENT_ROOT"]."/Edutim/connexion.php");
    class User extends cnn {
        private $id;
        private $nom;
        private $prenom;
        private $password;
        private $email;
        private $role;



        public function getId(){
            return $this->id;

        }

        public function getNom(){
            return $this->nom;
            
        }
        public function setNom($t){
            $this->nom=$t;
            
           
       }

        public function getRole(){
            return $this->role;
        }
        public function setRole($t){
            $this->role=$t;
         }

        public function getPrenom(){
            return $this->prenom;
            
        }
        public function setPrenom($p){
            $this->prenom=$p;
            
        }

        public function getPassword(){
            return $this->password;
            
        }
        public function setPassword($pwd){
            $this->password=$pwd;
            
       }

       
        public function getEmail(){
            return $this->email;
            
        }
        public function setEmail($e){
            $this->email=$e;
            
        }

        public function ajouter(){
            if(!isset($this->nom) || !isset($this->prenom) || !isset($this->email) || !isset($this->password) || !isset($this->role))
                return false;
            $q = "INSERT INTO user (nom, prenom, email,password,role)
            VALUES
            ('$this->nom', '$this->prenom','$this->email', '$this->password','$this->role')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }


        public function getAll($id_ens){
            $res=$this->connexion()->query("SELECT * from user WHERE id != $id_ens AND role like 'ROLE_ENSEGIENANT'");
            //Extraire (fech) toutes les lignes 
            $les_ensg= $res->fetchAll();
            return $les_ensg;

        }


        public function getAllEnseignant(){
            $res=$this->connexion()->query("SELECT * from user WHERE role like 'ROLE_ENSEGIENANT' ");
            //Extraire (fech) toutes les lignes 
            $les_ensg= $res->fetchAll();
            return $les_ensg;

        }

        public function editBy($id){
            $res = $this->connexion()->query("SELECT * from user where id=$id");
            $le_user=$res->fetch();
            return $le_user;
        }

        public function monApprontissage($id){
            $res = $this->connexion()->query("SELECT id_cours from etudiant_cours where id_user=$id");
            $ids_cours=$res->fetchAll();
            return $ids_cours;
        }
       
        
      
       
        
    }
?>