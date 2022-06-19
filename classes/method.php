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

  // Function for Number of Columns.
  public function numCols()
  {
    $result = mysqli_query($this->connection,"SELECT count(*) AS NUMBEROFCOLUMNS FROM information_schema.columns WHERE table_name = 'SubjectNotes'");
    return mysqli_fetch_array($result)[0];
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

}

?>
