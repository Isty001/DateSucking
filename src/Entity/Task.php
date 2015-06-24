<?php

namespace Date\Entity;

class Task
{
    public $taskDeadline;
    private $addressee;
    private $taskName;
    private $authorName;
    private $timezone;

    public function __construct($name, $addressee, array $deadlineArray)
    {
        $this->taskName = $name;
        $this->deadlineArray = $deadlineArray;
        $this->addressee = $addressee;
    }

    public function getTaskName()
    {
        return $this->taskName;
    }

    public function setAuthor(Person $author)
    {
        $this->authorName = $author->getName();
        $this->timezone = $author->getTimezone();
    }

    public function getAuthor()
    {
        return ['authorName' => $this->authorName, 'timezone' => $this->timezone];
    }

    public function getAddressee(){
        return $this->addressee;
    }

    public function setDeadline()
    {
        $this->taskDeadline = new \DateTime('2015-08-01');

        return $this->taskDeadline
            ->setTimezone(new \DateTimeZone($this->timezone))
            ->setTime(14, 55);
    }
}
