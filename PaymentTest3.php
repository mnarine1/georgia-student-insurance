<?php
  class PaymentTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testPaysuccess()
	 {
       include_once 'dbh.inc.php';
       $value = "100";
   $date = date('2018')."-".date('07')."-".date('20');
   $cardNum = "1231241412411231";
   $expDateMonth = "12";
   $expDateYear = "20";
   $code = "123";
   $prev = 0;
   $next = 0;
   $paid = 0;
   $account = "123456";
   if (empty($cardNum) || empty($expDateMonth) || empty($expDateYear) || empty($code)) {
      header("Location: ../makePayment.php?pay=empty");
      exit();
   } else {
      if (!preg_match("/^[0-9]*$/", $cardNum) || !preg_match("/^[0-9]*$/", $expDateMonth) || !preg_match("/^[0-9]*$/", $expDateYear) || !preg_match("/^[0-9]*$/", $code)) {
         header("Location: ../makePayment.php?pay=notNumber");
         exit();
      }else {
         $paid = 1;
         $sql = "INSERT INTO payment (Value, DueDate, isPaid, AccountID) VALUES ('$value', '$date', '$paid', '$account');";
         mysqli_query($conn, $sql);
         header("Location: ../payments.php?pay=success");
         exit();
      }
 }
}
 }