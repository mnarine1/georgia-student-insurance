<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
   $title = "Policy Manager";  //Variable used to name page
   include_once 'header.php';
?>
<script src="js/select.js" charset="utf-8"></script>

<section class="main-container">
   <div class="asset-wrapper">
      <br>
      <h2>Select up to 3 Assets</h2>
      <br>
      <?php
         if (isset($_SESSION['u_id'])) {
            include_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM asset WHERE AccountID=".$_SESSION['u_acc']." AND PolicyID=0;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
               while ($row = mysqli_fetch_array($result)) {
                  echo "<div class=\"asset\" asset-ID=\"".$row['AssetID']."\" type=\"".$row['AssetType']."\">
                           <div class=\"asset-icon\"></div>
                           <h3><span>Type:</span> ".$row['AssetType']."</h3>
                           <h3><span>Value:</span> $".$row['Value']."</h3>
                           <h3><span>Date:</span> ".$row['Date']."</h3>
                           <input class=\"chckd\" type=\"hidden\" name=\"asset-Id[]\" value=\"".$row['AssetID']."\" form=\"\">
                        </div>";
               }
               echo "<form class=\"\" action=\"includes/makePolicyFake.inc.php\" method=\"POST\" id=\"multiSelect\">
                        <input type=\"submit\" name=\"submit\" value=\"NEXT\">
                     </form>";
            } else {
               echo '<h3 style="text-align:center;">You have no uncovered assets. <a href="policies.php">Go back</a></h3>';
            }
         }
      ?>

   </div>
</section>

<!-- Inserts elements in the footer.php file at the end of the page -->
<?php
   include_once 'footer.php';
?>
