<?php

class DriverData {

    protected $_driver_id, $_driver_fname, $_driver_lname, $_driver_abv, $_driver_team, $_driver_tyre, $_driver_lastupdate, $_driver_position;

    public function __construct($dbRow){
        $this->_driver_id = $dbRow['driver_id'];
        $this->_driver_fname = $dbRow['driver_fname'];
        $this->_driver_lname = $dbRow['driver_lname'];
        $this->_driver_abv = $dbRow['driver_abv'];
        $this->_driver_team = $dbRow['driver_team'];
        $this->_driver_tyre = $dbRow['driver_tyre'];
        $this->_driver_lastupdate = $dbRow['driver_lastupdate'];
        $this->_driver_position = $dbRow['driver_position'];
    }

    /**
     * @return mixed
     */
    public function getDriverPosition()
    {
        return $this->_driver_position;
    }

    /**
     * @return mixed
     */
    public function getDriverTyre()
    {
        return $this->_driver_tyre;
    }

    /**
     * @return mixed
     */
    public function getDriverLastupdate()
    {
        return $this->_driver_lastupdate;
    }

    /**
     * @return mixed
     */
    public function getDriverId()
    {
        return $this->_driver_id;
    }

    /**
     * @return mixed
     */
    public function getDriverFname()
    {
        return $this->_driver_fname;
    }

    /**
     * @return mixed
     */
    public function getDriverLname()
    {
        return $this->_driver_lname;
    }

    /**
     * @return mixed
     */
    public function getDriverAbv()
    {
        return $this->_driver_abv;
    }

    /**
     * @return mixed
     */
    public function getDriverTeam()
    {
        return $this->_driver_team;
    }
}


