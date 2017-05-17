<?php




function getNomDepartement($id){

  global $db;
  try{
    $req=$db->prepare('SELECT nomdep FROM departement WHERE iddep=?');
    $req->execute(array($id));
		$nomdep=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom du departement dans la base de données " );
		}
    return $nomdep[0];
}



function getNumeroDepartement($id){

    global $db;
  try{
    $req=$db->prepare('SELECT numerodep FROM departement WHERE iddep=?');
    $req->execute(array($id));
		$numerodep=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du numero du departement dans la base de données " );
		}
    return $numerodep[0];
}

function getIdRegionDepartement($id){

    global $db;
  try{
    $req=$db->prepare('SELECT idregion FROM departement WHERE iddep=?');
    $req->execute(array($id));
		$idregion=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de la region du departement dans la base de données " );
		}
    return $idregion[0];
}

function getIdDepartement($nom){

  global $db;
  try{
    $req=$db->prepare('SELECT iddep FROM departement WHERE nomdep=?');
    $req->execute(array($nom));
		$iddep=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du departement dans la base de données " );
		}
    return $iddep[0];
}

function supprimerDepartement($id){

  global $db;
  try{
    $req=$db->prepare('DELETE FROM departement WHERE iddep=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du departement dans la base de données " );
  }
}

function creerDepartement($nom,$numero, $idregion){
	//donnée : nom de compte, mot de passe crypté, nom et prénom de l'admin
	//pré : nomdeCompte,mdp,nom,prenom : String
	//résultat : ajout de l'admin dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO departement(nomdep,numerodep, idregion) VALUES (?,?,?)');
		$req->execute(array($nom, $numero, $idregion));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion du departement dans la base de données " );
}

}

function getAllDepartement(){
	//données : id de l'admin
	//pré : idAdmin : entier > 0
	//résultat : tous les admins autres que celui passé en paramètre
	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM departement');
  		$req->execute(array());
  		$Listedep=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des departements dans la base de données " );
  }
      return $Listedep;
  }

  function getAllNomDepartement(){
  	//données : id de l'admin
  	//pré : idAdmin : entier > 0
  	//résultat : tous les admins autres que celui passé en paramètre
  	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomdep FROM departement');
    		$req->execute(array());
    		$Listenomdep=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des noms des departements dans la base de données " );
    }
        return $Listenomdep;
    }

  function modifNumeroDepartement($id,$newnum){
  	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
  	//pré : idAdmin : entier > 0 / newMdp : String
  	//résultat : modifie le mot de passe actuel avec le nouveau mdp
    global $db;
    try{
  		$req=$db->prepare('UPDATE departement SET numerodep= :newnum WHERE iddep=:id');
  		$req->execute(array(
  			'newnum' => $newnum,
  			'iddep' => $id
  		));
  	} catch(PDOException $e){
  		echo($e->getMessage());
  		die(" Erreur lors de la modification du numero du departement dans la table " );
  }
  }

  function modifNomDepartement($id,$newnom){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
	//pré : idAdmin : entier > 0 / newMdp : String
	//résultat : modifie le mot de passe actuel avec le nouveau mdp
  global $db;
	try{
		$req=$db->prepare('UPDATE departement SET nomdep= :newnom WHERE iddep=:id');
		$req->execute(array(
			'newnom' => $newnom,
			'iddep' => $id
		));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du nom du departement dans la table " );
}
}


function existeDepartement($nom){
	//données : email et mot de passe crypté de l'admin
	//pré : email : String / password : String
	//résultat : id de l'admin s'il existe, NULL sinon
	//post : id : entier >0
  global $db;
	try{
		$req=$db->prepare('SELECT iddep FROM departement WHERE nomdep=?');
		$req->execute(array($nom));
		$iddep=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence du departement dans la table " );
}
		return $iddep[0];

}
 ?>
