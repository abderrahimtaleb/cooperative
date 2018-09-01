<!DOCTYPE html>
<html>
<head>
  <title>Header admin</title>
</head>
<body>
 <div class="header">
  <div id="top-nav" class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
        </button>
        <a class="navbar-brand" href="AcAdmin.php">Panneau De Configuration</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
              <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['nom_coop'];
               ?> <span class="caret"></span></a>
              <ul id="g-account-menu" class="dropdown-menu" role="menu">
                <li><a href="../index.php"><i class="glyphicon glyphicon-th-list"></i> Page Principal</a></li>
                <li><a href="../logout.php"><i class="glyphicon glyphicon-lock"></i> Se deconnecter</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /container -->
    </div>
  </div> 
</body>
</html>



