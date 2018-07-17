<?php
  class PaymentTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testPaymentmissinginfo()
	 {
       include_once 'dbh.inc.php';
       $value = "100";
   $date = date('2018')."-".date('07')."-".date('20');
   $cardNum = " ";
   $expDateMonth = " ";
   $expDateYear = " ";
   $code = " ";
   $prev = 0;
   $next = 0;
   $paid = 0;
   $account = "123456";
    if (empty($cardNum) || empty($expDateMonth) || empty($expDateYear) || empty($code)) {
      header("Location: ../makePayment.php?pay=empty");
      exit(); }
 }
 }