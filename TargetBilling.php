<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

	Page::ForceLogin();

  $User = new User($_SESSION['user_id']);

?>

<?php include('header.php'); ?>

<h1>How much do you want to spend this month?</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			 Insert the amount you want to be billed this month:<br>
			<input class="form-control" type="text" name="units">
  			<br>
  			<input class="btn btn-primary" type="submit">
		</form>

<?php include('footer.php'); ?>
