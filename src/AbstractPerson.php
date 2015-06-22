<?php

namespace Date;

class AbstractPerson
{
    private $timezone;
    private $deadline;

    public function __construct($timezone)
    {
        $this->timezone = $timezone;
    }

    public function setTaskDeadline(\DateTime $deadline)
    {
        $this->deadline = $deadline;
    }

    public function getTaskDeadline()
    {
        return $this->deadline;
    }

    public function returnConvertedTimezone(AbstractPerson $person)
    {
        $deadline = $person->getTaskDeadline();
        return $deadline->setTimezone(new \DateTimeZone($this->timezone));
    }
}