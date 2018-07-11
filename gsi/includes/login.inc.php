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
   $uid = $_POST['uid'];
   $pwd = $_POST['pwd'];

   //Error Handlers
   /*
    * Checks if the required inputs are empty.
    * If empty, then return to form and display error message in URL
    * If not empty, then continue
    */
   if (empty($uid) || empty($pwd)) {
      //return to the home page with error message
      header("Location: ../index.php?login=empty");
      exit();  //Stops script from running
   } else {
      /*
       * Checks if the username is found in the database
       * If there are no users in the database with the same username,
       * then return user to the home page with an error message
       * If a user is found in the database with the same username, then continue
       */

       //SQL code
      $sql = "SELECT * FROM account WHERE Username='$uid'";
      //Get result from the connected database
      $result = mysqli_query($conn, $sql);
      //Count the number of row (Accounts) that were returned
      $resultCheck = mysqli_num_rows($result);
      //If none found then return to home page with error message
      if ($resultCheck < 1) {
         //return to the home page with error message
         header("Location: ../index.php?login=notfound");
         exit();  //Stops script from running
      } else {
         /*
          * Checks if the password associated to the found username is the same
          * as the password input from the login form.
          * If it is the incorrect password, then return the user to the
          * home page with an error message.
          * If it is the correct password, then login in user by
          * storing user information into the session variables.
          */
         if ($row = mysqli_fetch_assoc($result)) {
            //Dehashing the Password
            //$hashedPwdCheck = password_verify($pwd, $row['Password']);
            $hashedPwdCheck = $pwd == $row['Password'];  //Hashed password not working so raw password is stored in checked
            if ($hashedPwdCheck == false) {
               //return to the home page with error message
               header("Location: ../index.php?login=password");
               exit();  //Stops script from running
            } elseif ($hashedPwdCheck == true) {
               //Log in the user here
               //Session variables allow the website to access certain user information while the user is logged in
               $_SESSION['u_acc'] = $row['AccountID'];
               $_SESSION['u_id'] = $row['Username'];
               $_SESSION['u_first'] = $row['FirstName'];
               $_SESSION['u_last'] = $row['LastName'];
               $_SESSION['u_address'] = $row['Street'];
               $_SESSION['u_city'] = $row['City'];
               $_SESSION['u_state'] = $row['State'];
               $_SESSION['u_zip'] = $row['ZIP'];
               //return user to home page with message of successful login
               header("Location: ../index.php?login=success");
               exit();  //Stops script from running
            }
         }
      }
   }
} else {
   //return to the home page with error message
   header("Location: ../index.php?login=error");
   exit();  //Stops script from running
}
