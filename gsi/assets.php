<?php
   include_once 'header.php';
?>

<section class="main-container">
   <div class="asset-wrapper">
      <h2>Asset Manager</h2>
      <a href="addAsset.php"><button type="button" name="add">+</button></a>

      <?php
         if (isset($_SESSION['u_id'])) {
            include_once 'dbh.inc.php';

            $sql = "SELECT * FROM asset WHERE AccoutID='.$_SESSION['u_acc'].'";
            $result = mysqli_query($conn, $sql);
         }
      ?>


   </div>
</section>


<?php
   include_once 'footer.php';
?>
