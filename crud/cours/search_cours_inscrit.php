<?php 
  session_start(); 
 $role=isset($_SESSION['role']) ? $_SESSION['role'] : die('ERROR: Record ID not found!');
 $userid=isset($_SESSION['userid']) ? $_SESSION['userid'] : die('ERROR: Record ID not found!');
 $id = $_POST['id'];
 $titre = $_POST['titre'];


include "../../config/database.php";

$db = mysqli_connect('localhost', 'root', '', 'ecole_de_musique');

$sqlinscrit = "SELECT * from cours INNER JOIN cours_etudiant ON cours.id_cours = cours_etudiant.id_cours INNER JOIN users on users.id = cours_etudiant.id_etudiant where cours.titre LIKE '%$titre%' and cours.id_cours LIKE '%$id%' and users.id =".$userid;

$resultinscrit = mysqli_query($db, $sqlinscrit);


$response = "";



while( $row = mysqli_fetch_array($resultinscrit) ){
 $idcours = $row['id_cours'];
 $titre = $row['titre'];
 $description = $row['description'];
 $niveau = $row['niveau'];
 

  $response .= "<div class='col-lg-4 col-sm-6 mb-4'>";
  $response .="<div class='portfolio-item'>";
 $response .= "<a class='portfolio-link'  data-id='".$idcours."'";
  $response .="data-toggle='modal' href='#portfolioModal1'";
  $response .="><div class='portfolio-hover'>";
$response .="<div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>";
      $response.="</div>";
          $response .="<img class='img-fluid' src='assets/img/portfolio/05-thumbnail.jpg' alt=''";
        $response .="/></a>";
           $response .="<div class='portfolio-caption'>";
           $response .="<div class='portfolio-caption-heading'>";
             $response .="<span>".$titre."</span></div>";
       $response .="<div class='portfolio-caption-subheading text-muted'>".$description."</div>";
           $response .="</div>";
            $response .="</div></div>";


            echo $response;


        }