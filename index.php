<?php 
include 'utils.php'; 
$data=Utils::getAll("produit");
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
  <body >
  <div class="container">
  <table class="table table-condensed table-striped">
    <tr>
      <td>id</td>
      <td>libellé</td>
      <td>prix</td>
      <td>actions</td>
    </tr>
    <?php foreach ($data as $c => $v): ?>
       <tr>
      <td><?= $v->id; ?></td>
      <td><?= $v->libelle; ?></td>
      <td><?= $v->prix; ?></td>
      <td><a href="c.php?t=produit&a=show&id=<?= $v->id; ?>" class="btn btn-sm btn-success">
        Consulter
      </a>
      <a href="c.php?t=produit&a=edit&id=<?= $v->id; ?>" class="btn btn-sm btn-warning">Editer</a>
      <a href="c.php?t=produit&a=delete&id=<?= $v->id; ?>"  class="btn btn-sm btn-danger" onclick="return confirm('supprimer ?')" >Supprimer</a></td>
    </tr>
    <?php endforeach ?>
   
  </table>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>