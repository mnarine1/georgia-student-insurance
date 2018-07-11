<?php session_start();  //Starts the session that allows the user to remain logged in when navigating the website
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/master.css">
      <title>404 Error</title>
   </head>
   <body>
      <!-- This tag contains the header section that holds the login form, logout and signup links, and page links -->
      <header>
         <nav>
            <div class="main-wrapper">
               <ul>
                  <li><a href="index.php">Home</a></li>
                  <!-- If the user is logged in, display the various page links -->
                  <?php
                     if (isset($_SESSION['u_id'])) {
                        echo '<li><a href="assets.php">Assets</a></li>
                              <li><a href="claims.php">Claims</a></li>
                              <li><a href="payments.php">Payments</a></li>';
                     }
                  ?>
               </ul>
               <div class="nav-login">
                  <?php
                     //session_start();
                     //If the user is logged in, then display the logout button
                     //If the user is not logged in, then display the login form and signup link
                     if (isset($_SESSION['u_id'])) {
                        echo '<form class="nav-login" action="includes/logout.inc.php" method="POST">
                                 <input type="submit" name="submit" value="Logout">
                              </form>';
                     } else {
                        echo '<form class="nav-login" action="includes/login.inc.php" method="POST">
                                 <input type="text" name="uid" placeholder="Username">
                                 <input type="password" name="pwd" placeholder="Password">
                                 <input type="submit" name="submit" value="Log In">
                              </form>
                              <a href="signup.php">Sign Up</a>';
                     }

                  ?>
               </div>
            </div>
         </nav>
      </header>

      <section>
         <h1>404 Error</h1>
      </section>

      <?php
         include_once 'footer.php';
      ?>
