<?php
session_start();
require_once('Models/EventDataSet.php');

$view = new stdClass();

//create a new event object
$eventDataSet = new EventDataSet();
$view->eventDataSet = $eventDataSet->fetchLastEvent();

foreach ($view->eventDataSet as $eventData) {
    if ($_SESSION['last_update'] != $eventData->getEventLastupdate()) {
        echo '<script>setTimeout(function() {$("#bannerReloadElement").fadeIn(400);}, 0)</script>';
        echo '    <div class="banner-col banner-col-3 ' . $eventData->getEventFlagcolour() . 'FlagEvent">' . $eventData->getEventFlagname() . '</div>';
        echo '    <div class="banner-col banner-col-6">' . $eventData->getEventReason() . '</div>';
        /*Cool JS script to fade out the banner just before it gets deleted from the page*/
        echo '<script>setTimeout(function() {
            $("#bannerReloadElement").fadeOut(1000);
        }, 9000)</script>';
    }
    $_SESSION['last_update'] = $eventData->getEventLastupdate();
}