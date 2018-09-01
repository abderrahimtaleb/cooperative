<?php 
session_start();
require_once '../connect.php' ;
require_once 'include/function_upload.php' ;

/*if (!$_SESSION['id_coop']) {
header("Location: ../index.php");*/
}

extract($_GET);
if (isset($id)) {
$query="Select * from article,categorie where categorie.id_categorie=article.id_categorie AND id_article=$id ";
$data=mysql_query($query)or die (mysql_error());
}
?>
<?php extract($_POST);
if (isset($valider)) {
$path="C:\wamp\www\cooperative\images\ ";
$path1=trim($path);
$img=upload_img($path1,"image");
if(isset($perso)) $perso = 1;
else $perso = 0;
if(!empty($img)){
$update = "update article set nom='$nom',image='images/$img',id_categorie='$cat',prix='$prix',description='$description',caracteristique='$caracteristique',quantite='$quantite',personalisable = '$perso' where id_article='$id'";
}else {
$update = "update article set nom='$nom',id_categorie='$cat',prix='$prix',description='$description',caracteristique='$caracteristique',quantite='$quantite', personalisable = '$perso' where id_article='$id'";
}
$true=mysql_query($update)or die (mysql_error());
if($true)
{
?>
<script type="text/javascript">
alert("Produit Modifier");
document.location.href="GestionProduit.php"
</script>
<?php }
else echo "NOOOOn";}
?>
<?php extract($_POST);
if(isset($restau) AND !empty($check)) {
for ($i = 0; $i < count($check); $i++)
{
$condition="id_article=$check[$i]";
$d=array(
'quantite' => 1,);
if($article->update($d,$condition)) {
?>
<script type="text/javascript">
alert("Produit Restauré Avec Succes");
</script>
<?php
} else echo "ERREUR";
}
}
if(isset($supp) AND !empty($check)) {
for ($i = 0; $i < count($check); $i++)
{
$article->delete("id_article=$check[$i]");
}
?>
<script type="text/javascript">
alert("Produits Supprimé Avec Succes");
</script>
<?php
}?>
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
<div class="col-md-3 ">
<div class="panel panel-success">
<div class="panel-heading">
<h3 class="panel-title">les Outils</h3>
</div>
<div class="panel-body">
<?php include ('sidebar.php');?>
</div>
</div>
</div> 
<!--  ***** FIN SIDE BAR  -->
<!-- ====>fin panel -->
<!-- ********* Fin de configuration Genrale *********** -->
<div class="col-md-9">
<div class="container-fluid row"><!--  ==> Ramasse tous le Bloc -->
<div class="row">
<div class="panel panel-success">
<div class="panel-heading">
<h3 class="panel-title">Modifier Un Produit</h3>
</div>  
<div class="panel-body">
<!--  *************  Modifer Un Produite *************** -->
<div class="col-md-12 well admin-content">
<div class="panel panel-success">
<div class="panel-body">
<form role="form" method="post" action="" enctype="multipart/form-data">
<table class="table table-bordered table-hover table-sortable" id="tab_logic">
<thead>
<tr>
<th class="text-center">
Nom
</th>
<th class="text-center">
Categorie
</th>
<th class="text-center">
Image
</th>
<th class="text-center">
Quantité
</th>
<th class="text-center">
Description
</th>
<th class="text-center">
Caracteristique
</th>
<th class="text-center">
Prix TTC
</th>
<th class="text-center">
Personnalisable
</th>
</tr>
</thead>
<?php $a=mysql_fetch_array($data) ;?>
<tbody>
<tr>
<td data-name="name">
<input type="hidden" name="id" value="<?php echo $a["id_article"];?>">
<input type="text" name="nom" class="form-control" value="<?php echo $a["nom"];?>">
</td>
<td>
<?php 
$sql="select * from categorie";
$dt=mysql_query($sql); ?>
<?php echo $a["categorie"];?>
<select class="form-control" name="cat" id="cat">>
<?php while($c=mysql_fetch_array($dt)) { ?>
<option value="<?php echo $c["id_categorie"]; ?>"><?php echo $c["categorie"]; ?></option>
<?php } ?>
</option>
</select>
</td>
<td><img width=100 src="../<?php echo $a['image'];?>">
<input type="file" name="image" >
</td>
<td >
<input type="text" name="quantite" class="form-control" value="<?php echo $a["quantite"];?>">
</td>
<td >
<textarea class="form-control" rows="4" name="description">
<?php echo $a["description"];?>
</textarea>
</td>
<td >
<textarea class="form-control" rows="4" name="caracteristique">
<?php echo $a["caracteristique"];?>
</textarea>
</td>
<td >
<input type="text" name="prix" class="form-control" value="<?php echo $a["prix"];?>">
</td>
<td >
<input type="checkbox" name="perso" class="form-control" <?php if($a['personalisable']==1) echo "checked";?>>
</td>
</tr>
</tbody>
</table>
<center><button type="submit" class="btn btn-primary"  name="valider" >Valider</button>
</center>
</form>;     
</div> 
</div>
</div> <!-- fin div class="col-md-12 well MODIFIER  -->
</div>
</div>
</div>
</div>
</div><!-- ===> col-md-9 -->
</body>
</html>