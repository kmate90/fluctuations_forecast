<?php

namespace App\Forecast\Fluctuation;


class MaxFluctuation extends Fluctuation
{
    /**
     * @return int
     */
    public function getMaxFluctuation() {
        return max($this->calculateValues());
    }
}