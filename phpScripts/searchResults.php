<?php
include '../dataLayer/dbAccess.class.php';
include '../dataLayer/user.class.php';

    $db = new Database;
    $user = new User($db);
    $results = array();
    
    $data = file_get_contents("php://input");
    $objData = json_decode($data);
    $searchTerm = $objData->data;
    $results = array();

        foreach($user->searchUsers($searchTerm) as $row){
            $results[] = $row['lastName'].", ".$row['firstName']." - ".$row['email']; 
        }//foreach
      

  
  echo json_encode($results);  

?>

