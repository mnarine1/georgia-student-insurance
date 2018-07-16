<?php
/*
 * When the Make Claim form is submited, the form is checked for errors.
 * If errors are found, the user is returned to the form and an error message is
 * added to the end of the URL.
 * If there are no errors, then the claim is added to the database
 * under the user's AccountID and the user is taken back to the claims page.
 */

 //Checks if the user has submitted the makeClaim form
 //If the user accesses the page without submitting the makeClaim form,
 //then the user is taken to the makeClaim form with an error message
if (isset($_POST['submit'])) {
   //Connect to database
   include_once 'dbh.inc.php';

   //Stores form inputs into variables
   $type = $_POST['type'];
   $date = date('Y')."-".date('m')."-".date('d');
   $location = $_POST['location'];
   $desc = $_POST['desc'];
   $prev = 0;
   $next = 0;
   $account = $_POST['accID'];
   $pID = $_POST['policyID'];

   //Error Handlers
   /*
    * Checks if the required inputs are empty.
    * If empty, then return to form and display error message in URL
    * If not empty, then continue
    */
   if (empty($type) || empty($date) || empty($desc) || empty($location)) {
      //return to makeClaim form with error message
      header("Location: ../makeClaim.php?add=empty");
      exit();  //Stops script from running
   } else {
      //SQL code
      $sql = "INSERT INTO claim (ClaimType, Date, Location, Description, AccountID, PolicyID) VALUES ('$type', '$date', '$location', '$desc', '$account', '$pID');";
      //Insert into connected database
      mysqli_query($conn, $sql);
      //return to claims page with message of success
      header("Location: ../claims.php?claim=success");
      exit();  //Stops script from running
   }
} else {
   //return to makeClaim form with error message
   header("Location: ../makeClaim.php?add=error");
   exit();  //Stops script from running
}
