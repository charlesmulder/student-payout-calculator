<?php

namespace Veri;

use \DateTime, \DateTimeZone;

class Student {

    /**
     * Calculate age from date of birth 
     *
     * @param string $dob Date of birth
     * @return int Age
     */
    public static function getAge( string $dob ) {
        $tz  = new DateTimeZone('Europe/Dublin');
        return DateTime::createFromFormat('Y-m-d', $dob, $tz)->diff(new DateTime('now', $tz))->y;
    }

    /**
     * Calculate student payout 
     *
     * @param array $attendances List of attendance records per day for a single student
     * @param array $workplaces List of workplaces
     * @return int Amount in cents
     */
    public static function payout( array $attendances, array $workplaces ) {
        return array_reduce($attendances, function($cents, $attendance) use ($workplaces) {
            return $cents += Rate::day( $attendance, $workplaces);
        }, 0);
    }
}
