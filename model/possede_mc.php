<?php


function creerMotCle($idl, $idmc){
  //donnée : nom du mot clé
  //pré : nom : String & length(nom)>0
  //résultat : ajout du mot cle dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO possede_mc(idlieu, idmotcle) VALUES (?, ?)');
		$req->execute(array($idl, $idmc));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion de la region dans la base de données " );
}

}


 ?>
