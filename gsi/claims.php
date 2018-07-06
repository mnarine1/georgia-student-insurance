<?php
   $title = "Claim Manager";
   include_once 'header.php';
?>

<section class="main-container">
   <div class="asset-wrapper">
      <h2>Claim Manager</h2>
      <a href="makeClaim.php"><button type="button" name="add">+</button></a><br/>

      <?php
         if (isset($_SESSION['u_id'])) {
            include_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM claim WHERE AccountID=".$_SESSION['u_acc']."";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
               while ($row = mysqli_fetch_array($result)) {
                  echo "<div class=\"asset\">
                           <h2>Claim</h2>
                           <h3>Type: ".$row['ClaimType']."</h3>
                           <h3>Date: $".$row['Date']."</h3>
                           <h3>Location: ".$row['LocationX'].", ".$row['LocationY']."</h3>
                           <h3>Description: ".$row['Description']."</h3>
                        </div>";
               }
            } else {
               echo '<h2="blank-wrapper">Click the + Button to make a Claim<h2>';
            }
         }
      ?>

</section>






<?php
   include_once 'footer.php';
?>
