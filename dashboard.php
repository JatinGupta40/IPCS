<?php

require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/doc.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/carousel.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/user.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
$doc = new docQuery\doc;
$carousel = new carouselQuery\carousel;
$user = new userQuery\user;
$method = new methodQuery\method;

    // Successfully registered message for new registered user only.
    if ($_SESSION['success'] == 1) 
    {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Successfully Registered!</strong></div>';
    }
    else
    {
      // Nothing to show.
    }
?>

  <?php
    // To Check who logged in, either the user or admin 
    if($_SESSION['email'] == "admin@gmail.com")
    {
      // Fetching from the Subject table.
      // $adminquery = $subject->subject();
  ?>
      <div class="addblog">
        <h2>
          <a href="/addDoc">Add Document</a>
        </h2>
        <h2>
          <a href="/addSubject">Add Subject</a>
        </h2>
      </div>
      <hr>
      <div class="ResourceTable">
        <table>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Subject Name</th>
            <th>Class</th>
            <th>Resource</th>
          </tr>
          <tr>
            <?php
              $document = $doc->FetchAllDoc();
              $numberofcolumns = $method->numCols();
              if($method->numRows($document) > 0) {
                $fetchdocument = $method->fetchArray($document);
                $i = 0;
                while($i <= $numberofcolumns) {
                  echo $i;
                  print_r($fetchdocument[$i+1]);
                  $i++;
                }
            ?>
              <td>
                <?php
                  // echo $row['SN_ID'];
                  // echo $row['Name'];
                  // echo $row['Subject'];
                  // echo $row['Class'];
                ?>
              </td>
            <?php
               // }
              }
            ?>
          </tr>
        </table>
      </div>
  <?php
  }
      
      // $adminquery = $blog->blog();
      // if($adminquery->num_rows > 0)
      // {
      //   // Here, fetch function is called from source file and method class.
      //   while($row = $method->fetchArray($adminquery))
      //   {
      //     // Fetching details from DB
      //     $id = $row['id'];
      //     $heading = $row['Heading'];
      //     $content = $row['content'];
      //     $cleanurl = $row['cleanurl']
      ?>
          <!-- <div class="blogbox">
            <h3><?php //echo $heading; ?></h3>
            <p> -->
      <?php
            // Trimming down the content to 150 words only.
            // $content = substr($content, 0, 150); 
            // echo $content;
      ?>
            <!-- </p>
            <p>
              <div class="editdelete">
                <div class="editdeletebutton">
                  <a href="article/<?php //echo $id;?>/<?php //echo $heading; ?>"><button type="submit" class="" name="submit"> View </button></a>
                </div>    
                <div class="editdeletebutton">
                  <a href="editblog/<?php //echo $id;?>">
                  <button type="submit"  class="" name="submit"> Edit </button></a>
                </div>
                <div class="editdeletebutton">
                  <a href="deleteblog/<?php //echo $id;?>/<?php //echo $heading; ?>"><button type="submit" class="" name="submit"> Delete </button></a>
                </div>
              </div>  
            </p>
          </div> -->
      <?php
        // }
      // }
      // else
      // {
?>
        <!-- <div class="">
          <h5>You have not added any Blog yet.</h5>
          <p>(To create click on the Add Blog button above.)</p>
        </div> -->
<?php        
    //   }
    // }   
    // If the logged-in user is not admin.
    // else
    // {
    //   $email = $_SESSION['email'];
    //   // For accessing the id of the logged in user to be used as reference for getting Heading and content data to be fetched from the blog table.

    //   // Checking the logged in user is registered user and not is not an  admin.
    //   $userquery = $user->checkEmail($email);
    //   if ($userquery->num_rows > 0)      
    //   {
    //     while ($row1 = $method->fetchArray($userquery))
    //     {   
    //       // Id fetching from DB table of user.
    //       $id = $row1['id']; 
    //       $_SESSION['fname'] = $row1['fname'];
    //       $_SESSION['id'] = $row1['id'];
    //     }
    //   }
        
    //   if (isset($_GET['pageno'])) 
    //   {
    //     $pageno = $_GET['pageno'];
    //   } 
    //   else 
    //   { 
    //     $pageno = 1;
    //   }
?>
<?php include 'footer.php'; ?>
