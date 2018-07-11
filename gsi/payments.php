<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
 //Inserts header elements and meta tags into the page
   $title = "Payment Manager";
   include_once 'header.php';
?>


<section class="main-container">
   <div class="asset-wrapper">
      <h2>Payment Manager</h2>
      <a href="makePayment.php"><button type="button" name="add">+</button></a><br/>

      <?php
         if (isset($_SESSION['u_id'])) {
            include_once 'includes/dbh.inc.php';
            $paid = "Not Paid";
            $sql = "SELECT * FROM payment WHERE AccountID=".$_SESSION['u_acc']."";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
               while ($row = mysqli_fetch_array($result)) {
                  if ($row['IsPaid'] == 1) {
                     $paid = "Paid";
                  } else {
                     $paid = "Not Paid";
                  }

                  echo "<div class=\"asset\">
                           <h3>Payment</h3>
                           <h3>Value: $".$row['Value']."</h3>
                           <h3>Date: ".$row['DueDate']."</h3>
                           <h3>".$paid."</h3>
                        </div>";
               }
            } else {
               echo '<h2="blank-wrapper">Click the + Button to make a Payment</h2>';
            }
         }
      ?>

</section>





<?php
   include_once 'footer.php';
?>
