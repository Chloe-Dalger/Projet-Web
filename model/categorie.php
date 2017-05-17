<?php




function getNomCategorie($id){

  global $db;
  try{
    $req=$db->prepare('SELECT nomcat FROM categorie WHERE idcat=?');
    $req->execute(array($id));
		$nomcat=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom de la Categorie dans la base de données " );
		}
    return $nomcat[0];
}



function getDesCategorie($id){

    global $db;
  try{
    $req=$db->prepare('SELECT descat FROM categorie WHERE idcat=?');
    $req->execute(array($id));
		$descat=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de la description de la Categorie dans la base de données " );
		}
    return $descat[0];
}


function getIdCategorie($nom){

  global $db;
  try{
    $req=$db->prepare('SELECT idcat FROM categorie WHERE nomcat=?');
    $req->execute(array($nom));
		$idcat=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la Categorie dans la base de données " );
		}
    return $idcat[0];
}

function supprimerCategorie($id){

  global $db;
  try{
    $req=$db->prepare('DELETE FROM categorie WHERE idcat=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression de la Categorie dans la base de données " );
  }
}

function creerCategorie($nom,$des){
	//donnée : nom de compte, mot de passe crypté, nom et prénom de l'admin
	//pré : nomdeCompte,mdp,nom,prenom : String
	//résultat : ajout de l'admin dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO categorie(nomcat,descat) VALUES (?,?)');
		$req->execute(array($nom,$des));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion de la categorie dans la base de données " );
}

}

function getAllCategorie(){
	//données : id de l'admin
	//pré : idAdmin : entier > 0
	//résultat : tous les admins autres que celui passé en paramètre
	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM categorie');
  		$req->execute(array());
  		$Listecat=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des Categories dans la base de données " );
  }
      return $Listecat;
  }

  function getAllNomCategorie(){
  	//données : id de l'admin
  	//pré : idAdmin : entier > 0
  	//résultat : tous les admins autres que celui passé en paramètre
  	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomcat FROM categorie');
    		$req->execute(array());
    		$Listenomcat=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des noms des Categories dans la base de données " );
    }
        return $Listenomcat;
    }

  function modifDescriptionAdmin($id,$newdes){
  	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
  	//pré : idAdmin : entier > 0 / newMdp : String
  	//résultat : modifie le mot de passe actuel avec le nouveau mdp
    global $db;
    try{
  		$req=$db->prepare('UPDATE categorie SET descat= :newdes WHERE idcat=:id');
  		$req->execute(array(
  			'newdes' => $newdes,
  			'idcat' => $id
  		));
  	} catch(PDOException $e){
  		echo($e->getMessage());
  		die(" Erreur lors de la modification de la description de la categorie dans la table " );
  }
  }

  function modifNomCategorie($id,$newnom){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
	//pré : idAdmin : entier > 0 / newMdp : String
	//résultat : modifie le mot de passe actuel avec le nouveau mdp
  global $db;
	try{
		$req=$db->prepare('UPDATE categorie SET nomcat= :newnom WHERE idcat=:id');
		$req->execute(array(
			'newnom' => $newnom,
			'idcat' => $id
		));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du nom de la categorie dans la table " );
}
}


function existeCategorie($nom){
	//données : email et mot de passe crypté de l'admin
	//pré : email : String / password : String
	//résultat : id de l'admin s'il existe, NULL sinon
	//post : id : entier >0
  global $db;
	try{
		$req=$db->prepare('SELECT idcat FROM categorie WHERE nomcat=?');
		$req->execute(array($nom));
		$idcat=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence de la categorie dans la table " );
}
		return $idcat[0];

}
 ?>
