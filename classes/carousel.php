<?php

namespace carouselQuery;
use connectionDB\connection;

require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/connection.php");

class carousel extends connection
{
  // Carousel.
  public function carousel($search)
  {
    $result = mysqli_query($this->connection,"SELECT * FROM carousel");
    return $result;
  }
  
  // Uploading Image for Carousel.
  public function uploadImage($id, $locationdb, $title, $author)
  {
    $result = mysqli_query($this->connection,"INSERT INTO `carousel`(`userid`, `image`, `title`, `imageby`) VALUES ($id, '$locationdb', '$title', '$author')");
    return $result;
  }

  // Getting details of the Image uploaded by specific user and checked for Carousel.
  public function selectImage($tick)
  {
    $result = mysqli_query($this->connection,"select * from `carousel` where image = '$tick'");
    return $result;
  }
  
  // Updating carousel checked value to true when the tick the image.
  public function updateImage($tick)
  {
    $result = mysqli_query($this->connection,"UPDATE carousel SET checked = TRUE  WHERE image = '$tick'");
    return $result;
  }

  // Deleting carousel checked image.
  public function deleteImage($tick)
  {
    $result = mysqli_query($this->connection,"DELETE FROM `carousel` WHERE image = '$tick'");
    return $result;
  }

}

?>