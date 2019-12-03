<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

	Page::ForceLogin();

  $User = new User($_SESSION['user_id']);

?>
<?php include('header.php'); ?>
    <?php
		

			if (!empty($_POST["units"])) { // checking if unit input box is not empty
				$units=$_POST["units"];
                $billtype =$_POST["billtype"];
                $inThousandGallons=($units/1000);
    			$totalcost = $inThousandGallons*$billtype;
    			echo $cost_text = 'for '.$_POST["units"].' Gallons the total cost is ';
    			echo $totalcost.' Taka';          
			}
			
			if (isset($_POST["submit-estimate"])) {
			$people=$_POST["people-count"];
			$waterEstimate=$people*150;
			echo "For $people people in your house your estimated bill will be $waterEstimate Taka";
			}
    ?>



		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			 Insert total billed Units:<br>
			<input class="form-control" type="text" name="units">
  			<br>
  			<select name="billtype">
    			    <option value="11.02" >Residential (11.02 taka/1000 gallons)    </option>
    			    <option value="35.28" >Commercial (35.28 taka/1000 gallons)     </option>
    	    </select>
    	    <br>
  			<input class="btn btn-primary" type="submit">
		</form>

        	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			 Insert Number of person in household to get an estimated bill (Residential only):<br>
			<input class="form-control" type="number" name="people-count">
  			<br>
  			<input class="btn btn-primary" type="submit" name="submit-estimate">
		</form>


<?php include('footer.php'); ?>