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
   $locationX = $locationY = 0;//$_POST['location'];
   $desc = $_POST['desc'];
   $prev = 0;
   $next = 0;
   $account = $_POST['accID'];

   //Error Handlers
   /*
    * Checks if the required inputs are empty.
    * If empty, then return to form and display error message in URL
    * If not empty, then continue
    */
   if (empty($type) || empty($date) || empty($desc)) {
      //return to makeClaim form with error message
      header("Location: ../makeClaim.php?add=empty");
      exit();  //Stops script from running
   } else {
      //SQL code
      $sql = "INSERT INTO claim (ClaimType, Date, LocationX, LocationY, Description, AccountID) VALUES ('$type', '$date', '$locationX', '$locationY', '$desc', '$account');";
      //Insert into connected database
      mysqli_query($conn, $sql);
      //return to claims page with message of success
      header("Location: ../claims.php?pay=success");
      exit();  //Stops script from running
   }
} else {
   //return to makeClaim form with error message
   header("Location: ../makeClaim.php?add=error");
   exit();  //Stops script from running
}
