<?php
namespace connectionDB;
use Mysqli;
class connection
  {
    public $connection;
    // Constructor.
    public function __construct()
    {
      try
      {
        $this->connection = mysqli_connect("localhost", "root", "Jatin@12", "ipcs");
      }
      catch(Exception $e)
      {
        echo "Connection failed : ", $e;
      }
    }
  }
