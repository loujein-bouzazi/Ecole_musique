<?PHP
include "/config/database.php";

class listecours {

	
	function affichercours(){

if (isset($_POST['search-id']) &&isset($_POST['search-titre']) ) {
//Search box value assigning to $Name variable.
   $titre = $_POST['search-titre'];
   $id = $_POST['search-id'];
}

else {
 $titre = "";
   $id = "";

}

		$db = mysqli_connect('localhost', 'root', '', 'ecole_de_musique');
		$query="SELECT * from `cours` WHERE titre LIKE '%$titre%' and id_cours LIKE '%$id%' order by titre DESC";
		try{

 		$results = mysqli_query($db, $query);
        	return $results;
        
		
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
}