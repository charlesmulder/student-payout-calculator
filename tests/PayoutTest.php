<?php

use Veri\Csv, Veri\Attendance, Veri\Rate;

use PHPUnit\Framework\TestCase;

class PayoutTest extends TestCase {

    /**
     * @group payout
     */
    public function testStudent1Payout() {
        $workplaces = [
            [
                'id' => 1, 
                'name' => 'Firehose Inc', 
                'location' => [4, 15]
            ]
        ];
        $attendances = [
            [
                'id' => 1, 
                'name' => 'John O\'Toole', 
                'location' => [5, 10], 
                'dob' => '2003-10-12',
                'workplace_id' => 1, 
                'status' => 'AT'
            ],
            [
                'id' => 1, 
                'name' => 'John O\'Toole', 
                'location' => [5, 10], 
                'dob' => '2003-10-12',
                'workplace_id' => 1, 
                'status' => 'AT'
            ],
            [
                'id' => 1, 
                'name' => 'John O\'Toole', 
                'location' => [5, 10], 
                'dob' => '2003-10-12',
                'workplace_id' => 1, 
                'status' => 'USL'
            ]
        ];
        $cents = array_reduce($attendances, function($cents, $attendance) use ($workplaces) {
            $cents += Rate::day( $attendance, $workplaces);
            return $cents;
        }, 0);
        $this->assertEquals(13560, $cents);
    }

}

