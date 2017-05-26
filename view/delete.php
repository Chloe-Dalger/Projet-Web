<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Modification du lieu</title>
<!--  Toutes les librairies/CSS/JS nécessaire à la mise en page et aux fonctionnalités de la page-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <link href="../view/css/ajoutlieu.css" rel="stylesheet">

<?php include('navbar.php');?>

  <body>
    <div class="container">
      <div class="row">
            <div class="col-md-6" >
            <h1 style="margin-top:100px">Supprimer un lieu</h3>
              <!--  Affiche le message du controleur s'il existe-->

                <h3 style="margin-top:20px"><b><?php echo $message;?></b></h3>

                   <a class="text-align:center;" href="javascript:history.go(-1)">Retour</a>




            </div>
      </div>
    </div>
  </body>

  </html>
