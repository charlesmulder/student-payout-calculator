<?php

use Veri\Csv;
use Veri\Workplace;

use PHPUnit\Framework\TestCase;

class WorkplaceTest extends TestCase
{
    /**
     * @group workplace
     */
    public function testById() {
        $file = file( sprintf('%s/workplaces.csv', getcwd()) );
        $workplaces = Csv::parse($file);
        $workplace = Workplace::byId( 6, $workplaces );
        $this->assertSame( (int)$workplace['id'], 6 );
        $this->assertSame( $workplace['name'], 'Anderson-Howard' );
        $this->assertEquals( $workplace['location'], [37, 18] );
    }

    /**
     * @group workplace
     */
    public function testByRandomId() {
        $file = file( sprintf('%s/workplaces.csv', getcwd()) );
        $workplaces = Csv::parse($file);
        $workplace = Workplace::byId( rand(1, 10), $workplaces );
        $this->assertRegExp("/\d+/", $workplace['id']);
        $this->assertRegExp("/\w+/", $workplace['name']);
        $this->assertContainsOnly('integer', $workplace['location']);
    }
}

