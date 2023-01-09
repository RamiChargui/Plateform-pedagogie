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



if(isset($_POST['save_clef'])){
   
        $v_user_id= $_SESSION['code'];
        $v_cours_id = $_POST['id_cours'];
        $v_clef = $_POST['clef'];
        $v_myclef = $_POST['my_clef'];
        if($v_clef == $v_myclef){
            $q = "INSERT INTO etudiant_cours (id_user, id_cours)
            VALUES
            ('$v_user_id', '$v_cours_id')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                header("location:home.php");
            }
        }
        else{
            header("location:list_cours_ens.php");
        }
        
       
    
    
      
}

?>

  <?php
require_once("entity/cours.php");
require_once("entity/user.php");

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
    $ids_courses= $user->monApprontissage($id_user);
    
    //profil
    $profil=$user->editBy($id_user);
    //
    if(isset($_POST['save'])){
        $id_ens=$_POST['id_ens'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        
        
    }

?>



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

        

<!--search overlay end-->


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Vos cours</h1>
            
          </div>
      </div>
    </div>
  </div>
</section>

<section class="section-padding course">
    <div class="course-top-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <p>Courses <?=  $nom." ".$prenom ?></p>
                </div>

              
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

    <?php
  
    require_once("entity/cours.php");
 
    
   
    
    $cours = new Cours();
    $les_courses=$cours->editAll($id_ens);
    if(empty($les_courses)): ?>
    <h2>Aucun cours  </h2>
   <?php else:
        foreach($les_courses as $le_cours ): ?> 

            <div class="col-lg-4 col-md-6">
                <div class="course-block course-style-2">
                    <div class="course-img">
                        <img src="images/<?=  $le_cours["image"]  ?>" alt="" style="margin:5px;width:340px;height:160px;" class="img-fluid">
                        <span class="course-cat"><?=  $le_cours["nom"]  ?></span>
                    </div>
                    
                    <div class="course-content">
                       
                        
                         
                        <p><?=  $le_cours["description"]  ?></p>
                      
                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                               
                            </div> 
                           
                            <div class="course-price">

                            
                                    <?php
                                    $id_c=  $le_cours["id"];
                                        $key = array_search($id_c,array_column($ids_courses, 'id_cours') );
                                        
                                    if(is_integer($key)): ?>
                                        <p>deja inscri </p>
                                        <?php else: 
                                            $_SESSION["id_cours"]= $le_cours["id"];
                                            $_SESSION["clef"]= $le_cours["clef"];
                                            ?> 
                                            
                                            
                                                <p id="inpt"  >
                                                <button  style="font-size: 16px;margin-left:150px;" ><a href="inscrir_cours_action.php">Inscrir</a> </button>
                                                </p>
                                        <?php endif;?>
                                        
                            
                                 

                            </div> 
                        </div>
                    </div>
                </div>
            </div>
    <?php  endforeach ;
            endif;?>
           
        </div>


     
    </div>
</section>


<script>
    
    function setDisply(){
        p=document.getElementById("inpt");
       btt=document.getElementById("btn");
      
       
        p.setAttribute("style","display: block;");
        btt.setAttribute("style","display: none;");
    }
</script>

<section class="cta-2">
    <div class="container">
        <div class="row align-items-center subscribe-section ">
            <div class="col-lg-6">
                <div class="section-heading white-text">
                    <span class="subheading">Newsletter</span>
                    <h3>Join our community of students</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subscribe-form">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Email Address">
                        <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                    </form>
                </div>
            </div>
        </div>
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