<?php

if (isset($_POST['submit'])) {
   include_once 'dbh.inc.php';

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
      header("Location: ../signup.php?signup=empty");
      exit();
   } else {
      //Check if input characters are valid
      if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[0-9]*$/", $zip)) {
         header("Location: ../signup.php?signup=invalid");
         exit();
      } else {
         //Check if username already taken
         $sql = "SELECT * FROM account WHERE Username='$uid'";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);

         if ($resultCheck > 0) {
            header("Location: ../signup.php?signup=usertaken");
            exit();
         } else {
            //Hashing the Password
            //$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            //Insert the user into the database
            $sql = "INSERT INTO account (Username, Password, FirstName, LastName, Street, City, State, ZIP) VALUES ('$uid', '$pwd', '$first', '$last', '$address', '$city', '$state', '$zip');";
            mysqli_query($conn, $sql);
            header("Location: ../signup.php?signup=success");
            exit();
         }
      }
   }

} else {
   header("Location: ../signup.php");
   exit();
}
