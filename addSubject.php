<?php
    
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/subject.php');

    $method = new methodQuery\method;
    $subject = new subjectQuery\subject;

    $a = $_SESSION['fname'];
    
    // Checking User.
    if($a != "admin") {
      echo "Page not Found, Redirecting to home page.";
      header('location:home');
    }
    // From Validation
    if(isset($_POST['submit']))
    {
      $newsubject = $_POST['subject'];

      // Subject Name.
      if(!empty($_POST['subject']))
      {
        $newsubject = $_POST['subject'];
      }
      else 
      {
        $newsubject == null;
      }

      $errors = array();
      if($newsubject == null) 
      {
        $errors['subject'] = 'Subject is required.';
      }

      if(!empty($_POST['subject']))
      {
          // Inserting into DB.
          $result = $subject->InsertSubject($newsubject);
          header('location:dashboard');
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
    <h3 class="form-caption">Add Subject</h3>
    <hr>
    <div class="form-group">
      <label for="class">For Subject</label>
      <input type="text" name="subject" class="form-control <?php if(isset($errors['subject'])) : ?> input-error<?php endif ; ?>" value="<?php if (isset($_POST['subject'])) { echo $newsubject; } ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include 'footer.php' ?>
