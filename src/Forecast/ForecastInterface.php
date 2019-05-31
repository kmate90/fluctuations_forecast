<?php


namespace App\Forecast;

use App\Utils\Scraper;
interface ForecastInterface
{
    /**
     * @return mixed
     */
    public function getMinTemperatures();

    /**
     * @return mixed
     */
    public function getMaxTemperatures();

    /**
     * @return mixed
     */
    public function calculateValues();
}