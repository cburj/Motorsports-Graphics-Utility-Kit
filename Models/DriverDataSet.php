<?php

require_once ('Models/Database.php');
require_once('Models/DriverData.php');

class DriverDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllDrivers() {
        /*temporarily order by last update*/
        $sqlQuery = 'SELECT * FROM drivers ORDER BY driver_lastupdate DESC';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new DriverData($row);
        }
        return $dataSet;
    }
}