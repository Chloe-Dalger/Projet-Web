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

function creerMotCleLieu($idlieu, $idmotcle){
	//donnée : libellé du mot clé
	//pré : lib : String & length(lib)>0
	//résultat : ajout du mot cle dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO possede_mc(idlieu, idmotcle) VALUES (?,?)');
		$req->execute(array($idlieu, $idmotcle);
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion du mot cle dans la base de données " );
}

}

function supprimerMotCleLieu($id){
  //donnée : id du mot cle à supprimer
	//pré : idmotcle: entier >0
	//résultat : suppression du mot cle de la base de données
  global $db;
  try{
    $req=$db->prepare('DELETE FROM possede_mc WHERE idmotcle=:id OR idlieu=:id');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du mot cle dans la base de données " );
  }
}



 ?>
