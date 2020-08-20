<?php

require_once ('Models/Database.php');
require_once('Models/EventData.php');

class EventDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchLastEvent() {
        /*Order by last update*/
        $sqlQuery = 'SELECT * FROM events ORDER BY event_lastupdate DESC LIMIT 1';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new EventData($row);
        }
        return $dataSet;
    }
}