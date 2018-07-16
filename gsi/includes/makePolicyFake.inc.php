<?php
/*
 * When the Add Asset form is submited, the form is checked for errors.
 * If errors are found, the user is returned to the form and an error message is
 * added to the end of the URL.
 * If there are no errors, then the asset is added to the database
 * under the user's AccountID and the user is taken back to the assets page.
 */
session_start();
//Checks if the user has submitted the addAsset form
//If the user accesses the page without submitting the addAsset form,
//then the user is taken to the addAsset form with an error message
if (isset($_POST['submit'])) {
   //Connect to databse
   include_once 'dbh.inc.php';

   $totalVal = 0;
   $type = array("", "", "");
   $counter = 0;
   $assets = array("", "", "");
   $polType = "";

   //Stores form inputs into variables
   if (!empty($_POST['asset-Id'])) {
      foreach ($_POST['asset-Id'] as $selected) {
         $sql = "SELECT * FROM asset WHERE AssetID='$selected'";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);
         if ($resultCheck > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               if($row['AssetType'] == "Home" || $row['AssetType'] == "Business") {
                  $totalVal = $totalVal + (($row['Value']*0.1)+1000);
               } else {
                  $totalVal = $totalVal + $row['Value'];
               }
            }


            $assets[$counter] = $row['AssetID'];
            if (!($type[0] == $row['AssetType'] || $type[1] == $row['AssetType'] || $type[2] == $row['AssetType'])) {
               $type[$counter] = $row['AssetType'];
               $polType = $polType.$row['AssetType'];
            }
            echo $row['Value']."<br>";
         } else {
            echo "error";
         }
         $counter++;
      }
   } else {
      echo "empty";
   }
   if ($polType == "HomeVehicle" || $polType == "VehicleHome") {
      $polType = "Home and Auto";
   } else if ($polType == "HomeBusiness" || $polType == "BusinessHome") {
      $polType = "Home and Business";
   } else if ($polType == "VehicleBusiness" || $polType == "BusinessVehicle") {
      $polType = "Business and Auto";
   } else if ($polType == "Home" || $polType == "Business") {

   } else if ($polType == "Vehicle") {
      $polType = "Auto";
   } else {
      $polType = "All-in-One";
   }

   $_SESSION['avg'] = $avg;
   $_SESSION['temp'] = $type;
   $_SESSION['monthPay'] = ($totalVal*0.5);
   $_SESSION['type'] = $polType;
   $_SESSION['assets'] = $assets;

   header("Location: ../selectPolicy.php");

} else {
   //return to addAsset form with error message
   header("Location: ../makePolicy.php?add=error");
   exit();  //Stops script from running
}
