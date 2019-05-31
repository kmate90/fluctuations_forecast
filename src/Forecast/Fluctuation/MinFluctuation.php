<?php



namespace App\Forecast\Fluctuation;


class MinFluctuation extends Fluctuation
{
    public function getMinFluctuation() {
        return min($this->calculateValues());
    }
}