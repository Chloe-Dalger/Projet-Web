<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Lieu</title>
		<link rel="stylesheet" href="../view/css/affichagedulieu.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>

		​<div class='wrapper_body'>
		     <div class='cbm_wrap '>
					<h1><?php echo $nom;?></h1>
		     <img src='<?php echo $urllieu;?>'>
		     <p><?php echo $deslieu;?></p>
		     <br />
				 <p><?php echo $adrlieu.', '.$cpville.' '.$nomville;?></p><br/>
		     <a><u><?php echo $pseudo; ?></u></a>

		     </div>
		</div>

	</body>
</html>
