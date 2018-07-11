<?php
/*
 * This function is called from the logout form when the user is already logged in
 * This function ends and destroys the session variable and the user is returned to the home page
 */

if (isset($_POST['submit'])) {
   session_start();
   session_unset();
   session_destroy();
   header("Location: ../index.php");   //Return user to the home page
}
