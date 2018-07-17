<?php
  class SignUpTest extends \PHPUnit_Framework_TestCase
  {
     public fuction testSignUpwithAnExistUsername()
	 {
       include_once 'dbh.inc.php';
	 $first = "Yangcheng";
   $last = "Zhang" ";
   $address = "145 Edgewood Ave";
   $city = "Atlanta";
   $state = "GA";
   $zip = "30033";
   $uid = "User1";
   $pwd = "abc123";
   if (empty($first) || empty($last) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($uid) || empty($pwd)) {
      header("Location: ../signup.php?signup=empty");
      exit();}else{
	  if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[0-9]*$/", $zip)) {
         header("Location: ../signup.php?signup=invalid");
         exit();} 
   }else {
         $sql = "SELECT * FROM account WHERE Username='$uid'";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);

         if ($resultCheck > 0) {
            header("Location: ../signup.php?signup=usertaken");
            exit();
   }else {        
            $sql = "INSERT INTO account (Username, Password, FirstName, LastName, Street, City, State, ZIP) VALUES ('$uid', '$pwd', '$first', '$last', '$address', '$city', '$state', '$zip');";      
            mysqli_query($conn, $sql);  
            header("Location: ../index.php?signup=success");
            exit();
         }
   }
   }
 }
 }