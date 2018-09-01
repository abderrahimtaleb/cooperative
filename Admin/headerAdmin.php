<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <script type="text/javascript" src="jquery.js"></script>
        <!-- <script type="text/javascript" src="panier.js"></script> -->
        <script type="text/javascript" src="pan.js"></script>
	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/green.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
	    <!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <style>
         body{
             background: url("bg.png");
         }
        </style>
	</head>
<body>
	<div class="wrapper" >
		<!-- ============================================================= TOP NAVIGATION ============================================================= -->

<!-- ============================================================= TOP NAVIGATION : END ============================================================= -->		<!-- ============================================================= HEADER ============================================================= -->
<header class="no-padding-bottom header-alt"  style  = " background-color:white; heigth : 10%">
    <div class="container no-padding">
        
        <div class="col-xs-12 col-md-3 logo-holder">
			<!-- ============================================================= LOGO ============================================================= -->
<div class="logo">
	<a href="index.php">
		<img alt="logo" src="logo.png" width="180" height="120" style="margin-left : -20%" />
		<!--<object id="sp" type="image/svg+xml" data="assets/images/logo.svg" width="233" height="54"></object>-->
		
	</a>

</div><!-- /.logo -->


<!-- ============================================================= LOGO : END ============================================================= -->		</div><!-- /.logo-holder -->
<h1 style="margin-top: 4%; font-size : 45pt"> <?php  echo $_SESSION['nom_coop'];?> </h2>
<br>
 <a href="../logout.php" style="margin-top : 5%">Déconnexion </a> 

<!-- ============================================================= SEARCH AREA : END ============================================================= -->		</div><!-- /.top-search-holder -->

	
	<!-- ========================================= NAVIGATION ========================================= -->
<nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown" >
    <div class="container">
        <div class="yamm navbar">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                <ul class="nav navbar-nav">

                    <li>  <a href="GestionProduit.php">Gestion des Produits</a>  </li>
                     <li>   <a href="GestionCommande.php">Gestion des Commandes</a> </li>

                </ul><!-- /.navbar-nav -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.navbar -->
    </div><!-- /.container -->
</nav><!-- /.megamenu-vertical -->
<!-- ========================================= NAVIGATION : END ========================================= -->
	
</header>
<!-- ============================================================= HEADER : END ============================================================= -->		


	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery-1.10.2.min.js"></script>

	<script src="assets/js/bootstrap.min.js"></script>





<br/>
</body>
</html>