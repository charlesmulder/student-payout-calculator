<?php

namespace Veri;

use Veri\Location;

class Csv {

    /**
     * Open and parse csv file
     *
     * @param array $file File opened with file()
     * @return array Array of arrays keyed by csv title fields
     */
    public static function parse( array $file ) : array {
		$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), $file); // TODO: optimize memory usage, will run into issues for very large csvs
        $fields = array_shift($csv);
        return array_map(function($row) use ($fields) {
            $row[2] = Location::parse($row[2]); // TODO: don't rely on index for location
            return array_combine($fields, $row);
        }, $csv);
    }

}
