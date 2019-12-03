<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

	Page::ForceLogin();

    $User = new User($_SESSION['user_id']);

    include"header.php";
    
            $servername = "localhost";
            $username = "ameeruli_299";
            $password = "T&BFuGreJN1K";
            $dbname = "ameeruli_299login";
        
    if (isset($_POST['app_submit']))
    {
           $app_name =$_POST['app_name'] ;
           $watts_value=$_POST['watts_value'];
           $appliances_count=$_POST['appliances_count'];
           $hours_inDay=$_POST['hours_inDay'];
           $days_inMonth=$_POST['days_inMonth'];
         //sql queries
           
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO appliances (user_id, app_name, watt, appliances_count, hours_inDay, days_inMonth)
            VALUES ('$User->user_id', '$app_name', '$watts_value', '$appliances_count', '$hours_inDay', '$days_inMonth')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        
        $conn = null;
    }
    
    
    
    
    //Retriving appliances for specific user
    echo "<table style='border: solid 1px black;' style='width:100%' class='table-striped'>";
    echo "<tr><th>Appliance Name</th><th>Watts</th><th>Appliance Count</th><th>Total Hours/Day</th><th># Of Days/Month</th></tr>";
    
    class TableRows extends RecursiveIteratorIterator { 
        function __construct($it) { 
            parent::__construct($it, self::LEAVES_ONLY); 
        }
    
        function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
        }
    
        function beginChildren() { 
            echo "<tr>"; 
        } 
    
        function endChildren() { 
            echo "</tr>" . "\n";
        } 
        

    } 
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT app_name, watt, appliances_count, hours_inDay, days_inMonth FROM appliances WHERE user_id=$User->user_id"); 
    $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
            echo $v;
        }
    
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";
        
?>
 

<form method="post">
    <p>Appliance Name</p>
    <input type="text" name="app_name">
    <p>Watts</p>
    <input type="text" name="watts_value">
    <br>
    <p>Number of that appliance</p>
    <input type="text" name="appliances_count">
    <br>
    <p>How many hours do you use that appliance in a day?</p>
    <input type="text" name="hours_inDay">
    <br>
    <p>How many days do you use that appliance in a month?</p>
    <input type="text" name="days_inMonth">
    <br>
    <input type="submit" value="Add Appliance" name="app_submit"> 
</form>

<?php

 
 ?>

<?php   include"footer.php"; ?>