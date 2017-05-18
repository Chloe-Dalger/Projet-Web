
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Bienvenu</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="accueil.css">
<link rel="stylesheet" href="navbar.css">

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <div class="body-search">
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                  <div class="cover-container">

                        <h1 class="cover-heading">Trouve l'endroit de tes rêves</h1>
                        <p class="lead">Rentre la ville, choisi ta région et ton département et découvre les endroits à visiter!</p>
                        <form methode=post action="accueil.controller.php">
                            <input list="browsers">
                                  <div class="input-group">

                                          <div class="input-group-btn search-panel">

                                                <ul class="dropdown-menu" role="menu">


                                                              <select name="region" id="region">
                                                                                <?php
                                                                                    foreach ($regions as $region){
                                                                                      echo '<option value="'.$region['idregion'].'">'.$region['nomregion'].'</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
                                                                                    }
                                                                                ?>
                                                              </select>


                                                  </ul>
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                <span id="search_concept">Région</span> <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                              <select name="depart" id="depart">
                                                                                <?php
                                                                                    foreach ($departs as $depart){
                                                                                      echo '<option value="'.$depart['iddep'].'">'.$depart['nomdep'].' ('.$depart['numerodep'].')</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
                                                                                    }
                                                                                ?>
                                                              </select>
                                                            </ul>
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                <span id="search_concept">Département</span> <span class="caret"></span>
                                                            </button>
                                                      </div>
                                                      <input type="hidden" name="search_param" value="all" id="search_param">
                                                      <input type="text" class="form-control" name="x" placeholder="Entrer ville...">
                                                      <span class="input-group-btn">
                                                          <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                                      </span>
                                                    </div>
                                      </form>
                            </div>
                        </div>
                    </div>
                  </div>

              </body>

            </html>



</html>
