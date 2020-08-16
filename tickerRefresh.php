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

/*For now, we only want to show the top "maxDrivers" - until i get the ticker tape
  effect working with tables :) */
/* maxDrivers/minDrivers can actually be changed on-the-fly, right here during a stream, allowing
   you to manually select teh range of drivers to show*/

/*I WOULD ONLY RECOMMEND SHOWING A MAXIMUM OF 6 DRIVERS UNTIL SCROLLING IS COMPLETED*/
$minDrivers = 1;
$maxDrivers = 6;
$count = 1;

/* First 'For-Each' is responsible for outputting the position number and driver name.*/
echo '<tr id="">';
foreach ($view->driverDataSet as $driverData) {
    if(($count <= $maxDrivers) && ($count >= $minDrivers))
    {
        echo '<th rowspan="2" class="vertLarge align-middle">' . $count . '</th>';
        echo '<th class="tickerDriverName" colspan="3">' . strtoupper($driverData->getDriverLname()) . '</th>';
    }
    $count++;
}
echo '</tr>';

/* Second 'For-Each' is responsible for outputting secondary data, like car number, team and lap times*/
echo '<tr>';
$count  = 1;
foreach ($view->driverDataSet as $driverData) {
    if(($count <= $maxDrivers) && ($count >= $minDrivers)){
        echo '<th class="' . getTeamColour($driverData->getDriverTeam()) . 'BG">' . $driverData->getDriverId() . '</th>';
        echo '<th class="">' . strtoupper($driverData->getDriverTeam()) . '</th>';
        echo '<th class="">' . $driverData->getDriverLaptimehighlight() . '</th>';
    }
    $count++;
}
echo '</tr>';
