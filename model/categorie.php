<?php




function getNomCategorie($id){
  //donnée: id de la categorie
	//pré : idcat : entier > 0
	//résultat : la categorie correspondant à l'id donné en paramètre
	//post : nomcat : String ou NULL
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
  //donnée: id de la categorie
	//pré : idpseudo : entier > 0
	//résultat : la description correspondant à l'id donné en paramètre
	//post : descat : String ou NULL
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
  //donnée: un nom de categorie
	//pré : nom : String & length(nom)>0
	//résultat : l'id correspondant à la categorie donnée en paramètre
	//post : idcat: entier>0 ou NULL
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
  //donnée : id de la catégorie à supprimer
	//pré : idcat : entier >0
	//résultat : suppression de la categorie de la base de données
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
	//donnée : nom de la categorie, description de la categorie
	//pré : nom, des : String & length(nom)>0 length(des)>=0
	//résultat : ajout de la categorie dans la base de données

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
	//résultat : toutes les catégories de la base de données
	//post : Listecat : array : une ligne par categorie,(idcat, nomcat, descat) pour les colonnes

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

  function getAllLieuCategorie($nom){
  	//données : un nom de categorie
  	//pré : nom : String & length(nom)>0
  	//résultat : tous les lieux de la catégorie passée en paramètre
  	//post : Listelieucat : array : une ligne par lieu,(nomlieu, urllieu, deslieu, adrlieu) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomlieu, urllieu, deslieu, adrlieu FROM categorie, lieu WHERE categorie.idcat=lieu.idcat AND nomcat=?');
    		$req->execute(array());
    		$Listelieucat=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des Categories dans la base de données " );
    }
        return $Listelieucat;
    }


  function getAllNomCategorie(){
  	//résultat : tous les noms des categories
  	//post : Listenomcat : array : une ligne par categorie,(nomcat) pour les colonnes

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


function modifCategorie($id,$newnom, $newdescat){
//donnée : id de la catégorie à modifier et le nouveau nom
//pré : idcat : entier > 0 / newnom : String & length(nom)>0
//résultat : modifie le nom de la catégorie actuelle avec un nouveau nom
global $db;
try{
  $req=$db->prepare('UPDATE categorie SET nomcat= :newnom, descat=:$newdescat WHERE idcat=:id');
  $req->execute(array(
    'newnom' => $newnom,
    'newdescat' => $newdescat,
    'id' => $id
  ));
} catch(PDOException $e){
  echo($e->getMessage());
  die(" Erreur lors de la modification du nom de la categorie dans la table " );
}
}



function existeCategorie($nom){
  //données : nom de la categorie
	//pré : nom: String
	//résultat : id de la categorie si elle existe, NULL sinon
	//post : idcat : entier >0 ou NULL
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
