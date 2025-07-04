<?php

namespace Veri;

class Attendance {

    /**
     * Extract a unique and sorted list of student ids
     *
     * @param array $attendance List of attendance records
     * @return int[] Sorted and unique list of student ids
     */
    public static function getStudentIds( array $attendance ) : array {
        $ids = array_unique(array_column($attendance, 'id'), SORT_NUMERIC );
        sort($ids);
        return $ids;
    }

    /**
     * Filter attendance records by student id
     *
     * @param int $id Student id 
     * @param array $attendance List of attendance records
     * @return array Specific students attendance records
     */
    public static function byStudentId( int $id, array $attendance ) : array {
        return array_values(array_filter( $attendance, function($student) use ($id) {
            return $student['id'] == $id ? true : false;
        }));
    }
}
