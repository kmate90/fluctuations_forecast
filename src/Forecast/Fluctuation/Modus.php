<?php


namespace App\Forecast\Fluctuation;


class Modus extends Fluctuation
{
    /**
     * @return false|int|string
     */
    function getModus() {
        $val = array_count_values($this->calculateValues());
        $modus = array_search(max($val), $val);
        return $modus;
    }
}