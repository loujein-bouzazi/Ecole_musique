<?PHP
include "./config/database.php";
include "./classes/cours.php";

class crudcours {

	function ajoutercours($cours){
		$errors = array(); 

		$sql="INSERT INTO `conges`(`date`, `duree`, `id_enseignant`) VALUES (:date_conges,:duree,:id_enseignant)";
		try{
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':date_conges',$conges->getdate());
			$req->bindValue(':duree',$conges->getduree());
			$req->bindValue(':id_enseignant',$conges->getid_enseignant());
			$req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
	}
	
	function affichercours(){
		$db = mysqli_connect('localhost', 'root', '', 'ecole_de_musique');
		$query="SELECT * from `cours` order by titre DESC";
		try{

 		$results = mysqli_query($db, $query);
        	return $results;
        
		
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerconges($id_conges){
		$sql="DELETE FROM `conges` where id= :id_conges";
		try{
			$db = config::getConnexion();
	        $req=$db->prepare($sql);
			$req->bindValue(':id_conges',$id_conges);
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function modifierconges($conges,$id_conges){
		$sql="UPDATE `conges` SET date=:date_conges,duree=:duree,id_enseignant=:id_enseignant WHERE id=:id_conges";
		try{
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':date_conges',$conges->getdate());
			$req->bindValue(':duree',$conges->getduree());
			$req->bindValue(':id_enseignant',$conges->getid_enseignant());
			$req->bindValue(':id_conges',$id_conges);
			$s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}

	function getconge($id_conge){
		$sql="SELECT * from `conges` WHERE id=?";
		try{
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindParam(1, $id_conge);
			$req->execute();
			$result = $req->fetch();
			return $result;
		}
		catch (Exception $e){
	        echo " Erreur : ".$e->getMessage();
	    }
	}

	function getnomprenom(){
		$sql="SELECT id, nom, prenom from `enseignants`";
		try{
			$db = config::getConnexion();
			$liste=$db->query($sql);
			return $liste;
		}
		catch (Exception $e){
	        echo " Erreur : ".$e->getMessage();
	    }

	}

	function getnomprenombyid($id){
		$sql="SELECT nom, prenom from `enseignants` WHERE id=?";
		try{
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindParam(1, $id);
			$req->execute();
			$result = $req->fetch();
			return $result;
		}
		catch (Exception $e){
	        echo " Erreur : ".$e->getMessage();
	    }

	}

	function calculsoldeanneetotal($id_enseignant,$date){
		$sql="SELECT sum(duree) as sommeconges from `conges` WHERE id_enseignant=? and date<=? group by id_enseignant=?";
		try{
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindParam(1, $id_enseignant);
			$req->bindParam(2, $date);
			$req->bindParam(3, $id_enseignant);
			$req->execute();
			$result = $req->fetch();
			return $result;
		}
		catch (Exception $e){
	        echo " Erreur : ".$e->getMessage();
	    }

	}
}

?>