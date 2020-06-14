<?php 
  session_start(); 
 $role=isset($_SESSION['role']) ? $_SESSION['role'] : die('ERROR: Record ID not found!');
 $userid=isset($_SESSION['userid']) ? $_SESSION['userid'] : die('ERROR: Record ID not found!');


include "../../config/database.php";


$action = isset($_GET['action']) ? $_GET['action'] : "";
 
 
// if it was redirected from delete.php
if($action=='deleted'){
                  header('location:../../index.php');
}


$db = mysqli_connect('localhost', 'root', '', 'ecole_de_musique');

$coursid = $_POST['coursid'];
$sqlinscrit = "select * from cours_etudiant where id_cours=".$coursid;
$sql = "select * from cours where id_cours=".$coursid;
$sqlsection = "select * from section_cours where id_cours=".$coursid;

$resultinscrit = mysqli_query($db, $sqlinscrit);
$result = mysqli_query($db,$sql);
$resultsections = mysqli_query($db, $sqlsection);


$response = "";
if($role == "1") {
if (mysqli_num_rows($resultinscrit) == 0 ) {

$response = "<span><a onclick='demanderinscription({$coursid},{$userid})' class='btn btn-sm btn-outline-danger'>demander inscription</a></span>";
}}
$response .= "<table border='0' width='100%'>";

while( $row = mysqli_fetch_array($result) ){
 $id = $row['id_cours'];
 $titre = $row['titre'];
 $description = $row['description'];
 $niveau = $row['niveau'];
 
   if($_SESSION["role"] == "1" ){


}


 $response .= "<tr>";
 $response .= "<td></td><td><div class='portfolio-caption-heading'><span><h3>".$titre."</h3></span></div></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td></td><td>".$description."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td></td><td> niveau ".$niveau."</td>";
 $response .= "</tr>";


 $response .= "<tr>";
 $response .= "<td><h4> Contenu:</h4></b></td>";
 $response .= "</tr>";

}

while( $rowsection = mysqli_fetch_array($resultsections) ){
 $titresection = $rowsection['titre'];
 $idsectioncours = $rowsection['id_section_cours'];
 
 $response .= "<tr id=".$idsectioncours.">";

  if($_SESSION["role"] == "2" ){

 $response .= "<td></td><td><h5>".$titresection."</h5></td><td><button 
 onclick='deletesectioncours({$idsectioncours})' type='button' title='supprimer' class='btn btn-outline-danger btn-sm'>  <span aria-hidden='true'>&times;</span></button></td>";
 $response .= "</tr>";
}
else 
{

 $response .= "<td></td><td><h5>".$titresection."</h5></td>";
 $response .= "</tr>";

}
}

 $response .= "<tr>";
 $response .= "<td><hr></td><td><hr></td><td><hr></td>";
 $response .= "</tr>";

 if($_SESSION["role"] == "2" ){
 $response .= "<tr>";
 $response .= "<td><a class='btn btn-primary' href='./crud/cours/edit_cours.php?id_cours=".$coursid."'>Modifier</a> </td><td><a class='btn btn-primary' href='./crud/cours/add_section_cours.php?id_cours=".$coursid."'>Ajouter un chapitre</a> </td> <td><a class='btn btn-danger' onclick='delete_cours({$coursid});'>Supprimer</a> </td>";
 $response .= "</tr>";
}

$response .= "</table>";


echo $response;
exit;