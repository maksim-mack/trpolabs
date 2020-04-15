<?php

use maksim\LinearEq;
use PHPUnit\Framework\TestCase;
use maksim\MaksimException;

class LinearEqTest extends TestCase
{
    protected $linear;

    protected function setUp(): void
    {
        $this->linear = new LinearEq();
    }

    /**
     * Общий случай
     */

    public function test_equation_with_coefficient_more_then_zero_or_less_then_zero()
    {
        $a = 2;
        $b = 1;
        $this->assertEquals(-0.5, $this->linear->solvel($a, $b));
        $a = -4;
        $b = 5;
        $this->assertEquals(1.25, $this->linear->solvel($a, $b));
    }


    /**
     * Общий случай
     */
    public function test_equation_with_second_coefficient_equal_zero()
    {
        $a = 4;
        $b = 0;
        $this->assertEquals(0, $this->linear->solvel($a, $b));
    }

    /**
     * Исключение
     */
    public function test_equation_with_coefficient_equal_zero1()
    {
        $a = 0;
        $b = 0;
        $this->expectException(MaksimException::class);
        $this->linear->solvel($a, $b);

    }

    /**
     * Исключение
     */
    public function test_equation_with_coefficient_equal_zero2()
    {
        $a = 0;
        $b = 5;
        $this->expectException(MaksimException::class);
        $this->linear->solvel($a, $b);
    }
}