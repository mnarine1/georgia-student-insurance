<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
   //Inserts header elements and meta tags into the page
   $title = "Add an Asset";   //Variable used to name page
   include_once 'header.php';
?>

<section class="main-container">
   <div class="main-wrapper">
      <h2>Add Asset</h2>
      <!-- Form calls the addAsset.inc.php file when the submit button is clicked.
           addAsset.inc.php will receive the form inputs and process them.
      -->
      <form class="signup-form" action="includes/addAsset.inc.php" method="POST">
         <input list="assetType" name="type" placeholder="Type">
         <datalist id="assetType">
            <option value="Vehicle"></option>
            <option value="Home"></option>
            <option value="Business"></option>
         </datalist>
         <input type="text" name="value" placeholder="Value">
         <input type="date" name="date" placeholder="Date of Purchase">
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
