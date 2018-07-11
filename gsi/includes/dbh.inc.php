<?php
/*
 * This function connects the webpage to the database
 * This fuction must be included in all pages that need to access the database
 * The variables are labeled in a way that makes it easier to connect to different databases
 */

 //Database connection credentials
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gsi_test";

//Connect to database
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
