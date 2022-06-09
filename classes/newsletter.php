<?php
namespace newsletterQuery;
use connectionDB\connection;
include './connection.php';
class newsletter extends connection
{
  public $result;
  
  // Checking email-id is already registered or not..
  public function subscribe($email)
  {
    $result = mysqli_query($this->connection,"SELECT * from newsletter where emailid = '$email' ");
    return $result;
  } 
  
  // Inserting email-id if not already registered.
  public function insert($email)
  {
    $result = mysqli_query($this->connection,"INSERT INTO `newsletter` (`emailid`, `subscribe`) VALUES ('$email', TRUE)");
    return $result;
  }
  
  // Updating UnSubscribe.
  public function updateunsubscribe($email)
  {
    $result = mysqli_query($this->connection,"UPDATE newsletter SET subscribe = FALSE where emailid = '$email'");
    return $result;
  }  
  // Updating Subscription.
  public function updatesubscribe($email)
  {
    $result = mysqli_query($this->connection,"UPDATE newsletter SET subscribe = TRUE WHERE emailid = '$email'");
    return $result;
  }

  // Details of loggedin user.
  public function mail()
  {
    $result = mysqli_query($this->connection,"SELECT * from newsletter WHERE subscribe = TRUE");
    return $result;
  } 

  // Checking email-id is already registered or not..
  public function id($id)
  {
    $result = mysqli_query($this->connection,"SELECT * from newsletter where id = '$id' ");
    return $result;
  } 

}
  

?>