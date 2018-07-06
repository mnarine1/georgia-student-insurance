<?php
   $title = "Asset Manager";
   include_once 'header.php';
?>

<section class="main-container">
   <div class="asset-wrapper">
      <h2>Asset Manager</h2>
      <a href="addAsset.php"><button type="button" name="add">+</button></a><br/>

      <?php
         if (isset($_SESSION['u_id'])) {
            include_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM asset WHERE AccountID=".$_SESSION['u_acc']."";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
               while ($row = mysqli_fetch_array($result)) {
                  echo "<div class=\"asset\">
                           <div class=\"asset-icon\"></div>
                           <h3>Type: ".$row['AssetType']."</h3>
                           <h3>Value: $".$row['Value']."</h3>
                           <h3>Date: ".$row['Date']."</h3>
                        </div>";
               }
            } else {
               echo '<h2="blank-wrapper">Click the + Button to add an Asset</h2>';
            }
         }
      ?>

</section>


<?php
   include_once 'footer.php';
?>
