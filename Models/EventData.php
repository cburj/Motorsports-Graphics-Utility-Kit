<?php

class EventData {

    protected $_event_id, $_event_flagcolour, $_event_flagname, $_event_reason, $_event_lastupdate;

    public function __construct($dbRow){
        $this->_event_id = $dbRow['event_id'];
        $this->_event_flagcolour = $dbRow['event_flagcolour'];
        $this->_event_flagname = $dbRow['event_flagname'];
        $this->_event_reason = $dbRow['event_reason'];
        $this->_event_lastupdate = $dbRow['event_lastupdate'];
    }

    /**
     * @return mixed
     */
    public function getEventFlagname()
    {
        return $this->_event_flagname;
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->_event_id;
    }

    /**
     * @return mixed
     */
    public function getEventFlagcolour()
    {
        return $this->_event_flagcolour;
    }

    /**
     * @return mixed
     */
    public function getEventReason()
    {
        return $this->_event_reason;
    }

    /**
     * @return mixed
     */
    public function getEventLastupdate()
    {
        return $this->_event_lastupdate;
    }
}


