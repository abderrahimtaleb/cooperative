<?php
require_once ("include/connect.php");
require_once ("PHPMailer-master/PHPMailerAutoload.php");

//require 'C:\wamp\www\cooperative\Admin\PHPMailer-master\PHPMailerAutoload.php';
?>
<?php
/*if (!$_SESSION['id_coop']) {
   header("Location: ../index.php");
}*/
?>
<?php 
extract($_POST);
if(isset($val) And isset($valide)){
   for ($i = 0; $i < count($valide); $i++)
   {
      $update="update commande set etat=1 where id_commande='$valide[$i]'";
      $true=mysql_query($update)or die (mysql_error());
      $eml="select email from utilisateur,commande where 
      utilisateur.id_utilisateur=commande.id_utilisateur and commande.id_commande='$valide[$i]'";
      $emails=mysql_query($eml)or die (mysql_error());
      $ems=mysql_fetch_array($emails);
      $email=$ems['email'];
      $mail = new PHPMailer;
      //$mail->SMTPDebug = 3;                   // Enable verbose debug output
      $mail->isSMTP();                          // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                        // Enable SMTP authentication
      $mail->Username = 'pfe.ecomm@gmail.com';          // SMTP username
      $mail->Password = 'obmekxwynrpnsisd';                    // SMTP password
      $mail->SMTPSecure = 'tls';                     // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;
      // TCP port to connect to
      $mail->From = 'pfe.ecomm@gmail.com';
      $mail->FromName = 'E-commerce web site';    // Add a recipient
      $mail->addAddress($email); 
      $mail->addReplyTo('pfe.ecomm@gmail.com', 'Information');
      $mail->addCC($email);
      $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'statue de commande';
      $mail->Body    = 'Génial ! Votre Commande a bien été validé';
      echo '<script type="text/javascript">alert("Les Commandes Selectionnés Sont Validées");</script>';
      echo '<script type="text/javascript">document.location.href="GestionCommande.php";</script>';
      if(!$mail->send()) {
         echo 'le Message n\'a pas été envoyé.';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
      }
   }
}

if(isset($ann) AND !empty($valide)) {
   for ($i = 0; $i < count($valide); $i++)
   {           
      $update="update commande set etat=0 where id_commande='$valide[$i]'";
      $true=mysql_query($update)or die (mysql_error());
   }
   if($true){ 
   ?>    
      <script type="text/javascript">
      alert("Les Commande Selectionnes sont Annulées");
      </script>
   <?php
   }else echo "ERREUR";
}

if(isset($supp) AND !empty($idsupp)) {
   for ($i = 0; $i < count($idsupp); $i++)
   {  $delete_req = "delete from ligne_cmd where id_commande='$idsupp[$i]'";         
      $update = "delete from commande where id_commande='$idsupp[$i]'";
      $delete = mysql_query($delete_req)or die (mysql_error());
      $true = mysql_query($update)or die (mysql_error());
   }
   if($delete AND $true){ 
   ?>
      <script type="text/javascript">
      alert("Commande Supprimé Avec Succes");
      </script>
   <?php
   }else echo "ERREUR";
}
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestion des Commandes</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="styleAdmin.css">
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js.js"></script>
</head>
<body>
   <!-- header -->
   <?php include("headerAdmin.php"); ?>
   <div class="col-md-2 ">
      
   </div>
   <!-- /sidebar -->
   <!-- ************ GESTION DES COMMANDES ************ -->
   <div class="col-md-9">
      <div class="container-fluid row"><!--  ==> Ramasse tous le Bloc -->
         <div class="row">
            <div class="panel panel-success">
               <div class="panel-heading">
               <h3 class="panel-title">Gestion des Commandes</h3>
               </div>  
            <div class="panel-body">
               <ul class="nav nav-pills nav-justified admin-menu">
                  <li class="active">
                     <a href="#" data-target-id="valides"><i class="fa fa-home fa-fw"></i>Commandes Validés</a>
                  </li>
                  <li>
                     <a href="" data-target-id="Modifier"><i class="fa fa-list-alt fa-fw"></i>Commandes En cours</a>
                  </li>
                  <li>
                     <a href="" data-target-id="Supprimer"><i class="fa fa-file-o fa-fw"></i>Commandes Annulées</a>
                  </li>
               </ul>
               <div class="col-md-12 well admin-content " id="valides">
                  <form class="form-horizontal" role="form" method="POST" action="">
                     <fieldset>
                        <?php
                        $sql="select * from commande where etat = 1";
                        $data_cmd=mysql_query($sql)or die(mysql_error());
                        while($a=mysql_fetch_array ($data_cmd)) {
                        $id_u=$a['id_utilisateur'];
                        $id_c=$a['id_commande'];
                        $query="select * from utilisateur where id_utilisateur = $id_u";
                        $data_user=mysql_query($query)or die(mysql_error());
                        $du=mysql_fetch_array ($data_user);
                        ?>       
                        <p>
                        <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover">
                           <thead> 
                           <h4><span class="label label-info">
                           Commande de :
                           <?php echo $du["nom_ut"]." ".$du["prenom"]; ?>
                           </span></h4>
                           <tr>
                           <th>#</th>
                           <th>Date</th>
                           <th>adress livraison</th>
                           <th>Nom de Produit</th>
                           <th>Prix</th>
                           <th>Quantité</th>
                           <th>Image perso</th>
                           <th>Description perso</th>
                           </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td rowspan=<?php echo count($data_cmd);?> >
                                    <input type="checkbox" name="idsupp[]" id="visible" value="<?php echo $a["id_commande"]; ?>">
                                 </td>
                                 <?php
                                 $sqll="select * from article,livraison,commande,ligne_cmd 
                                 where article.id_article=ligne_cmd.id_article AND
                                 livraison.id_livraison=commande.id_livraison AND
                                 commande.id_commande=ligne_cmd.id_commande AND commande.id_commande=$id_c";
                                 $donne=mysql_query($sqll)or die(mysql_error());
                                 $dd=mysql_fetch_array($donne);
                                 ?>
                                 <td rowspan=<?php echo count($donne) ;?>>
                                    <?php echo $dd["date_commande"]; ?>
                                 </td>
                                 <td rowspan=<?php echo count($donne) ;?>>
                                    <?php echo $dd["adress_liv"]." ".$dd["description_liv"]; ?>
                                 </td> 
                                 <?php
                                 $donne=mysql_query($sqll)or die(mysql_error());
                                 while($dd=mysql_fetch_array ($donne)) {?>
                                    <td><?php echo $dd["nom"] ?> </td>
                                    <td><?php echo  $dd['prix_ar']; ?></td>
                                    <td><?php echo $dd["quantite_ar"];?></td>
                                    <td><?php echo  $dd['']; ?></td>
                                    <td><?php echo $dd[''];?></td>
                                 <?php 
                                 }
                                 ?>
                              </tr>
                           </tbody>
                           </table>
                        </div>
                        </p>
                        <?php            
                        }
                        ?>
                        <center>
                        <button type="submit" class="btn btn-success" name="supp" >Supprimer</button>
                        </center>

                     </fieldset>
                  </form>
               </div><!-- ====> div fin 12 col-md -->
               <!--  *************  Modifer Un Produite *************** -->
               <div class="col-md-12 well admin-content" id="Modifier">
                  <form class="form-horizontal" role="form" method="POST" action="">
                     <fieldset>   
                        <?php 
                        $sql="select * from commande where etat=2";
                        $data_cmd=mysql_query($sql)or die(mysql_error());
                        while($a=mysql_fetch_array ($data_cmd)) {;
                        $id_u=$a['id_utilisateur'];
                        $id_c=$a['id_commande'];
                        $query="select * from utilisateur where id_utilisateur=$id_u";
                        $data_user=mysql_query($query)or die(mysql_error());
                        $du=mysql_fetch_array ($data_user);
                        ?>                 
                        <p>
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                              <thead>
                                 <h4>
                                    <span class="label label-info">
                                       Commande de :
                                       <?php echo $du["nom_ut"]." ".$du["prenom"]; ?>
                                    </span>
                                 </h4>
                                 <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>adress livraison</th>
                                    <th>Nom de Produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Image perso</th>
                                    <th>Description perso</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td rowspan=<?php echo count($data_cmd) ;?> >
                                       <input type="checkbox" name="valide[]" id="visible" value="<?php echo $a["id_commande"]; ?>">
                                    </td>
                                    <?php
                                    $sqll="select * from article,livraison,commande,ligne_cmd 
                                    where article.id_article=ligne_cmd.id_article AND
                                    livraison.id_livraison=commande.id_livraison AND
                                    commande.id_commande=ligne_cmd.id_commande AND commande.id_commande=$id_c";
                                    $donne=mysql_query($sqll)or die(mysql_error());
                                    $dd=mysql_fetch_array($donne);
                                    ?>
                                    <td rowspan=<?php echo count($dd) ;?> >
                                       <?php echo $dd["date_commande"]; ?>
                                    </td>
                                    <td rowspan=<?php echo count($dd) ;?>>
                                       <?php echo $dd["adress_liv"]." ".$dd["description_liv"]; ?>
                                    </td> 
                                    <?php
                                    $donne=mysql_query($sqll)or die(mysql_error());
                                    while($dd=mysql_fetch_array ($donne)) {?>
                                       <td><?php echo $dd["nom"] ?> </td>                                
                                       <td><?php echo  $dd['prix']; ?></td>
                                       <td><?php echo $dd["quantite"];?></td>
                                       <td><?php echo  $dd['']; ?></td>
                                       <td><?php echo $dd[''];?></td>
                                 </tr>
                                 <?php 
                                 }
                                 ?>
                              </tbody>
                              </table>
                           </div>
                        </p>
                        <?php   
                        } 
                        ?>
                        <center>
                           <button type="submit" class="btn btn-success" name="val">Validée</button>
                           <button type="submit" class="btn btn-success"name="ann" >Annulé</button>
                        </center>
                  </fieldset>
                  </form>   
               </div> <!-- fin col-md-12  -->
               <!-- Debut col-md-12  -->
               <div class="col-md-12 well admin-content" id="Supprimer">
                  <form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                     <fieldset>
                        <?php  
                        $sql="select * from commande where etat=0";
                        $data_cmd=mysql_query($sql)or die(mysql_error());
                        while($a=mysql_fetch_array ($data_cmd)) {;
                        $id_u=$a['id_utilisateur'];
                        $id_c=$a['id_commande'];
                        $query="select * from utilisateur where id_utilisateur=$id_u";
                        $data_user=mysql_query($query)or die(mysql_error());
                        $du=mysql_fetch_array ($data_user);
                        ?>                   
                        <p>
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                 <thead> 
                                    <h4>
                                       <span class="label label-info">
                                          Commande de :
                                          <?php echo $du["nom_ut"]." ".$du["prenom"]; ?>
                                       </span>
                                    </h4>
                                    <tr>
                                       <th>#</th>
                                       <th>Date</th>
                                       <th>adress livraison</th>
                                       <th>Nom de Produit</th>
                                       <th>Prix</th>
                                       <th>Quantité</th>
                                       <th>Image perso</th>
                                       <th>Description perso</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td rowspan=<?php echo count($a) ;?> >
                                          <input type="checkbox" name="idsupp[]" id="visible" value="<?php echo $a["id_commande"]; ?>">
                                       </td>
                                       <?php
                                       $sqll="select * from article,livraison,commande,ligne_cmd 
                                       where article.id_article=ligne_cmd.id_article AND
                                       livraison.id_livraison=commande.id_livraison AND
                                       commande.id_commande=ligne_cmd.id_commande AND commande.id_commande=$id_c";
                                       $donne=mysql_query($sqll)or die(mysql_error());
                                       $dd=mysql_fetch_array($donne);
                                       ?>
                                       <td rowspan=<?php echo count($dd) ;?> >
                                          <?php echo $dd["date_commande"]; ?>                              
                                       </td>
                                       <td rowspan=<?php echo count($dd) ;?>>
                                          <?php echo $dd["adress_liv"]." ".$dd["description_liv"]; ?>
                                       </td> 
                                       <?php
                                       $donne=mysql_query($sqll)or die(mysql_error());
                                       while($dd=mysql_fetch_array ($donne)) {?>
                                          <td><?php echo $dd["nom"] ?> </td>                                
                                          <td><?php echo  $dd['prix_ar']; ?></td>
                                          <td><?php echo $dd["quantite_ar"];?></td>
                                          <td><?php echo  $dd['']; ?></td>
                                          <td><?php echo $dd[''];?></td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                 </tbody>
                              </table>
                           </div>
                        </p>
                        <?php   
                        }  
                        ?>
                        <center>
                           <button type="submit" class="btn btn-success" name="supp">Supprimer</button>
                        </center>
                     </fieldset>
                  </form>
               </div>
               </div>
            </div>
         </div>
      </div>
   </div><!-- ===> col-md-9 -->
</body>
</html>