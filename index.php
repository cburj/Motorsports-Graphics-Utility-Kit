<?php

session_start();
require_once ('Models/DriverDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Homepage';

//create a new driver object
$driverDataSet = new DriverDataSet();
$view->driverDataSet = $driverDataSet->fetchAllDrivers();

require_once('Views/index.phtml');
