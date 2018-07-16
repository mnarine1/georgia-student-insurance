<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/master.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" charset="utf-8"></script>
      <?php       //Retrieves the title variable from each page so that the name of the page is displayed in the tab
         if (!empty($title)) {
            echo '<title>'.$title.'</title>';
         }
      ?>
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
                        echo '<li><a href="policies.php">Policies</a></li>
                              <li><a href="assets.php">Assets</a></li>
                              <li><a href="claims.php">Claims</a></li>
                              <li><a href="payments.php">Payments</a></li>';
                     }
                  ?>
               </ul>
               <div class="nav-login">
                  <?php
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
