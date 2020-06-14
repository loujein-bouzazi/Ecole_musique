<?php
// include database connection
include '../../config/database.php';
 
try {
     
    // get record ID
    // isset() is a PHP function used to verify if a value is there or not
    $id=isset($_GET['id_cours']) ? $_GET['id_cours'] : die('ERROR: Record ID not found.');
 
    // delete query
    $query = "DELETE FROM cours WHERE id_cours = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);
     
    if($stmt->execute()){
        // redirect to read records page and 
        // tell the user record was deleted
        header('Location:../../index.php?action=deleted');
    }else{
        die('Unable to delete record.');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>