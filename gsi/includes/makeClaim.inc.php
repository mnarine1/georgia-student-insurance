<?php

if (isset($_POST['submit'])) {
   include_once 'dbh.inc.php';

   $type = $_POST['type'];
   $date = $_POST['date'];
   $locationX = $locationY = $_POST['location'];
   $desc = "blank";//$_POST['desc'];
   $prev = 0;
   $next = 0;
   $account = $_POST['accID'];


   if (empty($type) || empty($date) || empty($desc)) {
      header("Location: ../makeClaim.php?add=empty");
      exit();
   } else {
      $sql = "INSERT INTO claim (ClaimType, Date, LocationX, LocationY, Description, Prev, Next, AccountID) VALUES ('$type', '$date', '$locationX', '$locationY', '$desc', '$prev', '$next', '$account');";
      mysqli_query($conn, $sql);
      header("Location: ../claims.php?add=success");
      exit();

   }
} else {
   header("Location: ../makeClaim.php?add=error");
   exit();
}
