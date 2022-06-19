<?php
namespace userQuery;
use connectionDB\connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/connection.php");

class user extends connection
{

  // Details of loggedin user.
  public function user()
  {
    $result = mysqli_query($this->connection,"Select * from user");
    return $result;
  } 

  // Function for checking email in DB. Register
  public function checkEmail($email)
  {
    $result = mysqli_query($this->connection,"Select * from user where emailid = '$email'");
    return $result;
  } 

  // Function for inserting user details into DB.
  
  
  // public function insert($table, $data)
  // {
  //     // Get record as an array
  //     $columns = implode(", ", array_keys($data));

  //     // Get values separated
  //     $values  = implode(", ", array_map(function ($val) {
  //         if (!is_numeric($val))
  //             return sprintf("'%s'", $val);
  //         else
  //             return $val;
  //     }, $data));
  //     print_r($columns);
  //     // Insert values according to their columns in table
  //     $sql = "INSERT INTO $table ($columns) VALUES ($values);";
      
  //     $conn = $this->connect();
  //     echo gettype($conn);
  //     if($conn)
  //     {
  //       echo "ata kyu nhi bhai tu";
  //     }
      
  //     print_r($conn);
  //     if ($conn->query($sql) === TRUE) {
  //         // Return id, if query is successful
  //         return mysqli_insert_id($conn);
  //     }
      
  //     echo $conn->error;die();

  //     // Return null, if operation failed
  //     return null;
  // }

  
  
  public function insertUserDetails($fname, $lname, $email, $pass)
  {
    $result = mysqli_query($this->connection,"INSERT INTO user (fname, lname, emailid, password) VALUES ('$fname', '$lname', '$email', '$pass')");
    return $result;
  } 

  // Update Token, time for forgot password.
  public function updateToken($password, $code, $expDate, $email)
  {
    $result = mysqli_query($this->connection,"UPDATE user set password='" . $password . "', reset_link_token='" . $code . "' ,exp_date='" . $expDate . "' WHERE emailid='" . $email . "'");
    return $result;
  }

  // Get Token, time for forgot password.
  public function selectToken($code, $email)
  {   
    $result = mysqli_query($this->connection,"SELECT * FROM user WHERE reset_link_token='" . $code . "' and emailid='" . $email . "';");
    return $result;
  }

  // Update Password
  public function updatePassword($password, $email)
  {   
    $result = mysqli_query($this->connection,"UPDATE user set  password='" . $password . "', reset_link_token=NULL, exp_date=NULL WHERE emailid='" . $email . "'");
    return $result;
  }

}

?>
