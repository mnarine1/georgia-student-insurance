<?php

if (isset($_POST['submit'])) {
   include_once 'dbh.inc.php';

   $type = $_POST['type'];
   $date = date('Y')."-".date('m')."-".date('d');
   $locationX = $locationY = 0;//$_POST['location'];
   $desc = $_POST['desc'];
   $prev = 0;
   $next = 0;
   $account = $_POST['accID'];


   if (empty($type) || empty($date) || empty($desc)) {
      header("Location: ../makeClaim.php?add=empty");
      exit();
   } else {
      $sql = "INSERT INTO claim (ClaimType, Date, LocationX, LocationY, Description, AccountID) VALUES ('$type', '$date', '$locationX', '$locationY', '$desc', '$account');";
      mysqli_query($conn, $sql);
      header("Location: ../claims.php?pay=success");
      exit();

   }
} else {
   header("Location: ../makeClaim.php?add=error");
   exit();
}
