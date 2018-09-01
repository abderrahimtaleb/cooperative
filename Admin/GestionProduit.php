<?php
session_start();
require_once 'include/connect.php';
require_once 'include/function_upload.php';
if (!$_SESSION['id_coop']) {
  header("Location: ../index.php");
  }
?>
<?php 
extract($_GET);
if(isset($id) AND $supprimer==true) {
  $update="update article set quantite=0 where id_article='$id'";
  $true=mysql_query($update)or die (mysql_error());
  if ($true) { ?>
      <script type="text/javascript">
        alert("Produits Supprimé Avec Succès");
      </script>
<?php
} 
}
?>
<?php extract($_POST);
if(isset($ajouter)){
$path="C:\wamp\www\cooperative\Images\ ";
$path1=trim($path);
$img=upload_img($path1, "image");
?>
 <script type="text/javascript">
  alert("Produit Ajouter");
</script>
<?php 
        if(isset($perso))
          $perso = 1;
        else
          $perso = 0;
        try{
              $req = $conn->prepare('INSERT INTO article(id_categorie, id_vendeur,nom, image, prix, caracteristique,description, quantite,personalisable, etat) VALUES(:categorie, :vendeur, :nom, :image, :prix, :caracteristique, :description, :quantite, :personalisable, :etat)');
              $req->execute(array(
                              'categorie' => $categorie,
                              'vendeur' => $_SESSION['id_coop'],
                              'nom' => $nom,
                              'image' => "images/".$img,
                              'prix' => $prix,
                              'caracteristique' => $caracteristique,
                              'description' => $description,
                              'quantite' => $quantite,
                              'personalisable' => $perso,
                              'etat' => 1
                    ));
            }
        catch(PDOException $e)
        {
             echo /*$sql . "<br>" .*/ $e->getMessage();
        } 
        if($req)
        { 
          ?>
<script type="text/javascript">
  alert("Produit Ajouter");
  document.location.href="GestionProduit.php";
</script>
        <?php } 
        else echo "NOOOOn";
      }
?>
<?php extract($_POST);
if(isset($restau) AND !empty($check)) {
for ($i = 0; $i < count($check); $i++)
{
  $update="update article set quantite=1 where id_article='$check[$i]'";
  $true=mysql_query($update)or die (mysql_error());
}
if($true){
?>
<script type="text/javascript">
  alert("Produit Restauré Avec Succes");
</script>
<?php
} 
else echo "ERREUR";
}
if(isset($supp) AND !empty($check)) {
for ($i = 0; $i < count($check); $i++)
{
$update="delete from article where id_article='$check[$i]'";
$true=mysql_query($update)or die (mysql_error());
if ($true) { ?>
<script type="text/javascript">
  alert("Produit Supprimés Avec Succes");
</script>
<?php
}
else echo "ERREUR";
}
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion des Prodtuis</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="styleAdmin.css">
  <script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js.js"></script>

</head>
<body>
<!--   HEADER -->
<?php include("headerAdmin.php"); ?>

<!-- *********** Configuration Generale ************* -->
<div class="col-md-2 ">

</div> 
 <!-- ====>fin panel -->
 <!-- ********* Fin de configuration Genrale *********** -->
 <div class="col-md-9">
  <div class="container-fluid row"><!--  ==> Ramasse tous le Bloc -->
   <div class="row">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Gestion des Produits</h3>
      </div>  
      <div class="panel-body">

        <ul class="nav nav-pills nav-justified admin-menu">
          <li class="active"><a href="#" data-target-id="Ajouter"><i class="fa fa-home fa-fw"></i>Ajouter Un Produit</a></li>
          <li><a href="" data-target-id="Modifier"><i class="fa fa-list-alt fa-fw"></i>Modifier/ Supprimer Un Produit</a></li>
          <li><a href="" data-target-id="Supprimer"><i class="fa fa-file-o fa-fw"></i>Produits Supprimés</a></li>
        </ul>

        <!-- ***************** Ajouuuuuuuuuuuuuuterrr ************ -->

        <div class="col-md-12 well admin-content " id="Ajouter">
         <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
          <fieldset>
           <div class="col-md-6">
            <div class="alert alert-info" role="alert">
              <center>INFORMATIONS GENERALES</center>
            </div>
            <div class="panel panel-success">
              <div class="panel-body">
                <!-- ******* INPUT 1 nom***** -->
                <div class="form-group">
                 <label class="col-sm-3 control-label" for="nom">Nom</label>
                 <div class="col-sm-9">
                  <input type="text" placeholder="Entre Votre Nom" class="form-control" id="nom" name="nom">
                </div>
              </div>
              <!-- ******* INPUT Categorie ***** -->
              <div class="form-group">
                <label for="categorie" class="col-sm-3 control-label">Categorie</label>
                <div class="col-sm-9">
                   <?php 
                    $sql="select * from categorie";
                    $data=mysql_query($sql); ?>
                  <select class="form-control" name="categorie">
                <?php while($c=mysql_fetch_array($data)) { ?>
                <option value="<?php echo $c["id_categorie"]; ?>"><?php echo $c["categorie"]; ?></option>
                <?php } ?>
                 </select>      
                </div>
              </div>
              <div class="form-group">
               <label for="image1" class="col-sm-3 control-label">Image </label>
               <div class="col-sm-9">
                 <input type="file" id="image1" name="image" >
               </div>
             </div>
          <!--    ******* input Quantité ****** -->
          <div class="form-group">
           <label class="col-sm-3 control-label" for="quantité">Quantité</label>
           <div class="col-sm-9">
             <input type="number"  class="form-control" id="quantite" name="quantite">
           </div>
         </div>
         <!--    ******* priv tva ****** -->
          <div class="form-group">
           <label class="col-sm-3 control-label" for="prix">Prix TTC</label>
           <div class="col-sm-9">
            <input type="number" placeholder="Prix TTC" class="form-control" id="prix" name="prix">
          </div>
          </div>
          <div class="form-group">
           <label class="col-sm-3 control-label" for="perso">Personalisable</label>
           <div class="col-sm-3">
            <input type="checkbox" class="form-control" id="perso" name="perso">
          </div>
          </div>
    </div> <!-- ======> Div Panel -->
  </div>  <!-- ======> Div Header Panel -->
</div> <!-- ===== div 6 a GAUCH -->
<!-- ************* DESCRIPTIONS ET CARATCTERISTIQUES ************* -->
<div class="col-md-6">
  <div class="alert alert-info" role="alert">
    <center>DESCRIPTIONS ET CARATCTERISTIQUES</center>
  </div>
  <div class="panel panel-success">
    <div class="panel-body">
      <!-- ******* INPUT 1 DETAILS***** -->
      <div class="form-group">
       <label class="col-sm-4" for="description">Description:</label><br>
       <div class="col-sm-10 col-sm-offset-2">
        <textarea class="form-control" rows="3" name="description"></textarea>
      </div>
    </div>
    <!-- ******* INPUT 1 Caracteristique***** -->
    <div class="form-group">
     <label class="col-sm-4" for="caracteristique">Caracteristique:</label><br>
     <div class="col-sm-10 col-sm-offset-2">
      <textarea class="form-control" rows="3" name="caracteristique"></textarea>
    </div>
  </div>
</div> <!-- Diiiv panel  DROIT-->
</div>  <!-- diiv panel header -->
</div> <!--   Diiiv md 6 -->
<div class="form-group">
  <div class="col-sm-12">
    <center>
      <button type="submit" class="btn btn-success">Annuler</button>
      <button type="submit" class="btn btn-success" name="ajouter">Ajouter</button>
    </center>
  </div>
</div>
</fieldset>
</form>
</div><!-- ====> div fin 12 col-md  Ajooouuteer -->
<!--  *************  Modifer Un Produite *************** -->
<div class="col-md-12 well admin-content" id="Modifier">
         <div class="panel panel-success">
                <div class="panel-body">
<!-- ****** InPUT Info Promo ******* -->
<form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
<fieldset>
       <!-- ******* SELECTE  MARQUE ET CATEORIE ***** -->
<div class="form-group">
<div class="table-responsive">
      <table class="table table-striped table-hover table-bordered" id="tab_logic">
     <thead>
      <tr>
       <th class="text-center">
          #
        </th>
        <th class="text-center">
          image
        </th>
        <th class="text-center">
          nom
        </th>
          <th class="text-center">
          quantite
        </th>
         <th class="text-center">
          prix_TTC
        </th>
        <th class="text-center">
          Personalisable
        </th>
        <th class="text-center">
          etat
        </th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql="select * from article where quantite>=1";
      $data=mysql_query($sql);
      while($a=mysql_fetch_array ($data)) {;?>
        <tr>
        <td width=190>
        <a class="btn btn-success" href="modifier_Prod.php?id=<?php echo $a['id_article']; ?>"> 
          Modifer
        </a>
        <a class="btn btn-danger" href="GestionProduit.php?supprimer=true&id=<?php echo $a['id_article']; ?>"> 
          Supprimer
        </a>
        </td>
        <td>
        <img width=100 src="../<?php echo $a['image']; ?>">
        </td>
           <td>
              <?php echo $a["nom"]; ?>
          </td>
           <td >
              <?php echo $a["quantite"]; ?>
          </td>
           <td >
              <?php echo $a["prix"]; ?>
          </td>
          <td >
              <?php if($a['personalisable'] == 1) echo "Oui";
                    else echo "Non"; ?>
          </td>
           <td >
              <?php if($a['etat'] == 1) echo "Validé";
                    elseif ($a['etat'] == 2) echo "En cours";
                    else echo "Annulée"; ?>
          </td>
        </tr>
      <?php }; ?>
   
    </tbody>
    </table>    
  </div>
<!--  *************Taaable Des Produit Choisis ******** -->
</fieldset>   
  </div> 
 </div>
</div> <!-- fin div class="col-md-12 well MODIFIER  -->
<!-- Debut div class="col-md-12 well Supprimer  -->
<div class="col-md-12 well admin-content" id="Supprimer">
 <div class="panel panel-success">
  <div class="panel-body">
<!-- ****** InPUT Info Promo ******* -->

  <form class="form-horizontal" role="form" method="POST" action="">
       <!-- ******* SELECTE  MARQUE ET CATEORIE ***** -->
<!--  *************Taaable Des Produit Choisis ******** -->
    <p>
     <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Nom</th>
                  <th>image</th>
                  <th>Categorie</th>
                  <th>Quantité</th>
                  <th>description</th>
                  <th>Caractéristique</th>
                  <th>Prix</th>
                 </tr>
          </thead>
          <tbody>
        <?php 
        $sql="select * from article,categorie where article.id_categorie=categorie.id_categorie AND quantite=0";
        $data=mysql_query($sql);
        while($a=mysql_fetch_array($data)) { ?>
               <tr>
                <td><input type="checkbox" name="check[]" value="<?php echo $a["id_article"]; ?>"></td>
                <td><?php echo $a["nom"]; ?></td>
                <td><img width=100 src="../<?php echo $a['image'];?>"></td>
                <td><?php echo $a["categorie"]; ?></td>
                <td><?php echo $a["quantite"]; ?></td>
                <td><?php echo $a["description"]; ?></td>
                <td><?php echo $a["caracteristique"]; ?></td>
                <td><?php echo $a["prix"]; ?></td>
              </tr>          

          <?php } ?>
          </tbody>
      </table>
    </div>
  </p>
<center>
<button type="submit" class="btn btn-success" name="restau">Restaurer</button>
<button type="submit" class="btn btn-success" name="supp">Supprimer</button>
</center>
</form>
</div> 
</div>
</div>
</div>
</div>
</div>
</div>
</div><!-- ===> col-md-9 -->
</body>
</html>





