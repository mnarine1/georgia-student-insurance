<?php
   include_once 'header.php';
?>

<section class="main-container">
   <div class="main-wrapper">
      <h2>Add Asset</h2>
      <form class="signup-form" action="includes/addAsset.inc.php" method="POST">
         <input list="assetType" name="type" placeholder="Type">
         <datalist id="assetType">
            <option value="Vehicle"></option>
            <option value="Home"></option>
            <option value="Business"></option>
         </datalist>
         <input type="text" name="value" placeholder="Value">
         <input type="date" name="date" placeholder="Date of Purchase">
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
