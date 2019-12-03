<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

	Page::ForceDashboard();
	include"header.php";
?>



  	<div class="container-fluid">
  		<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid>
			<form class="uk-form-stacked js-register">
				
				<h2>Register</h2>

			    <div class="uk-margin">
			        <label class="uk-form-label" for="form-stacked-text">Email</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" id="form-stacked-text" type="email" required='required' placeholder="email@email.com">
			        </div>
			    </div>

			    <div class="uk-margin">
			        <label class="uk-form-label" for="form-stacked-text">Passphrase</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" id="form-stacked-text" type="password" required='required' placeholder="Your passphrase">
			        </div>
			    </div>

			    <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>

			    <div class="uk-margin">
			        <button class="uk-button uk-button-default" type="submit">Register</button>
			    </div>

			</form>
  		</div>
  	</div>

  	<?php require_once "footer.php"; ?> 
  </body>
</html>
