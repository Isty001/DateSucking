<?php

namespace Date\Tests\Entity;

use Date\Entity\Person;
use Date\Entity\Task;

class PersonTest extends \PHPUnit_Framework_TestCase {

    public function testPerson(){

        $person = new Person('Person1', 'Asia/Hong_Kong');

        $deadline = ['date' => '2015-08-01','hour' => 14, 'minute' => 55];
        $task = new Task('TaskName', 'Szemely2', $deadline);


        $this->assertEquals('Person1', $person->getName());
        $this->assertEquals('Asia/Hong_Kong', $person->getTimezone());
    }
}
