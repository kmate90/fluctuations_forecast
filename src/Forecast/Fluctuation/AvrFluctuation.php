<?php

namespace App\Forecast\Fluctuation;



class AvrFluctuation extends Fluctuation
{
    function getAverageFluctuation()
    {
        $arr = $this->calculateValues();
        return array_sum($arr) / count($arr);
    }
}