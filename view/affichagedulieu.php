<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Lieu</title>
		<link rel="stylesheet" href="../view/css/affichagedulieu.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="../view/css/navbar.css">

		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

	</head>
	<body>

		<ul>
			<li><a href="../controller/accueil_controller.php">Accueil</a></li>
			<li><a href="../controller/ajoutlieu_controller.php">Ajouter lieu</a></li>

		</ul>

		​<div class='wrapper_body'>
		     <div class='cbm_wrap '>
					<h1><?php echo $nom;?></h1>
		     <img src='<?php echo $urllieu;?>'>
		     <p style="font-size:12px"><?php echo $deslieu;?></p>
		     <br />
				 <p><?php echo $adrlieu.', '.$cpville.' '.$nomville;?></p><br/>
		     <a><u><?php echo $pseudo; ?></u></a>

		     </div>
		</div>

	</body>
</html>
