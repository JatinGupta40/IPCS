<?php
    
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/doc.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/newsletter.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/subject.php');

    $doc = new docQuery\doc;
    $user = new userQuery\user;
    $method = new methodQuery\method;
    $newsletter = new newsletterQuery\newsletter;
    $subjectDB = new subjectQuery\subject;

    $a = $_SESSION['fname'];
    $id = $_SESSION['id'];
    
    // Checking User.
    if($a != "admin") {
      echo "Page not Found, Redirecting to home page.";
      header('location:home');
    }
    // From Validation
    if(isset($_POST['submit']))
    {
      $title = $_POST['title'];
      $subject = $_POST['subject'];

      // Title.
      if(!empty($_POST['title']))
      {
        $title = $_POST['title'];
      }
      else 
      {
        $title == null;
      }
      // Subject Name.
      if(!empty($_POST['subject']))
      {
        $subject = $_POST['subject'];
      }
      else 
      {
        $subject == null;
      }
      // Student Class.
      if(!empty($_POST['class']))
      {
        $class = $_POST['class'];
      }
      else 
      {
        $class == null;
      }

      // PDF file Url.
      if(!empty($_FILES['pdfFile']['name']))
      {
        $pdfFile = $_FILES['pdfFile']['name'];
      }
      else 
      {
        $pdfFile == null;
      }
      
      $errors = array();
      if($title == null) 
      {
        $errors['title'] = 'Title is required.';
      }
      if($subject == null) 
      {
        $errors['subject'] = 'Subject is required.';
      }
      if($class == null) 
      {
        $errors['class'] = 'class is required.';
      }
      if($pdfFile == null) 
      {
        $errors['pdfFile'] = 'File is required.';
      }

      if(!empty($_POST['title']) && !empty($_POST['subject']))
      {
        if(!empty($_POST['class']) && !empty($_FILES['pdfFile']['name'])) {
          // Inserting into DB.
          $validext = 'pdf';
          // Getting File Name
          $filename = $_FILES['pdfFile']['name'];
          // Changing file name, replacing any space with hyphen.
          $newName = strtolower(str_replace(' ', '-', $filename));
          $location = 'Files/'.$newName;
          move_uploaded_file($_FILES['pdfFile']['name'],$targetlocation);
          $result = $doc->insertDoc($title, $subject, $class, $location);
          header('location:dashboard');
        }
      }
      // Displaying Error message.
      if (isset($errors)) {
        if (count($errors) > 0) {
          foreach ($errors as $key => $value) {
            echo '<div class="alert alert-danger">' . $value . '</div>';
          }
        }
      }
    }
?>

<div class="container d-flex align-items-center add-doc">
  <form method="POST" enctype="multipart/form-data" style="width:50%">
    <h3 class="form-caption">Add Notes</h3>
    <hr>
    <div class="form-group">
      <label for="title">TITLE</label>
      <input type="title" name="title" class="form-control <?php if(isset($errors['title'])) : ?> input-error<?php endif ; ?>" value="<?php if (isset($_POST['title'])) { echo $title; } ?>">
    </div>
    <div class="form-group">
      <label for="subject">Subject</label>
      <select name="subject" class ="form-control <?php if(isset($errors['subject'])) : ?> input-error<?php endif ; ?>" value="<?php if (isset($_POST['subject'])) { echo $subject; } ?>">
        <option value="Select">Select</option>
        <?php
          // Fetching all the subjects.
          $subjects = $subjectDB->AvailableSubject();
          if($method->numRows($subjects) > 0) {
            foreach ($subjects as $row) {
        ?>
              <option>
                <?php 
                  echo $row['SubName'];
                ?>
              </option>
        <?php
            }
          }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="class">For Class</label>
      <input type="number" min ="1" max="12" name="class" class="form-control <?php if(isset($errors['class'])) : ?> input-error<?php endif ; ?>" value="<?php if (isset($_POST['class'])) { echo $class; } ?>">
    </div>
    <div class="form-group">
      <label for="upload-file">Upload File</label>
      <input class="form-control" type="file" name="pdfFile"/><br />
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include 'footer.php' ?>
