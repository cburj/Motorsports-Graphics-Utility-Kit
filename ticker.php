<?php

session_start();

$view = new stdClass();
$view->pageTitle = 'TimingTower Dashboard';

require_once('Views/ticker.phtml');