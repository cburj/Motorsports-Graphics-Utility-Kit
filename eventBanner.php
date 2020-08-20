<?php

session_start();

$view = new stdClass();
$view->pageTitle = 'TimingTower Pre Release';

require_once('Views/eventBanner.phtml');