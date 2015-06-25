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

    public function buildUp($addressee, $timezone)
    {
        $addressee = new Person($addressee, $timezone);

        $taskManager = new TaskManager();

        return $taskManager->listTasksOf($addressee);
    }

    public function createList($taskArray)
    {

        foreach ($taskArray as $array) {
            foreach ($array as $key => $value) {
                echo ucfirst($key) . ': ' . $value . '<br>';
            }
            echo '<br>';
        }
    }
}