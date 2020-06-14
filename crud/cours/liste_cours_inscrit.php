<?PHP 

include "/config/database.php";

class listecoursinscrit {

	
	function affichercoursinscrit($id){
		$db = mysqli_connect('localhost', 'root', '', 'ecole_de_musique');
	
$queryinscrit="SELECT * from cours INNER JOIN cours_etudiant ON cours.id_cours = cours_etudiant.id_cours INNER JOIN users on users.id = cours_etudiant.id_etudiant where users.id =".$id;


	//	$query="SELECT * from `cours` order by titre DESC";


		try{

 		$results = mysqli_query($db, $queryinscrit);
        	return $results;
        
		
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
}