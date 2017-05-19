<?php

function existeMotCleLieu($idmc, $idlieu){
  //données : mot cle
	//pré : lib: String
	//résultat : id du mot cle s'il existe, NULL sinon
	//post : idmotcle : entier >0 ou NULL
  global $db;
	try{
		$req=$db->prepare('SELECT idmotcle FROM possede_mc WHERE idmotcle=? AND idlieu=? ');
		$req->execute(array($idmc, $idlieu));
		$idmotcle=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence du mot cle dans la table " );
}
		return $idmotcle[0];

}

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
