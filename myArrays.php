<?php
    $ApplianceNames=array("Light", "Fan", "Air Conditioner", "Water Heater / geyser", "Room Heater", "Fridge", "Iron Machine", "DeskTop Computer","LapTop Computer", 
    "Television", "IPS", "Microwave", "Water Filter", "Induction Cooker", "Others");
    //watt arrays
    $lightswatts=array(15,18,20,100);
    $fanswatts=array(75);
    $airconwatts=array(3500, 5250);
    $waterheaterwatts=array(1200);
    $roomheaterwatts=array(1500);
    $Fridgeswatts=array(120);
    $IronMachinewatts=array(1000);
    $ComputersDeskTopwatts=array(150);
    $ComputersLapTopwatts=array(50);
    $televisionLCDwatts=array(200);
    $IPSwatts=array(1200);
    $Microwaveswatts=array(1000);
    $waterfilterwatts=array(28);
    $inductioncooker=array(2500);
    $others=array(0, 0, 0);
    //all arrays in one array
    $wattArrays = array($lightswatts, $fanswatts,$airconwatts,$waterheaterwatts,$roomheaterwatts,$Fridgeswatts,$IronMachinewatts,$ComputersDeskTopwatts,
                        $ComputersLapTopwatts,$televisionLCDwatts,$IPSwatts,$Microwaveswatts,$waterfilterwatts,$inductioncooker, $others);
    //print_r(array_values($wattArrays));
    
   /* for($i=0;$i<count($wattArrays);$i++){
        for($j=0;$j<count($wattArrays[$j]);$j++){
        echo $wattArrays[$i][$j]."<br>";
    
        }    
    }*/
    ?>