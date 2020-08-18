<?php
session_start();
require_once('Models/EventDataSet.php');

$view = new stdClass();

//create a new event object
$eventDataSet = new EventDataSet();
$view->eventDataSet = $eventDataSet->fetchAllEvents();

foreach ($view->eventDataSet as $eventData) {
}