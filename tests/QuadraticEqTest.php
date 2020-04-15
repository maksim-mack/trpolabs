<?php

use PHPUnit\Framework\TestCase;
use maksim\QuadraticEq;
use maksim\MaksimException;

class QuadraticEqTest extends TestCase
{
    protected $quadratic;

    protected function setUp(): void
    {
        $this->quadratic = new QuadraticEq();
    }

    /**
     * Обший случай
     */

    public function test_when_coefficients_not_equal_zero()
    {
        $a = 2;
        $b = -1;
        $c = -10;
        $this->assertEquals([2.5, -2], $this->quadratic->solve($a, $b, $c));
        $a = 1;
        $b = 4;
        $c = -12;
        $this->assertEquals([2, -6], $this->quadratic->solve($a, $b, $c));

    }


    /**
     * Обший случай
     */

    public function test_when_coefficient_a_equals_to_zero()
    {
        $a = 0;
        $b = 2;
        $c = 3;
        $this->assertEquals([-1.5], $this->quadratic->solve($a, $b, $c));
    }

    /**
     * Общий случай
     */
    public function test_when_discr_equals_zero()
    {
        $a = 2;
        $b = 4;
        $c = 2;
        $this->assertEquals([-1], $this->quadratic->solve($a, $b, $c));
    }


    /**
     * Проверка на тип возращаемого значения
     */
    public function test_return_value_is_array()
    {
        $a = 0;
        $b = 2;
        $c = 3;
        $this->assertIsArray($this->quadratic->solve($a, $b, $c));
        $a = 1;
        $b = 4;
        $c = 3;
        $this->assertIsArray($this->quadratic->solve($a, $b, $c));
    }

    /**
     * Исключение
     */
    public function test_when_discr_less_then_zero()
    {
        $a = 2;
        $b = 5;
        $c = 4;
        $this->expectException(MaksimException::class);
        $this->quadratic->solve($a, $b, $c);

    }


}