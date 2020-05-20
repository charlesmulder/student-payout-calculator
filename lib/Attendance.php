<?php

namespace Veri;

class Attendance {

    /**
     * @param array $attendance List of attendance records
     * @return array Sorted and unique list of student ids
     */
    public static function getStudentIds( array $attendance ) : array {
        $ids = array_unique(array_column($attendance, 'id'), SORT_NUMERIC );
        sort($ids);
        return $ids;
    }

    /**
     * @param array $attendance List of attendance records
     * @return array Students attendance records
     */
    public static function byStudentId( int $id, array $attendance ) : array {
        return array_values(array_filter( $attendance, function($student) use ($id) {
            return $student['id'] == $id ? true : false;
        }));
    }
}
