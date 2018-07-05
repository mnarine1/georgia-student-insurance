<?php

session_start();

if (isset($_POST['submit'])) {

   include 'dbh.inc.php';

   $uid = $_POST['uid'];
   $pwd = $_POST['pwd'];

   //Error Handlers
   //Check if Inputs are empty
   if (empty($uid) || empty($pwd)) {
      header("Location: ../index.php?login=empty");
      exit();
   } else {
      //Check id username is in database
      $sql = "SELECT * FROM account WHERE Username='$uid'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck < 1) {
         header("Location: ../index.php?login=notfound");
         exit();
      } else {
         if ($row = mysqli_fetch_assoc($result)) {
            //Dehashing the Password
            //$hashedPwdCheck = password_verify($pwd, $row['Password']);
            $hashedPwdCheck = $pwd == $row['Password'];
            if ($hashedPwdCheck == false) {
               header("Location: ../index.php?login=password");
               exit();
            } elseif ($hashedPwdCheck == true) {
               //Log in the user here
               $_SESSION['u_id'] = $row['Username'];
               $_SESSION['u_first'] = $row['FirstName'];
               $_SESSION['u_last'] = $row['LastName'];
               $_SESSION['u_address'] = $row['Street'];
               $_SESSION['u_city'] = $row['City'];
               $_SESSION['u_state'] = $row['State'];
               $_SESSION['u_zip'] = $row['ZIP'];
               header("Location: ../index.php?login=success");
               exit();
            }
         }
      }
   }
} else {
   header("Location: ../index.php?login=error");
   exit();
}
