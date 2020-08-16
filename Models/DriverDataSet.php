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
        $sqlQuery = 'SELECT driver_id, driver_fname, driver_lname, driver_abv, driver_team, driver_tyre, driver_lastupdate, driver_position, driver_laptimehighlight FROM drivers ORDER BY driver_position ASC';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new DriverData($row);
        }
        return $dataSet;
    }
}