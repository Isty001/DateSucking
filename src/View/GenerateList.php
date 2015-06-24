<?php
/**
 * Created by PhpStorm.
 * User: isty
 * Date: 6/24/15
 * Time: 6:58 PM
 */

namespace Date\View;

use Date\Entity\Person;
use Date\Entity\Task;
use Date\Manager\TaskManager;

class GenerateList
{

    public function buildUp()
    {
        $person = new Person('MásValaki', 'America/New_York');

        $deadline = ['date' => '2015-08-01', 'hour' => 14, 'minute' => 55];
        $task = new Task('Feladat', 'Isty', $deadline);
        $task->setAuthor($person);
//        $taskManager->saveTask($task);

        $taskManager = new TaskManager();
        return $taskManager->listTasksOf($person);
    }

    public function createList()
    {
        $taskArray = $this->buildUp();

        foreach ($taskArray as $array) {
            foreach($array as $key => $value){
                echo ucfirst($key) .': '. $value .'<br>';
            }
            echo '<br>';
        }
    }
}