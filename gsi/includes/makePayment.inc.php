<?php

if (isset($_POST['submit'])) {
   include_once 'dbh.inc.php';

   $value = $_POST['value'];
   $date = date('Y')."-".date('m')."-".date('d');
   $cardNum = $_POST['card'];
   $expDateMonth = $_POST['month'];
   $expDateYear = $_POST['year'];
   $code = $_POST['code'];
   $prev = 0;
   $next = 0;
   $paid = 0;
   $account = $_POST['accID'];


   if (empty($cardNum) || empty($expDateMonth) || empty($expDateYear) || empty($code)) {
      header("Location: ../makePayment.php?pay=empty");
      exit();
   } else {
      if (!preg_match("/^[0-9]*$/", $cardNum) || !preg_match("/^[0-9]*$/", $expDateMonth) || !preg_match("/^[0-9]*$/", $expDateYear) || !preg_match("/^[0-9]*$/", $code)) {
         header("Location: ../makePayment.php?pay=notNumber");
         exit();
      } else {
         $paid = 1;
         $sql = "INSERT INTO payment (Value, DueDate, isPaid, AccountID) VALUES ('$value', '$date', '$paid', '$account');";
         mysqli_query($conn, $sql);
         header("Location: ../payments.php?pay=success");
         exit();
      }
   }
} else {
   header("Location: ../makePayment.php?pay=error");
   exit();
}
