<?php
require_once('Models/DriverDataSet.php');

$view = new stdClass();

//create a new driver object
$driverDataSet = new DriverDataSet();
$view->driverDataSet = $driverDataSet->fetchAllDrivers();

$position = 1;
$teamClass = "teamUnknown";

foreach ($view->driverDataSet as $driverData) {
    if($position==1)
        echo '<tr class="fastestLapHighlight">';
    else
        echo '<tr class="">';
    echo '<td><span>' . $position .'</span></td>';
    echo '<td class="">' . $driverData->getDriverAbv() . '</td>';
    echo '<td class="lapTimeCollapse">1:26.598</td>';
    echo '</tr>';
    $position = $position +1;
}
?>
