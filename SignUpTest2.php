<?php
  class SignUpTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testSignUpwithInvalidinfo()
	 {
       include_once 'dbh.inc.php';
	 $first = "1234";
   $last = "4990" ";
   $address = "adsa";
   $city = "Aafas";
   $state = "GA";
   $zip = "asdfa";
   $uid = "user1";
   $pwd = "abc123";
   if (empty($first) || empty($last) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($uid) || empty($pwd)) {
      header("Location: ../signup.php?signup=empty");
      exit();}else{
	  if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[0-9]*$/", $zip)) {
         header("Location: ../signup.php?signup=invalid");
         exit();} 
   }
   }
 }