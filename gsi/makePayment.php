<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
//Inserts header elements and meta tags into the page
   $title = "Make a Payment";
   include_once 'header.php';
?>

<section class="main-container">
   <div class="main-wrapper">
      <h2>Make a Payment</h2>
      <?php       //Displays the amount due for payment at the top of the page
         $amountDue = 100;
         echo '<h2>Amount Due: $'.$amountDue.'.00</h2>';
      ?>
      <!-- Form calls the makePayment.inc.php file when the submit button is clicked.
           makePayment.inc.php will receive the form inputs and process them.
      -->
      <form class="signup-form" action="includes/makePayment.inc.php" method="POST" >
         <input type="hidden" name="value" value="100">
         <input type="text" name="card" placeholder="Card Number" autocomplete="off">
         <div class="exp-wrapper">
            <span>Expiration Date:</span>
            <input type="text" name="month" placeholder="MM" size="2" maxlength="2">
            <input type="text" name="year" placeholder="YY" size="2" maxlength="2">
         </div>
         <input type="text" name="code" placeholder="Security Code">
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
