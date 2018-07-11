<?php
/*
 * When the Make Payment form is submited, the form is checked for errors.
 * If errors are found, the user is returned to the form and an error message is
 * added to the end of the URL.
 * If there are no errors, then the payment is added to the database
 * under the user's AccountID and the user is taken back to the payments page.
 */

 //Checks if the user has submitted the makePayment form
 //If the user accesses the page without submitting the makePayment form,
 //then the user is taken to the makePayment form with an error message
if (isset($_POST['submit'])) {
   //Connect to database
   include_once 'dbh.inc.php';

   //Stores form inputs into variables
   $value = $_POST['value'];
   $date = date('Y')."-".date('m')."-".date('d');
   $cardNum = $_POST['card'];
   $expDateMonth = $_POST['month'];
   $expDateYear = $_POST['year'];
   $code = $_POST['code'];
   $prev = 0;
   $next = 0;
   $paid = 0;
   $account = $_POST['accID'];

   //Error Handlers
   /*
    * Checks if the required inputs are empty.
    * If empty, then return to form and display error message in URL
    * If not empty, then continue
    */
   if (empty($cardNum) || empty($expDateMonth) || empty($expDateYear) || empty($code)) {
      //return to makePayment form with error message
      header("Location: ../makePayment.php?pay=empty");
      exit();  //Stops script from running
   } else {
      /*
       * Checks if value variable contains only numeric values
       * If it contains non-numeric characters, then return to the form with an error message in the URL
       * If it contains only numeric values, then add to the database
       */
      if (!preg_match("/^[0-9]*$/", $cardNum) || !preg_match("/^[0-9]*$/", $expDateMonth) || !preg_match("/^[0-9]*$/", $expDateYear) || !preg_match("/^[0-9]*$/", $code)) {
         //return to makePayment form with error message
         header("Location: ../makePayment.php?pay=notNumber");
         exit();  //Stops script from running
      } else {
         $paid = 1; //Sets isPaid to true
         //SQL code
         $sql = "INSERT INTO payment (Value, DueDate, isPaid, AccountID) VALUES ('$value', '$date', '$paid', '$account');";
         //Insert into connected database
         mysqli_query($conn, $sql);
         //return to payments page with message of successful payment
         header("Location: ../payments.php?pay=success");
         exit();  //Stops script from running
      }
   }
} else {
   //return to makePayment form with error message
   header("Location: ../makePayment.php?pay=error");
   exit();  //Stops script from running
}
