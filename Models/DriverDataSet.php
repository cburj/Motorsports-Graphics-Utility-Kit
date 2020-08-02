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
        //A bit of a beefy query. Can this be simplified?
        $sqlQuery = 'SELECT * FROM drivers ORDER BY driver_abv';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new DriverData($row);
        }
        return $dataSet;
    }
}