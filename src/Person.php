<?php

namespace Date;

class Person
{
    private $timezone;
    private $deadline;

    public function __construct($timezone)
    {
        $this->timezone = $timezone;
    }

    public function setTaskDeadline($date, $timeArray)
    {
        $this->deadline = new \DateTime($date);
        $this->deadline->setTimezone(new \DateTimeZone($this->timezone))->setTime($timeArray['hour'], $timeArray['minute']);
    }

    public function getTaskDeadline()
    {
        return $this->deadline;
    }

    public function returnConvertedTimezone(Person $person)
    {
        $deadline = $person->getTaskDeadline();
        return $deadline->setTimezone(new \DateTimeZone($this->timezone));
    }
}