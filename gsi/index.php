<?php
   $title = "Georgia Student Insurance";
   include_once 'header.php';
?>

<section class="main-container">
   <div class="main-wrapper">
      <h2>Georgia Student Insurance</h2>
      <?php
         if (isset($_SESSION['u_id'])) {
            echo '<h2>Welome '.$_SESSION['u_first'].' '.$_SESSION['u_last'].'!</h2>';
         }
      ?>
   </div>
</section>

<?php
   include_once 'footer.php';
?>
