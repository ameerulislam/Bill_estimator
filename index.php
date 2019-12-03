<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 
    include"header.php";
?>


  	<div class="uk-section uk-container">
  		<?php 
  			echo "Hello! Today is: ";
  			echo date("Y m d")."<br>";
  			if (isset($_POST['uniformsubmit'])){
  			$units=$_POST['units'];
  			$totalcost=calculateBills($units);
  			$demand_charge=100;
  			$tax=($totalcost+$demand_charge)*0.05;
  			$billwihtTax=$totalcost+$demand_charge+$tax;
  			echo"for $units you will be billed $billwihtTax Taka which includes $demand_charge Taka Demand charge and $tax Taka Tax";
  			}
  		?> 
  		<p>
  			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  			<p>Units</p>
  			<input type="text" name="units">
  			<input type="submit" name="uniformsubmit">
  			</form>
  		</p>
  	</div>

  	<?php require_once "footer.php"; ?> 
  </body>
</html>
