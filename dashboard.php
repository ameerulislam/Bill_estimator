<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

	Page::ForceLogin();

  $User = new User($_SESSION['user_id']);

    include"header.php";
?>




  	<div class="container-fluid">
  		<h2>Dashboard</h2>
  	
     </div>

  
<?php   include"footer.php"; ?>