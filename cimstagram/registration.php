<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <?php include("includes/head.php"); ?>
  </head>
  <body>
    <?php include("includes/navbar.php"); ?>
    <div class="container">
      <!-- Content here -->
      <div class="row">
        <?php
        //this message comes from register.php if there's an error
        if(isset($_GET['action'])) {
          if($_GET['action'] == "registrationerror") {
            echo "<p class=\"col-12\"><strong>error: ".$_GET['error']."</strong></p>";
          }
        }
         ?>
        <div class="col-6">
          <form action="process/register.php" method="post">
            <div class="form-group">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name">
            </div>

            <div class="form-group">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name">
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

<?php include("includes/scripts.php"); ?>
  </body>
</html>