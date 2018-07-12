<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
 //Inserts header elements and meta tags into the page
   $title = "Georgia Student Insurance";
   include_once 'header.php';
?>

<section class="main-container">
   <div class="main-wrapper">
      <h2>Georgia Student Insurance</h2>
      <?php       //If the user is logged in, display the welcome message with their name
         if (isset($_SESSION['u_id'])) {
            echo '<h2>Welome '.$_SESSION['u_first'].' '.$_SESSION['u_last'].'!</h2>
                  <div class="user-info">

                  </div>';
         }
      ?>
   </div>
   
</section>

<!-- Inserts elements in the footer.php file at the end of the page -->
<?php
   include_once 'footer.php';
?>
