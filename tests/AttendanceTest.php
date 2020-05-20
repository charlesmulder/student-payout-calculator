<?php

use Veri\Csv;
use Veri\Attendance;
use PHPUnit\Framework\TestCase;

class AttendanceTest extends TestCase
{

    /**
     * @group attendance
     */
    public function testGetStudentIds() {
        $file = file(sprintf('%s/attendance.csv', getcwd()));
        $attendance = Csv::parse($file);
        $ids = Attendance::getStudentIds($attendance );
        for($i=1; $i<count($ids); $i++) {
            $this->assertLessThan( $ids[$i], $ids[$i-1] );
        }
    }

    /**
     * @group attendance
     */
    public function testGetStudentById() {
        $file = file(sprintf('%s/attendance.csv', getcwd()));
        $attendance = Attendance::byStudentId( 19, Csv::parse($file) );
        $random_day = $attendance[array_rand($attendance)];
        $this->assertRegExp("/\d+/", $random_day['id']);
        $this->assertRegExp("/\w+/", $random_day['name']);
        $this->assertContainsOnly('integer', $random_day['location']);
        $time = strtotime($random_day['dob']);
        $this->assertTrue(checkdate(date('n', $time), date('j', $time), date('Y', $time)));
        $this->assertRegExp("/\d+/", $random_day['workplace_id']);
        $this->assertContains($random_day['status'], ['AT', 'AL', 'CSL', 'USL']);
    }

}
