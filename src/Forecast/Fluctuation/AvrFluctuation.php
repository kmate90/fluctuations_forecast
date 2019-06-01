<?php

namespace App\Forecast\Fluctuation;



class AvrFluctuation extends Fluctuation
{
    /**
     * @return float|int
     */
    function getAverageFluctuation()
    {
        $arr = $this->calculateValues();
        return array_sum($arr) / count($arr);
    }
}