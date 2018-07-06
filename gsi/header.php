<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/master.css">
      <?php
         if (!empty($title)) {
            echo '<title>'.$title.'</title>';
         }
      ?>
   </head>
   <body>
      <header>
         <nav>
            <div class="main-wrapper">
               <ul>
                  <li><a href="index.php">Home</a></li>
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

