<?php

namespace Date\Entity;

class Person
{
    private $name;
    private $timezone;

    public function __construct($name, $timezone)
    {
        $this->name = $name;
        $this->timezone = $timezone;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTimezone()
    {
        return $this->timezone;
    }
}