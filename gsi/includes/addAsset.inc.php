<?php

if (isset($_POST['submit'])) {
   include_once 'dbh.inc.php';
   include_once 'var.inc.php';

   $type = $_POST['type'];
   $value = $_POST['value'];
   $date = $_POST['date'];
   $prev = null;
   $next = null;
   $account = $_POST['accID'];


   if (empty($type) || empty($value) || empty($date)) {
      header("Location: ../addAsset.php?add=empty");
      exit();
   } else {
      if (!preg_match("/^[0-9]*$/", $value)) {
         header("Location: ../addAsset.php?add=value");
         exit();
      } else {
         $sql = "INSERT INTO asset (AssetType, Value, Date, Prev, Next, AccountID) VALUES ('$type', '$value', '$date', '$prev', '$next', '$account');";
         mysqli_query($conn, $sql);
         header("Location: ../assets.php?add=success");
         exit();
      }
   }
} else {
   header("Location: ../addAsset.php?add=error");
   exit();
}
