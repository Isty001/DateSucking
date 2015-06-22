<?php
namespace Date\Tests;

use Date\AbstractPerson;
use Date\PersonA;
use Date\PersonB;

class Test extends \PHPUnit_Framework_TestCase
{

    public function testPerson()
    {

        $timezoneA = 'Asia/Hong_Kong';
        $personA = new PersonA($timezoneA);

        $deadline = new \DateTime('2015-08-01');
        $deadline->setTime(14, 55);
        $personA->setTaskDeadline($deadline);

        $timezoneB = 'America/New_York';
        $personB = new PersonB($timezoneB);


        $expected = '2015-08-01 08:55';
        $this->assertEquals($expected, $personB->returnConvertedTimezone($personA)->format('Y-m-d H:i'));

    }
}
