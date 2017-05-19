<?php

function existeMotCleLieu($idmc, $idl){
  //données : mot cle
	//pré : lib: String
	//résultat : id du mot cle s'il existe, NULL sinon
	//post : idmotcle : entier >0 ou NULL
  global $db;
	try{
		$req=$db->prepare('SELECT idmotcle FROM possede_mc WHERE idmotcle=? AND idlieu=? ');
		$req->execute(array($idmc, $idl));
		$idmotcle=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence du mot cle dans la table " );
}
		return $idmotcle[0];

}



 ?>
