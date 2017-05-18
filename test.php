
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Bienvenue</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="accueil.css">
<link rel="stylesheet" href="navbar.css">

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <form methode=post action="accueil.controller.php">

<select name="region" id="region">
                  <?php
                      foreach ($regions as $region){
                        echo '<option value="'.$region['id'].'">'.$region['nomregion'].'</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
                      }
                  ?>
</select>


</form>

</body>

</html>
