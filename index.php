<?php

include 'config.php';
include 'db-connect.php';
include 'function.php';

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $sitename; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $siteurl; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $siteurl; ?>acss/narrow-jumbotron.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted"><?php echo $sitename; ?></h3>
      </div>

      <div class="jumbotron">
	  <center>
        <h1 class="display-3">Short URL</h1>
<?php
if (isset($_POST['url']))
{
	$result = short($_POST['url']);
	$result = json_decode($result, true);
	if ($result['status'] == "success") echo $result['shortlink'];
}
else
{
?>
		<form action="" method="POST">
        <p><input name="url" placeholder="Enter your URL"/></p>
        <p><input type="submit" class="btn btn-lg btn-success" name="Short URL"/></p>
		<form>
<?php
}
?>
		</center>
      </div>

      <footer class="footer">
        <p>&copy; Company <?php echo date("Y"); ?>, All right reserver by <?php echo $sitename; ?></p>
      </footer>

	  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $siteurl; ?>js/ie10-viewport-bug-workaround.js"></script>
  </body>
	  
  </body>
</html>

<?php
mysqli_close($con);
?>
