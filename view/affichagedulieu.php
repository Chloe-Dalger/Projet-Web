<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Lieu</title>
		<!-- Toutes les librairies/CSS/JS utiles à la mise en page et aux fonctionnalités de la page -->
		<link rel="stylesheet" href="../view/css/affichagedulieu.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


	</head>
	<body>
		<!-- Navbar de la page -->
<?php include('navbar.php');?>

		<!--  -->
		​<div class='wrapper_body'>
		     <div class='cbm_wrap '>
					<h1><?php echo $nom;?></h1>
		     <img src='<?php echo $urllieu;?>'>
		     <p style="font-size:12px"><?php echo $deslieu;?></p>
		     <br />
				 <p><?php echo $adrlieu.', '.$cpville.' '.$nomville;?></p><br/>
		     <a><u><?php echo $pseudo; ?></u></a>
				 <!-- Lorsque l'on appui sur le lien le javascript prend la trouver explication sur internet -->
				 <a href="javascript:history.go(-1)">Retour</a>

		     </div>

				 <br />
				 <!-- Bouton pour aller sur la page de modification du lieu  -->
	 			<div style="display= block">
	 			<div class="input-group" >
	 				<?php echo '<a href="modifier-'.$nom.'">';?>
	 				  <button type="button" class="btn btn-info">Modifier</button></a>


	 			</div>


	 					 <br />
						 <!-- Formulaire pour supprimer le lieu avec besoin de mot de passe -->
						<form action="supprimer-<?php echo $nom;?>" method="post">
	 					 <div class="input-group">

	 						 <input type="password" placeholder="Entrez le mot de passe..." name="psw" id="urlim">
							 <input class="btn btn-danger"type="submit" value="Supprimer">
	 					 </div>
					 </form>
	 						</div>

			</div>






	</body>
</html>
