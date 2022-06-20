<?php
namespace docQuery;
use connectionDB\connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/connection.php");

class doc extends connection
{
  public $result;
  
  // Fetching all the data of Subject Notes(doc) table.
  public function selectQuery()
  {
    $result = mysqli_query($this->connection,"SELECT * from SubjectNotes");
    return $result;
  } 

  // Inserting Notes/doc.
  public function insertDoc($Name, $Subject, $Class, $FilePath)
  {
    $result = mysqli_query($this->connection,"INSERT INTO SubjectNotes (Name, Subject, Class, FilePath) VALUES ('$Name', '$Subject', '$Class', '$FilePath')");
    return $result;
  }
}
