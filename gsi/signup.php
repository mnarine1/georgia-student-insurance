<?php
   include_once 'header.php';
?>

<section class="main-container">
   <div class="main-wrapper">
      <h2>Signup</h2>
      <form class="signup-form" action="includes/signup.inc.php" method="POST">
         <input type="text" name="first" placeholder="First Name">
         <input type="text" name="last" placeholder="Last Name">
         <input type="text" name="address" placeholder="Street Address">
         <input type="text" name="city" placeholder="City" style="width:60%;">
         <input list="states" name="state" placeholder="State" style="width:19%;">
         <datalist id="states">
            <option value="AL"></option>
            <option value="AK"></option>
            <option value="AZ"></option>
            <option value="AR"></option>
            <option value="CA"></option>
            <option value="CO"></option>
            <option value="CT"></option>
            <option value="DE"></option>
            <option value="FL"></option>
            <option value="GA"></option>
            <option value="HI"></option>
            <option value="ID"></option>
            <option value="IL"></option>
            <option value="IN"></option>
            <option value="IA"></option>
            <option value="KS"></option>
            <option value="KY"></option>
            <option value="LA"></option>
            <option value="ME"></option>
            <option value="MD"></option>
            <option value="MA"></option>
            <option value="MI"></option>
            <option value="MN"></option>
            <option value="MS"></option>
            <option value="MO"></option>
            <option value="MT"></option>
            <option value="NE"></option>
            <option value="NV"></option>
            <option value="NH"></option>
            <option value="NJ"></option>
            <option value="NM"></option>
            <option value="NY"></option>
            <option value="NC"></option>
            <option value="ND"></option>
            <option value="OH"></option>
            <option value="OK"></option>
            <option value="OR"></option>
            <option value="PA"></option>
            <option value="RI"></option>
            <option value="SC"></option>
            <option value="SD"></option>
            <option value="TN"></option>
            <option value="TX"></option>
            <option value="UT"></option>
            <option value="VT"></option>
            <option value="VA"></option>
            <option value="WA"></option>
            <option value="WV"></option>
            <option value="WI"></option>
            <option value="WY"></option>
         </datalist>
         <input type="text" name="zip" placeholder="ZIP Code">
         <input type="text" name="uid" placeholder="Username">
         <input type="password" name="pwd" placeholder="Password">
         <input type="submit" name="submit" value="Submit">
      </form>
   </div>
</section>

<?php
   include_once 'footer.php';
?>
