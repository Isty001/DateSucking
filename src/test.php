<?php
namespace Date;
include '../vendor/autoload.php';

use Date\Person;
use Date\PersonA;
use Date\PersonB;


$date1 = new \DateTime('2015-03-13');
$date1->setTimezone(new \DateTimeZone('Asia/Hong_Kong'));

echo $date1->format('Y-m-d H:i') .PHP_EOL;

$date2 = new \DateTime('2015-03-13');
$date2->setTimezone(new \DateTimeZone('America/New_York'));

echo $date2->format('Y-m-d H:i') .PHP_EOL;



$timezoneA = 'Asia/Hong_Kong';
$personA = new PersonA($timezoneA);

$deadline = new \DateTime('2015-08-01');
$deadline->setTime(14, 55);
$personA->setTaskDeadline($deadline);

$timezoneB = 'America/New_York';
$personB = new PersonB($timezoneB);

var_dump($personA->returnConvertedTimezone($personA));
var_dump($personB->returnConvertedTimezone($personA));