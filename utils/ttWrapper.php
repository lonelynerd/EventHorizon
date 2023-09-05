<?php


class Timetable
{

    // ATTRIBUTES

    private $edt = null;
    public $url = null;

    // CONSTRUCTOR

    function __construct($url)
    {
        $this->url = $url;
    }

    // REQUESTS

    private function isFetched()
    {
        if ($this->edt == null) {
            return false;
        }
        return true;
    }

    function getUrl()
    {
        if (!$this->isFetched()) {
            return -1;
        }
        return $this->url;
    }

    function getDay($offset)
    {
        if (!$this->isFetched()) {
            return -1;
        }
        $i = 0;
        foreach ($this->edt as $day => $data) {
            if ($i == $offset) {
                return $data;
            }
            $i += 1;
        }
        return -2;
    }

    function getEvent($day, $offset)
    {
        $i = 0;
        foreach ($day as $event => $data) {
            if ($i == $offset) {
                return $data;
            }
            $i += 1;
        }
        return -2;
    }

    function getDate($day){
        return $this->getDateFromEvent($this->getEvent($day,0));
    }

    function getDateFromEvent($event)
    {
        if (!isset($event["DTSTART"])) {
            return null;
        }
        return $event["DTSTART"][0];
    }

    function getFormatedDate($event, $format)
    {
        $ev = $this->getDate($event);
        if ($ev == null) {
            return -1;
        }
        $ev->format($format);
    }

    function getHours($event)
    {
        if (!(isset($event["DTSTART"]) && isset($event["DTEND"]))) {
            return -1;
        }
        return [$event["DTSTART"][0]->format("H:i"), $event["DTEND"][0]->format("H:i")];
    }

    function getTitle($event)
    {
        if (!isset($event["SUMMARY"])) {
            return -1;
        }
        return $event["SUMMARY"];
    }

    function getLocation($event)
    {
        if (!isset($event["LOCATION"])) {
            return -1;
        }
        return $event["LOCATION"];
    }

    function getGroup($event)
    {
        if (!isset($event["DESCRIPTION"])) {
            return -1;
        }
        return $event["DESCRIPTION"];
    }

    // COMMANDS

    function fetchCal()
    {
        include_once("getEDT.php");
        $fetch = edt($this->url);
        if ($fetch == []) {
            return -1;
        }
        $this->edt = $fetch;
        return 0;
    }
}

?>