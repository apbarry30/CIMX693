<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include("includes/head.php"); ?>
  </head>
  <body>
    <?php include("includes/navbar.php"); ?>

    <div class="container">
      <!-- Content here -->
      <div class="row">

        <div class="col-6">
          <form action="process/newpost.php" method="post">

            <div class="form-group">
              <label for="image">Image</label>
              <input type="text" class="form-control" id="image" name="image"  placeholder="Enter image">
            </div>

            <div class="form-group">
              <label for="caption">Caption</label>
              <textarea class="form-control" id="caption" name="caption" placeholder="caption"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

      </div>
    </div>

<?php include("includes/scripts.php"); ?>
  </body>
</html>