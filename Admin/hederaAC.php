<?php 
require_once 'include/cat_up.php' ;
?>


<?php 
extract($_POST);

if(isset($ajcat)){
$path="C:\wamp\www\mini_projet\catalogue\ ";
$path1=trim($path);
upload_img($path1, "catalogue");

echo "Catalogue Bien Ajouter";
}

?>

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
              <i class="glyphicon glyphicon-user"></i> Administration <span class="caret"></span></a>
              <ul id="g-account-menu" class="dropdown-menu" role="menu">
                <li><a href="../index.php"><i class="glyphicon glyphicon-th-list"></i> Page Principal</a></li>
                <li><a href="../logout.php"><i class="glyphicon glyphicon-lock"></i> Se deconnecter</a></li>
                 <li data-toggle="modal" data-target="#catal"><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Catalogue</a></li>
                 <div class="modal fade modal" tabindex="-1" id="catal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header modal-header-info">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <center><h4 class="modal-title" style="color:yellowgreen;"><span class="glyphicon glyphicon-envelope" ></span> Catalogue</h4></center> 
                  </div>
                  <div class="modal-body">
                    <form role="form" class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <center class="list-group-item list-group-item-success">Ajoutez Le catalogue</center>
                       <br>
                    </div>

                        <div class="col-md-8">
                          <input type="file" class="form-control" name="catalogue">
                        </div>
                        <div class="col-md-4">
                          <center> <button type="submit" class="btn btn-success" name="ajcat"> Ajouter</button> </center>
                         
                        </div>
                           
                      </div>  
                   </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal compose message -->

              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /container -->
    </div>
  </div> 
</body>
</html>



