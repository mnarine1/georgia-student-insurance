<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
   $title = "Policy Manager";  //Variable used to name page
   include_once 'header.php';
?>
<script src="js/selectPolicy.js" charset="utf-8"></script>

<section class="main-container">
   <div class="asset-wrapper">
      <br>
      <h2>Policy Manager</h2>
      <br>
      <?php
         echo '<div class="asset">
                  <h2>High Premium</h2>
                  <h3>'.$_SESSION['avg'].'</h3>
                  <h3><span>Monthly Payment:</span> $'.number_format((float) (($_SESSION['monthPay']*0.5)/12), 2, '.', '').'</h3>
                  <input type="hidden" class="chckd" name="policy" value="'.$_SESSION['type'].'" form="">
                  <input type="hidden" class="chckd" name="pay" value="'.(($_SESSION['monthPay']*0.5)/12).'" form="">';
                  for ($i = 0; $i < 3; $i++) {
                     echo '<input type="hidden" class="chckd" name="asset[]" value="'.$_SESSION['assets'][$i].'" form="">';
                  }
         echo '</div>';

         echo '<div class="asset">
                  <h2>Medium Premium</h2>
                  <h3>'.$_SESSION['avg'].'</h3>
                  <h3><span>Monthly Payment:</span> $'.number_format((float) (($_SESSION['monthPay']*0.3)/12), 2, '.', '').'</h3>
                  <input type="hidden" class="chckd" name="policy" value="'.$_SESSION['type'].'" form="">
                  <input type="hidden" class="chckd" name="pay" value="'.(($_SESSION['monthPay']*0.3)/12).'" form="">';
                  for ($i = 0; $i < 3; $i++) {
                     echo '<input type="hidden" class="chckd" name="asset[]" value="'.$_SESSION['assets'][$i].'" form="">';
                  }
         echo '</div>';

         echo '<div class="asset">
                  <h2>Low Premium</h2>
                  <h3>'.$_SESSION['avg'].'</h3>
                  <h3><span>Monthly Payment:</span> $'.number_format((float) (($_SESSION['monthPay']*0.2)/12), 2, '.', '').'</h3>
                  <input type="hidden" class="chckd" name="policy" value="'.$_SESSION['type'].'" form="">
                  <input type="hidden" class="chckd" name="pay" value="'.(($_SESSION['monthPay']*0.2)/12).'" form="">';
                  for ($i = 0; $i < 3; $i++) {
                     echo '<input type="hidden" class="chckd" name="asset[]" value="'.$_SESSION['assets'][$i].'" form="">';
                  }
         echo '</div>';
      ?>
      <br>
      <form class="" action="includes/selectPolicy.inc.php" method="POST" id="multiSelect">
         <input type="submit" name="submit" value="Select">
      </form>
   </div>
</section>

<!-- Inserts elements in the footer.php file at the end of the page -->
<?php
   include_once 'footer.php';
?>
