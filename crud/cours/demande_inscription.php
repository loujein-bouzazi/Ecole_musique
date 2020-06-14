<?php
    include '../../config/database.php';
$coursid= $_POST['coursid'];
$userid = $_POST['userid'];
$db = mysqli_connect('localhost', 'root', '', 'ecole_de_musique');


  	$query = "INSERT INTO cours_etudiant (id_etudiant, id_cours, validee) 
  			  VALUES(".$coursid.",".$userid.", 'FALSE')";



//echo $music_number;
mysqli_query($db,$query);
if(isset($result)) {
   echo $result;
} else {
   echo "NO";
}
?>