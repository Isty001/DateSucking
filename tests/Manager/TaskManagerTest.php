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
//        $taskManager->saveTask($task);


        $taskManager = new TaskManager();

        $expected = [
            [

                "addressee" => "MásValaki",
                "taskName" => "Feladat1",
                "authorName" => "Isty",
                "deadline" => '2015-08-01 02:55'
            ],
            [
                "addressee" => "MásValaki",
                "taskName" => "Feladat2",
                "authorName" => "Isty",
                "deadline" => '2015-08-01 02:55'
            ]

        ];

        $this->assertEquals($expected, $taskManager->listTasksOf($person));
    }
}