<?php




function getLibelleMotCle($id){

  global $db;
  try{
    $req=$db->prepare('SELECT libmotcle FROM mot_cle WHERE idmotcle=?');
    $req->execute(array($id));
		$libmotcle=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du mot cle dans la base de données " );
		}
    return $libmotcle[0];
}


function getIdMotCle($nom){

  global $db;
  try{
    $req=$db->prepare('SELECT idmotcle FROM mot_cle WHERE libmotcle=?');
    $req->execute(array($nom));
		$idmotcle=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du mot cle dans la base de données " );
		}
    return $idmotcle[0];
}

function supprimerMotCle($id){

  global $db;
  try{
    $req=$db->prepare('DELETE FROM mot_cle WHERE idmotcle=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du mot cle dans la base de données " );
  }
}

function creerMotCle($lib){
	//donnée : nom de compte, mot de passe crypté, nom et prénom de l'admin
	//pré : nomdeCompte,mdp,nom,prenom : String
	//résultat : ajout de l'admin dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO mot_cle(libmotcle) VALUES (?)');
		$req->execute(array($lib);
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion du mot cle dans la base de données " );
}

}

function getAllMotCle(){
	//données : id de l'admin
	//pré : idAdmin : entier > 0
	//résultat : tous les admins autres que celui passé en paramètre
	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM mot_cle');
  		$req->execute(array());
  		$Listemotcle=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des mots cles dans la base de données " );
  }
      return $Listemotcle;
  }




  function modifLibMotCle($id,$newlib){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
	//pré : idAdmin : entier > 0 / newMdp : String
	//résultat : modifie le mot de passe actuel avec le nouveau mdp
  global $db;
	try{
		$req=$db->prepare('UPDATE mot_cle SET libmotcle= :newlib WHERE idmotcle=:id');
		$req->execute(array(
			'newlib' => $newlib,
			'idmotcle' => $id
		));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du mot cle dans la table " );
}
}


function existeMotCle($lib){
	//données : email et mot de passe crypté de l'admin
	//pré : email : String / password : String
	//résultat : id de l'admin s'il existe, NULL sinon
	//post : id : entier >0
  global $db;
	try{
		$req=$db->prepare('SELECT idmotcle FROM mot_cle WHERE libmotcle=?');
		$req->execute(array($nom));
		$idmotcle=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence du mot cle dans la table " );
}
		return $idmotcle[0];

}
 ?>
