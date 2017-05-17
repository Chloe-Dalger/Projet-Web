<?php

function getNomRegion($id){

  global $db;
  try{
    $req=$db->prepare('SELECT nomregion FROM region WHERE idregion=?');
    $req->execute(array($id));
		$nomregion=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom de la region dans la base de données " );
		}
    return $nomregion[0];
}




function getIdRegion($nomregion){

  global $db;
  try{
    $req=$db->prepare('SELECT idregion FROM region WHERE nomregion=?');
    $req->execute(array($nomregion));
		$idregion=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la region dans la base de données " );
		}
    return $idregion[0];
}

function supprimerRegion($id){

  global $db;
  try{
    $req=$db->prepare('DELETE FROM region WHERE idregion=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression de la region dans la base de données " );
  }

}

function creerRegion($nom){
	//donnée : nom de compte, mot de passe crypté, nom et prénom de l'admin
	//pré : nomdeCompte,mdp,nom,prenom : String
	//résultat : ajout de l'admin dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO region(nomregion) VALUES (?)');
		$req->execute(array($nom));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion de la region dans la base de données " );
}

}

function getAllRegion(){
	//données : id de l'admin
	//pré : idAdmin : entier > 0
	//résultat : tous les admins autres que celui passé en paramètre
	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM region');
  		$req->execute(array());
  		$Listeregion=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des regions dans la base de données " );
  }
      return $Listeregion;
  }

  function modifRegion($id, $newnom){
  	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
  	//pré : idAdmin : entier > 0 / newMdp : String
  	//résultat : modifie le mot de passe actuel avec le nouveau mdp
    global $db;
    try{
  		$req=$db->prepare('UPDATE region SET nomregion= :newnom WHERE idregion=:id');
  		$req->execute(array(
  			'newnom' => $newnom,
  			'idregion' => $id
  		));
  	} catch(PDOException $e){
  		echo($e->getMessage());
  		die(" Erreur lors de la modification du nom de region dans la table " );
  }
  }



function existeRegion($nom){
	//données : email et mot de passe crypté de l'admin
	//pré : email : String / password : String
	//résultat : id de l'admin s'il existe, NULL sinon
	//post : id : entier >0
  global $db;
	try{
		$req=$db->prepare('SELECT idregion FROM region WHERE nomregion=?');
		$req->execute(array($nom));
		$idregion=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence de la region dans la table " );
}
		return $idregion[0];

}










 ?>
