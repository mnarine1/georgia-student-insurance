<?php
  class PaymentTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testPaywithInvalidInfo()
	 {
       include_once 'dbh.inc.php';
       $value = "100";
   $date = date('2018')."-".date('07')."-".date('20');
   $cardNum = "123124141241vcx1";
   $expDateMonth = "da";
   $expDateYear = "gd";
   $code = "abc";
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
      }
 }
}
 }