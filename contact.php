<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Andry - Détecteur Professionnel à Madagascar</title>
    <meta name="description" content="Core HTML Project">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/icone.ico" />

    <!-- External CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/lightcase/lightcase.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Work+Sans:300,400,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="https://file.myfontastic.com/7vRKgqrN3iFEnLHuqYhYuL/icons.css" rel="stylesheet">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>
<body data-spy="scroll" data-target="#navbar-nav-header" class="static-layout">
	<div class="boxed-page">
		<nav id="gtco-header-navbar" class="navbar navbar-expand-lg py-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="img/detpro.png" style="width: 38px;"><span style="font-size:16px">DetProMada</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-menu"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-nav-header">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Retour à l'accueil</a>
                </li>
            </ul>
        </div>
    </div>
    
</nav>		<div class="jumbotron d-flex align-items-center" style="background-image: url(img/ban_contact.jpg)">
  <div class="container text-center mod">
    <h1 class="display-2 mb-4"><span class="blue_fond">Contactez-nous</span><br>
        </h1>
        <h3><span class="blue_fond">Contact: 034 05 891 97</span><br>
        <span class="blue_fond">E-mail: briquewe@gmail.com</span><br></h3>
  </div>
</div>		<!-- Contact Form Section -->
<section id="gtco-contact-form" class="bg-white">
    <div class="container">
        <div class="section-content" id="formulaire">
            <!-- Section Title -->
            <div class="title-wrap">
               
            </div>
            <?php
                if(isset($_POST['submit'])){
                    include("php/insertion_message.php");
                }
            ?>
            <!-- End of Section Title -->
            <div class="row">
                <!-- Contact Form Holder -->
                <div class="col-md-8 offset-md-2 contact-form-holder mt-4">
                    <form method="post" name="contact-us" action="./contact.php#formulaire">
                        <div class="row">
                                <div class="col-md-6 form-input">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" pattern="^[A-Za-z0-9\s]*$" required>
                                </div>
                                <div class="col-md-6 form-input">
                                    <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                            if(!empty($_GET["email"])){
                                                $valeurSource = $_GET["email"];
                                            }
                                            if(!empty($_GET["email_service"])){
                                                $valeurSource = $_GET["email_service"];
                                            }
                                        }
                                        if(!empty($valeurSource)){
                                            echo '<input type="email" class="form-control" 
                                            id="email" name="email" placeholder="Email" value="' .
                                             $valeurSource . '" readonly pattern="^[A-Za-z0-9\s@.]*$" >';
                                        }else{
                                            echo '<input type="email" class="form-control" 
                                            id="email" name="email" placeholder="Email" 
                                            pattern="^[A-Za-z0-9\s@.]*$" >';
                                        }
                                    ?>
                                    </div>
                                <div class="col-md-12 form-input">
                                <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                            if(!empty($_GET["email"])){
                                                $produit = $_GET["email"];
                                            }
                                            if(!empty($_GET["produit"])){
                                                $produit = $_GET["produit"];
                                            }
                                        }
                                        if(!empty($produit)){
                                            echo '<input type="text" class="form-control" 
                                            pattern="^[A-Za-z0-9\s!@#$%^&*()-_+=.,;?]*$" required 
                                            id="subject" name="subject" placeholder="Sujet" value="'.$produit.'">
                                            ';
                                        }else{
                                            echo '<input type="text" class="form-control" 
                                            pattern="^[A-Za-z0-9\s!@#$%^&*()-_+=.,;?]*$" required 
                                            id="subject" name="subject" placeholder="Sujet">
                                            ';
                                        }
                                    ?>
                                    </div>
                                <div class="col-md-12 form-textarea">
                                    <textarea pattern="^[A-Za-z0-9\s!@#$%^&*()-_+=.,;?]*$" required class="form-control" id="message" name="message" rows="6" placeholder="Votre Message ..."></textarea>
                                </div>
                                <div class="col-md-12 form-btn text-center">
                                    <input class="btn btn-block btn-secondary btn-red" type="submit" name="submit" value="Envoye">
                                </div>
                        </div>
                    </form>
                    <div id="form-message-warning"></div>
                    
                </div>
                <!-- End of Contact Form Holder -->
            </div>
        </div>
    </div>
</section>
<!-- End of Contact Form Section -->		<footer class="mastfoot mb-3 bg-white py-4 border-top">
    <div class="inner container">
        <div class="row" id="footer_2">
            <div>
                <img src="img/detpro.png" alt="logo" style="width: 72px;">
                <p style="font-size: 16px;">DetProMada</p>
            </div>
            <div>
                <h5>BUREAU</h5>
                <p>Madagascar -- <br>Antananarivo, <br>Tsimialonjafy Mahamasina</p>
            </div>
            <div>
                <h5>CONTACT</h5>
                <p><span class="numero">+ 261 34 05 891 97</span><br>briquewe@gmail.com</p>
            </div>
            <div>
                <h5>HORAIRES D'OUVERTURES</h5>
                <p>Lundi - Vendredi : 08h00-17h00<br>Week-end : Fermé</p>
            </div>
            
        </div>
         <div class="row">
         	<div class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center">
         		<p class="mb-0">&copy; DetProMada. Design by <a href="https://www.facebook.com/profile.php?id=100010613644062" target="_blank">Briqueweb</a>.</p>
         	</div>
           
            <div class="col-md-6">
            	<nav class="nav nav-mastfoot justify-content-md-end justify-content-center">
	                <a class="nav-link" href="https://www.facebook.com/UIGDETECTORS/" target="_blank">
	                	<i class="icon-facebook"></i>
	                </a>
	                <a class="nav-link" href="https://twitter.com/UIGDETECTORS" target="_blank">
	                	<i class="icon-twitter"></i>
	                </a>
	                <a class="nav-link" href="https://www.linkedin.com/company/uig-detectors-company/" target="_blank">
	                	<i class="icon-linkedin"></i>
	                </a>
	                <a class="nav-link" href="https://www.youtube.com/channel/UCDUfo1hDRsPcbq-htS3vCAg" target="_blank">
	                	<i class="icon-youtube"></i>
	                </a>
	            </nav>
            </div>
            
        </div>
    </div>
</footer>	</div>
	
</div>
	<!-- External JS -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
	<script src="vendor/bootstrap/popper.min.js"></script>
	<script src="vendor/bootstrap/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js "></script>
	<script src="vendor/owlcarousel/owl.carousel.min.js"></script>
	<script src="vendor/isotope/isotope.min.js"></script>
	<script src="vendor/lightcase/lightcase.js"></script>
	<script src="vendor/waypoints/waypoint.min.js"></script>
	<script src="vendor/countTo/jquery.countTo.js"></script>

	<!-- Main JS -->
	<script src="js/app.min.js "></script>
	<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
