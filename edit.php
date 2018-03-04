<?php 
include 'utils.php';
extract($_GET);
$ligne=Utils::getById($t, $id);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
<div class="container">
  <div class="col-md-6 center-block" style="float: none;">
    <form class="form-horizontal" action="c.php?t=produit&a=update&id=<?=$id ?>" method="post">
<fieldset>

<!-- Form Name -->
<legend>Modification</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="libelle">Libellé :</label>  
  <div class="col-md-4">
  <input id="libelle" name="libelle" placeholder="" class="form-control input-md" required="" type="text" value="<?=$ligne->libelle ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prix">Prix</label>  
  <div class="col-md-4">
  <input id="prix" name="prix" placeholder="0" class="form-control input-md" required="" type="text" value="<?=$ligne->prix ?>">
  <span class="help-block">En dhs</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">valider</button>
  </div>
</div>

</fieldset>
</form>


  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>