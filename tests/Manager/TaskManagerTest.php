<?php

namespace Date\Tests\Manager;

use Date\Entity\Person;
use Date\Entity\Task;
use Date\Manager\TaskManager;

class TaskManagerTest extends \PHPUnit_Framework_TestCase
{

    public function testTaskManager()
    {


        $person = new Person('MásValaki', 'America/New_York');

        $deadline = ['date' => '2015-08-01', 'hour' => 14, 'minute' => 55];
        $task = new Task('Feladat', 'Isty', $deadline);
        $task->setAuthor($person);

        $taskManager = new TaskManager();
        //$taskManager->saveTask($task);


        $expected = [];

        $this->assertEquals($expected, $taskManager->listTasksOf($person));
    }
}