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

    if (isset($_POST['submit'])) 
    {
      $data = 
        [
          'fname' => $_POST['fname'], // Post fname is coming from the UI and getting stored into fname.
          'lname'=> $_POST['lname'],
          'email' => $_POST['email'],
          'pass' => $_POST['password'],
          'repass' => $_POST['repassword'],
        ];
      // Validation.
      if (!empty($data['fname']))  // Fname.
      {
        $fname = htmlspecialchars($data['fname']);
      }
      else
      {
        $fname = null;
      }
      
      if (!empty($data['lname']))  // Lname.
      {
        $lname = htmlspecialchars($data['lname']);
      }
      else
      {
        $lname = null;
      }
    
      if (!empty($data['email'])) // Email.
      { 
        $email = htmlspecialchars($data['email']);
      }
      else
      {
        $email = null;
      }
   
      if (!empty($data['pass'])) // Pass.
      {
        $pass = htmlspecialchars($data['pass']);
      } 
      else 
      {
        $pass = null;
      }
   
      if (!empty($data['repass']))  // Repass.
      {
        $repass = htmlspecialchars($data['repass']);
      }
      else 
      {
        $repass = null;
      }
     
      $errors = array();
      if($fname == null) 
      {
        $errors['fname'] = 'Fname is required.';
      }

      if($lname == null) 
      {
        $errors['lname'] = 'Lname is required.';
      }

      if ($email == null) 
      {
        $errors['email'] = 'Email-Id is required.';
      }
      else 
      {
        // Checking the entered email id with the existing email id's.
        $sql = $user->checkEmail($email); 
        if(!empty($sql))
        {
          $row = $method->numRows($sql);
          if($row >=  1)
          {
            $errors['email'] = 'This email id is already taken';
          }
        }
      }
      
      if($pass == null) 
      {
        $errors['pass'] = 'Password is required.';
      }
      
      if($repass == null) 
      {
        $errors['repass'] = 'Confirm Password is required.';
      }
      
      if($pass != null && $repass != null)
      { 
        if($pass != $repass)
        {
          $errors['check'] = 'Password and Confirm Password does not matched.';
        }
      } 
      
      // Register User.
      if(!count($errors)>0) 
      { 
        if($user->insertUserDetails($fname, $lname, $email, md5($pass)))
        {
          $alert = true;
          $_SESSION['fname'] = $fname;
          $_SESSION['lname'] = $lname;
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
          $success = true;
          $_SESSION['success'] = $success ;
          header('location:dashboard');
        }
        else
        {       
          $errors['check'] = 'Registration failed. Please check your Credentials';
        }
      }
    }        
?>

<?php 
if (isset($errors)) {
  if (count($errors) > 0) {
    foreach ($errors as $key => $value) {
      echo '<div class="warning">' . $value . '</div>';
      }
   }
}
?>

<div id="register" class="tabcontent">
  <div class="loginpage card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
      <h4 class="card-title mt-3 text-center">Register Here</h4>
      <form method="POST">
        <!-- First Name -->
        <div class="form-group input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          </div>
          <input type="text" name="fname" class="form-control <?php if (isset($errors['check']) || isset($errors['fname'])) : ?>input-error<?php endif; ?>" placeholder = "First Name" value="<?php if (isset($_POST['fname'])) { echo $fname; } ?>">
        </div>
        <!-- Last Name -->
        <div class="form-group input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          </div>
          <input type="text" name="lname" class="form-control <?php if (isset($errors['check']) || isset($errors['lname'])) : ?>input-error<?php endif; ?>" placeholder = "Last Name" value="<?php if (isset($_POST['lname'])) { echo $lname; } ?>">
        </div>
        <!-- Email -->
        <div class="form-group input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
          </div>
          <input type="text" name="email" class="form-control <?php if (isset($errors['check']) || isset($errors['email'])) : ?>input-error<?php endif; ?>" placeholder = "xzy@gmail.com" value="<?php if (isset($_POST['email'])) { echo $email; } ?>">
        </div>
        <!-- Password -->
        <div class="form-group input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
          <input type="text" name="password" class="form-control <?php if (isset($errors['check']) || isset($errors['pass'])) : ?>input-error<?php endif; ?>" placeholder = "****" value="<?php if (isset($_POST['pass'])) { echo $pass; } ?>">
        </div>
        <!-- Confirm Password -->
        <div class="form-group input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
          <input type="password" name="repassword" class="form-control <?php if (isset($errors['check']) || isset($errors['repass'])) : ?>input-error<?php endif; ?>" placeholder = "****" value="<?php if (isset($_POST['repass'])) { echo $repass; } ?>">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block" name="submit"> Register  </button>
        </div>
        <div class="form-group" style="text-align:center;">
          <a href="forgotpwd"><p>Forgotten Password?</p></a> 
        </div>
      </form>
    </article>
  </div>
</div>

   </div>
   <!-- card.// -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>    
<script src="/vendors/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="/vendors/formvalidation/dist/js/plugins/Tachyons.min.js"></script>
<!-- <script>
   function openTab(evt, tabname) {
     var i, tabcontent, tablinks;
   
     tabcontent = document.getElementsByClassName("tabcontent");
     for (i = 0; i < tabcontent.length; i++) {
       tabcontent[i].style.display = "none";
     }
     tablinks = document.getElementsByClassName("tablinks");
     for (i = 0; i < tablinks.length; i++) {
       tablinks[i].className = tablinks[i].className.replace(" active", "");
     }
     document.getElementById(tabname).style.display = "block";
     evt.currentTarget.className += " active";
   }   
   // Get the element with id="defaultOpen" and click on it
   document.getElementById("defaultOpen").click();

</script> -->
<!-- <script src="../js/validation.js"></script> -->
<?php include './footer.php'; ?>
