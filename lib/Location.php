<?php

namespace Veri;

class Location {

    /**
     * Converts tuple (x, y) to  array [x, y]
     *
     * @param string $tuple Eg (23, 30)
     * @return array
     */
    public static function parse( string $tuple ) : array {
        return array_map(function($coordinate) {
            return (int)$coordinate;
        }, explode(",", trim($tuple, "()\t\n\r\0\x0B")));
    }

    /**
     * @param array $a [
     *   0 => int,
     *   1 => int
     * ]
     * @param array $b [
     *   0 => int,
     *   1 => int
     * ]
     * @return float Distance in km
     */
    public static function distance( array $a, array $b) : float {
        $x = $b[0] - $a[0];
        $y = $b[1] - $a[1];
        return sqrt(($x ** 2) + ($y ** 2));
    }

}
