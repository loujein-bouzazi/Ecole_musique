<?php 
  session_start(); 
 $role=isset($_SESSION['role']) ? $_SESSION['role'] : die('ERROR: Record ID not found!');
 $userid=isset($_SESSION['userid']) ? $_SESSION['userid'] : die('ERROR: Record ID not found!');
 $id = $_POST['id'];
 $titre = $_POST['titre'];


include "../../config/database.php";

$db = mysqli_connect('localhost', 'root', '', 'ecole_de_musique');

$sql = "SELECT * from cours where cours.titre LIKE '%$titre%' and cours.id_cours LIKE '%$id%'";

$result = mysqli_query($db, $sql);


$response = "";

while( $row = mysqli_fetch_array($result) ){
 $idcours = $row['id_cours'];
 $titre = $row['titre'];
 $description = $row['description'];
 $niveau = $row['niveau'];
 

  $response .= "<div class='col-lg-2 col-sm-2 mb-4'>";
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
            $response .="</div> </div>";




        }
                    echo $response;
