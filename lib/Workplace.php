<?php

namespace Veri;

class Workplace {

    /**
     * Find a workplace by id
     *
     * @param int $id Workplace id
     * @param array $workplaces [
     *   id => int,
     *   name => string,
     *   location => array
     * ]
     * @return array 
     */
    public static function byId( int $id, array $workplaces ) : array {
        foreach( $workplaces as $workplace ) {
            if($workplace['id'] == $id) {
                return $workplace;
            }
            continue;
        }
    }
}
