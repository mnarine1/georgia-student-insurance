<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
 //Inserts header elements and meta tags into the page
   $title = "Payment Manager";
   include_once 'header.php';
?>


<section class="main-container">
   <div class="asset-wrapper">
      <br>
      <h2>Payment Manager</h2>
      <br>
      <?php
         if (isset($_SESSION['u_id'])) {
            include_once 'includes/dbh.inc.php';
            $paid = "Not Paid";
            $sql = "SELECT * FROM payment WHERE AccountID=".$_SESSION['u_acc']."";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
               while ($row = mysqli_fetch_array($result)) {
                  if ($row['IsPaid'] > 0) {
                     $paid = "Paid";
                  } else {
                     $paid = "Not Paid";
                  }

                  echo "<div class=\"asset ".$paid."\">
                           <h2>Payment</h2>
                           <h3><span>Value:</span> $".$row['Value']."</h3>
                           <h3><span>Date:</span> ".$row['DueDate']."</h3>
                           <h3><span>Status:</span> ".$paid."</h3>
                        </div>";
               }
            } else {
               echo '<h3 style="text-align:center;">To make a payment, go to your policies.</h3>';
            }
         }
      ?>
   </div>
</section>

<?php
   include_once 'footer.php';
?>
