<?php

function getPseudo($id){

  global $db;
  try{
    $req=$db->prepare('SELECT pseudo FROM pseudo WHERE idpseudo=?');
    $req->execute(array($id));
		$pseudo=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du Pseudo dans la base de données " );
		}
    return $pseudo[0];
}




function getIdPseudo($pseudo){

  global $db;
  try{
    $req=$db->prepare('SELECT idpseudo FROM pseudo WHERE pseudo=?');
    $req->execute(array($pseudo));
		$idpseudo=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du pseudo dans la base de données " );
		}
    return $idpseudo[0];
}

function supprimerPseudo($id){

  global $db;
  try{
    $req=$db->prepare('DELETE FROM pseudo WHERE idpseudo=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du pseudo dans la base de données " );
  }

}

function creerPseudo($nom){
	//donnée : nom de compte, mot de passe crypté, nom et prénom de l'admin
	//pré : nomdeCompte,mdp,nom,prenom : String
	//résultat : ajout de l'admin dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO pseudo(nompseudo) VALUES (?)');
		$req->execute(array($nom));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion du pseudo dans la base de données " );
}

}

function getAllPseudo(){
	//données : id de l'admin
	//pré : idAdmin : entier > 0
	//résultat : tous les admins autres que celui passé en paramètre
	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM pseudo');
  		$req->execute(array());
  		$Listepseudo=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des pseudos dans la base de données " );
  }
      return $Listepseudo;
  }

  function modifPseudo($id, $newpseudo){
  	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
  	//pré : idAdmin : entier > 0 / newMdp : String
  	//résultat : modifie le mot de passe actuel avec le nouveau mdp
    global $db;
    try{
  		$req=$db->prepare('UPDATE pseudo SET pseudo= :newpseudo WHERE idpseudo=:id');
  		$req->execute(array(
  			'newpseudo' => $newpseudo,
  			'idpseudo' => $id
  		));
  	} catch(PDOException $e){
  		echo($e->getMessage());
  		die(" Erreur lors de la modification du pseudo de la categorie dans la table " );
  }
  }



function existePseudo($nom){
	//données : email et mot de passe crypté de l'admin
	//pré : email : String / password : String
	//résultat : id de l'admin s'il existe, NULL sinon
	//post : id : entier >0
  global $db;
	try{
		$req=$db->prepare('SELECT idpseudo FROM pseudo WHERE pseudo=?');
		$req->execute(array($nom));
		$idpseudo=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence de la categorie dans la table " );
}
		return $idpseudo[0];

}










 ?>
