
}<?php
  class loginTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testLoginwithInvalidPassword()
	 {
		 include 'dbh.inc.php';
		 $uid = "123456";
         $pwd = "2142rfds";
		 $sql = "SELECT * FROM account WHERE Username='$uid'";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);
		 if ($row = mysqli_fetch_assoc($result)) {
            $hashedPwdCheck = $pwd == $row['Password']; 
             if ($hashedPwdCheck == false) {
               header("Location: ../index.php?login=password");
			 exit();}
			 }
	 } 	
   }