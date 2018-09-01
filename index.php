<?php
session_start();
  require_once 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="cherche_art.css">
  <title>E-commerce page</title>
  
</head>
<body>
  <?php include("header.php"); ?>
  <br/>
  <div class="container">
    <!-- this is Body-->
    <div class="container-fluid">
      <div class="row">
        <!-- Colun 9-->
<div class="col-md-9">



          <div id="carousel-example-generic" class="carousel slide well" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="images/slid1.jpg" alt="...">
                <div class="carousel-caption">
                  <h3>...</h3>
                  <p>...</p>
                </div>
              </div>
              <div class="item">
                <img src="images/slid2.jpg" alt="...">
                <div class="carousel-caption">
                  <h3>...</h3>
                  <p>...</p>
                </div>
              </div>
              <div class="item">
                <img src="images/slid3.jpg" alt="...">
                <div class="carousel-caption">
                  <h3>...</h3>
                  <p>...</p>
                </div>
              </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
</div>
<div class="col-md-3 ">
            


<div class="row">
        <div class="row">
            <div class="col-md-2">
                <h2><a href="arti_prom.php">Nouveauté </a></h2>
            </div>
            <div class="col-md-10">
                <!-- Controls -->
                <div class="controls pull-right">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example5"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example5"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example5" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="row">
                          <?php 
            $fetch=mysql_query("select * from article where id_categorie=2 and quantite > 1 limit 1") or die(mysql_error());
            ?>
            <?php while($a = mysql_fetch_array($fetch)) : ?>  
                        <div>
                            <div class="col-item">
                                <div class="photo" id="ph">
                                    <a href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>"><img src="<?php echo $a['image']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h5><?php echo $a['nom']; ?></h5>
                                            <h5 class="price-text-color"><?php echo $a['prix_tva']." EUR"; ?></h5>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                         <p class="btn-details">
                                          <a class="btn btn-warning" href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>" class="hidden-sm"><i class="fa fa-list"></i> details sur Produit</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                  <?php endwhile; ?>
                    </div>
                </div>
                <div class="item">
                  <div class="row">
                     <?php 
            $fetch=mysql_query("select * from article where  id_categorie=1 and quantite > 1 limit 1") or die(mysql_error());
            ?>
            <?php while($a = mysql_fetch_array($fetch)) : ?>  
         
                        <div>
                            <div class="col-item">
                                <div class="photo" id="ph">
                                    <a href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>"><img src="<?php echo $a['image']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h5><?php echo $a['nom']; ?></h5>
                                            <h5 class="price-text-color">
                                           <h5 class="price-text-color"><?php echo $a['prix_tva']." EUR"; ?></h5>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                         <p class="btn-details">
                                          <a class="btn btn-warning" href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>" class="hidden-sm"><i class="fa fa-list"></i> details sur Produit</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>




   </div>
</div>
<div class="col-md-12">
<div class="row">
        <div class="row">
            <div class="col-md-9">
                <h2><a href="arti_cat.php?id=1">TÉLÉPHONES PORTABLES</a></h2>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="row well">

            <?php 
            $fetch=mysql_query("select * from article where id_categorie=1 and id_marque=1 and quantite > 1 limit 4") or die(mysql_error());
            ?>
            <?php while($a = mysql_fetch_array($fetch)) : ?>  
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <a href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>"><img src="<?php echo $a['image']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h5><?php echo $a['nom']; ?></h5>
                                            <h5 class="price-text-color">
                                            <h5 class="price-text-color"><?php echo $a['prix_tva']." EUR"; ?></h5>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-details">
                                          <a class="btn btn-warning" href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>" class="hidden-sm"><i class="fa fa-list"></i> details sur Produit</a></p>

                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                  <?php endwhile; ?>
                    </div>
                </div>
                <div class="item">
                  <div class="row well">
                     <?php 
            $fetch=mysql_query("select * from article where id_categorie=1 and id_marque=2 and quantite > 1 limit 4") or die(mysql_error());
            ?>
            <?php while($a = mysql_fetch_array($fetch)) : ?>  
                    
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <a href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>"><img src="<?php echo $a['image']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h5><?php echo $a['nom']; ?></h5>
                                            <h5 class="price-text-color">
                                            <h5 class="price-text-color"><?php echo $a['prix_tva']." EUR"; ?></h5>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                         <p class="btn-details">
                                          <a class="btn btn-warning" href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>" class="hidden-sm"><i class="fa fa-list"></i> details sur Produit</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>  

          <!--********************************--> 

<div class="row">
        <div class="row">
            <div class="col-md-9">
                <h2><a href="arti_cat.php?id=2">TABLETTES & ORDINATEURS</a></h2>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right ">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example1"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example1"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example1" class="carousel slide " data-ride="carousel">
            <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="row well">
                    <?php 
            $fetch=mysql_query("select * from article where id_categorie=2 and id_marque=1 and quantite > 1 limit 4") or die(mysql_error());
            ?>
            <?php while($a = mysql_fetch_array($fetch)) : ?> 

                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <a href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>"><img src="<?php echo $a['image']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h5><?php echo $a['nom']; ?></h5>
                                            <h5 class="price-text-color">
                                            <h5 class="price-text-color"><?php echo $a['prix_tva']." EUR"; ?></h5>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-details">
                                          <a class="btn btn-info" href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>" class="hidden-sm"><i class="fa fa-list"></i> details sur Produit</a></p>

                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                  <?php endwhile; ?>
                    </div>
                </div>
                <div class="item">
                  <div class="row well">
                    <?php 
            $fetch=mysql_query("select * from article where id_categorie=2 and id_marque=2 and quantite > 1 limit 4") or die(mysql_error());
            ?>
            <?php while($a = mysql_fetch_array($fetch)) : ?> 

                    
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <a href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>"><img src="<?php echo $a['image']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h5><?php echo $a['nom']; ?></h5>
                                            <h5 class="price-text-color">
                                           <h5 class="price-text-color"><?php echo $a['prix_tva']." EUR"; ?></h5>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                         <p class="btn-details">
                                          <a class="btn btn-info" href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>" class="hidden-sm"><i class="fa fa-list"></i> details sur Produit</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 


<!--********************************--> 


<div class="row">
        <div class="row">
            <div class="col-md-9">
                <h2><a href="arti_cat.php?id=3">SON IMAGE ET VIDÉOS</a></h2>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right ">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example2"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example2"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example2" class="carousel slide " data-ride="carousel">
            <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="row well">
               <?php 
            $fetch=mysql_query("select * from article where id_categorie=3 and id_marque=1 and quantite > 1 limit 4") or die(mysql_error());
            ?>
            <?php while($a = mysql_fetch_array($fetch)) : ?> 

                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <a href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>"><img src="<?php echo $a['image']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h5><?php echo $a['nom']; ?></h5>
                                            <h5 class="price-text-color">
                                            <h5 class="price-text-color"><?php echo $a['prix_tva']." EUR"; ?></h5>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-details">
                                          <a class="btn btn-danger" href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>" class="hidden-sm"><i class="fa fa-list"></i> details sur Produit</a></p>

                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                  <?php endwhile; ?>
                    </div>
                </div>
                <div class="item">
                  <div class="row well">
                     <?php 
            $fetch=mysql_query("select * from article where id_categorie=3 and id_marque=2 and quantite > 1 limit 4") or die(mysql_error());
            ?>
            <?php while($a = mysql_fetch_array($fetch)) : ?> 
 
                    
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <a href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>"><img src="<?php echo $a['image']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h5><?php echo $a['nom']; ?></h5>
                                            <h5 class="price-text-color">
                                            <h5 class="price-text-color"><?php echo $a['prix_tva']." EUR"; ?></h5>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                         <p class="btn-details">
                                          <a class="btn btn-danger" href="Detail_Produit.php?id=<?php echo $a['id_article']; ?>" class="hidden-sm"><i class="fa fa-list"></i> details sur Produit</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


<!--********************************--> 


          
        </div>  
      </div>

    </div>  
  </div>
<?php include("footer.php"); ?>
  <!-- JS Global Compulsory -->
     <script src="js/bootstrap.min.js"></script>
     <script src="js.js"></script>

</body>
</html>