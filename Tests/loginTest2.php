<?php
  class loginTest2 extends \PHPUnit_Framework_TestCase
  {
     public fuction testLoginwithInvalid()
	 {
		 include 'dbh.inc.php';
		 $uid = "1sfdsdf";
         $pwd = "zyc1996";
		 $sql = "SELECT * FROM account WHERE Username='$uid'";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);
		 $this->assertLessThan(1, $resultCheck);
			
		 }
  }