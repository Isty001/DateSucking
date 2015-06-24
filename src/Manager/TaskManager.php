<?php

namespace Date\Manager;

use Date\Entity\Task;
use Date\Entity\Person;

class TaskManager
{
    private $taskItemList;
    private $taskList;

    public function saveTask(Task $task)
    {
        $authorData = $task->getAuthor();
        $taskDeadline = $task->setDeadline();

        $file = dirname(__DIR__) . '/Documents/tasks.txt';
        $text = "\n----------\nTask name: " . $task->getTaskName() . PHP_EOL . 'Author name: ' . $authorData['authorName'] . PHP_EOL . 'Addressee: ' . $task->getAddressee() . PHP_EOL . 'Author timezone: ' . $authorData['timezone'] . PHP_EOL .
            'Deadline Day: ' . $taskDeadline->format('Y-m-d') . PHP_EOL . 'Deadline Time: ' . $taskDeadline->format('H:i') . PHP_EOL . '----------';

        file_put_contents($file, $text, FILE_APPEND);
    }

    public function listTasksOf(Person $person)
    {
        $taskItems = $this->getTaskItems();

        $counter = 0;
        foreach ($taskItems[1] as $item) {
            preg_match('|Addressee: (.*)|', $item, $addressee);

            if ($addressee[1] == $person->getName()) {
                $this->taskList[$counter]['addressee'] = $addressee[1];

                preg_match('|Task name: (.*)|', $item, $taskName);
                $this->taskList[$counter]['taskName'] = $taskName[1];

                preg_match('|Author name: (.*)|', $item, $authName);
                $this->taskList[$counter]['authorName'] = $authName[1];

                preg_match('|Author timezone: (.*)|', $item, $timezone);
                preg_match('|Deadline Day: (.*)|', $item, $day);
                preg_match('|Deadline Time: (.*)|', $item, $time);

                $this->taskList[$counter]['deadline'] = $this
                    ->convertTaskDate($timezone[1], $day[1], $time[1], $person->getTimezone());

            }
            $counter++;
        }
        return $this->taskList;
    }

    public function getTaskItems()
    {
        $file = dirname(__DIR__). '/Documents/tasks.txt';
        $this->taskItemList = file_get_contents($file);

        preg_match_all('|----------(.*)----------|sU', $this->taskItemList, $taskItems);

        return $taskItems;
    }

    public function convertTaskDate($authTimezone, $day, $time, $addrTimezone)
    {
        $convertedDeadline = new \DateTime($day);
        $convertedDeadline->setTimezone(new \DateTimeZone($authTimezone));

        $time = explode(':', $time);
        $convertedDeadline->setTime($time[0], $time[1]);
        $convertedDeadline->setTimezone(new \DateTimeZone($addrTimezone));

        return $convertedDeadline->format('Y-m-d H:i');
    }
}