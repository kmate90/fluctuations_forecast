<?php
/**
 * Created by PhpStorm.
 * User: Máté
 * Date: 2019. 06. 01.
 * Time: 12:19
 */

namespace App\Forecast\Fluctuation;


class Deviation extends Fluctuation
{
    /**
     * @return float
     */
    function getStand_Deviation()
    {
        $arr = $this->calculateValues();
        $num_of_elements = count($arr);
        $variance = 0.0;
        $average = array_sum($arr)/$num_of_elements;

        foreach($arr as $i)
        {
            $variance += pow(($i - $average), 2);
        }

        return (float)sqrt($variance/$num_of_elements);
    }
}