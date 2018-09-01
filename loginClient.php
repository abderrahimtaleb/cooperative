<?php
session_start();
  require_once 'connect.php';
?>
<?php
if($_SESSION['id_user']){
echo '<script type="text/javascript">document.location.href="index.php"</script>';
}
?>
<?php    
extract($_POST);
if(!$_SESSION['id_user']){
if(isset($do))
{
    if(isset($email) and isset($pass))
    {  $email=htmlspecialchars($email);
       $pwd=htmlspecialchars($pass);
       //$pwd=md5($pass);
       $req = $conn->prepare("SELECT * FROM utilisateur WHERE email = '$email' AND pass = '$pwd'");
          
     $req->execute();
     $user = $req->fetch(PDO::FETCH_ASSOC);
     if($user)
     {
         $_SESSION['id_user'] = $user['id_utilisateur'];
         $_SESSION['nom'] = $user['nom_ut'];
         $_SESSION['prenom'] = $user['prenom'];
         $_SESSION['email'] = $user['email'];
         $_SESSION['pass'] = $user['pass'];
         $_SESSION['usernamre'] = $user['usernamre'];
         $_SESSION['ville'] = $user['ville'];
         $_SESSION['sexe'] = $user['sexe'];
         $_SESSION['adresse'] = $user['adresse'];
         // landing page après l'authentif
         echo '<script type="text/javascript">document.location.href="index.php"</script>';
         exit();
     }
     else
     {
      echo'<script> alert("Email ou mot de passe est incorrect !")</script>';
     }
  }else
   {
       //echo '<script type="text/javascript">document.location.href="index.php"</script>';    
   }
  }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>E-commerce page</title>  
</head>
<body>
      <?php include("header.php"); ?>
  <div class="container">
    <div class="row">
      <!--1er paneeel-->
      <div class="col-md-6 ">
        <div class="panel panel-success">
          <div class="panel-heading">Creer Votre Compte</div>
          <div class="panel-body">
            <form method="post" action="registreClient.php">
              <h4><span class="label label-info">Saisez votre adress e-mail pour crée votre compte.</span></h4><br/>
              <!--Email address input-->
              <div class="form-group has-success">
                <label for="email">Adress email</label>
                <input type="email" class="form-control" id="email" placeholder="Votre email" name="email" required>
              </div>
              <!--button Créer Votre Compte-->
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="pull-right">
                    <button type="submit" name="submit" class="btn btn-success">Nouveaux clients</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div> 
      </div>
      <!--2eme Panelle--> 
    <div class="col-md-6 ">
 <div class="panel panel-success">
          <div class="panel-heading">Clients enregistrés</div>
          <div class="panel-body">
            <form method="post" action="">
              <!--email input-->
              <div class="form-group has-success">
                <label for="exampleInputEmail1">Adress email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
              </div>
              <!--Password input-->
              <div class="form-group has-success">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
              </div>
              <!--button Identifez-vous-->
              <div class="form-group">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-success" name="do">Identifer-Vous</button>
                    </div>
              </div>
              <!--Mot de Passe oublié-->
              <p><a href="mot_pass_oublier.php">Mot de Passe oublié?</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
   <?php include("footer.php"); ?>
  <script src="assets/js/jquery-1.10.2.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
