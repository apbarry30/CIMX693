<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <?php include("includes/head.php"); ?>
    <?php
    $address = "";
    $address_2 = "";
    $city = "";
    $state = "";
    $zip = "";

    include("includes/database.php");

    $sql = "SELECT * FROM `users` JOIN `profile` ON users.id = profile.user_id WHERE `email` = '". $_COOKIE['user'] ."'";

    $result = $mysqli->query($sql);
    //echo $result->num_rows.' found';
    while($user = $result->fetch_array(MYSQLI_ASSOC)) {
      $address = $user['address'];
      $address_2 = $user['address_2'];
      $city = $user['city'];
      $state = $user['state'];
      $zip = $user['zip'];

    }
    ?>
  </head>
  <body>
        <?php include("includes/navbar.php"); ?>
    <div class="container">
      <!-- Content here -->

      <div class="row">
        <div class="col-6">
          <?php
          if(isset($_GET['update'])) {
            if($_GET['update'] == 'true'){
              echo "<h2>Your profile has been updated</h2>";
            }
          }
          ?>
          <form action="process/profile.php" method="post">
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?php echo $address; ?>">
            </div>

            <div class="form-group">
              <label for="address_2">Address 2</label>
              <input type="text" class="form-control" id="address_2" name="address_2" placeholder="Enter address 2"  value="<?php echo $address_2; ?>">
            </div>

            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Enter city"  value="<?php echo $city; ?>">

            </div>

            <div class="form-group">
              <label for="state">State</label>
              <input type="text" class="form-control" id="state" name="state" placeholder="State"  value="<?php echo $state; ?>">
            </div>

            <div class="form-group">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip"  value="<?php echo $zip; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

<?php //include("includes/scripts.php"); ?>
  </body>
</html>