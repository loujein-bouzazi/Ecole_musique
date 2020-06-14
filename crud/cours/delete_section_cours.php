<?php
    include '../../config/database.php';
$idsectioncours = $_POST['del_id'];
$db = mysqli_connect('localhost', 'root', '', 'ecole_de_musique');

//echo $music_number;
$qry = "DELETE FROM section_cours WHERE id_section_cours = ".$idsectioncours;
$result=mysqli_query($db, $qry);
if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
?>