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

}
