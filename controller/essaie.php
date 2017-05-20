<?php
function getAllVilleDepartementRegionLieu($idville, $iddepartement, $idregion){
	//résultat : tous les lieux de la base de données
	//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu, ville, departement, region WHERE lieu.idville=? AND lieu.idville=ville.idville AND ville.iddep=? AND ville.iddep=departement.iddep AND departement.idregion=?');
  		$req->execute(array());
  		$Listelieu=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des lieux dans la base de données " );
  }
      return $Listelieu;
  }

	function getAllDepartementRegionLieu($iddepartement, $idregion){
		//résultat : tous les lieux de la base de données
		//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

	  global $db;
	  try{
	  		$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu WHERE lieu.idville=(SELECT idville from ville, departement where ville.iddep=? AND ville.iddep=departement.iddep AND departement.idregion=?');
	  		$req->execute(array());
	  		$Listelieu=$req->fetchAll();
	  	} catch(PDOException $e){
	  			echo($e->getMessage());
	  			die(" Erreur lors de la récupération des lieux dans la base de données " );
	  }
	      return $Listelieu;
	  }


			function getAllVilleLieu($idville){
				//résultat : tous les lieux de la base de données
				//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

				global $db;
				try{
						$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu, ville WHERE lieu.idville=? ');
						$req->execute(array());
						$Listelieu=$req->fetchAll();
					} catch(PDOException $e){
							echo($e->getMessage());
							die(" Erreur lors de la récupération des lieux dans la base de données " );
				}
						return $Listelieu;
				}


				function getAllDepartementLieu($iddepartement){
					//résultat : tous les lieux de la base de données
					//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

					global $db;
					try{
							$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu WHERE lieu.idville=(SELECT ville.idville FROM ville WHERE ville.iddep= ?) ');
							$req->execute(array());
							$Listelieu=$req->fetchAll();
						} catch(PDOException $e){
								echo($e->getMessage());
								die(" Erreur lors de la récupération des lieux dans la base de données " );
					}
							return $Listelieu;
					}

					function getAllRegionLieu($idregion){
						//résultat : tous les lieux de la base de données
						//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

						global $db;
						try{
								$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu WHERE lieu.idville=(SELECT ville.idville FROM ville WHERE ville.iddep= (SELECT departement.iddep FROM departement WHERE departement.idregion=?)) ');
								$req->execute(array());
								$Listelieu=$req->fetchAll();
							} catch(PDOException $e){
									echo($e->getMessage());
									die(" Erreur lors de la récupération des lieux dans la base de données " );
						}
								return $Listelieu;
							}

							function getAllVilleDepartementLieu($idville, $iddepartement){
								//résultat : tous les lieux de la base de données
								//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

							  global $db;
							  try{
							  		$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu, ville WHERE lieu.idville=? AND lieu.idville=ville.idville AND ville.iddep=?');
							  		$req->execute(array());
							  		$Listelieu=$req->fetchAll();
							  	} catch(PDOException $e){
							  			echo($e->getMessage());
							  			die(" Erreur lors de la récupération des lieux dans la base de données " );
							  }
							      return $Listelieu;
							  }

								function getAllVilleRegionLieu($idville, $idregion){
									//résultat : tous les lieux de la base de données
									//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

									global $db;
									try{
											$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu, ville, departement, region WHERE lieu.idville=? AND lieu.idville=ville.idville AND ville.iddep=(SELECT departement.iddep FROM departement WHERE departement.idregion=?)');
											$req->execute(array());
											$Listelieu=$req->fetchAll();
										} catch(PDOException $e){
												echo($e->getMessage());
												die(" Erreur lors de la récupération des lieux dans la base de données " );
									}
											return $Listelieu;
									}

?>
