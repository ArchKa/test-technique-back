<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SpeedCalculatorTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_average_speed_calculation()
{
    $speeds = [10, 20, 30];
    $average = array_sum($speeds) / count($speeds);
    
    $this->assertEquals(20, $average);
}
}
