<?php
require_once("entity/cours.php");
require_once("entity/user.php");
    
   



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
//get cours
    $id_user=$_SESSION['code'];
    $user = new User();

    //profil
    $profil=$user->editBy($id_user);



if(isset($_POST['save'])){
    if(empty($_POST['nom']) || empty($_POST['clef']) || empty($_POST['image']) || empty($_POST['description'])  ){
       
        $message=" veuillez remplir touts les champs !";
        header("location:ajouter_cours.php?retour=$message");
    }
    else{
        $v_user_id= $_SESSION['code'];
        $v_cours = $_POST['nom'];
        $v_clef = $_POST['clef'];
        $v_image = $_POST['image'];
        $v_desc = $_POST['description'];
        
       // echo $v_cours." ".$v_clef." ".$v_image." ".$v_desc." ".$v_cours." ";
    }
    
      
}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  ">
  
  <meta name="author" content="themeturn.com">

  <title>Edutim- Education LMS template</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.css">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.css">
  <link rel="stylesheet" href="assets/vendors/bicon/css/bicon.min.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
  <!-- WooCOmmerce CSS -->
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-layouts.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-small-screen.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce.css">
   <!-- Owl Carousel  CSS -->
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">



</head>

<body id="top-header">
    
<header>


    <!-- Main Menu Start -->
   
    <div class="site-navigation main_menu " id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="assets/images/logo-dark.png" alt="Edutim" class="img-fluid">
                </a>

                <!-- Toggler -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto">
                     
                        <li class="nav-item ">
                            <a href="home.php" class="nav-link js-scroll-trigger">
                             Mon apprentissage
                            </a>
                        </li>

                     
                        <li class="nav-item ">
                            <?php if($_SESSION['role']=="ROLE_ENSEGIENANT"): ?>
                                <a href="enseginant.php" class="nav-link">
                                    Enseginant
                                </a>
                            <?php endif; ?>
                           
                        </li>
                        
                        <li class="nav-item ">
                            <a href="cours.php" class="nav-link">
                                Cours
                            </a>
                        </li>
                    </ul>

                    <ul class="header-contact-right d-none d-lg-block">
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user mr-2"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                <a class="dropdown-item " href="profil.php">
                                 <i class="fa fa-user "></i> <?=  $profil["nom"]." ".$profil["prenom"] ?>
                                </a>
                                <a class="dropdown-item " href="home.php">
                                    Mon Apprentissage
                                </a> 
                                <a class="dropdown-item " href="logout.php">
                                    Logout
                                </a> 
                            </div>
                        </li>
                       
                    </ul>
                   
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>
</header>
<div  >
<div id="df1" class="comments-form p-2 mt-4" style="max-width: 600px;margin: 20px;min-height:500px; ">
                                    
    <form  method="post" style="padding: 20px;" class="comment_form"  id="f1">                                    
        <h3 >Chapitre 1: </h3>
        <div class="row form-row" id="mydiv">
        
            <p class="form-row form-row-first form-group ">
                <label for="titre" class="control-label">titre&nbsp;*</label>                                               
                <input type="text" class="input-text form-control input-lg" name="titre" id="titre" placeholder="entrer un titre" value="introduction" required>                                                
            </p>
                                                
            <p class="form-row form-row-wide form-group " >
                <label for="file" class="control-label">fichier&nbsp;*</label>                                                
                <input type="file" class="input-text form-control input-lg" name="file[]" id="file" required>                                                
            </p>                                    
                                               
        </div>     
       
 

<button id="add" name="add" style="margin: 20px;margin-left:350px;" class="btn btn-main">Terminer</button>

</div>                                     
    </form> 
    <div style="margin-top: -130px;margin-left:40px;margin-bottom:30px;">
        <div class="">
            <button onclick="addChapitre()"  class="btn btn-main">+ chapitre </button>
        </div>
    </div> 
</div> 
  
    
</div>                               
                                   

<section class="cta-2">
    <div class="container">
        
       
    </div>
</section>

<section class="footer pt-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6 col-md-6">
				<div class="widget footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">About Us</h5>
					<p class="mt-3">Veniam Sequi molestias aut necessitatibus optio magni at natus accusamus.Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt .</p>
					<ul class="list-inline footer-socials">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"> <a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Company</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">About us</a></li>
						<li><a href="#">Contact us</a></li>
						<li><a href="#">Projects</a></li>
						<li><a href="#">Terms & Condition</a></li>
						<li><a href="#">Privacy policy</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Courses</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">SEO Business</a></li>
						<li><a href="#">Digital Marketing</a></li>
						<li><a href="#">Graphic Design</a></li>
						<li><a href="#">Site Development</a></li>
						<li><a href="#">Social Marketing</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="footer-widget footer-contact mb-5 mb-lg-0">
					<h5 class="widget-title">Contact </h5>
					
					<ul class="list-unstyled">
						<li><i class="bi bi-headphone"></i>
							<div>
								<strong>Phone number</strong>
								(68) 345 5902
							</div>
							
						</li>
						<li> <i class="bi bi-envelop"></i>
							<div>
								<strong>Email Address</strong>
								info@yourdomain.com
							</div>
						</li>
						<li><i class="bi bi-location-pointer"></i>
							<div>
								<strong>Office Address</strong>
								Moon Street Light Avenue
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="assets/images/logo-white.png" alt="Edutim" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="copyright text-lg-center">
						<p>@ Copyright reserved to Edutim.Proudly Crafted by <a href="https://themeturn.com">Dreambuzz</a> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>

<script>
    var numchap=2;
    function addChapitre(){
        form1=document.getElementById("f1");
       btnadd=document.getElementById("add");
       btnadd.parentNode.removeChild(btnadd);
        //div
        div1=document.createElement('div');
        div1.setAttribute("class","row form-row");
        div1.setAttribute("id","mydiv");
        //h3
            hh3=document.createElement('h3');
            hh3.innerHTML="Chapitre "+numchap;
        //p
        pp=document.createElement('p');
        pp.setAttribute("class","form-row form-row-first form-group");
        //lab

        lab1=document.createElement('label');
        lab1.setAttribute("class","control-label");
        lab1.setAttribute("for","titre");
        
        lab1.innerHTML="titre *";
        
        //inp
        inp1=document.createElement('input');
        inp1.setAttribute("class","input-text form-control input-lg");
        inp1.setAttribute("type","text");
        inp1.setAttribute("size","30");
        inp1.setAttribute("id","titre");

         //p
         pp1=document.createElement('p');
        pp1.setAttribute("class","form-row form-row-first form-group");
        //lab

        lab2=document.createElement('label');
        lab2.setAttribute("class","control-label");
        lab1.setAttribute("for","file");
        lab2.innerHTML="file *";
        
        //inp
        inp2=document.createElement('input');
        inp2.setAttribute("class","input-text form-control input-lg");
        inp2.setAttribute("type","file");    
        inp2.setAttribute("id","file");
        //
        btn=document.createElement('button');
        btn.setAttribute("class","btn btn-main");
        btn.setAttribute("type","submit");    
        btn.setAttribute("id","add");
        btn.setAttribute("style","margin: 20px;margin-left:350px;");
        
        btn.innerHTML="terminer";
        //
        pp.appendChild(lab1);
        pp.appendChild(inp1);
        div1.appendChild(pp);
        pp1.appendChild(lab2);
        pp1.appendChild(inp2);
        div1.appendChild(pp1);
        
        form1.appendChild(hh3);
        form1.appendChild(div1);
        form1.appendChild(btn);
        
        numchap+=1;
}
function calculPTTC(){
        
        list=document.getElementById("Liste");
        l=document.createElement("li");
        ch="";
        ch=ch+document.getElementById("champ1").value;
        prix=document.getElementById("champ2").value;
        if((document.f.rad)[0].checked){
            prix=prix*1.19;
            ch=ch+" "+ prix+" "+"DT" ;
        }
        else{
            if((document.f.rad)[1].checked){
                prix=prix*1.13;
                prix=prix.toFixed(2);
                ch=ch+" "+ prix+" "+"DT";
            }
        }
        l.innerHTML=ch;
        list.appendChild(l);
        
    }
</script>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="assets/vendors/jquery/jquery.js"></script>
    <!-- Bootstrap 4.5 -->
    <script src="assets/vendors/bootstrap/bootstrap.js"></script>
    <!-- Counterup -->
    <script src="assets/vendors/counterup/waypoint.js"></script>
    <script src="assets/vendors/counterup/jquery.counterup.min.js"></script>
    <script src="assets/vendors/jquery.isotope.js"></script>
    <script src="assets/vendors/imagesloaded.js"></script>
    <!--  Owlk Carousel-->
    <script src="assets/vendors/owl/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>


  </body>
  </html>