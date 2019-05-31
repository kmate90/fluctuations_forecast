<?php



namespace App\Forecast\Fluctuation;


class MinFluctuation extends Fluctuation
{
    public $temp;
    public function getMinFluctuation() {
        return min($this->calculateValues());
    }
}