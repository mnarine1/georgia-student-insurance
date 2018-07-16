<?php
  class loginTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testLoginsuccess()
	 {
		 include 'dbh.inc.php';
		 $uid = "123456";
         $pwd = "zyc1996";
		 $sql = "SELECT * FROM account WHERE Username='$uid'";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);
		 if ($row = mysqli_fetch_assoc($result)) {
            $hashedPwdCheck = $pwd == $row['Password']; 
             if ($hashedPwdCheck == true) {
               header("Location: ../index.php?login=success");
               exit(); 
			  }			   
			 }
			}
		 }