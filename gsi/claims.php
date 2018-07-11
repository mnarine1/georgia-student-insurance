<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
   $title = "Claim Manager";  //Variable used to name page
   include_once 'header.php';
?>

<section class="main-container">
   <div class="asset-wrapper">
      <h2>Claim Manager</h2>
      <a href="makeClaim.php"><button type="button" name="add">+</button></a><br/>

      <!-- First checks if user is logged in.
           If user is logged in then query the database for all claims that have the same AccountID as the user.
           The loop will create an html element for each claim found and display its information.
           If there are no claims found under the user's AccountID, then a message is displayed prompting the user to
           click the "+" button to make a new claim.
      -->
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
                           <h3>Date: ".$row['Date']."</h3>
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

<!-- Inserts elements in the footer.php file at the end of the page -->
<?php
   include_once 'footer.php';
?>
