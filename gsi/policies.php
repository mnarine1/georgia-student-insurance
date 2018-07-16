<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
   $title = "Policy Manager";  //Variable used to name page
   include_once 'header.php';
?>

<section class="main-container">
   <div class="asset-wrapper">
      <br>
      <h2>Policy Manager</h2>
      <br>

      <?php
         if (isset($_SESSION['u_id'])) {
            include_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM policy WHERE AccountID=".$_SESSION['u_acc']." AND IsActive=1";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
               while ($row = mysqli_fetch_array($result)) {
                  echo "<div class=\"asset code".$row['IsActive']."\">
                           <div class=\"asset-icon\"></div>
                           <h3><span>Type:</span> ".$row['PolicyType']."</h3>
                           <form class=\"\" action=\"makeClaim2.php\" method=\"POST\">
                              <input type=\"hidden\" name=\"policyID\" value=\"".$row['PolicyNumber']."\">
                              <input type=\"hidden\" name=\"policyType\" value=\"".$row['PolicyType']."\">
                              <input type=\"submit\" name=\"submit\" value=\"MAKE CLAIM\">
                           </form>
                           <form class=\"\" action=\"makePayment2.php\" method=\"POST\">
                              <input type=\"hidden\" name=\"policyID\" value=\"".$row['PolicyNumber']."\">
                              <input type=\"hidden\" name=\"price\" value=\"".$row['Price']."\">
                              <input type=\"submit\" name=\"submit\" value=\"MAKE PAYMENT\">
                           </form>
                        </div>";
               }
            } else {
               echo '<h3 style="text-align:center;">Click the + Button to add an Asset</h3>';
            }
         }
      ?>

      <a href="makePolicy.php"><div class="asset add"><span class="plus">+</span></div></a>
   </div>
</section>

<!-- Inserts elements in the footer.php file at the end of the page -->
<?php
   include_once 'footer.php';
?>
