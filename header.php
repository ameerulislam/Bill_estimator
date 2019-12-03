<?php
include "functions.php";
?>
<!Doctype html>
<html>
	<head>
		<title> Utility Estimator </title>

	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Electricity Bill Calculator</title>

		<!-- Bootstrap CSS -->
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript >
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script-->
    </head>
    
    <body>

        <div class="container-fluid"> <!-- closing container div is in footer.php-->
            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <a href="/" class="navbar-brand">Home</a>
                <a href="TargetBilling.php" class="navbar-brand">Target Billing</a>
                <a href="aplbillcalculator.php" class="navbar-brand">Applicance Bill Calculator</a>
                <a href="levelwisecalculator.php" class="navbar-brand">Elec. Level wise cost</a>
                <a href="waterbill.php" class="navbar-brand">Water Bill Calculator</a>
                <?php 
                	if(isset($_SESSION['user_id'])) {
                	    
			        // The user is allowed here  
			         echo '<a href="myAppliances.php" class="navbar-brand">My Appliances</a>
			         <a href="logout.php" class="navbar-brand">Logout</a>';
        		} else {
        			// The user is not allowed here. 
        			
        			echo ' <a href="login.php" class="navbar-brand">Login</a>
          			 <a href="register.php" class="navbar-brand">Register</a>';
                 }  ?>
            </nav>
        
   
        
        
        
	