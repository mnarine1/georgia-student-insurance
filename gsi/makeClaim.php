<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
//Inserts header elements and meta tags into the page
   $title = "Make a Claim";
   include_once 'header.php';
?>

<section class="main-container">
   <div class="main-wrapper">
      <h2>Make Claim</h2>
      <!-- Form calls the makeClaim.inc.php file when the submit button is clicked.
           makeClaim.inc.php will receive the form inputs and process them.
      -->
      <form class="signup-form" action="includes/makeClaim.inc.php" method="POST" id="claim-form">
         <input list="claimType" name="type" placeholder="Type">
         <datalist id="claimType">
            <option value="Vehicle"></option>
            <option value="Home"></option>
            <option value="Business"></option>
         </datalist>
         <!--<input type="text" name="location" value="" placeholder="location"> -->
         <textarea name="desc" rows="8" cols="50" form="claim-form"></textarea>
         <!-- Hidden form input that submits the user's account ID in so the information is stored in the correct account -->
         <?php
            if (isset($_SESSION['u_id'])) {
               echo '<input type="hidden" name="accID" value="'.$_SESSION['u_acc'].'">';
            }
         ?>
         <input type="submit" name="submit" value="Submit">
      </form>
   </div>
</section>

<!-- Inserts elements in the footer.php file at the end of the page -->
<?php
   include_once 'footer.php';
?>
