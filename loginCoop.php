<?php
  session_start();
  require_once 'connect.php';
?>
<?php    
extract($_POST);
if(!$_SESSION['id_coop']){
  if(isset($do))
  {
      if(isset($email) and isset($pass))
      {  $email=htmlspecialchars($email);
         $pwd=htmlspecialchars($pass);
         //$pwd=md5($pass);
         $req = $conn->prepare("SELECT * FROM vendeur WHERE email = '$email' AND password = '$pwd'");
            
       $req->execute();
       $user = $req->fetch(PDO::FETCH_ASSOC);
       if($user)
       {
           $_SESSION['id_coop'] = $user['id_vendeur'];
           $_SESSION['nom_coop'] = $user['nom_cooperative'];
           $_SESSION['usernamre'] = $user['usernamre'];
           $_SESSION['email'] = $user['email'];
           $_SESSION['pass'] = $user['password'];
           $_SESSION['ville'] = $user['ville'];
           $_SESSION['tele1'] = $user['telephone_1'];
           $_SESSION['email_paypal'] = $user['paypal_email'];
           // landing page après l'authentif
           echo '<script type="text/javascript">document.location.href="Admin/GestionProduit.php"</script>';
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
            <form method="post" action="registreCoop.php">
              <h4><span class="label label-info">Saisez votre adress e-mail pour crée votre compte.</span></h4><br/>
              <!--Email address input-->
              <div class="form-group has-success">
                <label for="exampleInputEmail2">Adress email</label>
                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email" name="mail">
              </div>
              <!--button Créer Votre Compte-->
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-success">Nouvelle coopérative</button>
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
          <div class="panel-heading">Coopératives enregistrées</div>
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
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
