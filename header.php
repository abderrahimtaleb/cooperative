<!DOCTYPE html>
<html lang="fr">
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
	</head>
<body>
	<div class="wrapper">
		<!-- ============================================================= TOP NAVIGATION ============================================================= -->
<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-4 no-margin">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="faq.php">FAQ</a></li>
            </ul>
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-8 no-margin">
            <ul class="right">
                <li><a href="catalogue/catalogue.pdf">CATALOGUE</a></li>
                <li>
                    <?php
                    if(isset($_SESSION['id_coop'])){ 
                    ?>
                    <a href="logout.php" title="Deconnexion">SE DECONNECTER</a>
                    <ul class="sub-menu">
                        <li><a href="Admin/GestionProduit.php"><?php echo $_SESSION['nom_coop'] ?></a></li>  
                    </ul>
                    <?php       
                    }elseif (isset($_SESSION['id_user'])) {
                    ?>
                    <a href="logout.php" title="Deconnexion">SE DECONNECTER</a>
                    <ul class="sub-menu">
                    <li><a href="index.php"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?></a></li>
                    </ul>
                    <?php      
                    }
                    else{     
                    ?>
                    <a href="loginClient.php" title="Connexion">SE CONNECTER</a>
                    <ul class="sub-menu">
                        <li><a href="loginCoop.php">Espace Coopérative</a></li>  
                        <li><a href="loginClient.php">Espace Client</a></li>
                    </ul>
                    <?php        
                    }  
                    ?>
                    
                </li>
            </ul>
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->
<header class="no-padding-bottom header-alt">
    <div class="container no-padding">
        
        <div class="col-xs-12 col-md-3 logo-holder">
			<!-- ============================================================= LOGO ============================================================= -->
<div class="logo">
	<a href="index.php">
		<!--<img alt="logo" src="assets/images/logo.svg" width="233" height="54"/>-->
		<!--<object id="sp" type="image/svg+xml" data="assets/images/logo.svg" width="233" height="54"></object>-->
		
	</a>
</div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->		</div><!-- /.logo-holder -->

		<div class="col-xs-12 col-md-6 top-search-holder no-margin">
			<div class="contact-row">
    <div class="phone inline">
        <i class="fa fa-phone"></i> (+212) 6-16-45-58-17
    </div>
    <div class="contact inline">
        <i class="fa fa-envelope"></i> contact@<span class="le-color">coopecomm.com</span>
    </div>
</div><!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
    <form method="get" action="#">
        <div class="control-group">
            <input class="search-field" placeholder="Trouver Rapidement Vos Produits Ici" name="chercher"/>
            <ul class="categories-filter animate-dropdown">
                <li class="dropdown">
                    <b color="green">Chercher produit</b>
                </li>
            </ul>
 
            <button type="submit" class="search-button"></button>   

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->		</div><!-- /.top-search-holder -->

<div class="col-xs-12 col-md-3 top-cart-row no-margin">
<div class="top-cart-row-container">

    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
    <div class="top-cart-holder dropdown animate-dropdown"> 
        
        <div class="basket" id="MP">
            
        </div><!-- /.basket -->
    </div><!-- /.top-cart-holder -->
</div><!-- /.top-cart-row-container -->
<!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->		</div><!-- /.top-cart-row -->

	</div><!-- /.container -->
	
	<!-- ========================================= NAVIGATION ========================================= -->
<nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
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

            <?php 
            $fetch=mysql_query("select * from categorie limit 8") or die(mysql_error());

            while ($c = mysql_fetch_array($fetch)): ?>  
                    <li>
                        <a href="arti_cat.php?id=<?php echo $c['id_categorie']; ?>"><?php echo $c['categorie']; ?></a> 
                    </li>
            <?php endwhile; ?>       
                </ul><!-- /.navbar-nav -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.navbar -->
    </div><!-- /.container -->
</nav><!-- /.megamenu-vertical -->
<!-- ========================================= NAVIGATION : END  -->
	
</header>
<!-- ============================================================= HEADER : END -->		
<br/>
</body>
</html>