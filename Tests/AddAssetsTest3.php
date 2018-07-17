<?php
  class AddassetsTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testAddassetsWithmissingDate()
	 {
   
   include_once 'dbh.inc.php';

  
   $type = "Vehicle";
   $value = "1224";
   $date = " ";
   $prev = null;
   $next = null;
   if (empty($type) || empty($value) || empty($date)) {
      header("Location: ../addAsset.php?add=empty");
      exit();
          }
			}
		 }