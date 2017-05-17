<?php




function getNomLieu($id){

  global $db;
  try{
    $req=$db->prepare('SELECT nomlieu FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$nomlieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom du lieu dans la base de données " );
		}
    return $nomlieu[0];
}



function getUrlLieu($id){

    global $db;
  try{
    $req=$db->prepare('SELECT urllieu FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$urllieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'url de l'image du lieu dans la base de données " );
		}
    return $urllieu[0];
}

function getDescriptionLieu($id){

    global $db;
  try{
    $req=$db->prepare('SELECT deslieu FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$deslieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de la description du lieu dans la base de données " );
		}
    return $deslieu[0];
}

function getUrlLieu($id){

    global $db;
  try{
    $req=$db->prepare('SELECT adrlieu FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$adrlieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'adresse du lieu dans la base de données " );
		}
    return $adrlieu[0];
}

function getIdPseudoLieu($id){

    global $db;
  try{
    $req=$db->prepare('SELECT idpseudo FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$idpseudo=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du pseudo du lieu dans la base de données " );
		}
    return $idpseudo[0];
}

function getIdVilleLieu($id){

    global $db;
  try{
    $req=$db->prepare('SELECT idville FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$idville=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la ville du lieu dans la base de données " );
		}
    return $idville[0];
}

function getIdCategorieLieu($id){

    global $db;
  try{
    $req=$db->prepare('SELECT idcat FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$idcat=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la categorie du lieu dans la base de données " );
		}
    return $idcat[0];
}

function getIdLieu($nom){

  global $db;
  try{
    $req=$db->prepare('SELECT idlieu FROM lieu WHERE nomlieu=?');
    $req->execute(array($nom));
		$idlieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du lieu dans la base de données " );
		}
    return $idlieu[0];
}

function supprimerLieu($id){

  global $db;
  try{
    $req=$db->prepare('DELETE FROM lieu WHERE idlieu=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du lieu dans la base de données " );
  }
}

function creerLieu($nom, $url, $des, $adr, $idpseudo, $idville, $idcat){
	//donnée : nom de compte, mot de passe crypté, nom et prénom de l'admin
	//pré : nomdeCompte,mdp,nom,prenom : String
	//résultat : ajout de l'admin dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO lieu(nomlieu, urllieu, deslieu, adrlieu, idpseudo, idville, idcat) VALUES (?,?,?,?,?,?,?)');
		$req->execute(array($nom, $url, $des, $adr, $idpseudo, $idville, $idcat));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion du lieu dans la base de données " );
}

}

function getAllLieu(){
	//données : id de l'admin
	//pré : idAdmin : entier > 0
	//résultat : tous les admins autres que celui passé en paramètre
	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM lieu');
  		$req->execute(array());
  		$Listelieu=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des lieux dans la base de données " );
  }
      return $Listelieu;
  }

  function getAllNomLieu(){
  	//données : id de l'admin
  	//pré : idAdmin : entier > 0
  	//résultat : tous les admins autres que celui passé en paramètre
  	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomlieu FROM lieu');
    		$req->execute(array());
    		$Listenomlieu=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des noms des lieux dans la base de données " );
    }
        return $Listenomlieu;
    }



  function modifNomLieu($id,$newnom){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
	//pré : idAdmin : entier > 0 / newMdp : String
	//résultat : modifie le mot de passe actuel avec le nouveau mdp
  global $db;
	try{
		$req=$db->prepare('UPDATE lieu SET nomlieu= :newnom WHERE idlieu=:id');
		$req->execute(array(
			'newnom' => $newnom,
			'idlieu' => $id
		));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du nom du lieu dans la table " );
}
}

function modifUrlLieu($id,$newurl){
  //donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
  //pré : idAdmin : entier > 0 / newMdp : String
  //résultat : modifie le mot de passe actuel avec le nouveau mdp
  global $db;
  try{
    $req=$db->prepare('UPDATE lieu SET urllieu= :newurl WHERE idlieu=:id');
    $req->execute(array(
      'newurl' => $newurl,
      'idlieu' => $id
    ));
  } catch(PDOException $e){
    echo($e->getMessage());
    die(" Erreur lors de la modification de l'url du lieu dans la table " );
}
}

function modifDescriptionLieu($id,$newdes){
  //donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
  //pré : idAdmin : entier > 0 / newMdp : String
  //résultat : modifie le mot de passe actuel avec le nouveau mdp
  global $db;
  try{
    $req=$db->prepare('UPDATE lieu SET deslieu= :newdes WHERE idlieu=:id');
    $req->execute(array(
      'newdes' => $newdes,
      'idlieu' => $id
    ));
  } catch(PDOException $e){
    echo($e->getMessage());
    die(" Erreur lors de la modification de la description du lieu dans la table " );
}
}

function modifAdresseLieu($id,$newadr){
  //donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
  //pré : idAdmin : entier > 0 / newMdp : String
  //résultat : modifie le mot de passe actuel avec le nouveau mdp
  global $db;
  try{
    $req=$db->prepare('UPDATE lieu SET adrlieu= :newadr WHERE idlieu=:id');
    $req->execute(array(
      'newadr' => $newadr,
      'idlieu' => $id
    ));
  } catch(PDOException $e){
    echo($e->getMessage());
    die(" Erreur lors de la modification de l'adresse du lieu dans la table " );
}
}


function existeLieu($nom){
	//données : email et mot de passe crypté de l'admin
	//pré : email : String / password : String
	//résultat : id de l'admin s'il existe, NULL sinon
	//post : id : entier >0
  global $db;
	try{
		$req=$db->prepare('SELECT idlieu FROM lieu WHERE nomlieu=?');
		$req->execute(array($nom));
		$idlieu=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence du lieu dans la table " );
}
		return $idlieu[0];

}
 ?>
