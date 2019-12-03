<?php          // Allow the config
            	define('__CONFIG__', true);
            	// Require the config
            	require_once "inc/config.php"; 
            
            	//Page::ForceLogin();
            
                
            
                include"header.php";


  //arrays
include('myArrays.php');
//This for-loop catches values after submission of the form and puts them in variables and calculates the calues puts them in $outtotalLoad and $outtotalUnits
if(isset($_POST["form-submit"])){
    for($i=0; $i<count($ApplianceNames); $i++){
        for($l=0;$l<count($wattArrays[$i]);$l++){
          $watts=$_POST["watts-$i$l"];
          $apps=$_POST["apps-$i$l"];
          $totalHD=$_POST["totalHD-$i$l"];
          $DaysPerMonth=$_POST["DaysPerMonth-$i$l"];
          $outtotalLoad[$i][$l]= calculate($watts,$apps, $totalHD, $DaysPerMonth)[0];
          $outtotalUnits[$i][$l]=calculate($watts,$apps, $totalHD, $DaysPerMonth)[1];
        }
        
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
//if condition to seperate the private parts with public part             
if(isset($_SESSION['user_id'])) {
	    
    // The user is allowed here  
       
        	$User = new User($_SESSION['user_id']);
        	 echo"you are logged in as $User->email <br>";
        	
        	
        	
        	$mysqli = new mysqli("localhost", "ameeruli_299", "T&BFuGreJN1K", "ameeruli_299login");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
// app_id, user_id, app_name, watt, appliances_count, hours_inDay, days_inMonth
$query = "SELECT* FROM appliances WHERE user_id=$User->user_id;";
$result = $mysqli->query($query);


while($row = $result->fetch_array())
{
$rows[] = $row;
}
?>
<table style="width:100%" class="table-striped">
        <tr> <!-- header row starts-->
            <th>Instrument Name</th>
            <th>Watts</th> 
            <th># Of Appliances</th>
            <th>Total Load</th> 
            <th>Total Hours/Day <br> (Total Hours Of All Appls.)</th>
            <th>Number Of Days/Month</th>
            <th>Total Units</th>
        </tr><!-- header row Ends-->
<?php          
$totalunits=0;

    foreach($rows as $row)
    
    { ?>
    
    <tr>
        <td><?php echo $row['app_name']; ?></td>
        <td><?php echo $row['watt']; ?></td>
        <td><?php echo $row['appliances_count']; ?></td>
        <td><?php $totalload=$row['watt']*$row['appliances_count']; echo $totalload; ?></td>
        <td><?php echo $row['hours_inDay']; ?></td>
        <td><?php echo $row['days_inMonth']; ?></td>
        <td><?php echo calculate($row['watt'],$row['appliances_count'],$row['hours_inDay'],$row['days_inMonth'])[1]; ?></td>
        <?php  $totalunits+=calculate($row['watt'],$row['appliances_count'],$row['hours_inDay'],$row['days_inMonth'])[1];?>
    </tr>
        
        
        
        
    <?php
        
    } //foreach loop ends

?>
<tr>
            <td rowspan="3">Total Units</td>
            <td colspan="5"></td>
            <td><?php echo "<b>".$totalunits." Units/Month</b>";?></td>
    </tr>
</table>
<?php echo '<h1>For '.$totalunits.' Unit(s) The Total Cost Is '.calculateBills($totalunits).' Taka</h1>';

/* free result set */
$result->free();

/* close connection */
$mysqli->close();

?>







<?php
}else {
	// The user is not allowed here. 
	




?>

    <h2>Electricity Appliance Bill Page</h2>
    

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table style="width:100%" class="table-striped">
          <tr> <!-- header row starts-->
            <th>Instrument Name</th>
            <th>Watts</th> 
            <th># Of Appliances</th>
            <th>Total Load</th> 
            <th>Total Hours/Day <br> (Total Hours Of All Appls.)</th>
            <th>Number Of Days/Month</th>
            <th>Total Units</th>
          </tr><!-- header row Ends-->
    <?php 
          $totalunits=0;  //they forced me to define this variable so I did. 
            
    for ($i=0;$i<count($ApplianceNames);$i++)
    {  //this $i will also help with the name index and value of input fields in the form
        
        //another for loop to generate same appliance's different wattage value
        for($l=0;$l<count($wattArrays[$i]);$l++){
    ?>
<!--------------------------------------------------------- Dynamic Table Rows #<?php echo$i.$l;?>----------------------------------------------------------------------->
        <tr> 
            <td><?php echo $ApplianceNames[$i];?></td><!-- Appliance Name -->
            <td><input type="number"value="<?php if (!empty($_POST["watts-$i$l"])){echo $_POST["watts-$i$l"];}else{echo $defaultwatts=$wattArrays[$i][$l];}?>" 
                                                                                                            name="watts-<?php echo "$i$l"; ?>"></td><!-- Watt Value -->
            <td><input type="number"value="<?php if (!empty($_POST["apps-$i$l"])){echo $_POST["apps-$i$l"];} else {echo $defaultapp=1;}?>" 
                                                                                                            name="apps-<?php echo "$i$l"; ?>"></td><!--# Of Appliances-->
            <td><?php if (!empty($_POST["apps-$i$l"])){echo $outtotalLoad[$i][$l];} 
                                            else {echo calculate($defaultwatts,$defaultapp,$defaultHD=0,$defaultDaysPerMonth=30)[0];} echo " Watts"; ?></td><!--Total Load-->
            <td>
                <select name="totalHD-<?php echo $i.$l; ?>">
                    
                <?php //this for loap generates options with selected value
                    for($k=0;$k<=24;$k++) { ?>
                  <option <?php if (!empty($_POST["apps-$i$l"]) &&$k==$_POST["totalHD-$i$l"]){echo "selected";}?> value="<?php echo$k; ?>"><?php echo$k;?></option>
                <?php } ?>  
                </select>
            </td>
            <td><input type="number"value="<?php if (!empty($_POST["DaysPerMonth-$i$l"])){echo $_POST["DaysPerMonth-$i$l"];} else {echo $defaultDaysPerMonth=30;}?>" 
                                                                                            name="DaysPerMonth-<?php echo "$i$l"; ?>"></td><!--Number of Days/Month-->
            <td><?php if (!empty($_POST["apps-$i$l"])){echo $outtotalUnits[$i][$l];} 
                                    else {echo calculate($defaultwatts,$defaultapp,$defaultHD=0,$defaultDaysPerMonth=30)[1];} echo " Units/Month"; ?></td><!--Total Units-->
                                    
                <?php if (!empty($_POST["apps-$i$l"])){ $totalunits+=$outtotalUnits[$i][$l];} 
                            else {$totalunits+=calculate($defaultwatts,$defaultapp,$defaultHD=0,$defaultDaysPerMonth=30)[1];} //making cummulative addition of total units?>
        </tr>
<!--------------------------------------------------------- Dynamic Table Rows Ends ----------------------------------------------------------------------------------->
    <?php
        } //for loop 2 ($l) that geenrates same appliance's different wattage value ends here
    } 
    ?>
          <tr>
            <td rowspan="3">Total Units</td>
            <td colspan="5"></td>
            <td><?php echo "<b>".$totalunits." Units/Month</b>";?></td>
          </tr>
        </table>

        <input class="btn btn-primary" type="submit" name="form-submit">
        <input class="btn btn-primary" type="reset">
    </form>
<?php	if (isset($_POST["form-submit"])){echo '<h1>For '.$totalunits.' Unit(s) The Total Cost Is '.calculateBills($totalunits).' Taka</h1>';}?>
    

<?php } // when you are not logged in marking ends here?>

<?php include('footer.php'); ?>
