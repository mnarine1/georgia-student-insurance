<?php
  class AddassetsTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testAddassetsWithmissingValue()
	 {
   
   include_once 'dbh.inc.php';

  
   $type = "Vehicle";
   $value = "";
   $date = date('05/05/2015');
   $prev = null;
   $next = null;
   if (empty($type) || empty($value) || empty($date)) {
      header("Location: ../addAsset.php?add=empty");
      exit();
          }
			}
		 }