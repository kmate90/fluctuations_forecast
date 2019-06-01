<?php


namespace App\Forecast\Fluctuation;


class Median extends Fluctuation
{
    /**
     * @return float|int
     */
    function getMedian() {
        $arr = $this->calculateValues();
        $count = count($arr);
        sort($arr);
        $mid = floor(( $count - 1 ) / 2);
        if($count % 2) {
            $median = $arr[$mid];
        } else {
            $low = $arr[$mid];
            $high = $arr[$mid+1];
            $median = (($low+$high)/2);
        }
        return $median;
    }
}