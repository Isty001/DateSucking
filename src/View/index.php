<?php
require '../../vendor/autoload.php';

use Date\Entity\Person;
use Date\Entity\Task;
use Date\Manager\TaskManager;
use Date\View\GenerateList;
?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
        $generator = new GenerateList();

        $person = 'MásValaki';
        $timezone = 'America/New_York';
        $generator->createList($generator->buildUp($person, $timezone));
    ?>
    </body>
</html>