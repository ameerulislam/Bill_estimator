<?php
function calculateBills($units){

				if($units<=50){
					$totalcost=($units*3.5);
				}
				
				if($units>50 && $units<=75){
					$totalcost=($units*4);
				}

				if($units>75 && $units<=200){
					$totalcost=300+(($units-75)*5.45);
				}

				if($units>200 && $units<=300){
					$totalcost=981.25+(($units-200)*5.7);
				}
				if($units>300 && $units<=400) {
					$totalcost=1551.25+(($units-300)*6.02);
				}
				if($units>400 && $units<=600) {
					$totalcost=2153.25+(($units-400)*9.3);
				}
				if($units>600 ) {
					$totalcost=4013.25+(($units-600)*10.7);
				}

			return $totalcost;
		}
		
 //Function to calculate total load column and total units column and returns them as an array.   
 function calculate($watts, $apps, $totalHD, $DaysPerMonth ){
    $totalLoad=$watts*$apps;
    $totalUnits=$totalLoad*$totalHD*$DaysPerMonth/1000;
    return array($totalLoad, $totalUnits);
}
		
?>