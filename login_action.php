<?php
// Récupérer les données de connexion 
include("connexion.php");
session_start();
if(isset($_POST['login'])){
    $vemail=$_POST['username'];
    $vpassword=$_POST['password'];
    // Vérifier que les codes d’accès sont corrects
    $sql=new cnn();
    $cnx=$sql->connexion();
    $res = $cnx->query("SELECT * FROM user WHERE email='$vemail' AND password='$vpassword'");
    $user = $res->fetch();
    if ($user){ // Les codes sont corrects

    // à l'identifiant de user connecté
    $_SESSION['code'] = $user['id']; 
    $_SESSION['role'] = $user['role']; 
    // Redirection vers le tableau de bord "home.php"
    header("location:home.php");
    }
    else{ // Les codes sont faux
        $r=0; 
        header("location:login-registration.php?dlog=$r");
    }
}

if(isset($_POST['register'])){

    $vnom=$_POST['nom'];
    $vprenom=$_POST['prenom'];
    $vemail=$_POST['email'];
    $vpassword=$_POST['password'];
    $vRole=$_POST['type'];
 
    require_once("entity/user.php");
    $user=new User();
    $user->setNom($vnom);
    $user->setPrenom($vprenom);
    $user->setEmail($vemail);
    $user->setPassword($vpassword);
    $user->setRole($vRole);
    $stmt = $user->ajouter();
    echo $stmt;
    if ($stmt>0){ // Les codes sont corrects

    // à l'identifiant de user connecté
    $_SESSION['code'] = $user->getId(); 
    $_SESSION['role'] = $user->getRole(); 
    // Redirection vers le tableau de bord "home.php"
    header("location:home.php");
    }
    else{ // Les codes sont faux
        $r=0; 
        header("location:login-registration.php?dreg=$r");
    }
}
?>