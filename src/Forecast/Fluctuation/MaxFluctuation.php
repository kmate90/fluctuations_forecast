<?php

namespace App\Forecast\Fluctuation;


class MaxFluctuation extends Fluctuation
{
    public function getMaxFluctuation() {
        return max($this->calculateValues());
    }
}