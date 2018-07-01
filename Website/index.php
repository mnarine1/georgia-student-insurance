<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Georgia Student Insurance</title>
      <link rel="stylesheet" href="master.css" type="text/css">
   </head>
   <body>
       <?php
         $servername = "localhost";
         $username = "id6351601_gsitest";
         $password = "gsitest";
         $dbname = "id6351601_test";
         $connect = mysqli_connect($servername, $username, $password, $dbname);
         // Create Connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         } else {
             echo "Connected<br/>";
         }
         
         
         $sql = "SELECT AccountID, FirstName, LastName FROM ACCOUNT";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "id: " . $row["AccountID"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. "<br>";
                }
            } else {
                echo "0 results";
            }
         
         
      ?>
      <div class="contain">
         <div class="visual">
            <div class="logo">
               PLACEHOLDER
            </div>
         </div>

         <div class="login">
            <h3>Login</h3>
            <form class="" action="index.html" method="post">
               <input type="text" name="username" value="" placeholder="USERNAME">
               <br>
               <input type="password" name="password" value="" placeholder="PASSWORD">
               <input type="submit" name="validate" value="Login">
            </form>
            <p>Don't have an account? <a href="">Sign up</a> to create an account.</p>
         </div>
      </div>
   </body>
</html>
