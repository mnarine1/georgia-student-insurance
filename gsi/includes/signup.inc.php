<?php
/*
 * When the Signup form is submited, the form is checked for errors.
 * If errors are found, the user is returned to the form and an error message is
 * added to the end of the URL.
 * If there are no errors, then the new user/account is added to the database
 * and the user is automatically given an AccountID.
 */

 //Checks if the user has submitted the signup form
 //If the user accesses the page without submitting the signup form,
 //then the user is taken to the signup form with an error message
if (isset($_POST['submit'])) {
   //Connect to database
   include_once 'dbh.inc.php';

   //Stores form inputs into variables
   $first = $_POST['first'];
   $last = $_POST['last'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $zip = $_POST['zip'];
   $uid = $_POST['uid'];
   $pwd = $_POST['pwd'];

   //Error Handlers
   //Check for emplty fields
   if (empty($first) || empty($last) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($uid) || empty($pwd)) {
      //return to signup form with error message
      header("Location: ../signup.php?signup=empty");
      exit();  //Stops script from running
   } else {
      //Check if input characters are valid
      if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[0-9]*$/", $zip)) {
         //return to signup form with error message
         header("Location: ../signup.php?signup=invalid");
         exit();  //Stops script from running
      } else {
         //Check if username already taken
         $sql = "SELECT * FROM account WHERE Username='$uid'";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);

         if ($resultCheck > 0) {
            //return to signup form with error message
            header("Location: ../signup.php?signup=usertaken");
            exit();  //Stops script from running
         } else {
            //Hashing the Password
            //Password is hashed in order to protect the user's password from being accessed outside the system
            //$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            //Insert the user into the database
            //SQL code
            $sql = "INSERT INTO account (Username, Password, FirstName, LastName, Street, City, State, ZIP) VALUES ('$uid', '$pwd', '$first', '$last', '$address', '$city', '$state', '$zip');";
            //Insert into connected database
            mysqli_query($conn, $sql);
            //return to home page page with message of successful signup
            header("Location: ../index.php?signup=success");
            exit();  //Stops script from running
         }
      }
   }

} else {
   //return to signup form with error message
   header("Location: ../signup.php?signup=error");
   exit();  //Stops script from running
}
