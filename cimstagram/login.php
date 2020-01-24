<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include("includes/head.php"); ?>
  </head>
  <body>
    <?php include("includes/navbar.php"); ?>
    <div class="jumbotron">
      <h1 class="display-4">Hello, world!</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
    <div class="container">
      <!-- Content here -->
      <div class="row">
        <?php
        //this message comes from registration
        //first we
        if(isset($_GET['action'])) {
          if($_GET['action'] == "registrationcomplete") {
            echo "<p class=\"col-12\"><strong>Your registration has been completed. You may login.</strong></p>";
          }
        }
         ?>
        <div class="col-6">
          <form action="process/login.php" method="post">

            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="col-6">
          <h2>Don't have an account?</h2>
          <p><a href="registration.php">Create one!</a> </p>
        </div>
      </div>
    </div>

<?php include("includes/scripts.php"); ?>
  </body>
</html>