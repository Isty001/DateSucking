<?php
namespace Date\Tests;

use Date\Person;

class Test extends \PHPUnit_Framework_TestCase
{

    public function testPerson()
    {

        $timezoneA = 'Asia/Hong_Kong';
        $personA = new Person($timezoneA);

        $date = '2015-08-01';
        $time = ['hour' => 14, 'minute' => 55];

        $personA->setTaskDeadline($date,$time);

        $timezoneB = 'America/New_York';
        $personB = new Person($timezoneB);

        $expected = '2015-08-01 02:55';
        $this->assertEquals($expected, $personB->returnConvertedTimezone($personA)->format('Y-m-d H:i'));

    }
}
