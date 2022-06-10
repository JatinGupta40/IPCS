<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/doc.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/user.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');

$doc = new docQuery\doc;
$user = new userQuery\user;
$method = new methodQuery\method;

// Carousel.
// $result1 = $carousel->carousel("SELECT * FROM carousel");

?>

<!-- Carousel Start -->

      <div class="demo carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target=".demo" data-slide-to="0" class="active"></li>
          <li data-target=".demo" data-slide-to="1"></li>
          <li data-target=".demo" data-slide-to="2"></li>
        </ul> 

        <!-- The slideshow -->
        <div class="carousel-inner">
        <?php
          // $i = 0;
          // foreach ($result1 as $row) 
          // {
          //   $actives = '';
          //   if ($i == 0) 
          //   {
          //     $actives = 'active';
          //   }
          //     $img = $row['image'];
          //     $title = $row['title'];
          //     $imageby = $row['imageby'];
        ?>
            <div class="carousel-item <?= $actives; ?>">
              <img src="<?= $img; ?>">
              <h1><?= $title; ?></h1>
              <h3><?= $imageby; ?></h3>
            </div>
            <?php 
              $i++;
          // } 
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href=".demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href=".demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
<!-- Carousel ends -->


<!-- Newsletter start -->

<!-- code is in extra/index.php -->

<!-- Newsletter ends -->

<?php

    // if (isset($_GET['pageno'])) 
    // {
    //   $pageno = $_GET['pageno'];
    //  } 
    // else 
    // {
    //   $pageno = 1;
    // }

  // Number of blogs to be shown on a single page. For Pagination.
  // $no_of_records_per_page = 5;  
  // $offset = ($pageno-1) * $no_of_records_per_page;

  // Counting the number of blogs user have of his own
  // $result = $doc->countAllDoc(); 
  // $total_rows = $method->fetchArray($result)[0];

  // CEIL is used to roundoff.
  // $total_pages = ceil($total_rows / $no_of_records_per_page);
  // $result = $doc->fetchDocPaging($offset, $no_of_records_per_page);
  
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
<?php include 'footer.php';?>
