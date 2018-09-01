<?php
session_start();
require_once 'connect.php';
?>
<?php
if ($_SESSION['id_user']) { 
  echo '<script type="text/javascript">document.location.href="index.php";</script>';
} 
?>
<?php     
extract($_POST);
if(isset($do)) {
  
  $email = test_longueur(test_existance($email),30);
  $req = $conn->prepare("SELECT email FROM utilisateur"); 
  $req->execute();
  while ($emails = $req->fetch(PDO::FETCH_ASSOC)) {
    if($email == $emails['email'])
    {
      echo '<script type="text/javascript">alert("email déja utilisé, essayez avec un autre!!");</script>';
      echo '<script type="text/javascript">document.location.href="registreClient.php";</script>';
      exit();
    }
  }

  $nom = test_longueur(test_existance($nom),20);
  $prenom = test_longueur(test_existance($prenom),20);
  $pass = test_longueur(test_existance($pass),100);
  $pass1 = test_longueur(test_existance($pass1),100);
  $tele = test_longueur(test_existance($tele),18);
  $adresse = test_longueur(test_existance($adresse),255);
  $pays = test_longueur(test_existance($pays),30);
  $ville = test_longueur(test_existance($ville),30);
  $cp = test_existance($cp);
  $chek = test_existance($chek);
  $sexe = test_existance($sexe);
  $date = test_longueur(test_existance($ddn),10);
  $testDate = preg_match('#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#', $date);
  if($testDate == 1)
  {
    list($annee, $mois, $jour) = explode('-', $date);
    $testDate = checkdate($mois,$jour,$annee);
  }
  else
  {
    $testDate = false;
  }
 if(!$nom OR !$prenom OR !$pass OR !$email OR !$tele OR !$adresse OR !$pays OR !$cp OR !$ville OR !$chek OR !$sexe OR !$testDate)
    { 
      echo '<script type="text/javascript">document.location.href="registreClient.php";</script>';
    exit();
   }
    
    if($conn)
    { 
      $req = $conn->prepare('INSERT INTO utilisateur(nom_ut, prenom, sexe, code_postal, ville, gsm, pays, email, pass, type, date_naissance, adresse) VALUES(:nom_ut, :prenom, :sexe, :code_postal, :ville, :gsm, :pays, :email, :pass, :type, :date_naissance, :adresse)');

      $req->execute(array(
                    'nom_ut' => $nom,
                    'prenom' => $prenom,
                    'sexe' => $sexe,
                    'code_postal' => $cp,
                    'ville' => $ville,
                    'gsm' => $tele,
                    'pays' => $pays,
                    'email' => $email,
                    'pass' => $pass,
                    'type' => 1,
                    'date_naissance' => $date,
                    'adresse' => $adresse
          ));
    }

    echo '<script type="text/javascript">document.location.href="loginClient.php";</script>';
      exit();
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
  <title>Inscriez-Vous</title>
  
</head>
<body>
     <?php include("header.php"); ?>
  <div class="container">
    <div class="row well">
      <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ; ?>">
          <fieldset>

            <!-- 1er Panel -->
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">Vos Informations Personnelles</h3>
              </div>
              <div class="panel-body">
               <!-- Civilité input-->
               <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput1">Civilite</label>
                <div class="col-sm-8" >
                  <label class="radio-inline">
                    <input type="radio" id="inlineRadio1" value="1" name="sexe" required> M
                  </label>
                  <label class="radio-inline">
                    <input type="radio"  id="inlineRadio2" value="0" name="sexe" required> Mme
                  </label>
                  <label class="radio-inline">
                    <input type="radio"  id="inlineRadio3" value="2" name="sexe" required> Melle
                  </label>
                </div>
              </div>

              <!-- nom input-->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput2">Nom *</label>
                <div class="col-sm-8">
                  <input type="text" placeholder="Entre Votre Nom" class="form-control" id="textinput2" name="nom" required>
                </div>
              </div>

              <!-- prenom input-->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput3">Prenom *</label>
                <div class="col-sm-8">
                  <input type="text" placeholder="Entre Votre Prenom" class="form-control" id="textinput3" name="prenom" required>
                </div>
              </div>
              <!-- Telehone input-->
              <div class="form-group">
                <label for="tele" class="col-sm-4 control-label">Telephone *</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="tele" name="tele" required>
                </div>
              </div>
              <!-- email input-->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="exampleInputEmail2">Email *</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="exampleInputEmail2" placeholder="xxx@example.com" value="<?php
                  if(isset($_POST['submit'])) echo $_POST['email'];?>" name="email" required>
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
                <label for="inputPassword2" class="col-sm-4 control-label">Confirm Password  *</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="pass1" required>
                </div>
              </div>
              <!-- Date input-->
              <div class="form-group">
                <label for="Date" class="col-sm-4 control-label">Date de naissance</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" placeholder="Text input" id="ddn" name="ddn" required>
                </div>
              </div>
              <!-- Pays input-->
              <div class="form-group">
                <label for="Date" class="col-sm-4 control-label">Adresse</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Votre Adresse" id="date" name="adresse" required>
                </div>
              </div>
              <!-- Pays input-->
              <div class="form-group">
                <label for="Date" class="col-sm-4 control-label">Pays</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Votre Pays" id="date" name="pays" required>
                </div>
              </div>
              
              <!--Code Postale && ville-->
              <div class="form-group">
                <label for="ville" class="col-sm-2 control-label">Ville</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="ville" name="ville" required>
                </div>
                <label for="CP" class="col-sm-3 control-label">Code Postale</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="CP" name="cp" required>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--2eme Panelle-->          
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Confidentialité des donnes Clients</h3>
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