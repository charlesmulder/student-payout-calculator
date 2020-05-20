<?php

use Veri\Csv;
use PHPUnit\Framework\TestCase;

class CsvTest extends TestCase
{

    /**
     * @group csv
     */
    public function testParsesWorkplacesCsvToArray() {
        $file = file(sprintf('%s/workplaces.csv', getcwd()));
        $workplaces = Csv::parse($file);
        foreach($workplaces as $workplace) {
            $this->assertRegExp("/\d+/", $workplace['id']);
            $this->assertRegExp("/\w+/", $workplace['name']);
            $this->assertContainsOnly('integer', $workplace['location']);
        }
    }

    /**
     * @group csv
     */
    public function testParsesAttendanceCsvToArray() {
        $file = file(sprintf('%s/attendance.csv', getcwd()));
        $attendances = Csv::parse($file);
        foreach($attendances as $attendance) {
            $this->assertRegExp("/\d+/", $attendance['id']);
            $this->assertRegExp("/\w+/", $attendance['name']);
            $this->assertContainsOnly('integer', $attendance['location']);
            $time = strtotime($attendance['dob']);
            $this->assertTrue(checkdate(date('n', $time), date('j', $time), date('Y', $time)));
            $this->assertRegExp("/\d+/", $attendance['workplace_id']);
            $this->assertContains($attendance['status'], ['AT', 'AL', 'CSL', 'USL']);
        }
    }
}

