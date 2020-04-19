<?php


class FilterController
{

    /**
     * FilterController constructor.
     * @param array $ages
     */
    private $ages;
    public function __construct(array $ages)
    {
        $this->ages = $ages;
    }

    public function getLastAgeOfSortedArray() {
        return end($this->ages);
    }

    public function index() {
        echo "Минимальный возраст {$this->getMinAge()}<br>";
        echo "Максимальный возраст {$this->getMaxAge()}<br>";
        echo "Средний возраст {$this->getAverageAge()}<br>";
    }

    public function getAverageAge() {
        return round(array_sum($this->ages)/ count($this->ages));
    }

    public function getMaxAge(){
        sort($this->ages);
        return $this->getLastAgeOfSortedArray();
    }

    public function getMinAge() {
        rsort($this->ages);
        return $this->getLastAgeOfSortedArray();
    }


}

if (isset($_POST) && !empty($_POST)) {
    $filter = new FilterController($_POST['ages']);
    $filter->index();
}
