<?php

include_once "FilterController.php";
use PHPUnit\Framework\TestCase;

class TestFilterController extends TestCase
{
    protected $filter;

    /**
     * Инициализация класса с переменными входными параметрами
     * @param $array array
     */
    public function setTestFilterClass($array){
        $this->filter = new FilterController($array);
    }

    /**
     * @test  Тест на  больший возраста
     * @dataProvider agesMaxProvider
     * @param $ages array
     * @param $result integer
     */

    public function test_get_max_age($ages, $result) {
        $this->setTestFilterClass($ages);
        $this->assertEquals($result, $this->filter->getMaxAge());
    }

    public function agesMaxProvider() {
        return [
            [[5,6,3,0,4], 6],
            [[3,12,43,78,100], 100],
            [[5,5,5], 5],
            [[5,15,25], 25]
        ];
    }


    /**
     * @test  Тест на меньший возраста
     * @dataProvider agesMinProvider
     * @param $ages array
     * @param $result integer
     */

    public function test_get_min_age($ages, $result) {
        $this->setTestFilterClass($ages);
        $this->assertEquals($result, $this->filter->getMinAge());
    }


    public function agesMinProvider() {
        return [
            [[5,62,30,0,4], 0],
            [[3,12,43,78,100,9,4,2], 2],
            [[5,5,5], 5],
            [[5,15,76,88,99,34,2,7], 2]
        ];
    }


    /**
     * @test Текст получение последнего элемента массива
     * @dataProvider lastIndexProvider
     * @param $array array
     * @param $result integer
     */

    public function test_get_last_array_value($array, $result) {
        $this->setTestFilterClass($array);
        $this->assertEquals($result, $this->filter->getLastAgeOfSortedArray($array));
    }


    public function lastIndexProvider() {
        return [
            [[6,4,5,5,5,5,7,8,44,5,5,78,9], 9],
            [[4,5,6,7,3,5,4,4,4,3,4,4],4],
            [[0,0,0,0],0 ],
            [[3,2,3,4,5],5]
        ];
    }

    /**
     * @test Тест на средний возраст
     * @dataProvider agesAverageProvider
     * @param $ages array
     * @param $result integer
     */
    public function test_average_age($ages, $result) {
        $this->setTestFilterClass($ages);
        $this->assertEquals(round($result), $this->filter->getAverageAge());
    }

    public function getAverage($array) {
        return array_sum($array)/count($array);
    }

     public function agesAverageProvider() {
        return [
            [[5,6,3,0,4],$this->getAverage([5,6,3,0,4])],
            [[3,12,43,78,100], $this->getAverage([3,12,43,78,100])],
            [[5,5,5],$this->getAverage([5,5,5]) ],
            [[5,15,25], $this->getAverage([5,15,25])]
        ];
    }
}