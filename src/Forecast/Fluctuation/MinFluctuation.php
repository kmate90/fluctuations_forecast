<?php



namespace App\Forecast\Fluctuation;


class MinFluctuation extends Fluctuation
{
    /**
     * @return int
     */
    public function getMinFluctuation() {
        return min($this->calculateValues());
    }
}