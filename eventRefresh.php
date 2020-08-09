<?php
session_start();
require_once('Models/EventDataSet.php');

$view = new stdClass();

//create a new event object
$eventDataSet = new EventDataSet();
$view->eventDataSet = $eventDataSet->fetchAllEvents();

foreach ($view->eventDataSet as $eventData) {
    /*echo '<tr class="' . $eventData->getEventFlagcolour() . 'Flag">';*/
    echo '<th colspan="100%" class="' . $eventData->getEventFlagcolour() . 'Flag" id="ttBranding"><i class="fas fa-flag"></i></th>';
}