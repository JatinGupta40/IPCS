<?php
namespace subjectQuery;
use connectionDB\connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/connection.php");

class subject extends connection
{
  public $result;
  
  // Fetching all the data of blog table.
  public function AvailableSubjets()
  {
    $result = mysqli_query($this->connection,"SELECT * from Subjects");
    return $result;
  } 
  
  // Getting details from a DB table of a specified user.
//   public function blogById($id)
//   {
//     $result = mysqli_query($this->connection,"SELECT * from blog where id='$id'");
//     return $result;
//   }
  
//   // Fetching details of user added blog from blog table by provided user id.
//   public function selectBlog($id, $offset, $no_of_records_per_page)
//   { 
//     $result = mysqli_query($this->connection,"SELECT * FROM blog where userid=$id ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
//     return $result;
//   }

//   // Counting number of blog user have added.
//   public function countBlog($id)
//   {
//     $result = mysqli_query($this->connection,"SELECT COUNT(*) FROM blog where userid=$id");
//     return $result;
//   }

//   // Counting all the blogs presesnt in DB.
//   public function countAllBlog()
//   {
//     $result = mysqli_query($this->connection,"SELECT COUNT(*) FROM blog");
//     return $result;
//   }
  
//   // Inserting blog.
//   public function insertBlog($id, $heading, $content, $cleanurl)
//   {
//     $result = mysqli_query($this->connection,"INSERT INTO blog (userid, Heading, content, cleanurl) VALUES ('$id', '$heading', '$content', '$cleanurl')");
//     return $result;
//   } 
  
//   // Deleting a blog.
//   public function deleteBlog($id)
//   {
//     $result = mysqli_query($this->connection,"DELETE from blog where id='$id'");
//     return $result;
//   }

//   // select a blog for editing.
//   public function selectBlogEdit($id)
//   {
//     $result = mysqli_query($this->connection,"SELECT * FROM blog WHERE id='" . $id . "' LIMIT 1");
//     return $result;
//   }
  
//   // Update a blog after editing.
//   public function updateBlog($title, $content, $cleanurl, $a)
//   {
//     //$result = mysqli_query($this->connection,"UPDATE blog SET Heading='$title', content='$content', cleanurl='$cleanurl' WHERE id=$a");
//     $result = mysqli_query($this->connection,"UPDATE blog SET Heading='$title', content='$content', cleanurl='$cleanurl' WHERE id=$a");
//     return $result;
//   }

//   // Getting Blogs for Paging.
//   public function fetchBlogPaging($offset, $no_of_records_per_page)
//   {
//     $result = mysqli_query($this->connection,"select * from blog ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
//     return $result;
//   }
  
}
  

?>
