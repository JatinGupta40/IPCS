<?php

namespace methodQuery;
use connectionDB\connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/connection.php");


// Function for Methods.
class method extends connection
{
  // Funcion for fetching array.
  public function numRows($query)
  {
    $result =  mysqli_num_rows($query);
    return $result;
  } 

  // Funcion for fetching array.
  public function fetchArray($query)
  {
    $result =  mysqli_fetch_array($query);
    return $result;
  } 
  
  // Funcion for fetching assoc.
  public function fetchAssoc($query)
  {
    $result =  mysqli_fetch_assoc($query);
    return $result;
  } 

  // Function for Fetching all the data from the db.
  public function fetchAll($document)
  {
    $result = mysqli_fetch_all($document, MYSQLI_ASSOC);
    return $result;
  }


}

?>
