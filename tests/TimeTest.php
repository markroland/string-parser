<?php

class TimeTest extends PHPUnit_Framework_TestCase {

    protected $Parser;

    public function test_seconds_ago() {
        $this->assertSame(
            '10 seconds ago',
            markroland\StringParser\Time::ago(strtotime('-10 seconds'))
        );
    }

    public function test_minutes_ago() {
        $this->assertSame(
            '2 minutes ago',
            markroland\StringParser\Time::ago(strtotime('-120 seconds'))
        );
    }

    public function test_hours_ago() {
        $this->assertSame(
            '1 hour ago',
            markroland\StringParser\Time::ago(strtotime('-3601 seconds'))
        );

        $this->assertSame(
            '2 hours ago',
            markroland\StringParser\Time::ago(strtotime('-7201 seconds'))
        );
    }

    public function test_days_ago() {
        $this->assertSame(
            '1 day ago',
            markroland\StringParser\Time::ago(strtotime('-86400 seconds'))
        );

        $this->assertSame(
            '6 days ago',
            markroland\StringParser\Time::ago(strtotime('-604799 seconds'))
        );
    }

    public function test_weeks_ago() {
        $this->assertSame(
            '1 week ago',
            markroland\StringParser\Time::ago(strtotime('-604800 seconds'))
        );
    }

    public function test_months_ago() {
        $this->assertSame(
            '1 month ago',
            markroland\StringParser\Time::ago(strtotime('-2592000 seconds'))
        );
    }

    public function test_years_ago() {
        $this->assertSame(
            '1 year ago',
            markroland\StringParser\Time::ago(strtotime('-31556927 seconds'))
        );
    }

    /**
     * @expectedException Exception
     */
    public function test_ago_exception() {

        $ago = markroland\StringParser\Time::ago('');
        $this->expectException(InvalidArgumentException::class);
    }
}
