<?php
  class AddassetsTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testAddassetsWithmissingType()
	 {
   
   include_once 'dbh.inc.php';

  
   $type = " ";
   $value = "1224";
   $date = date('05/05/2015');
   $prev = null;
   $next = null;
   if (empty($type) || empty($value) || empty($date)) {
      header("Location: ../addAsset.php?add=empty");
      exit();
          }
			}
		 }