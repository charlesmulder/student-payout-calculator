<?php

namespace Veri;

use Veri\Location, Veri\Student, Veri\Workplace;

class Rate {

    /**
     * Meal allowance
     *
     * @return int Amount in cents
     */
    public static function meal() : int {
        return 550;
    }

    /**
     * Travel allowed for actual distance traveled
     *
     * @param float $km Kilometers
     * @return int Amount in cents
     */
    public static function km( float $km ) : int {
        if($km < 5) {
            return 0;
        }
        return abs($km)*109;
    }

    /**
     * Fuel allowance for travel
     *
     * @return int Amount in cents
     */
    public static function fuel() : int {
        return 100;
    }

    /**
     * Basic allowance based on age
     *
     * @param int $age 
     * @return int Amount in cents
     */
    public static function age( int $age ) : int {
        if( $age < 18 ) 
            return 7250;
        if( $age > 25) 
            return 9050;
        if( $age == 25)
            return 8590;
        return 8100;
    }

    /**
     * Calculate total payout for a single student on one day
     *
     * @param array $attendance Attendance record for a single student on a specific event day
     * @param array $workplaces List of workplaces
     * @return int Amount in cents
     */
    public static function day( array $attendance, array $workplaces ) : int {

        switch( $attendance['status'] ) {
            case 'AT':
                $workplace = Workplace::byId($attendance['workplace_id'], $workplaces );
                return self::age(Student::getAge($attendance['dob'])) + self::meal() + self::km(Location::distance($attendance['location'], $workplace['location'])) + self::km(Location::distance($workplace['location'], $attendance['location'])) + self::fuel();
                break;

            case 'AL':
            case 'CSL':
                return self::age(Student::getAge($attendance['dob']));
                break;

            case 'USL':
                return 0;
                break;

            default:
                return 0;
        }
    }

}
