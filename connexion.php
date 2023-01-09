<?php

    class cnn {
        private $_serveur = "127.0.0.1";
        private $_login = "root";
        private $_mdp = "";
        private $_bdd = "db_pedagogie";

        public function connexion() {
            try{
                $_cnx =new PDO("mysql: host=$this->_serveur; dbname=$this->_bdd", $this->_login,$this->_mdp);

            }catch(PDOException $e){
                echo 'echec lors de la connexion : '.$e->getMessage();

            }
            return $_cnx;
        }

    }

?>