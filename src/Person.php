<?php

namespace Date;

class Person
{
    protected $timezone;

    public function __construct($timezone)
    {
        $this->timezone = $timezone;
    }


    public function getTasks(Task $task)
    {
        return $task->deadline->setTimezone(new \DateTimeZone($this->timezone));
    }
}
