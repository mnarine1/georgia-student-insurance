<?php
   $title = "Make a Claim";
   include_once 'header.php';
?>

<section class="main-container">
   <div class="main-wrapper">
      <h2>Make Claim</h2>
      <form class="signup-form" action="includes/makeClaim.inc.php" method="POST" id="claim-form">
         <input list="claimType" name="type" placeholder="Type">
         <datalist id="claimType">
            <option value="Vehicle"></option>
            <option value="Home"></option>
            <option value="Business"></option>
         </datalist>
         <!--<input type="text" name="location" value="" placeholder="location"> -->
         <textarea name="desc" rows="8" cols="50" form="claim-form"></textarea>

         <?php
            if (isset($_SESSION['u_id'])) {
               echo '<input type="hidden" name="accID" value="'.$_SESSION['u_acc'].'">';
            }
         ?>
         <input type="submit" name="submit" value="Submit">
      </form>
   </div>
</section>

<?php
   include_once 'footer.php';
?>
