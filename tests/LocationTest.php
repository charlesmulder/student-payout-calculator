<?php

use Veri\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{

    /**
     * @group location
     */
    public function testParsesTupleToArray() {
        $x = rand(0, 100);
        $y = rand(0, 100);
        $tuple = sprintf( "(%d, %d)", $x, $y );
        $this->assertEquals( Location::parse($tuple), [$x, $y] );
    }

    /**
     * @group location
     */
    public function testCalculatesDistanceBetweenTwoPoints() {
        $workplace = Location::parse("(2, 4)");
        $home = Location::parse("(-3, 8)");
        $this->assertSame(6.4, Location::distance($workplace, $home));
    }

}
