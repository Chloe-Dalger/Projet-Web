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









                        <h1 class="cover-heading">Trouve l'endroit de tes rêves</h1>
                        <p class="lead">Rentre la ville, choisi ta région et ton département et découvre les endroits à visiter!</p>
                        <form methode=post action="accueil.controller.php">


                                                <ul class="dropdown-menu" role="menu">
                                                    <select name="region" id="region">
                                                    									<?php
                                                    											foreach ($regions as $region){
                                                    												echo '<option value="'.$region['id'].'">'.$region['nomregion'].'</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
                                                    											}
                                                    									?>
                                                    </select>


                                                </ul>
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <span id="search_concept">Région</span> <span class="caret"></span>
                                                </button>
                        </form>


</html>


</html>
