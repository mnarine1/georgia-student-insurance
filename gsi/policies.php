<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
   $title = "Policy Manager";  //Variable used to name page
   include_once 'header.php';
?>

<section class="main-container">
   <div class="asset-wrapper">
      <h2>Policy Manager</h2>
   </div>
</section>

<!-- Inserts elements in the footer.php file at the end of the page -->
<?php
   include_once 'footer.php';
?>
