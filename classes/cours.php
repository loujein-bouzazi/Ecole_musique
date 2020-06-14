<?PHP
class cours{
	private $id;
	private $titre;
	private $description;
	private $niveau;
	private $id_enseignant;

	function __construct($id,$titre,$description,$niveau,$id_enseignant){
		
		$this->id=$id;
		$this->titre=$titre;
		$this->description=$description;
		$this->niveau=$niveau;
		$this->id_enseignant=$id_enseignant;
		
	}
	
	function getid(){
		return $this->id;
	}
	function gettitre(){
		return $this->titre;
	}
	function getdescription(){
		return $this->description;
	}

	function getniveau() {
		return $this->niveau;
	}
	function getid_enseignant(){
		return $this->id_enseignant;
	}

	function settitre($titre){
		$this->titre=$titre;
	}
	function setdescription($description){
		$this->description=$description;
	}function setniveau($niveau){
		$this->niveau=$niveau;
	}
	function setid_enseignant($id_enseignant){
		$this->id_enseignant=$id_enseignant;
	}
	
}

?>