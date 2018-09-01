<?php
session_start();
require_once 'connect.php';
?>
<?php
if ($_SESSION['id_user']) { 
echo '<script type="text/javascript">document.location.href="index.php";</script>';} 
?>
<?php 

extract($_POST);
if(isset($do)) {
  
  $email = test_longueur(test_existance($email),30);
  $req = $conn->prepare("SELECT email FROM vendeur"); 
  $req->execute();
  while ($emails = $req->fetch(PDO::FETCH_ASSOC)) {
    if($email == $emails['email'])
    {
      echo '<script type="text/javascript">alert("email déja utilisé, essayez avec un autre!!");</script>';
      echo '<script type="text/javascript">document.location.href="registreCoop.php";</script>';
      exit();
    }
  }

  $nom = test_longueur(test_existance($nom),20);
  $login = test_longueur(test_existance($login),20);
  $email_paypal = test_longueur(test_existance($email_paypal),20);
  $pass = test_longueur(test_existance($pass),100);
  $pass1 = test_longueur(test_existance($pass1),100);
  $tele1 = test_longueur(test_existance($tele1),18);
  $tele2 = test_longueur(test_existance($tele2),18);
  $adresse = test_longueur(test_existance($adresse),255);
  $ville = test_longueur(test_existance($ville),30);
  $cp = test_existance($cp);
  $chek = test_existance($chek);
 if(!$nom OR !$adresse OR !$pass OR !$email OR !$email_paypal OR !$tele1 OR !$tele2 OR !$cp OR !$ville OR !$chek)
    { 
      echo '<script type="text/javascript">document.location.href="registreCoop.php";</script>';
    exit();
   }
   

    if($conn)
    {
      $req = $conn->prepare('INSERT INTO vendeur(nom_cooperative, adresse, code_postal, ville, telephone_1, telephone_2, email, username, password, paypal_email) VALUES(:nom_cooperative, :adresse, :code_postal, :ville, :tele1, :tele2, :email, :login, :pass, :email_paypal)');

        $req->execute(array(
              'nom_cooperative' => $nom,
              'adresse' => $adresse,
              'code_postal' => $cp,
              'ville' => $ville,
              'tele1' => $tele1,
              'tele2' => $tele2,
              'email' => $email,
              'login' => $login,
              'pass' => $pass,
              'email_paypal' => $email_paypal
        ));
    }

    echo '<script type="text/javascript">document.location.href="loginCoop.php";</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Inscriez-Vous</title>
  
</head>
<body>
     <?php include("header.php"); ?>
  <div class="container">
    <div class="row well">
      <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal" role="form" method="post" action="">
          <fieldset>

            <!-- 1er Panel -->
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">Informations Coopérative</h3>
              </div>
              <div class="panel-body">
              <!-- nom input-->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="nom">Nom coopérative *</label>
                <div class="col-sm-8">
                  <input type="text" placeholder="Nom coopérative" class="form-control" id="nom" name="nom" required>
                </div>
              </div>
              <!-- email input-->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="email">Email *</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="email" placeholder="xxx@example.com" name="email" required>
                </div>
              </div>
              <!-- email input-->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="login">Login *</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="login" placeholder="Login coopérative" name="login" required>
                </div>
              </div>
              <!-- password input-->
              <div class="form-group">
                <label for="inputPassword1" class="col-sm-4 control-label">Password *</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputPassword1" placeholder="Password" name="pass" required>
                </div>
              </div>
              <!-- CPassword input-->
              <div class="form-group">
                <label for="inputPassword2" class="col-sm-4 control-label">Confirmer Password  *</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="pass1" required>
                </div>
              </div>
              
              <!-- Telehone input-->
              <div class="form-group">
                <label for="tele1" class="col-sm-4 control-label">Telephone 1 *</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="tele1" name="tele1" required placeholder="(+212) 6 78 65 78 45">
                </div>
              </div>
              <!-- Telehone input-->
              <div class="form-group">
                <label for="tele2" class="col-sm-4 control-label">Telephone 2</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="tele2" name="tele2" placeholder="(+212) 6 78 65 78 45">
                </div>
              </div>
              
              <!-- nom input-->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="adresse">Adresse coopérative *</label>
                <div class="col-sm-8">
                  <input type="text" placeholder="Adresse coopérative" class="form-control" id="adresse" name="adresse" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" for="email_paypal">Email paypal *</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="email_paypal" placeholder="xxx@example.com" name="email_paypal" required>
                </div>
              </div>
              <!--Code Postale && ville-->
              <div class="form-group">
                <label for="ville" class="col-sm-2 control-label">Ville</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="ville" name="ville" required placeholder="Ville">
                </div>
                <label for="cp" class="col-sm-3 control-label">Code Postale</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="cp" name="cp" required placeholder="Code postale">
                </div>
              </div>
              <!-- email_paypal input-->
            </div>
          </div>
        </div>
      </div>
      <!--2eme Panelle-->          
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Confidentialité des données Coopérative</h3>
        </div>
        <div class="panel-body">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="Oui" name="chek" required>
              En cliquant sur Inscription, vous acceptez nos Conditions 
              et indiquez que vous avez lu notre Politique d’utilisation des données.
            </label>
          </div>
          <span class="label label-info">* Champs Obligatoire</span>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" class="btn btn-success" name="do">S'inscrire</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </fieldset>
  </form>
</div><!-- /.col-lg-12 -->
</div><!-- /.row -->

</div>
     <?php include("footer.php"); ?>
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>