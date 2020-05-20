<?php

use Veri\Rate;

use PHPUnit\Framework\TestCase;
use Faker\Factory;

class RateTest extends TestCase {

    /**
     * @group rate
     */
    public function testMealValue() {
        $this->assertSame(Rate::meal(), 550);
    }

    /**
     * @group rate
     */
    public function testNegativeKmValue() {
        $this->assertSame(Rate::km(-1), 0);
    }

    /**
     * @group rate
     */
    public function test4KmValue() {
        $this->assertSame(Rate::km(4), 0);
    }
    
    /**
     * @group rate
     */
    public function test5KmValue() {
        $this->assertSame(Rate::km(5), 545);
    }

    /**
     * @group rate
     */
    public function testFuelValue() {
        $this->assertSame(Rate::fuel(), 100);
    }

    /**
     * @group rate
     */
    public function testAgeIsUnder18() {
        $this->assertSame(Rate::age(17), 7250);
    }

    /**
     * @group rate
     */
    public function testAgeIs25() {
        $this->assertSame(Rate::age(25), 8590);
    }

    /**
     * @group rate
     */
    public function testAgeIsOver25() {
        $this->assertSame(Rate::age(26), 9050);
    }

    /**
     * @group rate
     */
    public function testAgeIs18To24() {
        $this->assertSame(Rate::age(18), 8100);
        $this->assertSame(Rate::age(24), 8100);
    }

    /*
    public function testRateForAttendedDay() {
        $attendance = [
            'id' => 19,
            'name' => 'Tiffany Jones',
            'location' => [0, 10],
            'dob' => '2003-10-14',
            'workplace_id' => 2,
            'status' => 'AT'
        ];
        $this->assertSame(Rate::day($attendance), );
    }
     */

}
