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
if ($_SESSION['success'] == 1) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Successfully Registered!</strong></div>';
}
    // To Check who logged in, either the user or admin 
    if($_SESSION['email'] == "admin@gmail.com") {
      // Fetching from the Subject table.
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
  <?php
    }
  ?>
  <div class="container">
    <div class="row">
      <div class="ResourceTable table-responsive">
        <table class= "table table-bordered">
          <tr>
            <th>S.No</th>
            <th class="size">Name</th>
            <th>Subject</th>
            <th>Class</th>
            <th>Resource</th>
          </tr>
          <?php
            $document = $doc->selectQuery();
            $fetchdocument = $method->fetchAll($document);
            $numberOfRows = $method->numRows($document);
            if($numberOfRows > 0) {
              $n = 1;
              foreach($fetchdocument as $value) {
          ?>
          <tr>
            <td><?php echo $n; ?></td>
            <td><?php echo $value['Name']; ?></td>
            <td><?php echo $value['Subject']; ?></td>
            <td><?php echo $value['Class']; ?></td>
            <td><a href="<?php echo $value['FilePath']; ?>"><span class="downloadButton"><i class="fa fa-download"> DOWNLOAD</span></td>
          </tr>
          <?php
              $n++;
              }
            }
          ?>
        </table>
      </div>
    </div>
  </div>
<?php include 'footer.php';
