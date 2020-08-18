<?php
session_start();
require_once('Models/DriverDataSet.php');


$view = new stdClass();

//create a new driver object
$driverDataSet = new DriverDataSet();
$view->driverDataSet = $driverDataSet->fetchAllDrivers();

$position = 1;
$teamClass = "teamUnknown";

/*
    Function to map teams names to the respective colours
    - This will at some point need refactoring into some kind of lookup table,
      that can be customized via a single (JSON?) file.
*/
function getTeamColour($input)
{
    switch($input){
        case "mercedes":
            return "teamTurq";
        case "ferrari":
            return "teamRed";
        case "redbull":
            return "teamDarkBlue";
        case "mclaren":
            return "teamOrange";
        case "renault":
            return "teamYellow";
        case "haas":
            return "teamGold";
        case "alfaromeo":
            return "teamDarkRed";
        case "alphatauri":
            return "teamWhite";
        case "williams":
            return "teamLightBlue";
        case "racingpoint":
            return "teamPink";
        default:
            return "teamUnknown";
    }
}

/* This is the script where we get all of the data for the timing
   tower. We only return the data if something has changed since
   the last time we queries the table.*/
foreach ($view->driverDataSet as $driverData) {
    if($position==1){
        echo '<tr class="fastestLapHighlight" id="" draggable="true">';
    }
    else
    echo '<tr class="" draggable="true">';
    echo '<td><span>' . $position .'</span></td>';
    echo '<td class=""><span class="' . getTeamColour($driverData->getDriverTeam()) . ' teamColourCollapse">▮</span> ' . $driverData->getDriverAbv() . '</td>';
    echo '<td class="lapTimeCollapse">' . $driverData->getDriverLaptimehighlight() . '</td>';
    echo '<td class="tyreCollapse tyre' . $driverData->getDriverTyre() . '">' . $driverData->getDriverTyre() . '</td>';
    /* Will come back to this once i figure out how to keep the image within the height of the row*/
    /*echo '<td class="tyreCollapse"><img src="img/tyres/' . $driverData->getDriverTyre() . '.svg"></td>';*/
    echo '</tr>';
    $position = $position +1;
}
