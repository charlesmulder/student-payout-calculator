<?php

use Veri\Student;

use PHPUnit\Framework\TestCase;

use Faker\Factory;

class StudentTest extends TestCase
{
    /**
     * @group student
     */
    public function testConvertRandomDobToAge() {
        $faker = Factory::create();
        $dob = $faker->date('Y-m-d', date_create('1 year ago'));
        $age = Student::getAge( $dob );
        $this->assertGreaterThan(0, Student::getAge( $dob ));
    }

    /**
     * @group student
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
        ;
        $this->assertEquals(19720, Student::payout($attendances, $workplaces));
    }

}
