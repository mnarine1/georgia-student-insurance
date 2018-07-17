<?php
  class AddassetsTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testAddassetsWithInvalidValue()
	 {
   
   include_once 'dbh.inc.php';

  
   $type = "Vehicle";
   $value = "afasfasf";
   $date = date('05/05/2015');
   $prev = null;
   $next = null;
   $account = "123456";
   if (empty($type) || empty($value) || empty($date)) {
      header("Location: ../addAsset.php?add=empty");
      exit();
	 } else {
      if (!preg_match("/^[0-9]*$/", $value)) {
         header("Location: ../addAsset.php?add=value");
         exit(); 
      } 
   }
			}
		 }