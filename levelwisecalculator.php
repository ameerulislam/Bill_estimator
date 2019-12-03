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
                if (!empty($_POST["units"]) && !empty($_POST["level"])) { // checking if unit input box is not empty
				$units=$_POST["units"];
				$level=$_POST["level"];
				
				$totalCost=$units*$level;
				echo "For $units Units the total cost is $totalCost Taka";
				
                }
        ?>

        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="levelcalc" onsubmit="return validateForm()">
                Units to calculate?<br>
                <input class="form-control" type="text" name="units" id="units">
    			Find bill level wise costs<br>
    			<select name="level">
    			    <option value="3.50" >BDT 3.50 valid for up to 50 Units   </option>
    			    <option value="4.00" >BDT 4.00 valid for up to 75 Units   </option>
    			    <option value="5.45" >BDT 5.45 valid for up to 125 Units  </option>
    			    <option value="5.70" >BDT 5.70 valid for up to 100 Units  </option>
    			    <option value="6.02" >BDT 6.02 valid for up to 100 Units  </option>
    			    <option value="9.30" >BDT 9.30 valid for up to 200 Units  </option>
    			    <option value="10.70">BDT 10.70 no limits for units       </option>
    			</select>
      			<br>
      			<input class="btn btn-primary" type="submit">
    	</form>
    	
    	
    	<script>
    	
    	    document.forms["levelcalc"]["level"].addEventListener("change", changevalue);
    	    function changevalue(){
    	        var x=document.forms["levelcalc"]["level"].selectedIndex;
    	        var y=document.forms["levelcalc"]["level"].options;
    	        var currentvalue = y[x].value;
    	        return currentvalue;
    	    }
    	    
    	    
    	    function validateForm() {
    	      var inputunit = document.getElementById("units").value;
              var x = changevalue();
              if (x == 3.5 && inputunit>50 ) {
                alert("Units cannot be more than 50!");
                return false;
              }else if (x == 4.00 && inputunit>75 ){
                alert("Units cannot be more than 75!");
                return false;
              }else if (x == 5.45 && inputunit>125 ){
                alert("Units cannot be more than 125!");
                return false;
              }else if (x == 5.70 && inputunit>100 ){
                alert("Units cannot be more than 100!");
                return false;
              }else if (x == 6.02 && inputunit>100 ){
                alert("Units cannot be more than 100!");
                return false;
              }else if (x == 9.30 && inputunit>200 ){
                alert("Units cannot be more than 50!");
                return false;
              }
            }

    	</script>
    		
<?php include('footer.php'); ?>