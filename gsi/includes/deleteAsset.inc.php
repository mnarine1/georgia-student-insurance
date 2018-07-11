<?php
/*
 * If the user clicks the delete button under an asset, the database checks if the asset exists.
 * If the asset is not found in the database, then the user is returned to the assets page
 * and an error message is displayed in the URL stating the asset is not found.
 * If the asset is found, then the asset is removed from the database
 */

 //Checks if the user has clicked the delete button under the desired asset
 //If the user accesses the page without clicking the delete button,
 //then the user is taken to the asset page with an error message
if (isset($_POST['delete'])) {
   //Connect to database
   include_once 'dbh.inc.php';

   //Stores form inputs into variables
   $assetID = $_POST['assetID'];

   //SQL code
   $sql = "SELECT * FROM asset WHERE AssetID='$assetID'";

   //Get result from database
   $result = mysqli_query($conn, $sql);

   //Count the number of rows (Assets) that were returned
   $resultCheck = mysqli_num_rows($result);

   //If the asset is not found in the database,
   //return the user to the asset page and display an error message
   //If the asset is found in the database, remove it from the databse
   if ($resultCheck < 1) {
      header("Location: ../assets.php?error=not_found");
      exit();  //Stops script from running
   } else {
      //SQL code
      $sql = "DELETE FROM asset WHERE AssetID='$assetID'";
      //Delete from database
      mysqli_query($conn, $sql);
      //Return user to the assets page and display message of successful deletion
      header("Location: ../assets.php?delete=success");
      exit();  //Stops script from running
   }
} else {
   header("Location: ../assets.php?delete=error");
   exit();  //Stops script from running
}  //Stops script from running
