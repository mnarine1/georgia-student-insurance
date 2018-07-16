<?php
  class SignUpTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testSignUpwithEmptyinfo()
	 {
       include_once 'dbh.inc.php';
	 $first = " ";
   $last = " ";
   $address = " ";
   $city = " ";
   $state = " ";
   $zip = " ";
   $uid = " ";
   $pwd = " ";
   if (empty($first) || empty($last) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($uid) || empty($pwd)) {
      header("Location: ../signup.php?signup=empty");
      exit();
   }
   }
  }