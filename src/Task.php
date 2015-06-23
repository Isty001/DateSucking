<?php

namespace Date;

class Task extends Person
{
    protected $deadline;

    public function __construct(Person $person)
    {
        $this->timezone = $person->timezone;
    }

    public function createTask($date, $timeArray)
    {
        $this->deadline = new \DateTime($date);
        $this->deadline
            ->setTimezone(new \DateTimeZone($this->timezone))
            ->setTime($timeArray['hour'], $timeArray['minute']);
    }
}
