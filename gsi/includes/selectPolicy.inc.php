<?php
/*
 * When the add Login form is submited, the form is checked for errors.
 * If errors are found, the user is returned to the home page and an error message is
 * added to the end of the URL.
 * If there are no errors, then the user is logged in.
 */

 //Starts a session which allows the user to navigate the website while still being logged in
session_start();

//Checks if the user submitted the login form
//If the user accesses the page without submitting the login form,
//then the user is taken to the home page with an error message
if (isset($_POST['submit'])) {
   //Connect to database
   include 'dbh.inc.php';

   //Stores form inputs into variables
   $assets = $_SESSION['assets'];
   $monthPay = $_POST['pay'];
   $type = $_POST['policy'];
   $account = $_SESSION['u_acc'];

   //Error Handlers
   /*
    * Checks if the required inputs are empty.
    * If empty, then return to form and display error message in URL
    * If not empty, then continue
    */
    echo $type;
   if (empty($monthPay) || empty($type)) {
      //return to the home page with error message
      header("Location: ../policies.php?add=error");
      exit();  //Stops script from running
   } else {
      /*
       * Checks if the username is found in the database
       * If there are no users in the database with the same username,
       * then return user to the home page with an error message
       * If a user is found in the database with the same username, then continue
       */

       //SQL code
       if (empty($assets[2]) && empty($assets[1])) {
          $sql = "INSERT INTO policy (AccountID, PolicyType, Asset1, Price, IsActive) VALUES ('$account', '$type', '$assets[0]',  '$monthPay', '1');";
       } else if (empty($assets[2])) {
          $sql = "INSERT INTO policy (AccountID, PolicyType, Asset1, Asset2, Price, IsActive) VALUES ('$account', '$type', '$assets[0]', '$assets[1]', '$monthPay', '1');";
       } else {
          $sql = "INSERT INTO policy (AccountID, PolicyType, Asset1, Asset2, Asset3, Price, IsActive) VALUES ('$account', '$type', '$assets[0]', '$assets[1]', '$assets[2]', '$monthPay', '1');";
       }

      //Get result from the connected database
      mysqli_query($conn, $sql);
      //Count the number of row (Accounts) that were returned
      //If none found then return to home page with error message

      $sql = "SELECT * FROM policy WHERE AccountID=".$_SESSION['u_acc']." AND IsActive>=1";
      $result = mysqli_query($conn, $sql);

      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck > 1) {
         while ($row = mysqli_fetch_array($result)) {
            $lastSaved = $row['PolicyNumber'];
         }
      }

      if (empty($assets[2]) && empty($assets[1])) {
         $sql = "UPDATE asset SET PolicyID=".$lastSaved." WHERE AssetID=".$assets[0].";";
      } else if (empty($assets[2])) {
         $sql = "UPDATE asset SET PolicyID=".$lastSaved." WHERE AssetID=".$assets[0]." OR AssetID=".$assets[1].";";
      } else {
         $sql = "UPDATE asset SET PolicyID=".$lastSaved." WHERE AssetID=".$assets[0]." OR AssetID=".$assets[1]." OR AssetID=".$assets[2].";";
      }

      mysqli_query($conn, $sql);

//      $sql = "UPDATE policy SET IsActive=0 WHERE AccountID=".$_SESSION['u_acc']." AND PolicyNumber!=".$lastSaved.";";
//      mysqli_query($conn, $sql);

      header("Location: ../policies.php?policy=success");
   }
} else {
   //return to the home page with error message
   header("Location: ../policies.php?error");
   exit();  //Stops script from running
}
