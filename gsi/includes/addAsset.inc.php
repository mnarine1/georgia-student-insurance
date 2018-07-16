<?php
/*
 * When the Add Asset form is submited, the form is checked for errors.
 * If errors are found, the user is returned to the form and an error message is
 * added to the end of the URL.
 * If there are no errors, then the asset is added to the database
 * under the user's AccountID and the user is taken back to the assets page.
 */

//Checks if the user has submitted the addAsset form
//If the user accesses the page without submitting the addAsset form,
//then the user is taken to the addAsset form with an error message
if (isset($_POST['submit'])) {
   //Connect to databse
   include_once 'dbh.inc.php';

   //Stores form inputs into variables
   $type = $_POST['type'];
   $value = $_POST['value'];
   $date = $_POST['date'];
   $prev = null;
   $next = null;
   $account = $_POST['accID'];

   //Error Handlers
   /*
    * Checks if the required inputs are empty.
    * If empty, then return to form and display error message in URL
    * If not empty, then continue
    */
   if (empty($type) || empty($value) || empty($date)) {
      //return to addAsset form with error message
      header("Location: ../addAsset.php?add=empty");
      exit();  //Stops script from running
   } else {
      /*
       * Checks if value variable contains only numeric values
       * If it contains non-numeric characters, then return to the form with an error message in the URL
       * If it contains only numeric values, then add to the database
       */
      if (!preg_match("/^[0-9]*$/", $value)) {
         //return to addAsset form with error message
         header("Location: ../addAsset.php?add=value");
         exit();  //Stops script from running
      } else {
         //SQL code
         $sql = "INSERT INTO asset (AssetType, Value, Date, AccountID) VALUES ('$type', '$value', '$date', '$account');";
         //Insert into connected database
         mysqli_query($conn, $sql);
         //return to asset page with message of success
         header("Location: ../assets.php?add=success");
         exit();  //Stops script from running
      }
   }
} else {
   //return to addAsset form with error message
   header("Location: ../addAsset.php?add=error");
   exit();  //Stops script from running
}
