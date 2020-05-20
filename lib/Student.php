<?php

namespace Veri;

use \DateTime;
use \DateTimeZone;

class Student {

    /**
     * @param string $dob
     * @return int
     */
    public static function getAge( string $dob ) {
        $tz  = new DateTimeZone('Europe/Dublin');
        return DateTime::createFromFormat('Y-m-d', $dob, $tz)->diff(new DateTime('now', $tz))->y;
    }
}
