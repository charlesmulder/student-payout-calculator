<?php

require_once "vendor/autoload.php";

use Veri\Csv, Veri\Attendance, Veri\Student;

$workplaces = Csv::parse(file(sprintf('%s/workplaces.csv', getcwd())));
$event_attendance = Csv::parse(file(sprintf('%s/attendance.csv', getcwd())));
$student_ids = Attendance::getStudentIds($event_attendance);

echo "id, payout\n";

foreach($student_ids as $student_id) {
    $student_attendance = Attendance::byStudentId( $student_id, $event_attendance );
    echo sprintf("%2d, %0.2f\n", $student_id, Student::payout($student_attendance, $workplaces)/100);
}

