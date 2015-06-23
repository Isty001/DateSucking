<?php
namespace Date\Tests;

use Date\Person;
use Date\Task;

class Test extends \PHPUnit_Framework_TestCase
{

    public function testPerson()
    {

        $date = '2015-08-01';
        $time = ['hour' => 14, 'minute' => 55];

        $personA = new Person('Asia/Hong_Kong');

        $task = new Task($personA);
        $task->createTask($date, $time);

        $personB = new Person('America/New_York');

        $expected = '2015-08-01 02:55';
        $this->assertEquals($expected, $personB->getTasks($task)->format('Y-m-d H:i'));

    }
}
