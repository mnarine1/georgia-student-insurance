<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
   $title = "Asset Manager";  //Variable used to name page
   include_once 'header.php';
?>

<section class="main-container">
   <div class="asset-wrapper">
      <br>
      <h2>Asset Manager</h2>
      <br>
      <!-- First checks if user is logged in.
           If user is logged in then query the database for all assets that have the same AccountID as the user.
           The loop will create an html element for each asset found and display its information.
           If there are no assets found under the user's AccountID, then a message is displayed prompting the user to
           click the "+" button to add a new asset.
      -->
      <?php
         if (isset($_SESSION['u_id'])) {
            include_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM asset WHERE AccountID=".$_SESSION['u_acc']."";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
               while ($row = mysqli_fetch_array($result)) {
                  echo "<div class=\"asset\" asset-ID=\"".$row['AssetID']."\" type=\"".$row['AssetType']."\">
                           <div class=\"asset-icon\"></div>
                           <h3><span>Type:</span> ".$row['AssetType']."</h3>
                           <h3><span>Value:</span> $".$row['Value']."</h3>
                           <h3><span>Date:</span> ".$row['Date']."</h3>
                           <div class=\"delete\">
                              <form class=\"\" action=\"includes/deleteAsset.inc.php\" method=\"POST\">
                                 <input type=\"hidden\" name=\"assetID\" value=\"".$row['AssetID']."\">
                                 <input type=\"submit\" name=\"delete\" value=\"DELETE\">
                              </form>
                           </div>
                        </div>";
               }
            } else {
               echo '<h3 style="text-align:center;">Click the + Button to add an Asset</h3>';
            }
         }
      ?>

      <a href="addAsset.php"><div class="asset add"><span class="plus">+</span></div></a>
   </div>
</section>

<!-- Inserts elements in the footer.php file at the end of the page -->
<?php
   include_once 'footer.php';
?>
